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
// controladores
use App\Http\Controllers\IndexController;

class ComisionesController extends Controller
{
    function __construct()
	{
		View::share('title', 'Ajustes - Comisiones');
	}
    // Confi comisiones
	/**
	 * Dirige a la vista de configuracion de comisiones
	 * 
	 * @return view
	 */
	public function indexComisiones(){
        $settingComision = SettingsComision::find(1);
        if (!empty($settingComision)) {
         $settingComision->valordetallado = json_decode($settingComision->valordetallado);
         $settingComision->bonoactivacion = json_decode($settingComision->bonoactivacion);
        }
        return view('setting.comisiones')->with(compact('settingComision'));
     }
 
     /**
      * Obtiene todos los rangos del sistema registrado
      * 
      * @return json
      */
     public function allRangos(){
         
         $roles = Rol::select('id', 'name')->where('name', '!=', '')->get();
         return json_encode($roles);
      }
 
     /**
      * Obtiene todos los productos del sistema registrado
      *
      * @return json
      */
     public function allProductos(){
         $settings = Settings::first();
         $productos = DB::table($settings->prefijo_wp.'posts')->select('ID')->where('post_type', 'product')->orderBy('ID')->get();
         return json_encode($productos);
      }
     
     /**
      * Guarda las configuraciones de las comisiones
      * 
      * @access public
      * @param request $datos - los datos de la configuracion de la comision
      */
     public function saveSettingComision(Request $datos){
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
                 SettingsComision::where('id', $datos->id)->update([
                 'niveles' => $datos->niveles,
                 'tipocomision' => $datos->tipocomision,
                 'valorgeneral' => (!empty($general)) ? $general : 0,
                 'valordetallado' => (!empty($detallado)) ? $detallado : '',
                 'tipopago' => $datos->tipopago,
                 ]);
             }else{
                 SettingsComision::create([
                 'niveles' => $datos->niveles,
                 'tipocomision' => $datos->tipocomision,
                 'valorgeneral' => (!empty($datos->valorgeneral)) ? $datos->valorgeneral : 0,
                 'valordetallado' => (!empty($detallado)) ? $detallado : '',
                 'tipopago' => $datos->tipopago,
                 ]);
             }
             $funciones = new IndexController;
             $funciones->msjSistema('Nuevo Proceso de Comision', 'success');
             return redirect('admin/settings/comisiones');
         }else{
             return redirect('admin/settings/comisiones');
         }
     }
     
     /**
      * Convierte los valores a arreglo
      * 
      * Pasa de un arreglo cuando las comisiones son detalladas a un json para que se puedan guardar
      * 
      * @access private 
      * @param array $datos - valores a pasar a cadena
      * @param string $tipo - el tipo de comision
      * @return json
      */
     private function toJson($datos, $tipo){
         $stringJson = [];
         if ($tipo == 'detallado') {
             for ($i = 1; $i < ($datos->niveles + 1); $i++){
                 if($datos->tipopago == 'porcentaje'){
                     array_push($stringJson, [
                     'nivel'.$i => ($datos['nivel'.$i] / 100)
                     ]);
                 }else{
                     array_push($stringJson, [
                     'nivel'.$i => $datos['nivel'.$i]
                     ]);
                 }
             }
         } elseif($tipo == 'categoria') {
             for ($i=1; $i < ($datos->niveles + 1); $i++) {
                 $cantRol = Rol::all()->count('id');
                 $tmparray = [];
                 for ($j=0; $j < $cantRol; $j++) {
                     $rol = Rol::find($j);
                     if($rol != null){
                     if($datos->tipopago == 'porcentaje'){
                         array_push($tmparray, [
                         'idrango' => $j,
                         'nombre' => $rol->name,
                         'comision' => ($datos['idrango'.$j.'_'.$i] / 100)
                         ]);
                     }else{
                         array_push($tmparray, [
                         'idrango' => $j,
                         'nombre' => $rol->name,
                         'comision' => $datos['idrango'.$j.'_'.$i]
                         ]);
                        }
                     }	
                 }
                 array_push($stringJson, [
                     'id' => $i,
                     'nombre' => $datos['categoria'.$i],
                     'comisiones' => $tmparray
                 ]);
             }
         }else{
             $settings = Settings::first();
             $productos = DB::table($settings->prefijo_wp.'posts')->select('ID')->where('post_type', 'product')->orderBy('ID')->get();
 
             foreach ($productos as $item ) {
                 $tmparray = [];
                 for ($i=1; $i < ($datos->niveles + 1); $i++) {
                     if($datos->tipopago == 'porcentaje'){
                         array_push($tmparray, [
                         'nivel' => $i,
                         'comision' => ($datos['idproducto'.$item->ID.'_'.$i] / 100),
                         ]);
                     }else{
                         array_push($tmparray, [
                         'nivel' => $i,
                         'comision' => $datos['idproducto'.$item->ID.'_'.$i],
                         ]);
                     }
                 }
                 array_push($stringJson, [
                     'idproductos' => $item->ID,
                     'comisiones' => $tmparray
                 ]);
             }
         }
         
        return json_encode($stringJson);
     }
 
     /**
      * permite actualizar el bono de activacion
      * 
      * @return view
      */
     public function saveBono(Request $datos)
     {
        $validate = $datos->validate([
            'recibir' => 'required',
            'tipobono' => 'required'
        ]);
        if ($validate) {
            
            if($datos->tipobono != 'niveles'){
            $info = $this->arreglarBono($datos->bono, $datos->tipobono);
            }else{
              $info = $this->arreglarBonoNiveles($datos);  
            }
            
            SettingsComision::where('id', 1)->update([
                'bonoactivacion' => $info,
                'directos' => $datos->recibir,
                'tipobono' => ($datos->tipobono == 'niveles') ? 'niveles' : $datos->tipobono,
            ]);
            $funciones = new IndexController;
            $funciones->msjSistema('Bono de Activacion Actualizado', 'success');
            return redirect('admin/settings/comisiones');
        }
     }
     
     
     public function arreglarBonoNiveles($datos){
         
         $stringJson = [];
          for ($i = 1; $i < ($datos->cantidad + 1); $i++){
              
              if($datos->tipo == 'porcentaje'){
                     array_push($stringJson, [
                     'nivel' => $i,
                     'bono' => ($datos['nivel'.$i] / 100),
                     'tipobono' => $datos->tipo
                     ]);
                 }else{
                     array_push($stringJson, [
                     'nivel' => $i,
                     'bono' => $datos['nivel'.$i],
                     'tipobono' => $datos->tipo
                     ]);
                 }
          }
          
          
          return json_encode($stringJson);
     }
     /**
      * Permite obtener los valores de los bonos 
      *
      * @param string $cadenaBono
      * @param string $tipo
      * @return string
      */
     public function arreglarBono(string $cadenaBono, string $tipo) : string
     {
        $cadenaBono = $cadenaBono.', ';
        $separar = explode(', ', $cadenaBono);
        $arregloBono = [];
        foreach ($separar as $cadena) {
            if (!empty($cadena)) {
                $valores = explode(' - ', $cadena);
                $total = $valores[1];
                if ($tipo == 'porcentaje') {
                    $total = ($valores[1] / 100);
                }
                $arregloBono [] = [
                    'producto' => $valores[0],
                    'bono' => $total,
                    'tipobono' => $tipo
                ];
            }
        }
        return json_encode($arregloBono);
     }
 
     /**
      * permite activar la opcion de primera compra
      * 
      * @return view
      */
     public function savePrimera_compra(Request $datos)
     {
        SettingsComision::where('id', 1)->update(['primera_compra' => $datos->primera_compra]);
        $funciones = new IndexController;
        $funciones->msjSistema('Comision en Primera Compra Actualizado', 'success');
        return redirect('admin/settings/comisiones');
     }

     /**
      * permite selecionar cuando se va a pagar la comision despues que el usuario se active
      * 
      * @return view
      */
      public function saveRecibirComision(Request $datos)
      {
         SettingsComision::where('id', 1)->update(['activacioncomision' => $datos->primera_compra]);
         $funciones = new IndexController;
         $funciones->msjSistema('La opcion de recibir comision cuando el usuario este activo actualizada', 'success');
         return redirect('admin/settings/comisiones');
      }
 
     /**
      * Agrega los productos que no quieren que generen comision
      */
     public function saveProducto(Request $datos)
     {
        $validate = $datos->validate([
             'idproducto' => 'required'
        ]);
        if ($validate) {
            $settings = Settings::first();
            $tmp;
            if ($settings->id_no_comision == '') {
                $tmp = $datos->idproducto;
            }else{
                $tmp = $settings->id_no_comision.", ".$datos->idproducto;
            }
            $settings->id_no_comision = $tmp;
            $settings->save();
            $funciones = new IndexController;
            $funciones->msjSistema('Id producto '.$datos->idproducto.' agregado exitosamente', 'success');
            return redirect('admin/settings/comisiones');
        }
     }
 
     /**
      * Borrar Id de Productos que no generan comision
      *
      * Permite borrar los id de los productos que no generan comision
      *
      * @param Request $datos - informacion de los id a borrar
      * @return void
      */
     public function deleteProducto(Request $datos)
     {
        $settings = Settings::first();
        $tmp;
        if (strpos($settings->id_no_comision, ',') !== false) {
            $array = explode(', ', $settings->id_no_comision);
            
            $cont = 0;
            foreach ($array as $item) {
                if ($item != $datos->idproducto_elimanar) {
                    if ($cont == 0) {
                        $tmp = $item;
                    }else{
                        $tmp = $tmp.", ".$item;
                    }
                }
                $cont++;
            }
        } else {
            $tmp = "";
        }
         
        $settings->id_no_comision = $tmp;
        $settings->save();
        $funciones = new IndexController;
        $funciones->msjSistema('Id producto '.$datos->idproducto_elimanar.' eliminado exitosamente', 'success');
         return redirect('admin/settings/comisiones');
     }
     // Fin Confi Comisiones 
}
