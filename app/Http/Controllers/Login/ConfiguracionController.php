<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Noticias;
use App\Models\Wallet;
use App\Models\Monedas;
use App\Models\Settings; 
use App\Models\Componentenoticias;
use App\Models\Componentetransf;
use App\Models\Componentestransferencias;
use DB;
use Auth;
use Hash;
use Exception;
use Carbon\Carbon;

// llamado a los controlladores
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Login\TransferenciasControllers;

class ConfiguracionController extends Controller
{
    
     public function __construct()
    {
        
        // TITLE
		view()->share('title', 'Transferencia Comision');
		Carbon::setLocale('es');
    }
    
    
    	public function wallet(){
	    
	     // TITLE
		view()->share('title', 'Wallet');
		
	    $valor = Componentetransf::find(1);
	    
	    return view('inicio.wallet',compact('valor'));
	}
	
	public function cambio(Request $request){
	    
	    $funciones = new IndexController;
	    
	    DB::table('componentestransf')
                    ->where('id', '=', 1)
                    ->update([
                            'valor_conversion' => $request['valor'],
                            ]);
                            
        $funciones->msjSistema('Modificado con Exito', 'success');
            return redirect()->back();                    
	}
	//fin wallet
	
	
	//feet
	public function feet(){
	    
	    // TITLE
		view()->share('title', 'Transferecia Comision');
		
	    $comision = Componentetransf::find(1);
	    
	    
	    return view('inicio.feet',compact('comision'));
	}
	
	
	public function comision(Request $request){
	    
	    $funciones = new IndexController;
	    
	    $comision = Componentetransf::find(1);
	    if($request->tipotransferencia == 0){
	     $comision->tipotransferencia = $request->tipotransferencia; 
         $comision->comisiontransf = $request->valor;	        
	    }else{
	     $comision->tipotransferencia = $request->tipotransferencia; 
         $comision->comisiontransf = ($request->valor/100);
	    }
	    $comision->save();
       
       $funciones->msjSistema('Modificado con Exito', 'success');
            return redirect()->back(); 
	}
	//fin feet
	
	public function recarga(){
	    
	    	view()->share('title', 'Recarga Wallet');
	    	
	    $recarga = User::where('rol_id','!=','0')->get();
	    
	    return view('inicio.recarga', compact('recarga')); 
	}
	
		public function saverecarga(Request $request){
		    
		$mkt = Settings::find(1);    
	    $user = User::find($request->id);
	    
	    $concepto ='Recarga de Wallet del usuario '.$user->display_name;
	    
	    $funciones = new TransferenciasController;
	    
	    $user->billetera = ($user->billetera + $request->recarga);
	    $user->save();
	    
	    $datosDestino = [
						   'iduser' => $user->ID,
    	                   'usuario' => $user->display_name,
    	                   'descripcion' => $concepto,
    	                   'descuento' => 0,
    	                   'debito' => $request->recarga,
    	                   'credito' => 0,
						   'balance' => $user->billetera,
						   'tipotransacion' => 1,
    	               ];
    	               
    	   $funciones->saveWallet($datosDestino);
    	               
	    
	    $index = new IndexController;
		$index->msjSistema('Recargado con exito', 'success');
		return redirect()->back();
	}
	
	public function save_recarga_todos(Request $request){
	   
	   $funciones = new TransferenciaController;
	   
	    $usuarios = User::where('rol_id','!=','0')->get();
	    foreach($usuarios as $usuario){
	        $user = User::find($usuario->ID);
	        
	        $concepto ='Recarga de Wallet del usuario '.$user->display_name;
	    
	    $user->billetera = ($user->billetera + $request->recarga);
	    $user->save();
	    
	    
	    $datosDestino = [
						   'iduser' => $user->ID,
    	                   'usuario' => $user->display_name,
    	                   'descripcion' => $concepto,
    	                   'descuento' => 0,
    	                   'debito' => $request->recarga,
    	                   'credito' => 0,
						   'balance' => $user->billetera,
						   'tipotransacion' => 1,
    	               ];
    	               
    	   $funciones->saveWallet($datosDestino);
	    
	    }
	    
	    $index = new IndexController;
		$index->msjSistema('Recargado con exito', 'success');
		return redirect()->back();
	}
	
	
	//limitar acceso 
	public function limitar(){
	    
	    	view()->share('title', 'Limitar Accesos');
	    
	     $moneda = Monedas::where('principal', 1)->get()->first();
	    $users = User::where('rol_id','!=','0')->get();
	    return view('inicio.limitar',compact('users','moneda'));
	}
	
	
	public function acceso($id){
	    
	    $funciones = new IndexController;
	    
	    $user = User::find($id);
	    if($user->limitar == 1){
	        $user->limitar = 0;
	    }else{
	         $user->limitar = 1;
	    }
	    $user->save();
	    
	    $funciones->msjSistema('Modificado con exito', 'success');
	       return redirect()->back();
	}
	
	
	public function limitartodos(){
	    
	    $funciones = new IndexController;
	    
	    $users = User::where('rol_id','!=','0')->where('limitar','1')->get();
	    foreach($users as $user){
	        
	        $usuario = User::find($user->ID);
	        
	        $usuario->limitar = 0;
	        $usuario->save();
	    }
	    
	    $funciones->msjSistema('Modificado con exito', 'success');
	       return redirect()->back();
	}
}