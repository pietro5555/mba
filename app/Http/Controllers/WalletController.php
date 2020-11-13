<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Crypt;
use Auth; 
use DB; 
use Carbon\Carbon; 
// llamada a los modelos
use App\Models\User; 
use App\Models\Pagos;
use App\Models\Wallet;
use App\Models\Monedas;
use App\Models\Punto;
use App\Models\Monedadicional; 
use App\Models\Bonoinicio;
use App\Models\Puntosbono;
use App\Models\MetodoPago; 
use App\Models\Commission;
use App\Models\SettingsComision;
use App\Models\Canje;
use App\Models\Settings; 
use App\Models\PurchaseDetail;
// llamada a los controladores
use App\Http\Controllers\ComisionesController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MonedaAdicionalController;

class WalletController extends Controller
{
	function __construct()
	{
        // TITLE
		view()->share('title', 'Billetera');
	}
	
	/**
	 *  Va a la vista principal de la billetera
	 * 
	 * @access public
	 * @return view
	 */
	public function index(){
	   
		$moneda = Monedas::where('principal', 1)->get()->first();
		$datos = [];
		$totalcompleto =0;

		if (Auth::user()->rol_id == 0) {

			view()->share('title', 'Historial de Comisiones');

			$wallets = Wallet::all();
			$total = $this->calcularTotal($wallets);
			//recargas
			$recargas = Wallet::where('tipotransacion', 4)->get();
			$totalrecarga = $this->calcularTotal($recargas);
		} else {
			$wallets = Wallet::where('iduser', Auth::user()->ID)->get();
			$total = $this->calcularTotal($wallets);
			//recargas
			$recargas = Wallet::where('tipotransacion', 4)->where('iduser', Auth::user()->ID)->get();
			$totalrecarga = $this->calcularTotal($recargas);
		}

		foreach($recargas as $recar){
         $user = User::find($recar->iduser);
         $recar->display_name = ($user == null) ? 'N/A' : $user->display_name;
         $recar->wallet_amount = ($user == null) ? 'N/A' : $user->wallet_amount;
		}
		
		$adicional =0;
		$monedaAdicional = Monedadicional::find(1);
        if (!empty($monedaAdicional)) { 
            $adicional =1;
        }

	   	return view('wallet.indexwallet')->with(compact('wallets', 'moneda','total','adicional','datos','totalcompleto','recargas','totalrecarga'));
	}


	//filtro por fecha
	public function filtro(Request $request){
	    
	    $datos = [];
		$totalcompleto =0;

	    if(Auth::user()->rol_id == 0){

	    view()->share('title', 'Historial de Comisiones');

	    $wallets = Wallet::whereDate('created_at','>=',$request->fecha1)->whereDate('created_at','<=' ,$request->fecha2)->get();
        $total = $this->calcularTotal($wallets);

	    //recargas
		$recargas = Wallet::where('tipotransacion', 4)->get();
		$totalrecarga = $this->calcularTotal($recargas);

	   }else{

	   	$wallets = Wallet::where('iduser', Auth::user()->ID)->whereDate('created_at','>=',$request->fecha1)->whereDate('created_at','<=' ,$request->fecha2)->get();
	   	$total = $this->calcularTotal($wallets);

	   	//recargas
		$recargas = Wallet::where('tipotransacion', 4)->where('iduser', Auth::user()->ID)->get();
		$totalrecarga = $this->calcularTotal($recargas);
	   }

	   foreach($recargas as $recar){
         $user = User::find($recar->iduser);
         $recar->display_name = ($user == null) ? 'N/A' : $user->display_name;
         $recar->wallet_amount = ($user == null) ? 'N/A' : $user->wallet_amount;
		}

	    $moneda = Monedas::where('principal', 1)->get()->first();

	    $adicional =0;
		$monedaAdicional = Monedadicional::find(1);
        if (!empty($monedaAdicional)) { 
            $adicional =1;
        }
		
    return view('wallet.indexwallet')->with(compact('wallets', 'moneda','total','adicional','datos','totalcompleto','recargas','totalrecarga'));
	}
	
	
	//filtro por usuario y fecha
	public function filtrouser(Request $request){
	    
	    $datos = [];
		$totalcompleto =0;
        
        //filtro usuario
        if($request->user != null){

        view()->share('title', 'Historial de Comisiones');
        	
	    $wallets = Wallet::where('iduser', $request->user)->get();
	    $total = $this->calcularTotal($wallets);

	    //recargas
		$recargas = Wallet::where('tipotransacion', 4)->get();
		$totalrecarga = $this->calcularTotal($recargas);

       }else{
       	//filtro de recargas fechas
       	if(Auth::user()->rol_id != 0){
        $wallets = Wallet::where('iduser', Auth::user()->ID)->get();
	    $total = $this->calcularTotal($wallets);
	    }else{
        $wallets = Wallet::all();
	    $total = $this->calcularTotal($wallets);
	    }

	    //recargas
		$recargas = Wallet::where('tipotransacion', 4)->whereDate('created_at','>=',$request->fecha3)->whereDate('created_at','<=',$request->fecha4)->get();
		$totalrecarga = $this->calcularTotal($recargas);
       }
	    foreach($recargas as $recar){
         $user = User::find($recar->iduser);
         $recar->display_name = ($user == null) ? 'N/A' : $user->display_name;
         $recar->wallet_amount = ($user == null) ? 'N/A' : $user->wallet_amount;
		}

	    $moneda = Monedas::where('principal', 1)->get()->first();

	    $adicional =0;
		$monedaAdicional = Monedadicional::find(1);
        if (!empty($monedaAdicional)) { 
            $adicional =1;
        }
		
        
    return view('wallet.indexwallet')->with(compact('wallets', 'moneda','total','adicional','datos','totalcompleto','recargas','totalrecarga'));
	}


	public function comisionesfiltro(Request $request){
	    
	    $datos = [];
	    $fecha1 = new Carbon($request->fecha1);
	    $fecha2 = new Carbon($request->fecha2);
	    
	    $funciones = new IndexController;  
	    $moneda = Monedas::where('principal', 1)->get()->first();
	    $totalcompleto =0;
	    
	    $user = $funciones->generarArregloAdmin(1);
	    foreach($user as $use){
	      $wall = Wallet::where('iduser', $use['ID'])->whereDate('created_at','>=', $fecha1)->whereDate('created_at','<=',$fecha2)->get();
	      
	      $total = $this->calcularTotal($wall);
	      $totalcompleto = ($totalcompleto + $total); 
	      
	      
	            $datos [] = [
	                'ID' => $use['ID'],
	                'nivel' => $use['nivel'],
                    'usuario' => $use['nombre'],
                    'total' => $total,
                ];
	    }

	    //recargas
		$recargas = Wallet::where('tipotransacion', 4)->get();
		$totalrecarga = $this->calcularTotal($recargas);

	    foreach($recargas as $recar){
         $user = User::find($recar->iduser);
         $recar->display_name = ($user == null) ? 'N/A' : $user->display_name;
         $recar->wallet_amount = ($user == null) ? 'N/A' : $user->wallet_amount;
		}

		//wallets
		$wallets = Wallet::all();
		$total = $this->calcularTotal($wallets);

		$adicional =0;
		$monedaAdicional = Monedadicional::find(1);
        if (!empty($monedaAdicional)) { 
            $adicional =1;
        }
	    
	    return view('wallet.indexwallet')->with(compact('wallets', 'moneda','total','adicional','datos','totalcompleto','recargas','totalrecarga'));
	}
	
	
	//calculamos el total de la billetera ya sea global 
	// o por busqueda
	public function calcularTotal($wallet){
	    
	    $total =0;
	    foreach($wallet as $walle){
	        if($walle->tipotransacion == 2 || $walle->tipotransacion == 4){
	            $total = ($total + $walle->debito);
	        }elseif($walle->tipotransacion == 0){
	            if($walle->credito > 0){
	            $total = ($total - ($walle->credito + $walle->descuento));
	            }else{
	             $total = ($total + $walle->debito);  
	            }
	        }else{
	          $total = ($total - ($walle->credito + $walle->descuento));  
	        }
	    }
	    
	    return $total;
	}
	
	/**
	 * Realizar Transferencia de un usuario a otro
	 * 
	 * @access public
	 * @param Request
	 * @return view
	 */
	public function transferencia(Request $datos){
	   $funciones = new IndexController;
	   if(!empty($datos)){
	       $verificaruser = User::where('user_email', $datos->usuario)->get()->toArray();
	       if (empty($verificaruser)){
				$funciones->msjSistema('El Correo Electronico '.$datos->usuario.' no se encuentra registrado', 'warning');
	           return redirect('admin/wallet');
	       }else{
				$resta = ($datos->monto - $datos->comision);
			   	if ($datos->tipo == 1) {
					$porcentaje = ($datos->monto * $datos->comision);
					$resta = ($datos->monto - $porcentaje);
			   	}
	           if($resta > 0){
	               if($resta < $datos->montodisponible){
	                   $userOrigen = User::find(Auth::user()->ID);
    	               $userDestino = User::find($verificaruser[0]['ID']);
    	               $userOrigen->wallet_amount = ($userOrigen->wallet_amount - $datos['monto']);
    	               $userDestino->wallet_amount = ($userDestino->wallet_amount + $resta);
    	               $userOrigen->save();
    	               $userDestino->save();
    	               $datosOrigen = [
						   'iduser' => $userOrigen->ID,
						   'idcomision' => $userOrigen->ID.Carbon::now()->format('His').$userDestino->ID,
    	                   'usuario' => $userOrigen->display_name,
    	                   'descripcion' => 'Transferencia enviada a '.$userDestino->display_name,
    	                   'descuento' => ($datos->tipo != 1) ? ($datos['monto'] - $resta) : $resta,
    	                   'debito' => 0,
    	                   'credito' => $datos['monto'],
						   'balance' => $userOrigen->wallet_amount,
						   'tipotransacion' => 0
    	               ];
    	               $datosDestino = [
						   'iduser' => $userDestino->ID,
						   'idcomision' => $userDestino->ID.Carbon::now()->format('His').$userOrigen->ID,
    	                   'usuario' => $userDestino->display_name,
    	                   'descripcion' => 'Transferencia recibida de '.$userOrigen->display_name,
    	                   'descuento' => 0,
    	                   'debito' => $resta,
    	                   'credito' => 0,
						   'balance' => $userDestino->wallet_amount,
						   'tipotransacion' => 0
    	               ];
    	               $this->saveWallet($datosOrigen);
    	               $this->saveWallet($datosDestino);
    	               $funciones->msjSistema('Transferencia enviada con Exito', 'success');
    	               return redirect('admin/wallet');
	               }else{
						$funciones->msjSistema('El monto a transferir no puede superar el monto disponible', 'warning');
	                   	return redirect('admin/wallet');
	               }
	           }else{
					$funciones->msjSistema('El monto a transferir no puede ser negativo', 'warning');
	               	return redirect('admin/wallet');
	           }
	       }
	   }else{
	       return redirect('admin/wallet');
	   }
	}
	
	/**
	 * Guarda la informacion o los registro del la billetera
	 * 
	 * @access public
	 * @param array $datos - arreglo con los datos necesarios
	 */
	public function saveWallet($datos){
	    
	    $monedaAdi = new MonedaAdicionalController;
	    if($datos['tipotransacion'] != 3 && $datos['tipotransacion'] != 0){
	    
	   $moneda = $monedaAdi->calcularValorMonedas($datos['debito'], 0);
	    }elseif($datos['tipotransacion'] == 3){
	   
	   $moneda = $monedaAdi->calcularValorMonedas($datos['credito'], 0);     
	    }elseif($datos['tipotransacion'] == 0){
	        if($datos['credito'] > 0){
	        $moneda = $monedaAdi->calcularValorMonedas($datos['credito'], 0);    
	        }else{
	        $moneda = $monedaAdi->calcularValorMonedas($datos['debito'], 0);     
	        }
	    }
	    
	   Wallet::create([
		   'iduser' => $datos['iduser'],
		   'idcomision' =>  $datos['idcomision'],
	       'usuario' => $datos['usuario'],
	       'descripcion' => $datos['descripcion'],
	       'descuento' => $datos['descuento'],
	       'debito' => $datos['debito'],
	       'credito' => $datos['credito'],
		   'balance' => $datos['balance'],
		   'tipotransacion' => $datos['tipotransacion'],
		   'monedaAdicional' => $moneda,
	   ]);
	}
	
	
    /**
     * Solicita el proceso de retiro de un usuario
     * 
     * @access public
     * @param request $datos - datos para el retiro
     * @return view
     */
    public function retiro(Request $datos){
		$funciones = new IndexController;
        $fecha = new Carbon;
        if (!empty($datos)){
            $resta = $datos->total;
            if($resta > 0){
                if($resta <= $datos->montodisponible){
                    $tipopago = '';
                    if(!empty($datos->metodocorreo)){
                        $tipopago .= 'Correo: '.$datos->metodocorreo.'\n\r';
                    }
                    if(!empty($datos->metodowallet)){
                        $tipopago .= $tipopago.'- Wallet: '.$datos->metodowallet.'\n\r';
                    }
                    
                    if(!empty($datos->cuentabanco)){
						$banacario = 'Numero de cuenta: '. $datos->cuentabanco.'-';
						$banacario .= 'Tipo de Cuenta: '. $datos->tipocuenta.'-';
						$banacario .= 'Nombre del banco'. $datos->nombrebanco.'-';
                        $tipopago .= '- Datos Bancarios: '.$banacario.'-';
                    }
                    $metodo = MetodoPago::find($datos->metodopago);
                    if ($resta > $datos->monto_min) {
                        
                $monedaAdi = new MonedaAdicionalController;
	            $moneda = $monedaAdi->calcularValorMonedas($resta, 0);
	            
						Pagos::create([
							'iduser' => Auth::user()->ID,
							'username' => Auth::user()->display_name,
							'email' => Auth::user()->user_email,
							'monto' => $resta,
							'descuento' => ($datos->monto - $resta),
							'fechasoli' => $fecha->now(),
							'metodo' => $metodo->nombre,
							'tipopago' => $tipopago,
							'estado' => 0,
							'monedaAdicional' => $moneda,
						]);
						$funciones->msjSistema('Solicitud de Retiro Procesado con Exito', 'success');
						return redirect('admin/wallet');
					} else {
						$funciones->msjSistema('El monto a retirar es menor que el monto minimo permitido', 'warning');
						return redirect('admin/wallet');	
					}
                }else{
					$funciones->msjSistema('El monto a retirar no puede superar el monto disponible', 'warning');
                    return redirect('admin/wallet');
                }
            }else{
				$funciones->msjSistema('El monto a transferir no puede ser negativo', 'warning');
                return redirect('admin/wallet');
            }
        }else{
           return redirect('admin/wallet'); 
        }
    }
    
    /**
     * Permite Obtener por donde se procesara el pago al usuario
     * 
     * @access public
     * @param int $id - el metodo de pago selecionado por el usuario
     * @return json
     */
    public function datosMetodo($id){
        $metodo = MetodoPago::find($id);
        $datos = [
            'correo' => $metodo->correo,
            'wallet' => $metodo->wallet,
			'bancario' => $metodo->datosbancarios,
			'tipofeed' => $metodo->tipofeed,
			'feed' => $metodo->feed
            ];
        return json_encode($datos);
    }
	
	/**
	 * lleva a la vista del historial de comisiones
	 *
	 * @return void
	 */
    public function historial()
    {
		$moneda = Monedas::where('principal', 1)->get()->first();  
		$billetera = DB::table('walletlog')
                ->where('iduser', '=', Auth::user()->ID )
                ->where('tipotransacion', '=', 0 )
                ->get();
                
        $adicional =0;
		$monedaAdicional = Monedadicional::find(1);
        if (!empty($monedaAdicional)) { 
            $adicional =1;
        }

     	return view('wallet.historial', compact('billetera', 'moneda','adicional')); 
    }
	
	/**
	 * Permite filtrar en el historial por fechas
	 *
	 * @param Request $request
	 * @return void
	 */
     public function historial_fechas(Request $request)
    {
        $moneda = Monedas::where('principal', 1)->get()->first();
      	$billetera = Wallet::whereDate("created_at",">=",$request->fecha1)
             ->whereDate("created_at","<=",$request->fecha2)
             ->where('tipotransacion', '=', 0 )
             ->where('iduser', '=', Auth::user()->ID )
             ->get(); 
             
        $adicional =0;
		$monedaAdicional = Monedadicional::find(1);
        if (!empty($monedaAdicional)) { 
            $adicional =1;
        }     
             
 		return view('wallet.historial', compact('billetera', 'moneda','adicional')); 
    }
	
	/**
	 * Lleva a la vista de cobro
	 *
	 * @return void
	 */
    public function cobros()
    {
		$moneda = Monedas::where('principal', 1)->get()->first();
		$billetera = DB::table('walletlog')
                ->where('iduser', '=', Auth::user()->ID )
                ->where('tipotransacion', '=', 1 )
                ->get();
                
        $adicional =0;
		$monedaAdicional = Monedadicional::find(1);
        if (!empty($monedaAdicional)) { 
            $adicional =1;
        }        

     	return view('wallet.cobros', compact('billetera', 'moneda','adicional')); 
    }
	
	/**
	 * Permite filtrar en la vista de cobro por fecha
	 *
	 * @param Request $request
	 * @return void
	 */
    public function cobros_fechas(Request $request)
    {
		$moneda = Monedas::where('principal', 1)->get()->first();
 		$billetera = Wallet::whereDate("created_at",">=",$request->facha1)
             ->whereDate("created_at","<=",$request->facha2)
             ->where('tipotransacion', '=', 1 )
             ->where('iduser', '=', Auth::user()->ID )
             ->get();
             
        $adicional =0;
		$monedaAdicional = Monedadicional::find(1);
        if (!empty($monedaAdicional)) { 
            $adicional =1;
        }         

     	return view('wallet.cobros', compact('billetera', 'moneda','adicional')); 
	}
	
	/**
	 * Permite eliminar las comisiones
	 *
	 * @param integer $id
	 * @return boolean
	 */
	public function cancelarComision($id)
	{
		$wallet = Wallet::find($id);
		$user = User::find($wallet->iduser);
		
		if($user->wallet_amount >= $wallet->debito){
		$user->wallet_amount = ($user->wallet_amount - $wallet->debito);
		$user->save();
		}
		
		$comision = Commission::find($wallet->idcomision);
		if($comision != null){
		$comision->eliminada = 1;
		$comision->save();
		}
		
		$wallet->delete();
		$funciones = new IndexController;
		$concepto = 'Comision del usuario '.$user->display_name.' Eliminada con exito';
		$funciones->msjSistema($concepto, 'success');
		return redirect()->back();
	}
	
	
	public function recarga(){
	    
	    view()->share('title', 'Recargar Billetera');
	    
	    $usuarios = User::where('rol_id','!=','0')->get();
	    return view('wallet.recarga', compact('usuarios')); 
	}
	
	
	public function amount(Request $request){
	    
	    $comisiones = new ComisionesController;
	   
	    $admin = User::find(1);
	    $referido = User::find($request->id);
	    
	    $concepto='Recarga de billetera del usuario: '.$referido->display_name;
	    $comisiones->guardarComision($request->id, 12, $request->cantidad, $admin->user_email, 0, $concepto, 'recarga');
	    
		return redirect()->back();
	}
	
	
		public function canje()
	{
	    $canjes = Canje::where('iduser', Auth::user()->ID)->get();
	    return view('wallet.canje',compact('canjes'));  
	}
	
	public function guardar(Request $request){
	    
	    $funciones = new IndexController;
	    
	    $revision = Canje::where('iduser', Auth::user()->ID)->where('status', '0')->first();
	    
	        if($request->cantidad > Auth::user()->puntosPro){
	            $funciones->msjSistema('La cantidad ingresada es mayor a los puntos personales', 'success');
               return redirect()->back();
	        }
	    
	    
	    if($revision == null){
	           $canje = new Canje();
               $canje->iduser = Auth::user()->ID;
               $canje->cantidad = $request->cantidad;
               $canje->total = $request->total;
               $canje->tipo = 0;
               $canje->save();
               
	    }else{
	        $funciones->msjSistema('Para realizar otro canje debe ser aprobado el ultimo canje que realizo', 'success');
               return redirect()->back();
	    }
	    
	    $funciones->msjSistema('Realizado con exito', 'success');
               return redirect()->back();
	}
	
	
	public function lista()
	{   
	    $settings = Settings::first();
	    $canjes = Canje::all();
	    return view('wallet.lista',compact('canjes','settings'));  
	}
	
	public function aceptar($id){
	    
	     $funciones = new IndexController;
	     
	    $canjes = Canje::find($id);
	    $canjes->status = 1;
	    $canjes->save();
	    
	    $user = User::find($canjes->iduser);
	    
	    
	    $user->puntosPro = ($user->puntosPro - $canjes->cantidad);
	    $user->wallet_amount = ($user->wallet_amount + $canjes->total);
	    $user->save();
	    $concepto='Canje de Puntos Personales '.$user->display_name;
	    
	    
	    $punto = Punto::create([
            'iduser' => $canjes->iduser,
            'idcompra' => 15,
            'puntos' => $canjes->cantidad,
            'concepto' => $concepto,
            'usuario' => $user->display_name,
            'cantidad' => $canjes->cantidad,
        ]);
	    
	    $funciones->msjSistema('Aprobado con exito', 'success');
               return redirect()->back();
	}
	
	
	public function cancelar($id){
	    
	    $funciones = new IndexController;
	    
	    $canjes = Canje::find($id);
	    $canjes->status = 2;
	    $canjes->save();
	    
	    $funciones->msjSistema('Cancelado con exito', 'success');
               return redirect()->back();
	}
	
	
	public function valores(Request $request){
	    
	    $funciones = new IndexController;
	    
	    if($request->tipo == 1){
         
         $can = ($request->porcentaje / 100);
	    }else{
	        $can = $request->porcentaje;
	    }
	    
	    DB::table('settings')
            ->where('id', '=', 1)
            ->update([
            'total_canje' => $can,
            ]);
            
        $funciones->msjSistema('Actualizado con exito', 'success');
               return redirect()->back();    
	}
	
	
	//tabla de historial de cortes, liquidaciones
	public function cortes(){
	    
	    view()->share('title', 'Historial de Cortes');
	    
	    $moneda = Monedas::where('principal', 1)->get()->first();
	    $wallets = Wallet::where('iduser', Auth::user()->ID)->where('tipotransacion','!=', '2')->where('tipotransacion','!=', '0')->get();
	    
	    $adicional =0;
		$monedaAdicional = Monedadicional::find(1);
        if (!empty($monedaAdicional)) { 
            $adicional =1;
        }
	    
	    return view('wallet.cortes')->with(compact('wallets', 'moneda','adicional'));
	}



		public function reporcomision(){
	    
	    if(Auth::user()->rol_id == 0){
	        $wallets = Wallet::all();
	         foreach($wallets as $wallet){
	            $comi = Commission::find($wallet->idcomision);
	            $user = User::where('user_email', $comi->referred_email)->first();
	            $purchase  = PurchaseDetail::where('purchase_id', $comi->compra_id)->first();
	            $membresia = DB::table('memberships')->where('id', $purchase->membership_id)->first();
	            $wallet->producto = $membresia->name; 
	            $wallet->precio = $purchase->amount;
 	            $wallet->correo = $comi->referred_email;
	            $wallet->comprador = ($user == null) ? 'N/A' : $user->display_name;
	         }
	    }else{
	        
	      $wallets = Wallet::where('iduser', Auth::user()->ID)->get();
	        foreach($wallets as $wallet){
	            $comi = Commission::find($wallet->idcomision);
	            $user = User::where('user_email', $comi->referred_email)->first();
	            $purchase  = PurchaseDetail::where('purchase_id', $comi->compra_id)->first();
	            $membresia = DB::table('memberships')->where('id', $purchase->membership_id)->first();
	            $wallet->producto = $membresia->name; 
	            $wallet->precio = $purchase->amount;
	            $wallet->correo = $comi->referred_email;
	            $wallet->comprador = ($user == null) ? 'N/A' : $user->display_name;
	         }
	    }
	    
	    return view('wallet.reporte')->with(compact('wallets'));
	}
	
	
}
