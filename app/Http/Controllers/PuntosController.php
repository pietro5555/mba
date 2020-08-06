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

// llamado a los modelos
use App\Models\Rol;
use App\Models\User; 
use App\Models\Ticket;
use App\Models\Monedas;
use App\Models\Permiso; 
use App\Models\Punto; 
use App\Models\Puntosbono;
use App\Models\Settings; 
use App\Models\Commission; 
use App\Models\Bonoinicio;
use App\Models\SettingsComision; 
use App\Models\SettingsEstructura;

// llamado a los controlladores
use App\Http\Controllers\IndexController;


class PuntosController extends Controller
{
	function __construct()
	{
        // TITLE
		view()->share('title', 'Puntos');
	}
	
	public function puntos(){
	    
	     $datos = [];
	     $informacion = new IndexController;
	     
	    if(Auth::user()->rol_id != 0){
	       $todos =   $informacion->generarArregloUsuario(Auth::user()->ID);
	    }else{
	      $todos =   $informacion->generarArregloAdmin(Auth::user()->ID);  
	    }
	       foreach($todos as $todo){
	         
	        $puntos = Punto::where('iduser', $todo['ID'])->get();
	        
	        foreach($puntos as $punto){
	        array_push($datos, [
	        'id' => $punto->id,
            'iduser' => $punto->iduser,
            'usuario' => $punto->usuario,
            'concepto' => $punto->concepto,
            'puntos' => $punto->puntos,
            'cantidad' => $punto->cantidad,
          ]);
          
	       }
	    }
	       
	        return view('puntos.puntos')->with(compact('datos'));
	    
	}
	
	public function filtro_fechas(Request $request){
	    
	    $datos = [];
	    $informacion = new IndexController;
	    
	       if(Auth::user()->rol_id != 0){ 
	       $todos =   $informacion->generarArregloUsuario(Auth::user()->ID);
	       }else{
	       $todos =   $informacion->generarArregloAdmin(Auth::user()->ID);    
	       }
	       
	       foreach($todos as $todo){
	         
	        $puntos = Punto::where('iduser', $todo['ID'])
	        ->whereDate("created_at",">=",$request->fecha1)
            ->whereDate("created_at","<=",$request->fecha2)
            ->get();
	        
	        foreach($puntos as $punto){
	            
	        array_push($datos, [
	            'id' => $punto->id,
            'iduser' => $punto->iduser,
            'usuario' => $punto->usuario,
            'concepto' => $punto->concepto,
            'puntos' => $punto->puntos,
            'cantidad' => $punto->cantidad,
          ]);
          
	        }
	       }
	    
	    return view('puntos.puntos')->with(compact('datos'));
	}
	
	public function nombre_usuario(Request $request){
	    
	    $datos = [];
	    $nombre ='';
	    $informacion = new IndexController;
	    
	     if(Auth::user()->rol_id != 0){
	       $todos = $informacion->generarArregloUsuario(Auth::user()->ID);
	     }else{
	       $todos = $informacion->generarArregloAdmin(Auth::user()->ID);  
	     }
	     
	       foreach($todos as $todo){
	           if($request->nombre == $todo['nombre']){
	               $nombre = $todo['ID'];
	           }
	       }
	         
	        $puntos = Punto::where('iduser', $nombre)->get();
	        
	        foreach($puntos as $punto){
	           
	        array_push($datos, [
	        'id' => $punto->id,
            'iduser' => $punto->iduser,
            'usuario' => $punto->usuario,
            'concepto' => $punto->concepto,
            'puntos' => $punto->puntos,
            'cantidad' => $punto->cantidad,
          ]);

	        }
	        
	   
	   return view('puntos.puntos')->with(compact('datos'));
	}
	
	public function mis_puntos(){
	    $puntos = Punto::where('iduser', Auth::user()->ID)->get();
	    
	    return view('puntos.mis_puntos')->with(compact('puntos'));
	}
    
    //puntos que se almacenan
	public function puntosAlmacen($datos){
	    
	    if($datos['iduser'] != 0){
	   $user = User::find($datos['iduser']);
	    
	   Puntosbono::create([
		   'iduser' => $datos['iduser'],
	       'usuario' => $datos['usuario'],
	       'concepto' => $datos['concepto'],
	       'puntos' => $datos['puntos'],
		   'balance' => 0,
		   'tipo' => '2',
		   'lado' => $datos['lado']
	   ]);
	   
	   $this->puntosdescontar($datos);
	    }
	}
	
	//puntos que se pueden descontar
	public function puntosdescontar($datos){
	    if($datos['iduser'] != 0){
	   $user = User::find($datos['iduser']);
	    
	   Puntosbono::create([
		   'iduser' => $datos['iduser'],
	       'usuario' => $datos['usuario'],
	       'concepto' => $datos['concepto'],
	       'puntos' => $datos['puntos'],
		   'balance' => 0,
		   'tipo' => '1',
		   'lado' => $datos['lado']
	   ]);
	   
	   
	    }
	}
	
	
	
	//puntos que se agregan dependiendo el lado
	public function ladoDI($datos){
	    
	    if($datos['iduser'] != 0){
	   $user = User::find($datos['iduser']);
	   if($user->rol_id != 0){
	   if($datos['lado'] == 'D'){
	       $user->puntosDer =($user->puntosDer + $datos['puntos']);
	        $user->debiDer =($user->debiDer + $datos['puntos']);
            $user->save();
	   }else{
	       $user->puntosIzq =($user->puntosIzq + $datos['puntos']);
	       $user->debiIzq =($user->debiIzq + $datos['puntos']);
            $user->save();
	       }
	     }
	   }
	}
	
	
	
	// puntos que se debitaran
	public function debitarPuntos($iduser, $lado, $puntos){
        
        $user = User::find($iduser);
        $la=0; $contrario=0;
        if($lado == 'D'){
            $la=  'Puntos debitados del lado Derecho';
            $equivale=  'Puntos debitados por equivalencia del lado Izquierdo';
            $contrario= 'I';
        }else{
            $la= 'Puntos debitados del lado Izquierdo';
            $equivale=  'Puntos debitados por equivalencia del lado Derecho';
            $contrario= 'D';
        }
        
        $datos = [
            'iduser' => $iduser,
	       'usuario' => $user->display_name,
	       'concepto' => $la,
	       'puntos' => $puntos,
	       'lado' => $lado,
            ];
            
        $valores = [
            'iduser' => $iduser,
	       'usuario' => $user->display_name,
	       'concepto' => $equivale,
	       'puntos' => $puntos,
	       'lado' => $contrario,
            ];
            
            
            $this->puntosdebitar($datos);
            $this->puntosdebitar($valores);
    }
    
    //puntos debitados
    public function puntosdebitar($datos){
	    
	    if($datos['iduser'] != 0){
	     $user = User::find($datos['iduser']);
	    if($user->rol_id != 0){
	        if($datos['lado'] == 'D'){
	        $user->debiDer =($user->debiDer - $datos['puntos']);
            $user->save();
	        }else{
	             $user->debiIzq =($user->debiIzq - $datos['puntos']);
            $user->save();
	        }
	   Puntosbono::create([
		   'iduser' => $datos['iduser'],
	       'usuario' => $datos['usuario'],
	       'concepto' => $datos['concepto'],
	       'puntos' => $datos['puntos'],
		   'balance' => 0,
		   'tipo' => '3',
		   'lado' => $datos['lado']
	   ]);
	      }
	    }
	}
	//fin puntos que se debitaran
	
	/*
	*tabla de puntos almacenados por lo general
	* usados para el binario
	*/
	public function almacenados(){
	    
	    view()->share('title', 'Puntos Almacenados');
	    
	    $D=0; $I=0;
	    if(Auth::user()->rol_id == 0){
	        
	        $billetera = Puntosbono::where('tipo', '2')->get();
	    }else{
	        $billetera = Puntosbono::where('iduser', Auth::user()->ID)->where('tipo', '2')->get();
	    }
	    
	    
	    foreach($billetera as $bille){
	        if($bille->lado == 'D'){
			    $D += $bille->puntos;
			}else{
				$I += $bille->puntos;
				 }
	    }
	    
	    return view('puntos.almacenados',compact('billetera','D','I'));
	}
	
	
	
	/*
	* tabla de puntos debitados
	* estos por lo genral son usados
	* en el binario
	*/
		public function debitables(){
	    
	    view()->share('title', 'Puntos debitables');
	    $D=0; $I=0;
	    if(Auth::user()->rol_id == 0){
	        
	        $billetera = Puntosbono::where('tipo','!=', '2')->get();
	    }else{
	        $billetera = Puntosbono::where('iduser', Auth::user()->ID)->where('tipo','!=', '2')->get();
	    }
	    
	    foreach($billetera as $bille){
	        if($bille->lado == 'D'){
			    if($bille->tipo == 1){
				$D += $bille->puntos;
			    }elseif($bille->tipo == 3){
					$D - $bille->puntos;
					 }
			}else{
				if($bille->tipo == 1){
				$I += $bille->puntos;
			    }elseif($bille->tipo == 3){
					$I - $bille->puntos;
					 }
				 }
	    }
	    
	    return view('puntos.debitables',compact('billetera','D','I'));
	}
	
}
