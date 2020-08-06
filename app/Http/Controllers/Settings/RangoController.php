<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use DB;
// modelos
use App\Models\Rol;
use App\Models\SettingsRol;
use App\Models\SettingsEstructura;
// controladores
use App\Http\Controllers\IndexController;

class RangoController extends Controller
{
    function __construct()
	{
		View::share('title', 'Ajustes - Rangos');
	}
    // Confi Rangos
	/**
	 * Dirige a la vista de Configuracion de Rangos
	 * 
	 * @access public
	 * @return view
	 */
	public function indexRango()
	{
		$settingRol = SettingsRol::find(1);
		$rangos = Rol::all();
		$settingsEstructura = SettingsEstructura::find(1);
		$cantnivel = $settingsEstructura->cantnivel;
		return view("setting.rango")->with(compact('settingRol', 'rangos', 'cantnivel'));
	}
	
	/**
	 * Recibe la informacion a guardar 
	 * 
	 * Recibe de las configuracion de los rangos y la envia a sus funciones respectiva
	 * @access public
	 * @return view
	 */
	public function saveRangos(Request $datos)
	{
		if (!empty($datos)) {
			$this->saveConfiguracionRango($datos);
            $this->recorridoRol($datos);
            $funciones = new IndexController;
            $funciones->msjSistema('Nuevo Sistema de Rango Definido', 'success');
			return redirect('admin/settings/rangos');
		} else {
			return redirect('admin/settings/rangos');
		}
	}

	/**
	 * Recibe la informacion de los rangos
	 * 
	 * Recibe la configuracion de los rangos y la guarda o actualizada dado el caso
	 * @access private
	 * @param array $datos - los datos de la configuracion
	 */
	private function saveConfiguracionRango($datos)
	{
		if(!empty($datos['idsetrol'])){
			SettingsRol::where('id', $datos['idsetrol'])->update([
				'rangos' => $datos->cantrango,
				'compras' => (!empty($datos->s_personal)) ? $datos->s_personal : 0,
				'comisiones' => (!empty($datos->s_comisiones)) ? $datos->s_comisiones : 0,
				'niveles' => (!empty($datos->s_nivel)) ? $datos->s_nivel : 0,
				'referidos' => (!empty($datos->s_referido)) ? $datos->s_referido : 0,
                'referidosact' => (!empty($datos->s_referidoact)) ? $datos->s_referidoact : 0,
				'bonos' => (!empty($datos->s_bono)) ? $datos->s_bono : 0,
				'referidosd' => (!empty($datos->s_referidoD)) ? $datos->s_referidoD : 0,
                'referidosInd' => (!empty($datos->s_referidoind)) ? $datos->s_referidoind : 0,
                'grupal' => (!empty($datos->s_grupal)) ? $datos->s_grupal : 0,
                'rolnecesario' => (!empty($datos->s_rolnecesario)) ? $datos->s_rolnecesario : 0,
                'reseteomensual' => (!empty($datos->s_reseteo)) ? $datos->s_reseteo : 0,
				'valorpuntos' => (!empty($datos->valorpuntos)) ? $datos->valorpuntos : 0
			]);
		}else{
			SettingsRol::create([
				'rangos' => $datos->cantrango,
				'compras' => (!empty($datos->s_personal)) ? $datos->s_personal : 0,
				'comisiones' => (!empty($datos->s_comisiones)) ? $datos->s_comisiones : 0,
				'niveles' => (!empty($datos->s_nivel)) ? $datos->s_nivel : 0,
				'referidos' => (!empty($datos->s_referido)) ? $datos->s_referido : 0,
                'referidosact' => (!empty($datos->s_referidoact)) ? $datos->s_referidoact : 0,
				'bonos' => (!empty($datos->s_bono)) ? $datos->s_bono : 0,
				'referidosd' => (!empty($datos->s_referidoD)) ? $datos->s_referidoD : 0,
                'referidosInd' => (!empty($datos->s_referidoind)) ? $datos->s_referidoind : 0,
                'grupal' => (!empty($datos->s_grupal)) ? $datos->s_grupal : 0,
                'rolnecesario' => (!empty($datos->s_rolnecesario)) ? $datos->s_rolnecesario : 0,
                'reseteomensual' => (!empty($datos->s_reseteo)) ? $datos->s_reseteo : 0,
				'valorpuntos' => (!empty($datos->valorpuntos)) ? $datos->valorpuntos : 0
			]);
		}
	}

	/**
	 * Recorre los roles a guardar 
	 * 
	 * Recorre los roles y obtiene la informacion necesaria de lo que se va a guardar
	 * 
	 * @access private
	 * @param array
	 */
	private function recorridoRol($datos)
	{
		DB::table('roles')->delete();
		DB::table('roles')->insert([
			'id' => 0, 
			'name' => 'Administrador',
        ]);
        DB::table('roles')->insert([
			'id' => 100,
			'name' => 'Cliente',
		]);
		for ($i=1; $i < ($datos->cantrango + 1) ; $i++) { 
			$arretmp = [
				'id' => $i,
				'name' => $datos['nombrerango'.$i],
				'referidos' => (!empty($datos['cantrefe'.$i])) ? $datos['cantrefe'.$i] : 0,
				'refeact' => (!empty($datos['cantrefeact'.$i])) ? $datos['cantrefeact'.$i] : 0,
                'referidosd' => (!empty($datos['cantrefed'.$i])) ? $datos['cantrefed'.$i] : 0,
                'referidosind' => (!empty($datos['cantrefeind'.$i])) ? $datos['cantrefeind'.$i] : 0,
				'compras' => (!empty($datos['totalpunto'.$i])) ? $datos['totalpunto'.$i] : 0,
				'grupal' => (!empty($datos['totalpuntoG'.$i])) ? $datos['totalpuntoG'.$i] : 0,
				'comisiones' => (!empty($datos['totalcomi'.$i])) ? $datos['totalcomi'.$i] : 0,
				'bonos' => (!empty($datos['totalbono'.$i])) ? $datos['totalbono'.$i] : 0,
				'niveles' => (!empty($datos['nivelafec'.$i])) ? $datos['nivelafec'.$i] : 0,
                'rolprevio' => (!empty($datos['rangoprevio'.$i])) ? $datos['rangoprevio'.$i] : 0,
                'rolnecesario' => (!empty($datos['rangonecesario'.$i])) ? $datos['rangonecesario'.$i] : 0,
                'rolnecesariocant' => (!empty($datos['rangonececant'.$i])) ? $datos['rangonececant'.$i] : 0,
				'acepta_comision' => (!empty($datos['p_cobrar_comision'.$i])) ? $datos['p_cobrar_comision'.$i] : 0
			];
			$this->saveRol($arretmp);
		}
	}

	/**
	 * Guarda los roles una vez limpio 
	 * 
	 * Guarda los roles una vez que ya esten limpio y sin informacion basura
	 * @access private
	 * @param array $datos - informacion de rol a guardar
	 */
	private function saveRol($datos)
	{
        // if ($datos['id'] != 1) {
        //     dd($datos);
        // }
		Rol::create([
			'id' => $datos['id'],
			'name' => $datos['name'],
			'referidos' => $datos['referidos'],
			'refeact' => $datos['refeact'],
            'referidosd' => $datos['referidosd'],
            'referidosInd' => $datos['referidosind'],
			'compras' => $datos['compras'],
			'grupal' => $datos['grupal'],
			'comisiones' => $datos['comisiones'],
			'bonos' => $datos['bonos'],
			'niveles' => $datos['niveles'],
            'rolprevio' => $datos['rolprevio'],
            'rolnecesario' => $datos['rolnecesario'],
            'rolnecesariocant' => $datos['rolnecesariocant'],
			'acepta_comision' => $datos['acepta_comision']
		]);
	}
	//Fin Confi Rangos

}
