<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use DB;
// modelo
use App\Models\Iva;
use App\Models\Settings;
use App\Models\SettingsComision;
// controladores
use App\Http\Controllers\IndexController;

class IvaController extends Controller
{
    
    public function vista(){
        View::share('title', 'Ajustes - Iva');
        
        $tipo ="";
        $ivas = Iva::find(1);
        if (!empty($ivas)) {
         $tipo = $ivas->tipo;
         $ivas->configuracion = json_decode($ivas->configuracion);
         
        }
        return view('setting.iva.vista')->with(compact('ivas','tipo'));
    }
    
    
    public function allCategorias(){
        
        $settings = Settings::first();
        $categorias = DB::table($settings->prefijo_wp.'term_taxonomy')->select('term_taxonomy_id')->where('taxonomy', 'product_cat')->get();
        
        return json_encode($categorias);
    }
    
    public function saveIva(Request $datos){
	    if(!empty($datos)){
             $detallado = '';
             $general = 0;
             
                 $detallado = $this->toJson($datos, $datos->tipocomision);
             
             if($datos->tipopago == 'porcentaje'){
                 $general = $datos->valorgeneral / 100;
             }
             if($datos->id){
                 Iva::where('id', $datos->id)->update([
                 'configuracion' => (!empty($detallado)) ? $detallado : '',
                 'tipo' => $datos->tipocomision,
                 'tipocalculo' => $datos->tipopago,
                 ]);
             }else{
                 Iva::create([
                 'configuracion' => (!empty($detallado)) ? $detallado : '',
                 'tipo' => $datos->tipocomision,
                 'tipocalculo' => $datos->tipopago,
                 ]);
             }
             $funciones = new IndexController;
             $funciones->msjSistema('Nuevo Proceso de Iva', 'success');
             return redirect('admin/settings/vista');
         }else{
             return redirect('admin/settings/vista');
         }
	}
	
	
	 private function toJson($datos, $tipo){
         $stringJson = [];
         
             $settings = Settings::first();
             if($datos->tipocomision == 'producto'){
             $productos = DB::table($settings->prefijo_wp.'posts')->select('ID')->where('post_type', 'product')->orderBy('ID')->get();
             }else{
            $productos = DB::table($settings->prefijo_wp.'term_taxonomy')->select('term_taxonomy_id')->where('taxonomy', 'product_cat')->get();     
             }
 
             foreach ($productos as $item) {
                 $puntos=0;
                 $tmparray = [];
                
                     if($datos->tipopago == 'porcentaje'){
                         
                         if($datos->tipocomision == 'producto'){
                         $iva = ($datos['categoria'.$item->ID] / 100);
                         $producto = $item->ID;
                         }else{
                          $iva = ($datos['categoria'.$item->term_taxonomy_id] / 100);   
                          $producto = $item->term_taxonomy_id;
                         }
                        
                     }else{
                          if($datos->tipocomision == 'producto'){
                         $iva = $datos['categoria'.$item->ID];
                         $producto = $item->ID;
                         }else{
                          $iva = $datos['categoria'.$item->term_taxonomy_id];  
                          $producto = $item-term_taxonomy_id;
                         }
                         
                     }
                
                 array_push($stringJson, [
                     'productos' => $producto,
                     'iva' => $iva
                 ]);
             }
         
         
        return json_encode($stringJson);
     }
     
     
       public function editiva(Request $request){
           
         $detallado="";
         $settingPuntos = Iva::find(1);
         $funciones = new IndexController;
         
        if (!empty($settingPuntos)) {
         $settingPuntos->configuracion = json_decode($settingPuntos->configuracion);
         $configuracion = Iva::where('id','1')->first();
        }else{
            
            $concepto = 'Debe Configurarlos el iva de manera masiva para luego editarlos individualmente';
             $funciones->msjSistema($concepto, 'success');
            return redirect()->back();
        }
        
        $stringJson = [];
        foreach($settingPuntos->configuracion as $puntos){
               
          if($request->producto == $puntos->productos){
                   
            if($configuracion->tipocalculo == 'normal'){
               $iva = $request->iva;
           }else{
               $iva = ($request->iva / 100);
           }
           
                   array_push($stringJson, [
                     'productos' => $puntos->productos,
                     'iva' => $iva
                 ]); 
               }else{
                   array_push($stringJson, [
                     'productos' => $puntos->productos,
                     'iva' => $puntos->iva
                 ]);
               }
           
        }
        
        $detallado = json_encode($stringJson);
        
                  Iva::where('id', '1')->update([
	            'configuracion' => (!empty($detallado)) ? $detallado : '',
	            ]);
            
         $concepto = 'Actualizado con extito';
         $funciones->msjSistema($concepto, 'success');
            return redirect()->back();
        
     }
     
     
     
     public function creariva(Request $request){
         
         $detallado="";
         $settingPuntos = Iva::find(1);
         $funciones = new IndexController;
         
        if (!empty($settingPuntos)) {
         $settingPuntos->configuracion = json_decode($settingPuntos->configuracion);
         $configuracion = Iva::where('id','1')->first();
        }else{
            
            $concepto = 'Debe Configurarlos el iva de manera masiva para luego editarlos individualmente';
             $funciones->msjSistema($concepto, 'success');
            return redirect()->back();
        }
        
        $stringJson = [];
        foreach($settingPuntos->configuracion as $puntos){
               
               if($request->producto == $puntos->productos){
                   
             $concepto = 'EL producto que esta tratando de agregar ya se encuentra asignado en la lista';
             $funciones->msjSistema($concepto, 'danger');
            return redirect()->back();
                   
               }else{
                   array_push($stringJson, [
                     'productos' => $puntos->productos,
                     'iva' => $puntos->iva
                 ]);
               }
           
        }
        
        if($configuracion->tipocalculo == 'normal'){
            $valor = $request->iva;
        }else{
            $valor = ($request->iva / 100);
        }
        
        array_push($stringJson, [
                     'productos' => $request->producto,
                     'iva' => $valor
                 ]);
        
        $detallado = json_encode($stringJson);
        
         Iva::where('id', '1')->update([
	            'configuracion' => (!empty($detallado)) ? $detallado : '',
	            ]);
            
         $concepto = 'Actualizado con extito';
         $funciones->msjSistema($concepto, 'success');
            return redirect()->back();
     }
     
     
     public function eliminariva(Request $request){
         
         $funciones = new IndexController;
         $settingPuntos = Iva::find(1);
         
        if (!empty($settingPuntos)) {
         $settingPuntos->configuracion = json_decode($settingPuntos->configuracion);
         $configuracion = Iva::where('id','1')->first();
        }else{
            
            $concepto = 'Debe Configurarlos el iva de manera masiva para luego editarlos individualmente';
             $funciones->msjSistema($concepto, 'success');
            return redirect()->back();
        }
        
        $stringJson = [];
        foreach($settingPuntos->configuracion as $puntos){
            if($request->id != $puntos->productos){
             
             array_push($stringJson, [
                     'productos' => $puntos->productos,
                     'iva' => $puntos->iva
                 ]);
                 
            }
        }
            
             $detallado = json_encode($stringJson);
        
         Iva::where('id', '1')->update([
	            'configuracion' => (!empty($detallado)) ? $detallado : '',
	            ]);
            
         $concepto = 'Actualizado con extito';
         $funciones->msjSistema($concepto, 'success');
            return redirect()->back();
     }
}