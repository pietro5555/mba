<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use DB;
// modelo
use App\Models\Rol;
use App\Models\Settings;
use App\Models\Ganancia;
// controladores
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Settings\ComisionesController;

class GananciaController extends Controller
{
    function __construct()
	{
		View::share('title', 'Ajustes - Informe de Comisiones');
	}
	
	public function ganancias(){
	    
	    $ganancias = Ganancia::find(1);
        if (!empty($ganancias)) {
            $tipo = $ganancias->tipo;
         $ganancias->configuracion = json_decode($ganancias->configuracion);
        }
        
         return view('setting.ganancias',compact('ganancias','tipo'));
	}
	
	
	public function nota(Request $datos){
	    
	    if($datos->id){
                 Ganancia::where('id', $datos->id)->update([
                 'nota' => $datos->nota,
                 ]);
             }else{
                 Ganancia::create([
                 'nota' => $datos->nota,
                 ]);
             }
	    
	     $funciones = new IndexController;
             $funciones->msjSistema('Nuevo Agregada', 'success');
             return redirect()->back();
	}
	
	public function saveganancias(Request $datos){
	     if(!empty($datos)){
             $detallado = '';
             $general = 0;
             if ($datos->tipocomision == 'producto') {
                 $detallado = $this->toJson($datos, $datos->tipocomision);
             }elseif($datos->tipocomision == 'categoria'){
                 $detallado = $this->toJson($datos, $datos->tipocomision);
             }
             
             if($datos->id){
                 Ganancia::where('id', $datos->id)->update([
                 'configuracion' => (!empty($detallado)) ? $detallado : '',
                 'tipo' => $datos->tipocomision,
                 ]);
             }else{
                 Ganancia::create([
                 'configuracion' => (!empty($detallado)) ? $detallado : '',
                 'tipo' => $datos->tipocomision,
                 ]);
             }
             $funciones = new IndexController;
             $funciones->msjSistema('Nuevo Proceso de Ganancias', 'success');
             return redirect()->back();
         }else{
             return redirect()->back();
         }
	}
	
	
	 private function toJson($datos, $tipo){
         $stringJson = [];
         
         
         if($tipo == 'producto'){
             $settings = Settings::first();
             $productos = DB::table($settings->prefijo_wp.'posts')->select('ID')->where('post_type', 'product')->orderBy('ID')->get();
 
             foreach ($productos as $item ) {
                 $ganancias=0;
                 
                         $ganancia = $datos['idproducto'.$item->ID];
                         
                 array_push($stringJson, [
                     'idproductos' => $item->ID,
                     'ganancia' => $ganancia
                 ]);
             }
         }elseif($tipo == 'categoria'){
              for ($i=1; $i < ($datos->niveles + 1); $i++) {
                  $ganancias=0;
                 
                         $ganancia = $datos['categoria1'.$i];
                         
                 array_push($stringJson, [
                     'categoria' => $datos['categoria'.$i],
                     'ganancia' => $ganancia
                 ]);
              }
             
         }
         
         
        return json_encode($stringJson);
	}
}