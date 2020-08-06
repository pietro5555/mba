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
use App\Models\Componentenoticias;
use App\Models\Componentetransf;
use App\Models\Componentestransferencias;
use Carbon\Carbon;

// llamado a los controlladores
use App\Http\Controllers\IndexController;

class LoginController extends Controller
{
     public function __construct()
    {
        // TITLE
		view()->share('title', 'Login');
    }
    
    public function nuevologin(){
        
        return view('inicio.log');
    }
    
    public function envio(Request $request){
        
        $funciones = new IndexController;
        $settings = Settings::first();
        
   if (Auth::attempt(['user_email' => $request->email, 'password' => $request->password])) {
        
    if($settings->limitar == 0){  
        
        return redirect()->back()->with('msj', 'Lo sentimos esta opción no se encuentra habilitada para mas informacion comuniquese con el administrador');
        
    }elseif(Auth::user()->limitar == 0){
        
            Auth::logout();
            
            return redirect()->back()->with('msj', 'No tiene Acceso a esta opción');
        }
        
            return redirect('/inicio/inicio');
        }else{
            
            return redirect()->back()->with('msj', 'Las Credenciales no coinciden con nuestros registros');
        }
      
    }
    
    
    public function cerrar()
	{
	     Auth::logout();
	     return redirect('/aut/log');

	}
    
    
}