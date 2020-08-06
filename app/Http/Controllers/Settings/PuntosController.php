<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use DB;
// modelo
use App\Models\Rol;
use App\Models\Settings;
use App\Models\SettingsComision;
use App\Models\SettingsPunto;
// controladores
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Settings\ComisionesController;

class PuntosController extends Controller
{
    function __construct()
	{
		View::share('title', 'Ajustes - Puntos');
	}
	
	public function puntos(){
	     $settingPuntos = SettingsPunto::find(1);
        if (!empty($settingPuntos)) {
            $tipopuntos = $settingPuntos->tipopuntos;
         $settingPuntos->configuracion = json_decode($settingPuntos->configuracion);
        }
        
	    return view('setting.puntos',compact('settingPuntos','tipopuntos'));
	}
	
	public function saveSettingPuntos(Request $datos){
	    if(!empty($datos)){
             $detallado = '';
             $general = 0;
             if ($datos->tipocomision == 'general') {
                 $general = $datos->valorgeneral;
             } else {
                 $detallado = $this->toJson($datos, $datos->tipocomision);
             }
             if($datos->tipopago == 'porcentaje'){
                 $general = $datos->valorgeneral / 100;
             }
             if($datos->id){
                 SettingsPunto::where('id', $datos->id)->update([
                 'configuracion' => (!empty($detallado)) ? $detallado : '',
                 'valor' => $datos->tipopago,
                 'tipopuntos' => $datos->tipopuntos,
                 ]);
             }else{
                 SettingsPunto::create([
                 'configuracion' => (!empty($detallado)) ? $detallado : '',
                 'valor' => $datos->tipopago,
                 'tipopuntos' => $datos->tipopuntos,
                 ]);
             }
             $funciones = new IndexController;
             $funciones->msjSistema('Nuevo Proceso de Puntos', 'success');
             return redirect('admin/settings/puntos');
         }else{
             return redirect('admin/settings/puntos');
         }
	}
	
	
	 private function toJson($datos, $tipo){
         $stringJson = [];
         
             $settings = Settings::first();
             $productos = DB::table($settings->prefijo_wp.'posts')->select('ID')->where('post_type', 'product')->orderBy('ID')->get();
 
             foreach ($productos as $item ) {
                 $puntos=0;
                 $tmparray = [];
                 for ($i=1; $i < ($datos->niveles + 1); $i++) {
                     if($datos->tipopago == 'porcentaje'){
                         
                         $puntos = ($datos['idproducto'.$item->ID.'_'.$i] / 100);
                        
                     }else{
                         
                         $puntos = $datos['idproducto'.$item->ID.'_'.$i];
                         
                     }
                 }
                 array_push($stringJson, [
                     'idproductos' => $item->ID,
                     'puntos' => $puntos
                 ]);
             }
         
         
        return json_encode($stringJson);
     }
     
     
     public function edit(Request $request){
         $detallado="";
         $funciones = new IndexController;
         $settingPuntos = SettingsPunto::find(1);
         
        if (!empty($settingPuntos)) {
         $settingPuntos->configuracion = json_decode($settingPuntos->configuracion);
         $configuracion = SettingsPunto::where('id','1')->first();
        }else{
            
            $concepto = 'Debe Configurarlos los puntos de manera masiva para luego editarlos individualmente';
            $funciones->msjSistema($concepto, 'success');
            return redirect()->back();
        }
        
        $stringJson = [];
        foreach($settingPuntos->configuracion as $puntos){
               
         if($request->producto == $puntos->idproductos){
                   
           if($configuracion->valor == 'normal'){
            $valor = $request->puntos;
           }else{
            $valor = ($request->puntos / 100);
           }
           
                   array_push($stringJson, [
                     'idproductos' => $puntos->idproductos,
                     'puntos' => $valor,
                 ]); 
               }else{
                   array_push($stringJson, [
                     'idproductos' => $puntos->idproductos,
                     'puntos' => $puntos->puntos,
                 ]);
               }
        }
        
        $detallado = json_encode($stringJson);
        
                  SettingsPunto::where('id', '1')->update([
	            'configuracion' => (!empty($detallado)) ? $detallado : '',
	            ]);
            
         $concepto = 'Actualizado con extito';
         $funciones->msjSistema($concepto, 'success');
            return redirect()->back();
        
     }
     
     public function crear(Request $request){
         $detallado="";
         $funciones = new IndexController;
         $settingPuntos = SettingsPunto::find(1);
         
        if (!empty($settingPuntos)) {
         $settingPuntos->configuracion = json_decode($settingPuntos->configuracion);
         $configuracion = SettingsPunto::where('id','1')->first();
        }else{
            
            $concepto = 'Debe Configurarlos los puntos de manera masiva para luego editarlos individualmente';
            $funciones->msjSistema($concepto, 'success');
            return redirect()->back();
        }
        
        $stringJson = [];
        foreach($settingPuntos->configuracion as $puntos){
               
               if($request->producto == $puntos->idproductos){
                   
             $concepto = 'EL producto que esta tratando de agregar ya se encuentra asignado en la lista';
             $funciones->msjSistema($concepto, 'danger');
            return redirect()->back();
                   
               }else{
                   array_push($stringJson, [
                     'idproductos' => $puntos->idproductos,
                     'puntos' => $puntos->puntos
                 ]);
               }
        }
        
        
        if($configuracion->valor == 'normal'){
               $valor = $request->puntos;
           }else{
               $valor = ($request->puntos / 100);
           }
           
        array_push($stringJson, [
                     'idproductos' => $request->producto,
                     'puntos' => $valor
                 ]);
        
        $detallado = json_encode($stringJson);
        
         SettingsPunto::where('id', '1')->update([
	            'configuracion' => (!empty($detallado)) ? $detallado : '',
	            ]);
            
         $concepto = 'Actualizado con extito';
         $funciones->msjSistema($concepto, 'success');
            return redirect()->back();
     }
     
     public function eliminar(Request $request){
         
         $settingPuntos = SettingsPunto::find(1);
         $funciones = new IndexController;
         
        if (!empty($settingPuntos)) {
         $settingPuntos->configuracion = json_decode($settingPuntos->configuracion);
         $configuracion = SettingsPunto::where('id','1')->first();
        }else{
            
            $concepto = 'Debe Configurarlos los puntos de manera masiva para luego eliminarlos individualmente';
            $funciones->msjSistema($concepto, 'success');
            return redirect()->back();
        }
        
        $stringJson = [];
        foreach($settingPuntos->configuracion as $puntos){
            if($request->id != $puntos->idproductos){
             
             array_push($stringJson, [
                     'idproductos' => $puntos->idproductos,
                     'puntos' => $puntos->puntos
                 ]);
                 
            }
        }
            
             $detallado = json_encode($stringJson);
        
         SettingsPunto::where('id', '1')->update([
	            'configuracion' => (!empty($detallado)) ? $detallado : '',
	            ]);
            
         $concepto = 'Actualizado con extito';
         $funciones->msjSistema($concepto, 'success');
            return redirect()->back();
     }
}