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
	   if (!empty($seting->firma)) {
	       $firma = $seting->firma;
	   }else{
	       $funciones->msjSistema('Lo sentimos la firma no esta habilitada', 'warning');
            return redirect()->back();
	   }
       
       $details = $this->detalles($request);
       $this->datos($request, $details);
       
      
	    $funciones->msjSistema('Correos Enviados con exito', 'success');
            return redirect()->back();
	}
	
	// obtenemos los usuarios a los que se les envia el correo
	public function detalles($request){
	    
	    $funciones = new IndexController;
	    $usuarios = [];
	    
	    if(Auth::user()->rol_id == 0){
	        $lista = $funciones->generarArregloAdmin(Auth::user()->ID);
	    }else{
	        $lista = $funciones->generarArregloUsuario(Auth::user()->ID);
	    }
	    
	  foreach($lista as $lis){  
	      
	      $fechaActual = Carbon::now();
	       $fechaActual = date('m', strtotime($fechaActual));
	       $ingreso = date('m', strtotime($lis['fecha']));
	      
	    if($request['detalles'] == 1){
	        
	       array_push($usuarios, [
            'ID' => $lis['ID'],
            'nombre' => $lis['nombre'],
            'email' => $lis['email'],
            'referred' => $lis['referred'],
                ]);
                
	    }elseif($request['detalles'] == 2){
	        if($lis['status'] == 1){
	            
	        array_push($usuarios, [
            'ID' => $lis['ID'],
            'nombre' => $lis['nombre'],
            'email' => $lis['email'],
            'referred' => $lis['referred'],
                ]);
	          }
	        }elseif($request['detalles'] == 3){
	            if($lis['status'] == 0){
	            
	        array_push($usuarios, [
            'ID' => $lis['ID'],
            'nombre' => $lis['nombre'],
            'email' => $lis['email'],
            'referred' => $lis['referred'],
                ]);
	          }
	        }elseif($request['detalles'] == 4){
	            if($fechaActual == $ingreso){
	            
	        array_push($usuarios, [
            'ID' => $lis['ID'],
            'nombre' => $lis['nombre'],
            'email' => $lis['email'],
            'referred' => $lis['referred'],
                ]);
	          }
	        }else{
	            if($request['personal'] == $lis['ID']){
	       array_push($usuarios, [
            'ID' => $lis['ID'],
            'nombre' => $lis['nombre'],
            'email' => $lis['email'],
            'referred' => $lis['referred'],
                ]); 
	            }
	        }
	    }
	    
	    return $usuarios;
	    
	}
	
	
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
	
	//enviamos los correos a los usuarios
	public function datos($request, $usuarios){
	    
	    $direccion=''; $mensaje=''; $titulo=''; $user=''; $firma = null;
	    
	    $user= Auth::user()->display_name;
	    $titulo = $request['asunto'];
	    
	    $seting = Settings::find(1);
	   if (!empty($seting->firma)) {
	       $firma = $seting->firma;
	   }
	    
	   
	    foreach($usuarios as $usuario){
	        $direccion = $usuario['email'];
	        
            $mensaje = str_replace('@correo', ' '.$usuario['email'].' ', $request['contenido']);
            $mensaje = str_replace('@usuario', ' '.$usuario['nombre'].' ', $mensaje);
            $mensaje = str_replace('@idpatrocinio', ' '.$usuario['referred'].' ', $mensaje);
	        Mail::send('correo.enviar',  ['data' => $mensaje, 'firma' => $firma], function($msj) use ($mensaje, $direccion, $titulo, $user){
            $msj->subject($titulo);
            $msj->to($direccion);
          });
	       }
	}
}