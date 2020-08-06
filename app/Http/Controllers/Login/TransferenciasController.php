<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use Auth;
use Hash;
use App\Models\Settings;
use App\Models\Monedas;
use App\Models\Componentenoticias;
use App\Models\Componentetransf;
use App\Models\Componentestransferencias;
use Carbon\Carbon;

// llamado a los controlladores
use App\Http\Controllers\IndexController;

class TransferenciasController extends Controller
{
    
     public function __construct()
    {
        // TITLE
		view()->share('title', 'Historial de Transferencias');
    }
    
    
    public function historial(){
	    
	    $comision = Componentetransf::find(1);
	    
	    $moneda = Monedas::where('principal', 1)->get()->first();
	    
	    $transferencias = Componentestransferencias::where('iduser', Auth::user()->ID)->where('tipotransacion', '0')->get();
	    
	    return view('inicio.historial',compact('transferencias','moneda','comision'));
	}
	
	
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
    	               $userOrigen->billetera = ($userOrigen->billetera - $datos['monto']);
    	               $userDestino->billetera = ($userDestino->billetera + $resta);
    	               $userOrigen->save();
    	               $userDestino->save();
    	               $datosOrigen = [
						   'iduser' => $userOrigen->ID,
    	                   'usuario' => $userOrigen->display_name,
    	                   'descripcion' => 'Transferencia enviada a '.$userDestino->display_name,
    	                   'descuento' => ($datos->tipo != 1) ? ($datos['monto'] - $resta) : $resta,
    	                   'debito' => 0,
    	                   'credito' => $datos['monto'],
						   'balance' => $userOrigen->billetera,
						   'tipotransacion' => 0
    	               ];
    	               $datosDestino = [
						   'iduser' => $userDestino->ID,
    	                   'usuario' => $userDestino->display_name,
    	                   'descripcion' => 'Transferencia recibida de '.$userOrigen->display_name,
    	                   'descuento' => 0,
    	                   'debito' => $resta,
    	                   'credito' => 0,
						   'balance' => $userDestino->billetera,
						   'tipotransacion' => 0
    	               ];
    	               $this->saveWallet($datosOrigen);
    	               $this->saveWallet($datosDestino);
    	               $funciones->msjSistema('Transferencia enviada con Exito', 'success');
    	               return redirect()->back();
	               }else{
						$funciones->msjSistema('El monto a transferir no puede superar el monto disponible', 'warning');
	                   	return redirect()->back();
	               }
	           }else{
					$funciones->msjSistema('El monto a transferir no puede ser negativo', 'warning');
	               	return redirect()->back();
	           }
	       }
	   }else{
	       return redirect()->back();
	   }
	}
	
	
	/**
	 * Guarda la informacion o los registro del la billetera
	 * 
	 * @access public
	 * @param array $datos - arreglo con los datos necesarios
	 */
	public function saveWallet($datos){
	    
	   Componentestransferencias::create([
		   'iduser' => $datos['iduser'],
	       'usuario' => $datos['usuario'],
	       'descripcion' => $datos['descripcion'],
	       'descuento' => $datos['descuento'],
	       'debito' => $datos['debito'],
	       'credito' => $datos['credito'],
		   'balance' => $datos['balance'],
		   'tipotransacion' => $datos['tipotransacion'],
	   ]);
	}
    
}