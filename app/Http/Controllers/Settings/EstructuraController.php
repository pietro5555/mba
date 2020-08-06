<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use DB;
// modelo
use App\Models\Settings;
use App\Models\SettingsEstructura;
// controller
use App\Http\Controllers\IndexController;

class EstructuraController extends Controller
{
	function __construct()
	{
		View::share('title', 'Ajustes - Estructura');
	}
	/**
	 * Dirige a la vista de configuraciones de la estructura
	 * 
	 * @return view
	 */
	public function indexEstructura(){
	    return view('setting.estructura');
	}
	
	/**
	 * guarda los datos de los estructura del sistema
	 * 
	 * @access public 
	 * @param request $datos - los datos de la estructura
	 * @return view
	 */
	public function saveEstructura(Request $datos){
        $funciones = new IndexController;
	    if(!empty($datos)){
	        if($datos->id){
	            SettingsEstructura::where('id', $datos->id)->update([
	                'tipoestructura' => $datos->tipoestrutura,
	                'cantnivel'  => $datos->cantnivel,
	                'cantfilas'  => (!empty($datos->cantfila)) ? $datos->cantfila : 0, 
	                'estructuraprincipal'  => (!empty($datos->estruprincipal)) ? $datos->estruprincipal : 0,
	                'usuarioprincipal'  => (!empty($datos->userprincipal)) ? $datos->userprincipal : 0,
	            ]);
	        }else{
	            SettingsEstructura::create([
	                'tipoestructura' => $datos->tipoestrutura,
	                'cantnivel'  => $datos->cantnivel,
	                'cantfilas'  => (!empty($datos->cantfila)) ? $datos->cantfila : 0, 
	                'estructuraprincipal'  => (!empty($datos->estruprincipal)) ? $datos->estruprincipal : 0,
	                'usuarioprincipal'  => (!empty($datos->userprincipal)) ? $datos->userprincipal : 0,
	            ]);
			}
			DB::table('settingcliente')
			->where('id', 1)
			->update([
				'cliente' => (!empty($datos->cliente)) ? $datos->cliente : 0, 
				'permiso' => (!empty($datos->permiso)) ? $datos->permiso : 0
				]);
            $this->resetSystem();
            $msj = 'Nueva Estructura Definida, Estructura: '.$datos->tipoestrutura;
            $funciones->msjSistema($msj, 'success');
	        return redirect('admin/settings/estructura');
	    }
	}

	/**
	 * Reinicia el sistema cuando se cambia la estructura
	 * 
	 * Borra toda la informacion de guardada en el sistema para la nueva estructura creada
	 * 
	 * @access private
	 */
	private function resetSystem(){
		$settings = Settings::first();
        DB::table($settings->prefijo_wp.'users')->where('ID', '!=', 1)->delete();
        $sql = 'ALTER TABLE '.$settings->prefijo_wp.'users AUTO_INCREMENT = 2';
        
        DB::statement($sql);
	    DB::table('user_campo')->where('ID', '!=', 1)->delete();
		DB::table('walletlog')->delete();
		DB::table('archivos')->delete();
		DB::table('comentarios')->delete();
        DB::table('contenidos')->delete();
        DB::table('notifications')->delete();
		DB::table('notes')->delete();
		DB::table('pagos')->delete();
		DB::table('sesions')->delete();
		DB::table('tickets')->delete();
		DB::table('contenidos')->delete();
	    DB::table('commissions')->delete();
	    DB::table('binario')->truncate();
	    DB::table('bonoinicio')->delete();
	    DB::table('puntosbonos')->delete();
	    DB::table('semiautobinario')->delete();
	    DB::table('chats')->delete();
	    DB::table('pushs')->delete();
	    DB::table('chat_codigo')->delete();
	    DB::table('prospeccion')->delete();
	}
	//Fin Confi Estructura

}
