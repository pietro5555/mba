<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Crypt; 
use DB; 
use Auth; 
use Hash;
use Carbon\Carbon; 
// modelo
use App\Models\User; 
use App\Models\Paises; 


class LoginController extends Controller
{
    
    /*login del sistema*/
    public function login(){
        
        $paises = Paises::all();
        return view('login.login', compact('paises'));
    }


    public function autenticacion(Request $datos){
      
      if (Auth::attempt(['ID' => $datos->ID, 'password' => $datos->password])) {

           return redirect('/admin');
           
        }else{
            
         return redirect()->back()->with('msj3', 'Las Credenciales no coinciden con nuestros registros');
        }
    }
    
}