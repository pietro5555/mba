<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Crypt;
use DB;
use Auth; 
use Mail;
use Carbon\Carbon; 
// llamando a los modelos
use App\Models\User; 
use App\Models\Pagos;
use App\Models\Commission; 
use App\Models\Settings;
use App\Models\Monedadicional; 
use App\Models\Monedas;
use App\Models\SettingCorreo; 
// llamando a los controladores
use App\Http\Controllers\WalletController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MonedaAdicionalController;

class PagoController extends Controller
{
    function __construct()
	{
        // TITLE
		view()->share('title', 'Pagos');
	}
	
	/**
	 * Vista de historial de pago
	 * 
	 * @access public
	 * @return view
	 */
	public function historyPrice(){
	    $moneda = Monedas::where('principal', 1)->get()->first();
		$pagos = Pagos::where('estado', '!=', 0)->get();
		$fechas = [
			'desde' => '',
			'hasta' => ''
		];
		
		$adicional =0;
		$monedaAdicional = Monedadicional::find(1);
        if (!empty($monedaAdicional)) { 
            $adicional =1;
        }    
        
	    return view('pagos.historialpago')->with(compact('pagos', 'fechas', 'moneda','adicional'));
	}
	
	/**
	 * Vista de Confirmacion de pago 
	 * 
	 * vista que confirma o rechaza los pagos
	 * 
	 * @access public
	 * @return view
	 */
	public function confimPrice(){
	    $moneda = Monedas::where('principal', 1)->get()->first();
		$pagos = Pagos::where('estado', 0)->get();
		$fechas = [
			'desde' => '',
			'hasta' => ''
		];
		
		$adicional =0;
		$monedaAdicional = Monedadicional::find(1);
        if (!empty($monedaAdicional)) { 
            $adicional =1;
        }    
        
	    return view('pagos.confirmarpago')->with(compact('pagos', 'fechas', 'moneda','adicional'));
	}

	/**
	 * Permite aplicar los filtros para ver los pagos
	 *
	 * @param Request $datos - la fecha con que se filtrara
	 * @return view
	 */
	public function filtro(Request $datos)
	{
		$funciones = new IndexController;
		$moneda = Monedas::where('principal', 1)->get()->first();
		
		$adicional =0;
		$monedaAdicional = Monedadicional::find(1);
        if (!empty($monedaAdicional)) { 
            $adicional =1;
        }
        
		if (!empty($datos)) {
			$desde = new Carbon($datos->fecha1);
			$hasta = new Carbon($datos->fecha2);
			$fechas = [
				'desde' => $desde,
				'hasta' => $hasta
			];
			if ($datos->form == "confirmarpago") {
				if ($desde > $hasta) {
					$funciones->msjSistema('La fecha desde no puede ser menor que las fecha Hasta', 'warning');
					return redirect('admin/price/confirmar');
				}
				$pagos = Pagos::where('estado', 0)->where('fechasoli', '>=', $desde)->where('fechasoli', '<=', $hasta)->get();
	    		return view('pagos.confirmarpago')->with(compact('pagos', 'fechas', 'moneda','adicional'));
			} else {
				if ($desde > $hasta) {
					$funciones->msjSistema('La fecha desde no puede ser menor que las fecha Hasta', 'warning');
					return redirect('admin/price/historial');
				}
				$pagos = Pagos::where('estado', '!=', 0)->where('fechapago', '>=', $desde)->where('fechapago', '<=', $hasta)->get();
	    		return view('pagos.historialpago')->with(compact('pagos', 'fechas', 'moneda','adicional'));
			}
			
		}
	}

	/**
	 * Aprueba los pagos solicitados
	 * 
	 * @param int $id - id del pago a procesar
	 * @return view
	 */
	public function aprobarPago($id)
	{
		$this->procesarPago($id);
		$funciones = new IndexController;
		$funciones->msjSistema('Pago aprobado con exito', 'success');
		return redirect('admin/price/confirmar');
	}

	/**
	 * Permite procesar los pagos
	 *
	 * @param integer $id - id del pago a procesar
	 * @return void
	 */
	public function procesarPago($id)
	{
		$fecha = new Carbon;
		$pagos = Pagos::find($id);
		$user = User::find($pagos->iduser);
		$pagos->estado = 1;
		$pagos->fechapago = $fecha->now();
		$descuento = (!empty($pagos->descuento) ? $pagos->descuento : 0);
		$resta = ($pagos->monto + $descuento);
		$user->wallet_amount = ($user->wallet_amount - $resta);
		$pagos->save();
		$user->save();
		$datos = [
			'iduser' => $user->ID,
			'idcomision' => $id,
			'usuario' => $user->display_name,
			'descripcion' => 'Retiro por el metodo de '.$pagos->metodo,
			'descuento' => $descuento,
			'debito' => 0,
			'credito' => $pagos->monto,
			'balance' => $user->wallet_amount,
			'tipotransacion' => 1,
		];
		$nombrecompleto = $user->display_name;
		$seting = Settings::find(1);
		$Correos = json_decode($seting->activarCorreos);
		$plantilla = SettingCorreo::find(2);
		
		$firma = null;
	   if (!empty($seting->firma)) {
	       $firma = $seting->firma;
	   }
	   
	   $correoUser = json_decode($user->correos);
	if($Correos->pago == 1 && $correoUser->pago == 1){	
        if (!empty($plantilla->contenido)) {
			$mensaje = str_replace('@nombre', ' '.$nombrecompleto.' ', $plantilla->contenido);
			$mensaje = str_replace('@correo', ' '.$user->user_email.' ', $mensaje);
			$mensaje = str_replace('@pago', ' '.$resta.' ', $mensaje);
			Mail::send('emails.plantilla',  ['data' => $mensaje, 'firma' => $firma], function($msj) use ($plantilla, $user){
				$msj->subject($plantilla->titulo);
				$msj->to($user->user_email);
			});
          }
		}
		$wallet = new WalletController;
		$wallet->saveWallet($datos);
	}

	/**
	 * Rechaza los pago 
	 *
	 * @param integer $id - id del pago a rechazar
	 * @return view
	 */
	public function rechazarPago($id)
	{
		$funciones = new IndexController;
		$fecha = new Carbon;
		$pagos = Pagos::find($id);
		$pagos->estado = 2;
		$pagos->fechapago = $fecha->now();
		$pagos->save();
		$funciones->msjSistema('Pago rechazado con exito', 'danger');
		return redirect('admin/price/confirmar');
	}
	/**
	 * Lleva a la vista de los pagos confirmados
	 *
	 * @return view
	 */
	public function confirmados(){
	    
	    $pagos = Pagos::where('estado', 1)->get();
	    
	    $adicional =0;
		$monedaAdicional = Monedadicional::find(1);
        if (!empty($monedaAdicional)) { 
            $adicional =1;
        }    
        
	    return view('pagos.confirmados')->with(compact('pagos','adicional'));
	}

	/**
	 * Permite procesar todos los pagos pendientes
	 *
	 * @return void
	 */
	public function pagarTodo()
	{
		$pagos = Pagos::where('estado', 0)->get();

		foreach ($pagos as $pago) {
			$this->procesarPago($pago->id);
		}
		$funciones = new IndexController;
		$funciones->msjSistema('Todos los pagos estan Aprobados', 'success');
		return redirect('admin/price/confirmar');
	}

	public function pagoMasivo(Request $datos)
	{
		$validate = $datos->validate([
			'monto_min' => 'required|numeric'
		]);
		if ($validate) {
			$pagos = Pagos::where('monto', '>=', $datos->monto_min)->get();
			foreach ($pagos as $pago) {
				$this->procesarPago($pago->id);
			}
			$funciones = new IndexController;
			$funciones->msjSistema('Lo Pagos con monto iguales o superiores a '.$datos->monto_min.' Estan Aprobados', 'success');
			return redirect('admin/price/confirmar');
		}
	}
	
	//liquidaciones
	public function liquidaciones(Request $request){
	    
	    $total =0;
	    
	    $desde = new Carbon($request->desde);
	    $hasta = new Carbon($request->hasta);
	    
	        
	    $usuarios = User::where('wallet_amount','>','0')->get();
	    $fecha = new Carbon;
	    foreach($usuarios as $usuario){
	        $datos = DB::table('user_campo')->where('ID', $usuario->ID)->first();
	       
	        //cancelamos los retiros anteriores para no haya saldo negativo en las billeteras
	        $pagos = $this->cancelar($usuario->ID);
	        
	        $monto = Commission::where('user_id', '=', $usuario->ID)
             ->whereDate("date",">=",$request->desde)
             ->whereDate("date","<=",$request->hasta)
             ->where('total', '!=', 0)
             ->get()->sum('total');
             
	        if($pagos == null && $monto > 0){
	            
	            if($usuario->wallet_amount >= $monto){
                $total = ($usuario->wallet_amount - $monto);
                 
             }elseif($monto > $usuario->wallet_amount){
                 $monto = $usuario->wallet_amount;
                 $total = ($usuario->wallet_amount - $monto);
             }
             
	             $tipopago = '';
	             
	             $banacario = 'Numero de cuenta: '. $datos->cuenta.'';
				 $banacario .= 'Tipo de Cuenta: '. $datos->tipocuenta.'';
				 $banacario .= 'Nombre del banco'. $datos->banco.'';
                 $tipopago .= '- Datos Bancarios: '.$banacario.'';
	            
	            $user = User::find($usuario->ID);
	            
	            $monedaAdi = new MonedaAdicionalController;
	            $moneda = $monedaAdi->calcularValorMonedas($monto, 0);
	            
	           $pago = Pagos::create([
				'iduser' => $user->ID,
				'username' => $user->display_name,
				'email' => $user->user_email,
				'monto' => $monto,
				'descuento' => 0,
				'fechasoli' => $fecha->now(),
				'fechapago' => $fecha->now(),
				'metodo' => 'Bancario',
				'tipopago' => $tipopago,
				'estado' => 1,
				'monedaAdicional' => $moneda,
						]);
	            
	            $datos = [
			'iduser' => $user->ID,
			'idcomision' => $pago->id,
			'usuario' => $user->display_name,
			'descripcion' => 'Liquidacion del usuario '.$user->display_name,
			'descuento' => 0,
			'debito' => 0,
			'credito' => $monto,
			'balance' => 0,
			'tipotransacion' => 3,
		];
		
		
		$this->enviocorreoliquidacion($datos, $tipopago, $user->user_email);
		
		$wallet = new WalletController;
		$wallet->saveWallet($datos);
		
		$user->wallet_amount = $total;
		$user->save();
	          
	        }
	    }
	    
	    $funciones = new IndexController;
			$funciones->msjSistema('Realizado con exito', 'success');
			return redirect()->back();
	    
	}
    
    
    public function cancelar($iduser){
	    $valor = null;
	    	$comprobar = Pagos::where('iduser','=', $iduser)->where('estado','=', 0)->get();
	    	
	    	foreach($comprobar as $compro){
	    $fecha = new Carbon;
		$pagos = Pagos::find($compro->id);
		$pagos->estado = 2;
		$pagos->fechapago = $fecha->now();
		$pagos->save();
	    	}
	    	
	    	return $valor;
	}
    
    public function enviocorreoliquidacion($requisitos, $bancario, $correo){
        
        $fecha = new Carbon;
        $seting = Settings::find(1);
        $Correos = json_decode($seting->activarCorreos);
        $plantilla = SettingCorreo::find(5);
         $firma = null;
	   if (!empty($seting->firma)) {
	       $firma = $seting->firma;
	   }
	   
	   $user = User::find($requisitos['iduser']);
	   $correoUser = json_decode($user->correos);
	   
    if($Correos->liquidacion == 1 && $correoUser->liquidacion == 1){    
        if (!empty($plantilla->contenido)) {
             $mensaje = str_replace('@nombre', ' '.$requisitos['usuario'].' ', $plantilla->contenido);
            $mensaje = str_replace('@fecha', ' '.$fecha->now().' ', $mensaje);
            $mensaje = str_replace('@total', ' '.$requisitos['credito'].' ', $mensaje);
            $mensaje = str_replace('@correo', ' '.$correo.' ', $mensaje);
            $mensaje = str_replace('@datosbancarios', ' '.$bancario.' ', $mensaje);
            
         Mail::send('emails.compraypagos',  ['data' => $mensaje, 'firma' => $firma], function($msj) use ($plantilla, $correo){
            $msj->subject($plantilla->titulo);
            $msj->to($correo);
        });
           }
        }
    }
    
    //fin liquidaciones
    
    public function monto(Request $datos){
        
        $pagos = Pagos::where('estado', 0)->where('monto', '>=', $datos->minimo)->where('monto', '<=', $datos->maximo)->get();

		foreach ($pagos as $pago) {
			$this->procesarPago($pago->id);
		}
		$funciones = new IndexController;
		$funciones->msjSistema('Todos los pagos estan Aprobados', 'success');
		return redirect('admin/price/confirmar');
    }
}
