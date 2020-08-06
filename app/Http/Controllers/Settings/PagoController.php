<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
// modelos
use App\Models\Settings;
use App\Models\MetodoPago;
use App\Models\SettingsComision;
// controladores
use App\Http\Controllers\IndexController;

class PagoController extends Controller
{
	// Confi Metodos Pagos
	function __construct()
	{
		View::share('title', 'Ajustes - Pagos');
	}
	/**
	 * Dirige a la vista de configuraciones de metodos de pago
	 * 
	 * @access public
	 * @return view
	 */
	public function indexPago()
	{
			
		$metodospagos = MetodoPago::all();
		$comisiones = SettingsComision::select('comisiontransf', 'tipotransferencia')->where('id', 1)->get();
		return view('setting.metodopago')->with(compact('metodospagos', 'comisiones'));
	}

	/**
	 * Guarda la configuracion de los pagos en el sistema
	 * 
	 * @access public
	 * @param request $datos - datos de la configuracion
	 * @return view
	 */
	public function savePagos(Request $datos)
	{
		$logoruta = '';
		$fecha = new Carbon;
		if(!empty($datos)){
			if (!empty($datos->file('logo'))) {
				$archivo = $_FILES['logo'];
				$rutadirectorio = public_path()."/assets/img/metodopago";
				$rutaarchivo = public_path()."/assets/img/metodopago/".$fecha->now().$archivo['name'];
				if (!is_dir($rutadirectorio)) {
					mkdir($rutadirectorio, 0700, true);
					$movido = move_uploaded_file($archivo['tmp_name'], $rutaarchivo);
				} else {
					if (is_dir($rutaarchivo)) {
						unlink($rutaarchivo);
					}
					$movido = move_uploaded_file($archivo['tmp_name'], $rutaarchivo);
				}
				
				if($movido){
					$logoruta = "/assets/img/metodopago/".$fecha->now().$archivo['name'];
				}
			}
			$feed = $datos->feed;
			if ($datos->tipofeed == 1) {
				$feed = ($datos->feed / 100);
			}
			MetodoPago::create([
				'nombre' => $datos->nombre,
				'logo' => (!empty($logoruta)) ? $logoruta : '',
				'feed' => $feed,
				'monto_min' => (!empty($datos->monto_min)) ? $datos->monto_min : 0,
				'tipofeed' => $datos->tipofeed,
				'estado' => 1,
				'wallet' => (!empty($datos->wallet)) ? $datos->wallet : 0,
				'correo' => (!empty($datos->correo)) ? $datos->correo : 0,
				'datosbancarios' => (!empty($datos->bancario)) ? $datos->bancario : 0,
            ]);
            $funciones = new IndexController;
            $funciones->msjSistema('Nuevo Metodo de Pago Agregado', 'success');
		}
		return redirect('admin/settings/pagos');
	}
	
	/**
	 * Guarda las Comisiones de los metodos de pago 
	 * 
	 * @access public
	 * @param request
	 * @return view
	 */
	public function comisionMetodoPago(Request $datos)
	{
        $validate = $datos->validate([
            'tipotransferencia' => 'required',
        ]);
	    if(!empty($datos)){
	        $comisionMP = SettingsComision::find(1);
            $comisionMP->tipotransferencia = $datos->tipotransferencia;
            $trans = (!empty($datos->transferencia)) ? $datos->transferencia : 0;
            if ($datos->tipotransferencia == 1) {
                $trans = ($trans / 100);
            }
	        $comisionMP->comisiontransf = $trans;
            $comisionMP->save();
            $funciones = new IndexController;
            $funciones->msjSistema('Comisiones Actualizadas', 'success');
	    }
		return redirect('admin/settings/pagos');
	}

	/**
	 * Actualiza el estado de un metodo de pago especifico
	 * 
	 * @access public
	 * @param int $id - id del campo, int $estado - estado al que se va a actualizar
	 * @return view
	 */
	public function statusPago($id, $estado){
	    if (!empty($id)){
	        MetodoPago::where('id', $id)->update(['estado' => $estado]);
            $metodopago = MetodoPago::find($id);
            $funciones = new IndexController;
            $funciones->msjSistema('El Metodo de Pago '.$metodopago->nameinput.' Fue Actualizado con Exito', 'success');
	    }
		return redirect('admin/settings/pagos');
	}

	/**
	 * Obtiene la informacion de un metodo de pago en especifico
	 * 
	 * @access public
	 * @param int $id - id del metodo de pago
	 * @return json
	 */
	public function getMetodo($id)
	{
		$metodo = MetodoPago::find($id);
		return json_encode($metodo);
	}

	/**
	 * Permite Actualizar la informacion de un metodo de pago ya registrado
	 * 
	 * @param request
	 * @return view
	 */
	public function updateMetodo(Request $datos)
	{
		$logoruta = '';
		$fecha = new Carbon;
		if (!empty($datos)) {
			if (!empty($datos->file('logo'))) {
				$archivo = $_FILES['logo'];
				$rutadirectorio = public_path()."/assets/img/metodopago";
				$rutaarchivo = public_path()."/assets/img/metodopago/".$fecha->now().$archivo['name'];
				if (!is_dir($rutadirectorio)) {
					mkdir($rutadirectorio, 0700, true);
					$movido = move_uploaded_file($archivo['tmp_name'], $rutaarchivo);
				} else {
					if (is_dir($rutaarchivo)) {
						unlink($rutaarchivo);
					}
					$movido = move_uploaded_file($archivo['tmp_name'], $rutaarchivo);
				}
				
				if($movido){
					$logoruta = "/assets/img/metodopago/".$fecha->now().$archivo['name'];
				}
			}
			$feed = $datos->feed;
			if ($datos->tipofeed == 1) {
				$feed = ($datos->feed / 100);
			}
			$metodo = MetodoPago::find($datos->id);
			MetodoPago::where('id', $datos->id)->update([
				'nombre' => $datos->nombre,
				'logo' => (!empty($logoruta)) ? $logoruta : $metodo->logo,
				'feed' => $feed,
				'monto_min' => (!empty($datos->monto_min)) ? $datos->monto_min : 0,
				'tipofeed' => $datos->tipofeed,
				'estado' => 1,
				'wallet' => (!empty($datos->wallet)) ? $datos->wallet : 0,
				'correo' => (!empty($datos->correo)) ? $datos->correo : 0,
				'datosbancarios' => (!empty($datos->bancario)) ? $datos->bancario : 0,
            ]);
            $funciones = new IndexController;
            $funciones->msjSistema('Metodo de Pago Actualizado', 'success');
		}
		return redirect('admin/settings/pagos');
	}

	/**
	 * permite borrar un metodo de pago en especifico
	 * 
	 * @access public
	 * @param int $id - id del metodo de pago
	 */
	public function deleteMetodo($id)
	{
		$formulario = MetodoPago::find($id);
		$formulario->delete();
	}

	public function opcionBotones(Request $datos)
	{
		if (!empty($datos)) {
			$settings = Settings::first();
			$Botones = json_decode($settings->activarBotones);
			$data = [
				'btn_transferencia' => (!empty($datos->btn_transferencia)) ? $datos->btn_transferencia : $Botones->btn_transferencia,
				'btn_retiro' => (!empty($datos->btn_retiro)) ? $datos->btn_retiro : $Botones->btn_retiro,
				'btn_masivo' => (!empty($datos->btn_masivo)) ? $datos->btn_masivo : $Botones->btn_masivo,
				'btn_todo' => (!empty($datos->btn_todo)) ? $datos->btn_todo : $Botones->btn_todo,
				
				'btn_liquida' => (!empty($datos->btn_liquida)) ? $datos->btn_liquida : $Botones->btn_liquida,
				
				'btn_monto' => (!empty($datos->btn_monto)) ? $datos->btn_monto : $Botones->btn_monto
			];
			DB::table('settings')
	            ->where('id', 1)
				->update(['activarBotones' => json_encode($data)]);

			$funciones = new IndexController;
			$funciones->msjSistema('Nueva configuracion de botones', 'success');
		}
		return redirect()->back();
	}
	// Fin Confi Metodos Pago
}
