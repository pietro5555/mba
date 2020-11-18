<?php

namespace App\Http\Controllers\Notificaciones;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;

// modelo
use Mail;
use Auth; 
use DB; 
use Carbon\Carbon;
use App\Models\User; 
use App\Models\Settings; 
use App\Models\SettingActivacion;
use App\Models\SettingCorreo;
use App\Models\Notification;
// controlador
use App\Http\Controllers\IndexController;

class CorreoController extends Controller
{
    
    function __construct()
	{
		View::share('title', 'Ajustes - Correo');
	}
	
	
	public function correoanex(){
	    
	    $settings = Settings::first();
	    $plantillaC = SettingCorreo::find(8);
	    $plantillaPC = SettingCorreo::find(9);
	    $plantillaL = SettingCorreo::find(10);
	    
	    return view('setting.correo')->with(compact('settings','plantillaC','plantillaPC','plantillaL'));
	}
	
	
	
	public function saveplantilla(Request $datos){
	    
	    
	    if($datos->idplantilla == 8){
	        
	        SettingCorreo::where('id', $datos->idplantilla)->update([
				'titulo' => $datos->titulo,
				'contenido' => $datos->correo2
			]);
	    }elseif($datos->idplantilla == 9){
	        SettingCorreo::where('id', $datos->idplantilla)->update([
				'titulo' => $datos->titulo,
				'contenido' => $datos->correo3
			]);
	    }elseif($datos->idplantilla == 10){
	        SettingCorreo::where('id', $datos->idplantilla)->update([
				'titulo' => $datos->titulo,
				'contenido' => $datos->correo4
			]);
	    }
			
		$funciones = new IndexController;
		$funciones->msjSistema('Nueva configuracion de Correos', 'success');
		return redirect()->back();
	}
    
    
    public function Notificar($iduser, $tipo, $ruta, $icon, $label){
        
     $notifica = new Notification();
     $notifica->user_id = $iduser;
     $notifica->date = Carbon::now();
     $notifica->route = $ruta;
     $notifica->description = $tipo;
     $notifica->icon = $icon;
     $notifica->label = $label;
     $notifica->status = '0';
     $notifica->save();
          
    }
    
    
    public function eliminarNotificacion($iduser, $tipo){
        
        $notificaciones = Notification::where('user_id', $iduser)->where('label', $tipo)->get();
        foreach($notificaciones as $notificacion){
            
            $noti = Notification::find($notificacion->id);
            $noti->status = 1;
            $noti->save();
        }
    }
    
}