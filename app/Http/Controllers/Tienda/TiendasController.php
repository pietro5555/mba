<?php

namespace App\Http\Controllers\Tienda;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
// modelo
use DB; 
use Auth; 
use Date; 
use Mail; 
use Carbon\Carbon;
use App\Models\User; 
use App\Models\Monedas;
use App\Models\Settings;
use App\Models\SettingsPunto;
// controlador
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\CarritoController;

class TiendasController extends Controller
{
	
	public function product(){
	    
	 View::share('title', 'Tienda - Agregar Producto');
	 
	  $settings = Settings::first();
	  $moneda = Monedas::where('principal', 1)->get()->first();
	  $datos = [];
	  
	  $puntos =0;
        $settingPuntos = SettingsPunto::find(1);
        if (!empty($settingPuntos)) {
            $puntos = 1;
        }
	  
      $categorias = DB::table($settings->prefijo_wp.'term_taxonomy')->select('term_taxonomy_id')->where('taxonomy', 'product_cat')->get();
      
        foreach($categorias as $categoria){
            
            $nombres = DB::table($settings->prefijo_wp.'terms')->where('term_id', $categoria->term_taxonomy_id)->first();
            
            array_push($datos, [
            'ID' => $categoria->term_taxonomy_id,
            'nombre' => $nombres->name,
          ]);
        }
         
        return view('tienda.product')->with(compact('datos','moneda','puntos'));
	
	}
	
	
	public function saveproduct(Request $dato){
	    
	    $funciones = new IndexController;
        $settings = Settings::first();
        $local = str_replace('mioficina', '', public_path());
        $idimagen=false;
        $fecha = new Carbon(); $month=$fecha->format('m'); $year=$fecha->format('Y');
          
        $pegado = str_replace(" ", '-',$dato->titulo);
        $title = 'Orden&ndash;'.$fecha->now()->toFormattedDateString().' @ '.$fecha->now()->format('h:i A');
        $tpmname = str_replace(' ', '-', $fecha->now()->toFormattedDateString());
        $tpmname = str_replace(',', '', $tpmname);
        $tpmname2 = str_replace(' ', '-', $fecha->now()->format('hi a'));
        $name = 'pedido-'.$tpmname.'-'.$tpmname2;
        
        //almacenamos la imagen
        if ($dato->file('archivo')) {
            $file = $dato->file('archivo');
            $extencion =  $file->clientExtension();
            
          $nombre = 'worpres_'. time(). '.'.$file->getClientOriginalExtension();
          $path =  $local.'/wp-content/uploads/'.$year.'/'.$month.'/';
          $file->move($path, $nombre);
        
        
        //aqui obtener la extencion de la imagen
         $guardarImagen= $year.'/'.$month.'/'.$nombre;
                $idimagen = DB::table($settings->prefijo_wp.'posts')->insertGetId([
                    'post_author' => 1,
                    'post_date' => $fecha->now(),
                    'post_date_gmt' => $fecha->now(),
                    'post_content' => ' ',
                    'post_title' => $dato->titulo,
                    'post_excerpt' => ' ',
                    'post_status' => 'inherit',
                    'comment_status' => 'open',
                    'ping_status' => 'closed',
                    'post_password' => ' ',
                    'post_name' => $pegado,
                    'to_ping' => ' ',
                    'pinged' => ' ',
                    'post_modified' => $fecha->now(),
                    'post_modified_gmt' => $fecha->now(),
                    'post_content_filtered' => ' ',
                    'post_parent' => 0,
                    'menu_order' => 0,
                    'post_type' => 'attachment',
                    'post_mime_type' => 'image/'.$extencion,
                    'comment_count' => 0
                ]);
            
            
            $this->savepostImagen($idimagen, $guardarImagen);
            
        }
            
                $id = DB::table($settings->prefijo_wp.'posts')->insertGetId([
                    'post_author' => 1,
                    'post_date' => $fecha->now(),
                    'post_date_gmt' => $fecha->now(),
                    'post_content' => ($dato->contenido == null) ? ' ' : $dato->contenido,
                    'post_title' => $dato->titulo,
                    'post_excerpt' => ' ',
                    'post_status' => 'publish',
                    'comment_status' => 'open',
                    'ping_status' => 'closed',
                    'post_password' => ' ',
                    'post_name' => $pegado,
                    'to_ping' => ' ',
                    'pinged' => ' ',
                    'post_modified' => $fecha->now(),
                    'post_modified_gmt' => $fecha->now(),
                    'post_content_filtered' => ' ',
                    'post_parent' => 0,
                    'menu_order' => 0,
                    'post_type' => 'product',
                    'post_mime_type' => ' ',
                    'comment_count' => 0
                ]);
                
                
                
                 if ($id) {
                    $linkProducto = str_replace('mioficina', '?post_type=product&#038;p=', $dato->root());
                    DB::table($settings->prefijo_wp.'posts')->where('ID', $id)->update([
                        'guid' => $linkProducto.$id
                    ]);
                    
                    if($idimagen){
                    $guid = str_replace('mioficina', '/wp-content/uploads/'.$year.'/'.$month.'/'.$nombre, $dato->root());
                    DB::table($settings->prefijo_wp.'posts')->where('ID', $idimagen)->update([
                        'guid' => $guid
                    ]);
                    
                    DB::table($settings->prefijo_wp.'posts')->where('ID', $idimagen)->update([
                        'post_parent' => $id
                    ]);
                    
                    
                    }
                    
                    $data = $this->requet($id, $dato, $idimagen);
                    
                
                    $this->savePostmeta($data);
                    $this->savemetaLook($data);
                    $this->savecategoria($data);
                    $this->updatetaxonomy($data);
                    $this->updatetermeta($data);
                    $this->galeria($dato, $id, $local, $year, $month);
                    
                    if($dato->autenticador == 1){
                        $this->guardarPuntos($dato, $id);
                    }
                    
                }
                
            $funciones->msjSistema('Creado con exito', 'success');
            return redirect()->back();
    }
    
    
    public function savepostImagen($idimagen, $guardarImagen){
        
        $settings = Settings::first();
        
        DB::table($settings->prefijo_wp.'postmeta')
            ->insert([
                ['post_id' => $idimagen, 'meta_key' => '_wp_attached_file', 'meta_value' => $guardarImagen],
            ]);
    }
    
    public function requet($id, $dato, $idimagen){
        
        $data = [
          'ID' => $id,
          'precio' => $dato['precio'],
          'precio2' => $dato['precio'].'.00',
          'categoria' => $dato['categoria'],
          'imagen' => ($idimagen == null) ? 0 : $idimagen,
                ];
                
        return $data;
    }
    
    
    public function savePostmeta($data){
        
        $settings = Settings::first();
        
        DB::table($settings->prefijo_wp.'postmeta')
            ->insert([
                ['post_id' => $data['ID'], 'meta_key' => '_edit_lock', 'meta_value' => 1],
                ['post_id' => $data['ID'], 'meta_key' => '_edit_last', 'meta_value' => 1],
                ['post_id' => $data['ID'], 'meta_key' => '_sku', 'meta_value' => ' '],
                ['post_id' => $data['ID'], 'meta_key' => '_regular_price', 'meta_value' => $data['precio']],
                ['post_id' => $data['ID'], 'meta_key' => '_price', 'meta_value' => $data['precio']],
                ['post_id' => $data['ID'], 'meta_key' => 'total_sales', 'meta_value' => '0'],
                ['post_id' => $data['ID'], 'meta_key' => '_tax_status', 'meta_value' => 'taxable'],
                ['post_id' => $data['ID'], 'meta_key' => '_tax_class', 'meta_value' => ' '],
                ['post_id' => $data['ID'], 'meta_key' => '_manage_stock', 'meta_value' => 'no'],
                ['post_id' => $data['ID'], 'meta_key' => '_backorders', 'meta_value' => 'no'],
                ['post_id' => $data['ID'], 'meta_key' => '_sold_individually', 'meta_value' => 'no'],
                ['post_id' => $data['ID'], 'meta_key' => '_virtual', 'meta_value' => 'no'],
                ['post_id' => $data['ID'], 'meta_key' => '_downloadable', 'meta_value' => 'no'],
                ['post_id' => $data['ID'], 'meta_key' => '_download_limit', 'meta_value' => '-1'],
                ['post_id' => $data['ID'], 'meta_key' => '_download_expiry', 'meta_value' => '-1'],
                ['post_id' => $data['ID'], 'meta_key' => '_stock', 'meta_value' => null],
                ['post_id' => $data['ID'], 'meta_key' => '_stock_status', 'meta_value' => 'instock'],
                ['post_id' => $data['ID'], 'meta_key' => '_product_version', 'meta_value' => '3.7.0'],
                ['post_id' => $data['ID'], 'meta_key' => '_manage_stock', 'meta_value' => 'no'],
                ['post_id' => $data['ID'], 'meta_key' => '_backorders', 'meta_value' => 'no'],
                ['post_id' => $data['ID'], 'meta_key' => '_wc_average_rating', 'meta_value' => '0'],
                ['post_id' => $data['ID'], 'meta_key' => '_wc_review_count', 'meta_value' => '0'],
            ]);
            
            if($data['imagen'] != 0){
            
            DB::table($settings->prefijo_wp.'postmeta')
            ->insert([
                ['post_id' => $data['ID'], 'meta_key' => '_thumbnail_id', 'meta_value' => $data['imagen']],
                ]);
            }
        
    }
    
    
    public function savemetaLook($data){
        
        $settings = Settings::first();
        
        DB::table($settings->prefijo_wp.'wc_product_meta_lookup')
            ->insert([
                ['product_id' => $data['ID'], 'sku' => ' ', 'virtual' => '0', 'downloadable' => '0',
                'min_price' => $data['precio2'], 'max_price' => $data['precio2'], 'onsale' => '0',
                'stock_quantity' => null, 'stock_status' => 'instock', 'rating_count' => '0', 'average_rating' => '0.00', 'total_sales' => '0'],
            ]);
            
    }
    
    
     public function savecategoria($data){
        $settings = Settings::first();
        
        DB::table($settings->prefijo_wp.'term_relationships')
            ->insert([
                ['object_id' => $data['ID'], 'term_taxonomy_id' => $data['categoria'], 'term_order' => '0'],
            ]);
    }
    
    public function updatetaxonomy($data){
        $settings = Settings::first();
        
        $cont = DB::table($settings->prefijo_wp.'term_taxonomy')->select('count')->where('term_id', $data['categoria'])->first();
        
        $total = ($cont->count + 1);
        
        DB::table($settings->prefijo_wp.'term_taxonomy')->where('term_id', $data['categoria'])->update([
                        'count' => $total
                    ]);
    }
    
    public function updatetermeta($data){
        
        $settings = Settings::first();
        $total = 0;
        
        $cont = DB::table($settings->prefijo_wp.'termmeta')->select('meta_value')->where('term_id', $data['categoria'])->where('meta_key', 'product_count_product_cat')->first();
        
        if($cont != null){
        $total = ($cont->meta_value + 1);
        DB::table($settings->prefijo_wp.'termmeta')->where('term_id', $data['categoria'])->where('meta_key', 'product_count_product_cat')->update([
                        'meta_value' => $total
                    ]);
        }else{
            $total =1;
            DB::table($settings->prefijo_wp.'termmeta')
            ->insert([
                ['term_id' => $data['categoria'], 'meta_key' => 'product_count_product_cat', 'meta_value' => $total],
            ]);
            
        }
    }
    
    
    //almacenar en la galeria
    public function galeria($datos, $id, $local, $year, $month){
        
        $settings = Settings::first();
        
        //eliminamos las imagenes anteriores 
        $eliminar = DB::table($settings->prefijo_wp.'posts')->where('post_parent', $id)->where('post_type','attachment')->get();
        
        foreach($eliminar as $elimi){
            $elimina = DB::table($settings->prefijo_wp.'pmxi_images')->where('attachment_id', $elimi->ID)->delete();
        }
        
        
        //insertamos imagenes nuevas para la galeria
        if (!empty($datos->galeria)) {
                    foreach ($datos->galeria as $archivo) {
                         $extencion =  $archivo->clientExtension();
                         $name = 'archivo_'.str_random(16).time(). '.'.$archivo->getClientOriginalExtension();
                         $name2 = 'archivo_'.str_random(16).time();
                         $path =  $local.'/wp-content/uploads/'.$year.'/'.$month.'/';
                         $archivo->move($path, $name);
              
        
        $idgaleria= DB::table($settings->prefijo_wp.'posts')->insertGetId([
                    'post_author' => 1,
                    'post_date' => Carbon::now(),
                    'post_date_gmt' => Carbon::now(),
                    'post_content' => ' ',
                    'post_title' => $name2,
                    'post_excerpt' => ' ',
                    'post_status' => 'inherit',
                    'comment_status' => 'open',
                    'ping_status' => 'closed',
                    'post_password' => ' ',
                    'post_name' => $name2,
                    'to_ping' => ' ',
                    'pinged' => ' ',
                    'post_modified' => Carbon::now(),
                    'post_modified_gmt' => Carbon::now(),
                    'post_content_filtered' => ' ',
                    'post_parent' => $id,
                    'menu_order' => 0,
                    'guid' => $path,
                    'post_type' => 'attachment',
                    'post_mime_type' => 'imagen/'.$extencion,
                    'comment_count' => 0
                ]); 
            
        DB::table($settings->prefijo_wp.'postmeta')
            ->insert([
                ['post_id' => $idgaleria, 'meta_key' => '_wp_attached_file', 'meta_value' => $year.'/'.$month.'/'.$name],
            ]);        
            
       DB::table($settings->prefijo_wp.'pmxi_images')
            ->insertGetId([
                'attachment_id' => $idgaleria, 
                'image_url' => ' ', 
                'image_filename' => $name,
            ]);  
            
            }
        }
    }
	
	
	
    /*
    * todo lo de las categorias se ejecuta desde aqui
    * hacia abajo lista de categorias
    */
    public function listacat(){
        
        view()->share('title', 'Lista Categorias');
        
        $settings = Settings::first();
        $datos = [];
        $categorias = DB::table($settings->prefijo_wp.'term_taxonomy')->select('term_taxonomy_id','count')->where('taxonomy', 'product_cat')->get();
        
        foreach($categorias as $categoria){
            
            $nombres = DB::table($settings->prefijo_wp.'terms')->where('term_id', $categoria->term_taxonomy_id)->first();
            
            array_push($datos, [
            'ID' => $categoria->term_taxonomy_id,
            'nombre' => $nombres->name,
            'cantidad' => $categoria->count,
          ]);
        }
        
        return view('tienda.listacat', compact('datos'));
    }
    
    
    public function savecate(Request $request){
        
        
        $settings = Settings::first();
        $index = new IndexController;
        
        $pegado = str_replace(" ", '-',$request->nombre);
        
         $idcategoria = DB::table($settings->prefijo_wp.'term_taxonomy')
            ->insertGetId([
                'taxonomy' => 'product_cat', 
                'description' => ' ',
                'parent' => '0', 
                'count' => '0',
            ]);
            
        DB::table($settings->prefijo_wp.'term_taxonomy')->where('term_taxonomy_id', $idcategoria)->update([
                        'term_id' => $idcategoria
                    ]);    
            
         DB::table($settings->prefijo_wp.'terms')
            ->insert([
                ['name' => $request->nombre, 'slug' => $pegado, 'term_group' => '0'],
            ]);
            
        DB::table($settings->prefijo_wp.'termmeta')
            ->insertGetId([
                'term_id' => $idcategoria, 
                'meta_key' => 'product_count_product_cat',
                'meta_value' => '0', 
            ]);
            
        $index->msjSistema('Categoria Creada con exito', 'success');    
        return redirect()->back();      
    }
    
    
    public function eliminarcat($id){
        
        $settings = Settings::first();
        $index = new IndexController;
        
        DB::table($settings->prefijo_wp.'term_taxonomy')->where('term_taxonomy_id', $id)->where('taxonomy', 'product_cat')->delete();
        
        DB::table($settings->prefijo_wp.'terms')->where('term_id', $id)->delete();
        
        DB::table($settings->prefijo_wp.'termmeta')->where('meta_id', $id)->delete();
        
        $index->msjSistema('Categoria Eliminada con exito', 'success'); 
        return redirect()->back(); 
    }
    
    
    public function actualizarcat(Request $request){
        
        $settings = Settings::first();
        $index = new IndexController;
        
        $pegado = str_replace(" ", '-',$request->nombre);
        
        DB::table($settings->prefijo_wp.'terms')
        ->where('term_id', $request->id)->update([
                'name' => $request->nombre
            ]);
     
     DB::table($settings->prefijo_wp.'terms')
        ->where('term_id', $request->id)->update([
                'slug' => $pegado
            ]);
    
    $index->msjSistema('Categoria Editada con exito', 'success');         
     return redirect()->back();        
    }
    
    
    /*
    *nueva lista de productos
    */
    public function nuevalista(){
        
        $tienda = new TiendaController;
        $productos = $tienda->getProductoWP();
        
        View::share('title', 'Tienda - Editar Producto');
        
        $moneda = Monedas::where('principal', 1)->get()->first();
        
        return view('tienda.nuevalistaproductos')->with(compact('productos','moneda'));
    }
    
    
    public function edit($id){
        
         View::share('title', 'Tienda - Editar Producto');
	 
	  $tienda = new TiendaController;
	  $carrito = new CarritoController;
	  $settings = Settings::first();
	  $moneda = Monedas::where('principal', 1)->get()->first();
	  $productos = $tienda->getProductoWP();
	  $datos = [];
	  
	  
	  $puntos =0;
        $settingPuntos = SettingsPunto::find(1);
        if (!empty($settingPuntos)) {
            $puntos = 1;
        }
	  
      $categorias = DB::table($settings->prefijo_wp.'term_taxonomy')->select('term_taxonomy_id')->where('taxonomy', 'product_cat')->get();
      
        foreach($categorias as $categoria){
            
            $nombres = DB::table($settings->prefijo_wp.'terms')->where('term_id', $categoria->term_taxonomy_id)->first();
            
            array_push($datos, [
            'ID' => $categoria->term_taxonomy_id,
            'nombre' => $nombres->name,
          ]);
        }
        
	  
      foreach ($productos as $item){
            if($id == $item->ID){
                
            $cat = DB::table($settings->prefijo_wp.'term_relationships')->select('term_taxonomy_id')->where('object_id', $id)->first();
            $puntoscar = $carrito->puntosCarrito($id, 1);
               
       $required = [
            'ID' => $item->ID,
            'titulo' => $item->post_title,
            'precio' => $item->meta_value,
            'guia' => $item->guid,
            'img' => $item->img,
            'cat' => $cat->term_taxonomy_id,
            'puntos' => $puntoscar,
            'contenido' => $item->post_content,
          ];
           
            }
          }
         
        return view('tienda.editarproducto')->with(compact('required','moneda','datos','puntos'));
    }
    
    
    /*
    *guardar edicion de los productos
    */
    public function saveeditar(Request $dato){
     
     
     $funciones = new IndexController;
        $settings = Settings::first();
        $local = str_replace('mioficina', '', public_path());
        $idimagen=false;
        $fecha = new Carbon(); $month=$fecha->format('m'); $year=$fecha->format('Y');
          
        $pegado = str_replace(" ", '-',$dato->titulo);
        $title = 'Orden&ndash;'.$fecha->now()->toFormattedDateString().' @ '.$fecha->now()->format('h:i A');
        $tpmname = str_replace(' ', '-', $fecha->now()->toFormattedDateString());
        $tpmname = str_replace(',', '', $tpmname);
        $tpmname2 = str_replace(' ', '-', $fecha->now()->format('hi a'));
        $name = 'pedido-'.$tpmname.'-'.$tpmname2;
        
        //almacenamos la imagen
        if ($dato->file('archivo')) {
            $file = $dato->file('archivo');
            $extencion =  $file->clientExtension();
            
          $nombre = 'worpres_'. time(). '.'.$file->getClientOriginalExtension();
          $path =  $local.'/wp-content/uploads/'.$year.'/'.$month.'/';
          $file->move($path, $nombre);
        
        
        //aqui obtener la extencion de la imagen
         $guardarImagen= $year.'/'.$month.'/'.$nombre;
                $idimagen = DB::table($settings->prefijo_wp.'posts')->insertGetId([
                    'post_author' => 1,
                    'post_date' => $fecha->now(),
                    'post_date_gmt' => $fecha->now(),
                    'post_content' => ' ',
                    'post_title' => $dato->titulo,
                    'post_excerpt' => ' ',
                    'post_status' => 'inherit',
                    'comment_status' => 'open',
                    'ping_status' => 'closed',
                    'post_password' => ' ',
                    'post_name' => $pegado,
                    'to_ping' => ' ',
                    'pinged' => ' ',
                    'post_modified' => $fecha->now(),
                    'post_modified_gmt' => $fecha->now(),
                    'post_content_filtered' => ' ',
                    'post_parent' => 0,
                    'menu_order' => 0,
                    'post_type' => 'attachment',
                    'post_mime_type' => 'image/'.$extencion,
                    'comment_count' => 0
                ]);
            
            
            $this->savepostImagen($idimagen, $guardarImagen);
            
        }
        
        DB::table($settings->prefijo_wp.'posts')->where('ID', $dato->ID)->update([
            'post_name' => $pegado,
            'post_title' => $dato->titulo,
            'post_content' => ($dato->contenido == null) ? ' ' : $dato->contenido,
            ]);
            
        if($idimagen){
            $guid = str_replace('mioficina', '/wp-content/uploads/'.$year.'/'.$month.'/'.$nombre, $dato->root());
            DB::table($settings->prefijo_wp.'posts')->where('ID', $idimagen)->update([
            'guid' => $guid
        ]);
                    
        DB::table($settings->prefijo_wp.'posts')->where('ID', $idimagen)->update([
            'post_parent' => $dato->ID
        ]);
                    
        }
        
        $data = $this->requet($dato->ID, $dato, $idimagen);
        $this->insertImagen($dato->ID, $data, $idimagen);
        
        DB::table($settings->prefijo_wp.'postmeta')->where('post_id', $dato->ID)->where('meta_key','_regular_price')->update([
                'meta_value' => $data['precio']
              ]);
              
        DB::table($settings->prefijo_wp.'postmeta')->where('post_id', $dato->ID)->where('meta_key','_price')->update([
                'meta_value' => $data['precio']
              ]);
                    
            
        DB::table($settings->prefijo_wp.'wc_product_meta_lookup')->where('product_id', $dato->ID)->delete();  
        DB::table($settings->prefijo_wp.'term_relationships')->where('object_id', $dato->ID)->delete();
        
        $this->savemetaLook($data);
        $this->savecategoria($data);
        $this->galeria($dato, $dato->ID, $local, $year, $month);
        
        
        if($dato->autenticador == 1){
            $this->guardarPuntos($dato, $dato->ID);
        }
        
        $funciones->msjSistema('Modificado con exito', 'success');
        return redirect('tienda/nuevalista');
    }
    
    
    
    public function insertImagen($ID, $data, $idimagen){
        
        $settings = Settings::first();
        
        if($data['imagen'] != 0){
            
        $verdad = DB::table($settings->prefijo_wp.'postmeta')->where('post_id', $ID)->where('meta_key', '_thumbnail_id')->first();     
                     
        if($verdad != null){    
            
            DB::table($settings->prefijo_wp.'postmeta')->where('post_id', $ID)->where('meta_key', '_thumbnail_id')->update([
            'meta_value' => $idimagen,
            ]);
            
        }else{
            
            DB::table($settings->prefijo_wp.'postmeta')->insert([
            ['post_id' => $ID, 'meta_key' => '_thumbnail_id', 'meta_value' => $idimagen],
            ]);
            }
                
        }
    }
    
    /*
    * guardamos los puntos de los productos creados
    * o editados
    */
    public function guardarPuntos($datos, $idproducto){
        
        $settingPuntos = SettingsPunto::find(1);
        if (!empty($settingPuntos)) {
         $settingPuntos->configuracion = json_decode($settingPuntos->configuracion);
         $configuracion = SettingsPunto::where('id','1')->first();
         $stringJson = [];
         
        foreach($settingPuntos->configuracion as $puntos){
               
         if($idproducto != $puntos->idproductos){
           
                   array_push($stringJson, [
                     'idproductos' => $puntos->idproductos,
                     'puntos' => $puntos->puntos,
                 ]);
                 
                }
            }
            
                    
           if($configuracion->valor == 'normal'){
            $valor = $datos->puntos;
              }else{
            $valor = ($datos->puntos / 100);
             }
           
             array_push($stringJson, [
                     'idproductos' => $idproducto,
                     'puntos' => $valor,
                 ]);
                 
            
            $detallado = json_encode($stringJson);
        
           SettingsPunto::where('id', '1')->update([
	       'configuracion' => (!empty($detallado)) ? $detallado : '',
	       ]);     
            
        }
    }
    
    
    /*
    *ELiminar Producto
    */
    public function eliminar($id){
        
        $settings = Settings::first();
        $funciones = new IndexController;
         
        DB::table($settings->prefijo_wp.'posts')->where('ID', $id)->delete();
        DB::table($settings->prefijo_wp.'postmeta')->where('post_id', $id)->delete();
        
       $funciones->msjSistema('Eliminado con exito', 'success');
       return redirect('tienda/nuevalista');
    }
}