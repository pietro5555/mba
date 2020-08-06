<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Crypt;
use Auth; 
use DB; 
use Carbon\Carbon; 

// llamado a los modelos
use App\Models\Rol;
use App\Models\User; 
use App\Models\Monedas;
use App\Models\Qr;
use App\Models\Settings;
use App\Models\Optioncarrito;
use App\Models\SettingsPunto; 
use App\Models\Iva;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\CarritoController;

class LinkController extends Controller
{

   public function link(Request $reques)
    {
        view()->share('title', 'Producto a Comprar');
        
        $url = trim(str_replace('/mioficina', '', request()->root()));
         $empresa = trim(str_replace('https://www.', '', $url));
         $cate='';
        
        $settings = Settings::first();
        $resultado = DB::table($settings->prefijo_wp.'posts')
        ->where('ID', request()->producto_id)
        ->first();
        
        $imagen = DB::table($settings->prefijo_wp.'postmeta')
        ->where('post_id', $resultado->ID)
        ->where('meta_key','_thumbnail_id')
        ->select('meta_value')
        ->first();
        
        $precio = DB::table($settings->prefijo_wp.'postmeta')
        ->where('post_id', $resultado->ID)
        ->where('meta_key','_price')
        ->select('meta_value')
        ->first();
        
        if($imagen != null){
        $imagen2 = DB::table($settings->prefijo_wp.'posts')
        ->where('ID', $imagen->meta_value)
        ->select('guid')
        ->first();
        }
        
        $categoria = DB::table($settings->prefijo_wp.'term_relationships')->select('term_taxonomy_id')->where('object_id', request()->producto_id)->get();
        
        foreach($categoria as $cetagori){
            $categoriaProducto = DB::table($settings->prefijo_wp.'term_taxonomy')->where('term_id', $cetagori->term_taxonomy_id)->where('taxonomy' , 'product_cat')->first();
            
            if($categoriaProducto != null){
                $cate = $categoriaProducto->term_id;
            }
        }
        
        $cat = DB::table($settings->prefijo_wp.'terms')->where('term_id', $cate)->first();
        
        $moneda = Monedas::where('principal', 1)->get()->first();
        
        $settingPuntos = SettingsPunto::find(1); 
        $carrito = new CarritoController;
        $puntos = $carrito->puntosCarrito(request()->producto_id, 1);
        
        $settingIva = Iva::find(1);
        $iva = $carrito->ivaCarrito(request()->producto_id, $precio->meta_value);
        
        $data = [
            'ID' => $resultado->ID,
            'titulo' => $resultado->post_title,
            'contenido' => $resultado->post_content,
            'precio' => $precio->meta_value,
            'imagen' => ($imagen == null) ? 'https://core360.com.br/shop/skin/adminhtml/default/default/lib/jlukic_semanticui/examples/assets/images/wireframe/image.png' : $imagen2->guid ,
            'link' => $resultado->guid,
            'url' => $url,
            'empresa' => $empresa,
            'categoria' => $cat->name,
            'puntos' => $puntos,
            'tipo_puntos' => (!empty($settingPuntos)) ? 1 : 0,
            'iva' => $iva,
            'tipo_iva' => (!empty($settingIva)) ? 1 : 0,
                ];
                
        $galerias = $this->almacenarGaleria(request()->producto_id, ($imagen == null) ? 'https://core360.com.br/shop/skin/adminhtml/default/default/lib/jlukic_semanticui/examples/assets/images/wireframe/image.png' : $imagen2->guid);
        
        $user = (request()->user != null) ? request()->user : 0;      
             
        return view('link.link',compact('data','moneda','galerias','user'));
        
    }
    
    //link de la tienda completa para comprar 
    //sin inciar sesion o estar registrado
    public function linktienda(){
        
        view()->share('title', 'Tienda');
        
        $result = $this->productos(' ');
        
        $moneda = Monedas::where('principal', 1)->get()->first();
        $user = request()->user;
        
        return view('link.tienda',compact('result','moneda','user'));
    }
    
    
    public function linkbuscar(Request $datos){
        
         view()->share('title', 'Tienda');
        
        $result = $this->productos($datos->nombre);
        $moneda = Monedas::where('principal', 1)->get()->first();
        
        $user = $datos->user;
        
        return view('link.tienda',compact('result','moneda','user'));
    }
    
    
    public function productos($requisito){
        
        $settings = Settings::first();
        
        if($requisito == ' '){
        $result = DB::table($settings->prefijo_wp.'posts as wp')
                    ->join($settings->prefijo_wp.'postmeta as wpm', 'wp.ID', '=', 'wpm.post_id' )
                    ->where([
                        ['wpm.meta_key', '=', '_price'],
                        ['wp.post_type', '=', 'product'],
                    ])
                    ->select('wp.ID', 'wp.post_title', 'wp.post_content','post_date', 'wp.guid', 'wpm.meta_value', 'wp.post_password as img')
                    ->orderBy('wp.ID', 'DECS')
                    ->get();
        }else{
          $result = DB::table($settings->prefijo_wp.'posts as wp')
                    ->join($settings->prefijo_wp.'postmeta as wpm', 'wp.ID', '=', 'wpm.post_id' )
                    ->where([
                        ['wpm.meta_key', '=', '_price'],
                        ['wp.post_type', '=', 'product'],
                    ])
                    ->select('wp.ID', 'wp.post_title', 'wp.post_content','post_date', 'wp.guid', 'wpm.meta_value', 'wp.post_password as img')
                    ->where('wp.post_title', 'like', '%'.$requisito.'%')
                    ->orderBy('wp.ID', 'DECS')
                    ->get();  
        }
        $cont = 0;
        foreach ($result as $element) {
            $idimg = DB::table($settings->prefijo_wp.'postmeta as wpm')
                ->where('wpm.post_id', '=', $element->ID)
                ->where('wpm.meta_key', '=', '_thumbnail_id')
                ->select('wpm.meta_value')
                ->get()->toArray();

                if (!empty($idimg)) {
                    $result[$cont]->img = DB::table($settings->prefijo_wp.'posts as wp')
                                        ->where('ID', $idimg[0]->meta_value)
                                        ->select('wp.guid')
                                        ->get()[0]->guid;
                }else {
                    $result[$cont]->img = 'https://core360.com.br/shop/skin/adminhtml/default/default/lib/jlukic_semanticui/examples/assets/images/wireframe/image.png';
                }
            $cont++;
        }  
        
        return $result;
    }
    
    
    public function almacenarGaleria($id, $imagen){
        
        $settings = Settings::first();
        $stringJson = [];
                     
        $galerias = DB::table($settings->prefijo_wp.'posts')->where('post_parent', $id)->where('post_type','attachment')->get();
        
        $cont=0;
        foreach($galerias as $galeria){
            
            $tash = DB::table($settings->prefijo_wp.'postmeta')->select('meta_value')->where('post_id', $galeria->ID)->where('meta_key','_wp_attached_file')->first();
            
            $cont++;
            array_push($stringJson, [
            'id' => $cont,
            'imagen' => '/wp-content/uploads/'.$tash->meta_value,
            ]);
        }
        
        if($cont == 0){
            array_push($stringJson, [
            'id' => 0,
            'imagen' => $imagen,
           ]);
        }
        
        
        return $stringJson;
    }
    
    public function metodo(){
         view()->share('title', 'Metodo de Pago');
         
        $metodos = Optioncarrito::all();
        return view('link.metodo',compact('metodos'));
    }
    
    public function subir(Request $request){
        
        $funciones = new IndexController;
        
        $archivo = new Optioncarrito();
   $archivo->nombre=$request->nombre;
    $archivo->medio_pago=$request->medio_pago;
    $archivo->activo = $request->activo;
    $archivo->link = $request->link;
    $archivo->save();
    
    $funciones->msjSistema('Creado con exito', 'success');
        return redirect()->back();
    }
    
    public function cambio($id){
      
        $funciones = new IndexController;
        
         $metodos = Optioncarrito::find($id);
         if($metodos->activo == 0){
         $metodos->activo = 1;
         }else{
           $metodos->activo = 0;  
         }
         $metodos->save();
         
        $funciones->msjSistema('Modificado con exito', 'success');
            return redirect()->back();
    }
    
    public function borrar($id){
        $funciones = new IndexController;
        
         $metodos = Optioncarrito::find($id);
         $metodos->delete();
         
        $funciones->msjSistema('Eliminado con exito', 'success');
            return redirect()->back();
    }
    
    
    //codigo QR
    public function codigo(){
        
        view()->share('title', 'Codigo QR');
        
        $qr = Qr::find(1);
        
        return view('link.codigo',compact('qr'));
    }
    
    
    public function insercion(Request $request){
        
        $qr = Qr::find(1);
        
        
        $tamano = str_replace('<iframe width=', '<iframe width="340"', $request->contenido);
          
           $conte= str_replace('height=', 'height="340"', $tamano);
        
        if($qr == null){
            Qr::create([
					'contenido' => $conte,
				]);
        }else{
            Qr::where('id', 1)->update([
					'contenido' => $conte,
				]);
        }
        
        $funciones = new IndexController;
            $funciones->msjSistema('Qr Agregado', 'success');
			return redirect()->back();
    }
    
    
    public function mostrarqr(){
        
        view()->share('title', 'Codigo QR');
        
        $qr = Qr::find(1);
        
        return view('link.qr',compact('qr'));
    }
    
    
    
    //subir a ckeditor imagenes
     public function upload(Request $request){
       if($request->hasFile('upload')) {

            $originName = $request->file('upload')->getClientOriginalName();

            $fileName = pathinfo($originName, PATHINFO_FILENAME);

            $extension = $request->file('upload')->getClientOriginalExtension();

            $fileName = $fileName.'_'.time().'.'.$extension;

        
            $request->file('upload')->move(public_path('images'), $fileName);

   
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');

            $url = asset('images/'.$fileName); 

            $msg = 'Imagen insertada con exito'; 

            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

               
            @header('Content-type: text/html; charset=utf-8'); 

            echo $response;

        }
    }

    
}
