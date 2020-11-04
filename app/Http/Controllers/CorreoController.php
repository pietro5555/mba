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
use Mail; 

// llamado a los modelos
use App\Models\Rol;
use App\Models\User; 
use App\Models\Monedas;
use App\Models\Wallet; 
use App\Models\Settings; 
use App\Models\Commission; 
use App\Models\Prospeccion; 

// llamado a los controlladores
use App\Http\Controllers\IndexController;

class CorreoController extends Controller
{
	function __construct()
	{
        // TITLE
		view()->share('title', 'Envio de Correos');
	}
	
	
	public function firmado(Request $request){
	    
	    $funciones = new IndexController;
	    
	     DB::table('settings')
           ->where('id', '=', '1')
           ->update([
                    'firma' => $request->fir,
                    ]);
                    
        $funciones->msjSistema('Firma agregada con exito', 'success');
            return redirect()->back();            
	}
	
	public function vista(){
	    
	    $funciones = new IndexController;
	    $firma ='';
	    
	    $seting = Settings::find(1);
	   if (!empty($seting->firma)) {
	       $firma = $seting->firma;
	   }
	    
	    if(Auth::user()->rol_id == 0){
	    $personales = $funciones->generarArregloAdmin(Auth::user()->ID);
	    }else{
	        $personales = $funciones->generarArregloUsuario(Auth::user()->ID);
	    }
	    
	    $modal = 0;
	    $correoprospecto = 0;
	  
	    return view('correo.email', compact('personales', 'firma','modal','correoprospecto'));
	}
	
	
    public function subir(Request $request){
	    
	    $validatedData = $request->validate([
        'asunto' => 'required',
        'contenido' => 'required',
        'detalles' => 'required',
       ]);
       
        $funciones = new IndexController;
       
        $seting = Settings::find(1);
       
       $details = $this->detalles($request);
       $this->datos($request, $details);
       
      
	    $funciones->msjSistema('Correos Enviados con exito', 'success');
            return redirect()->back();
	}
	
	// obtenemos los usuarios a los que se les envia el correo
	public function detalles($request){
	    
	    $funciones = new IndexController;
	    $fechaActual = Carbon::now();
	    $mes = date('m', strtotime($fechaActual));
	    $year = date('Y', strtotime($fechaActual));

	    if($request['detalles'] == 1){
	      $lista = User::where('rol_id', '!=', '0')->get(); 
	    }elseif($request['detalles'] == 2){
	      $lista = User::where('status', '=', '1')->get();   
	    }elseif($request['detalles'] == 3){
	      $lista = User::where('status', '=', '0')->get();    
	    }elseif($request['detalles'] == 4){
	      $lista = User::where('status', '=', '0')->whereMonth('created_at', $mes)->whereYear('created_at', $year)->get();     
	    }elseif($request['detalles'] == 5){
	      $lista = User::where('ID', '=', $request['personal'])->get();  
	    }
	    
	    
	    return $lista;
	    
	}
	
	/*
	public function correoprospeccion($id){
	    
	    
	    $prospecto = Prospeccion::find($id);
	    $funciones = new IndexController;
	    $firma ='';
	    
	    $seting = Settings::find(1);
	   if (!empty($seting->firma)) {
	       $firma = $seting->firma;
	   }
	    
	    if(Auth::user()->rol_id == 0){
	    $personales = $funciones->generarArregloAdmin(Auth::user()->ID);
	    }else{
	        $personales = $funciones->generarArregloUsuario(Auth::user()->ID);
	    }
	    
	    $modal = $prospecto->id;
        $correoprospecto = $prospecto->user_email;
        
        return view('correo.email', compact('personales', 'firma','modal','correoprospecto'));
	}
	
	
	public function envioprospecto(Request $request){
	    
	    $funciones = new IndexController;
	    $prospecto = Prospeccion::find($request->id);
	   
	    
	    $envio = [];
	    
	     array_push($envio, [
             'email' => $prospecto->user_email,
	        'nombre' => ''.$prospecto->firstname.' '.$prospecto->lastname,
            'referred' => $prospecto->referred_id,
                ]); 
                
	    
	    $this->datos($request, $envio);
	    
	    $funciones->msjSistema('Enviado con exito', 'success');
	    
	   return redirect('admin/correo/email');
	}
	*/
	
	//enviamos los correos a los usuarios
	public function datos($request, $usuarios){
	    
	    $direccion=''; $mensaje=''; $titulo=''; $user=''; $firma = null;
	    
	    $user= Auth::user()->display_name;
	    $titulo = $request['asunto'];
	    
	   
	    foreach($usuarios as $usuario){
	        $direccion = $usuario->user_email;
	        
            $mensaje = str_replace('@correo', ' '.$usuario->user_email.' ', $request['contenido']);
            $mensaje = str_replace('@usuario', ' '.$usuario->display_name.' ', $mensaje);
            $mensaje = str_replace('@idpatrocinio', ' '.$usuario->referred_id.' ', $mensaje);
	        Mail::send('correo.enviar',  ['data' => $mensaje], function($msj) use ($mensaje, $direccion, $titulo, $user){
            $msj->subject($titulo);
            $msj->to($direccion);
          });
	       }
	}
}