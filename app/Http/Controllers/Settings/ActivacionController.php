<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
// modelo
use App\Models\SettingActivacion;
// controlador
use App\Http\Controllers\IndexController;

class ActivacionController extends Controller
{
    function __construct()
	{
		View::share('title', 'Ajustes - Activacion');
	}
    // Confi Activacion
	/**
	 * Lleva a la vista de configuración de Activacion
	 * 
	 * @access public
	 * @return view
	 */
	public function indexActivacion()
	{
		$settingAct = SettingActivacion::find(1);
		return view('setting.activacion')->with(compact('settingAct'));
	}

	/**
	 * Permite Guarda la configuracion de la activacion
	 * 
	 * @access public
	 * @param request $datos - Datos de las activacion
	 * @return view
	 */
	public function saveActivacion(Request $datos)
	{
		if (!empty($datos)) {
			if (!empty($datos->id)) {
				SettingActivacion::where('id', $datos->id)->update([
					'tipoactivacion' => $datos->activacion, 
					'tiporecompra' => $datos->recompra, 
					'requisitoactivacion' => $datos->requisito_a, 
                    'requisitorecompra' => $datos->requisito_r,
                    'desativar_usuarios' => $datos->desactivar,
				]);
			} else {
				SettingActivacion::create([
					'tipoactivacion' => $datos->activacion, 
					'tiporecompra' => $datos->recompra, 
					'requisitoactivacion' => $datos->requisito_a, 
                    'requisitorecompra' => $datos->requisito_r,
                    'desativar_usuarios' => $datos->desactivar,
				]);
            }
            $funciones = new IndexController;
            $funciones->msjSistema('Metodo de Activacion Actualizado', 'success');
			return redirect('admin/settings/activacion');
		}else{
			return redirect('admin/settings/activacion');
		}
    }
    
}
