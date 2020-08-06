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
use Zipper;
// modelo
use App\Models\Rol; 
use App\Models\User; 
use App\Models\Archivo;
use App\Models\Anuncio;
use App\Models\Settings; 
use App\Models\Contenido;
use App\Models\Notification;
// controladores
use App\Http\Controllers\IndexControllers;

class ArchivoController extends Controller
{
	function __construct()
	{
        // TITLE
		view()->share('title', 'Agregar Material');
	    Carbon::setLocale('es');
	}
	//gestion de material
	public function subir()
	{
	     
	   return view('archivo.subir');  

	}
	
	 public function subida(Request $request)
    {
           
               $archivo = new Archivo();
               $archivo->titulo=$request->titulo;
               $archivo->contenido=$request->contenido;
               $archivo->save();
               
               $this->almacenArchivos($request->file('archivo'), $archivo);
               
               $funciones = new IndexController;
               $funciones->msjSistema('Archivos Subidos Con exito', 'success');
               return redirect()->route('archivo.ver');

    }
    
    
    public function mejorar($id){
        
        $archivo = Archivo::find($id);
        return view('archivo.mejora', compact('archivo'));
    }
    
    public function actual(Request $request){
        
        $archivo = Archivo::find($request->id);
        
              $this->almacenArchivos($request->file('archivo'), $request);
              
               $archivo->titulo=$request->titulo;
               $archivo->contenido=$request->contenido;
               $archivo->save();
               
               $funciones = new IndexController;
               $funciones->msjSistema('Actualizado con exito', 'success');
               
               return redirect()->route('archivo.ver');
    }
    
     public function ver()
    {
          view()->share('title', 'Descargar Material');
          $archivos =Archivo::orderBy('id','DESC')->get();
          foreach ($archivos as $archivo) {
               $archivo->archivo = json_decode($archivo->archivo);
          }
          return view('archivo.ver')->with('archivo',$archivos);
    }
    
     public function destruir($id)
    {
          $archivo = Archivo::find($id);
          $archivo->delete();
          return redirect()->route('archivo.ver');
    }
    
    /*
    * almacenamos los archivos subidos
    * y creamos un archivo zip 
    * para descargarlo
    */
    public function almacenArchivos($archivos, $archi){
        
        $names = []; $extencion = null;
        $zipper = new \Chumper\Zipper\Zipper;
        
        $file_path = public_path().'/archivo/'.$archi->id.'.zip';
        \File::delete($file_path);
        
               if (!empty($archivos)) {
                    foreach ($archivos as $archivo) {
                        
                         $extencion = $this->revisarExtencion($archivo->clientExtension());
                        
                         $name = 'archivo_'.str_random(16).time(). '.'.$archivo->getClientOriginalExtension();
                         $names [] = $name;
                         $path = public_path() . '/archivo';
                         $archivo->move($path, $name);
                         
                         $files = glob(public_path().'/archivo/'.$name);
                         $zipper->make(public_path().'/archivo/'.$archi->id.'.zip')->add($files);
                         $zipper->close();
                    }
               }
               
            $arc = Archivo::find($archi->id);   
            $arc->archivo = json_encode($names); 
            $arc->imagen_muestra = $extencion; 
            $arc->save();
            
    }
    
    public function revisarExtencion($extencion){
        
        $imagen = null;
        if($extencion == 'docx' || $extencion == 'doc'){
            $imagen = 'wo.jpg';
        }elseif($extencion == 'pdf'){
            $imagen = 'pdf.jpg';
        }elseif($extencion == 'xlsx'){
            $imagen = 'excel.jpg';
        }elseif($extencion == 'pptx'){
            $imagen = 'power.jpg';
        }
        
        return $imagen;
    }
    
    /*
    * descarga del archivo zip 
    * donde estan los archivos
    * comprimidos
    */
    public function descargar($id){
        
        return response()->download(public_path().'/archivo/'.$id.'.zip');
    } 
    
    
    	//gestion de noticias
    	public function noticias()
	{
	     view()->share('title', 'Blog y Artículos');
	     return view('archivo.noticias');  

	}
	
		public function guardar(Request $request)
	{
       
         $name= null;
         
          if (!empty($request->file('imagen'))) {
               if ($request->file('imagen')) {
                    $file = $request->file('imagen');
                    $name = 'imagen_'. time(). '.'.$file->getClientOriginalExtension();
                    $path = public_path() . '/imagen';
                    $file->move($path, $name);
               }
          }

               $contenido = new Contenido();
               $contenido->titulo=$request->titulo;
               $contenido->contenido=$request->contenido;
               $contenido->imagen = $name;
               $contenido->save();
               
               $funciones = new IndexController;
               $funciones->msjSistema('Blog y Artículos subidos Con exito', 'success');
               return redirect()->route('archivo.contenido');
	    

	}
	
	 public function contenido()
    {
        
        view()->share('title', 'Blog y Artículos');
         $contenido=Contenido::orderBy('id','DESC')->paginate(10);
         return view('archivo.contenido')->with('contenido',$contenido); 
    }
    
    public function eliminar($id)
    {
         $contenido = Contenido::find($id);
       $contenido->delete();
    return redirect()->route('archivo.contenido');
    }
    
    public function actualizar($id){
        view()->share('title', 'Blog y Artículos');
      $contenido = Contenido::find($id);
        return view('archivo.actualizar')->with(compact('contenido'));
     }
    
     public function modificar(Request $request, $id){
 
 $contenido = Contenido::find($id);
 

 if ($request->file('imagen') != null) {
     if ($request->file('imagen')) {
            $file = $request->file('imagen');
          $name = 'imagen_'. time(). '.'.$file->getClientOriginalExtension();
          $path = public_path() . '/imagen';
          $file->move($path, $name);

             $contenido->imagen = $name;
        }
 }
 
   $contenido->titulo=$request->titulo;
   $contenido->contenido=$request->contenido;
   $contenido->save();    
       
       return redirect()->route('archivo.contenido');

       
          }
      
      
      
      //crear anuncios
      public function anuncios(){
       
       view()->share('title', 'Crear Anuncios');
       
        return view('archivo.anuncios'); 
       
      }
      
      public function saveanuncio(Request $request){
          
          $validatedData = $request->validate([
        'color' => 'required',
        'contenido' => 'required',
        'desde' => 'required',
        'hasta' => 'required',
       ]);
       
          $funciones = new IndexController;
          
          $desde = new Carbon($request->desde);
		  $hasta = new Carbon($request->hasta);
			
          if($desde > $hasta){
              
               $funciones->msjSistema('La fecha desde no puede ser mayor que la fecha Hasta', 'warning');
            return redirect()->back();
            
          }
          
          
    $anuncio = new Anuncio();
    $anuncio->titulo=$request->titulo;
    $anuncio->contenido=$request->contenido;
    $anuncio->color=$request->color;
    $anuncio->inicio=$request->desde;
    $anuncio->vencimiento = $request->hasta;
    $anuncio->save();
    
    $funciones->msjSistema('Anuncio guardado con exito', 'success');
            return redirect()->back();
      }
      
      public function edicion(){
          
          $anuncios = Anuncio::all();
          return view('archivo.edicion', compact('anuncios')); 
      }
      
      
      public function actualizaranuncio(Request $request){
          
          $validatedData = $request->validate([
        'color' => 'required',
        'contenido' => 'required',
        'desde' => 'required',
        'hasta' => 'required',
       ]);
       
          $funciones = new IndexController;
          
          $desde = new Carbon($request->desde);
		  $hasta = new Carbon($request->hasta);
			
          if($desde > $hasta){
              
               $funciones->msjSistema('La fecha desde no puede ser mayor que la fecha Hasta', 'warning');
            return redirect()->back();
            
          }
          
    $anuncio = Anuncio::find($request->id);
    $anuncio->titulo=$request->titulo;
    $anuncio->contenido=$request->contenido;
    $anuncio->color=$request->color;
    $anuncio->inicio=$request->desde;
    $anuncio->vencimiento = $request->hasta;
    $anuncio->save();
    
    $funciones->msjSistema('Anuncio modificado con exito', 'success');
            return redirect()->back();
      }
      
      
      
      public function eliminaranuncio($id){
          
          $funciones = new IndexController;
          
          $anuncio = Anuncio::find($id);
          $anuncio->delete();
          
          $funciones->msjSistema('Anuncio eliminado con exito', 'success');
            return redirect()->back();
      }
      
      
}