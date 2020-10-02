<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Crypt; 
use DB; 
use Auth; 
use Carbon\Carbon; 
// modelo
use App\Models\User;
use App\Models\Rol; 
use App\Models\Monedas;
use App\Models\Settings;

// controladores
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TransacionesController;

class RedController extends Controller
{
   public function index(){

         view()->share('title', 'Red');
         
         $red = User::where('id', '!=', '1')->get();
         $listado = User::where('id', '!=', '1')->get();

         foreach ($listado as $list) {

            $patrocinador = User::where('ID', $list->referred_id)->first();
            $rol = Rol::where('id', $list->rol_id)->first();
            $directos = User::where('referred_id', $list->ID)->count('ID');

            $list->patrocinador = ($patrocinador == null) ? 'N/A' : $patrocinador->display_name;
            $list->rol_id = $rol->name;
            $list->status = ($list->status == 0) ? 'Inactivo' : 'Activo';
            $list->directos = $directos;
         }
      return view('red.listado', compact('listado','red'));
   }
   

    public function filtrerango(Request $datos){
      
      view()->share('title', 'Red');

      $red = User::where('ID', '!=', '1')->get();
      $listado = User::where('ID', '!=', '1')->where('rol_id', $datos->rango)->get();

      foreach ($listado as $list) {

            $patrocinador = User::where('ID', $list->referred_id)->first();
            $rol = Rol::where('id', $list->rol_id)->first();
            $directos = User::where('referred_id', $list->ID)->count('ID');

            $list->patrocinador = ($patrocinador == null) ? 'N/A' : $patrocinador->display_name;
            $list->rol_id = $rol->name;
            $list->status = ($list->status == 0) ? 'Inactivo' : 'Activo';
            $list->directos = $directos;
         }
      return view('red.listado', compact('listado','red'));
   }

   public function filtrered(Request $datos){
        
        view()->share('title', 'Red');
        
         $red = User::where('id', '!=', '1')->get();
         $listado = User::where('referred_id', '=', $datos->lista)->get();

         foreach ($listado as $list) {

            $patrocinador = User::where('ID', $list->referred_id)->first();
            $rol = Rol::where('id', $list->rol_id)->first();
            $directos = User::where('referred_id', $list->ID)->count('ID');

            $list->patrocinador = ($patrocinador == null) ? 'N/A' : $patrocinador->display_name;
            $list->rol_id = $rol->name;
            $list->status = ($list->status == 0) ? 'Inactivo' : 'Activo';
            $list->directos = $directos;
         }

        return view('red.listado', compact('listado','red'));
   }
   


   public function direct(){
      
      view()->share('title', 'Panel de referidos');

      $funciones = new IndexController;
      $allReferido = $funciones->generarArregloUsuario(Auth::user()->ID);

      $referidosDirectos = User::where('referred_id', '=', Auth::user()->ID)
         ->orderBy('created_at', 'DESC')
         ->get();

      return view('red.directos', compact('referidosDirectos','allReferido'));
   }


   public function filtre(Request $datos){
     
     view()->share('title', 'Panel de referidos');

     $funciones = new IndexController;

     $todos = $funciones->generarArregloUsuario(Auth::user()->ID);
     $referidosDirectos = User::where('referred_id', '=', Auth::user()->ID)
         ->orderBy('created_at', 'DESC')
         ->get();

     if($datos->user != null){
       $allReferido = [];
       foreach ($todos as $todo) {
          if($todo['ID'] == $datos->user){
            $allReferido [] = $todo;
          }
       }
     }elseif($datos->fecha1 != null){
      $allReferido = [];
      $inicio = new Carbon($datos->fecha1);
      $fin = new Carbon($datos->fecha2);
      foreach ($todos as $todo) {
         $fechauser = new Carbon($todo['fecha']);
          if($fechauser->format('ymd') >= $inicio->format('ymd') && $fechauser->format('ymd') <= $fin->format('ymd')){
            $allReferido [] = $todo;
          }
       }
     }elseif($datos->fecha3 != null){

         $allReferido = $funciones->generarArregloUsuario(Auth::user()->ID);

         $referidosDirectos = User::where('referred_id', '=', Auth::user()->ID)
         ->whereDate('created_at', '>=', $datos->fecha3)
         ->whereDate('created_at', '<=', $datos->fecha4)
         ->get();
     }

      return view('red.directos', compact('referidosDirectos','allReferido'));
   }




   public function ContarRed($iduser){
        
        $arreglo=[]; $directos=0; $red=0;
        $funciones = new IndexController;
        $TodosUsuarios = $funciones->generarArregloUsuario($iduser);
        
        foreach($TodosUsuarios as $todo){
            if($todo['nivel'] == 1){
                $directos++;
            }else{
                $red++;
            }
        }
        
        $arreglo=[
        'directos' => $directos,
        'red' => $red,
             ];
             
        return $arreglo;
    }
    
    
    public function EquipoTotal($todos){
        
        $lista = [];
        $trans = new TransacionesController;
        
        foreach($todos as $todo){
            
             $total = $trans->agrupar($todo['ID'], []);
             $patrocinador = User::find($todo['referred']);
             $rol = Rol::find($todo['rol']);
             $contarRed = $this->ContarRed($todo['ID']);
             
             $lista [] = [
            'ID' => $todo['ID'],
            'nombre' =>  $todo['nombre'],
            'email' =>  $todo['email'],
            'nivel' =>  $todo['nivel'],
            'total' => $total['total'],
            'concatenar' => $total['concatenar'],
            'totalmes' => $total['totalmes'],
            'patrocinador' => $patrocinador->display_name,
            'fecha' => date('Y-m-d', strtotime($todo['fecha'])),
            'rol' => $rol->name,
            'directos' =>  $contarRed['directos'],
            'red' => $contarRed['red'],
            ];
        }
        
        return $lista;
    }
    
    
    
    //este en realiada es el grupal
    public function individual(){
        
        
         view()->share('title', 'Volumen Grupal');
        
        $moneda = Monedas::where('principal', 1)->get()->first();
        $settings = Settings::first();
        $funciones = new IndexController;
        $trans = new TransacionesController;
        $compras = []; $grupo =0; $grupoMes=0;
        
        $TodosUsuarios = $funciones->generarArregloUsuario(Auth::user()->ID);
        $equipo = $this->EquipoTotal($TodosUsuarios);
        
            
        if(Auth::user()->rol_id != 0){
            
            $contarRed = $this->ContarRed(Auth::user()->ID);
            $total = $trans->agrupar(Auth::user()->ID, []);
                
            $grupo = ($grupo + $total['total']);
            $grupoMes = ($grupoMes + $total['totalmes']);
                
            
                $compras [] = [
            'ID' => Auth::user()->ID,
            'nombre' =>  Auth::user()->display_name,
            'email' =>  Auth::user()->user_email,
            'nivel' =>  0,
            'total' => $total['total'],
            'concatenar' => $total['concatenar'],
            'directos' => $contarRed['directos'],
            'red' => $contarRed['red'],
            'totalmes' => $total['totalmes'],
             ];
            
        }
        
        
        if (!empty($TodosUsuarios)) {
            foreach($TodosUsuarios as $user){
                
                if($user['nivel'] == 1){
                
                $contarRed = $this->ContarRed($user['ID']);
                $total = $trans->agrupar($user['ID'], []);
                
                $grupo = ($grupo + $total['total']);
                $grupoMes = ($grupoMes + $total['totalmes']);
                
               
                $compras [] = [
            'ID' => $user['ID'],
            'nombre' =>  $user['nombre'],
            'email' =>  $user['email'],
            'nivel' =>  $user['nivel'],
            'total' => $total['total'],
            'concatenar' => $total['concatenar'],
            'directos' => $contarRed['directos'],
            'red' => $contarRed['red'],
            'totalmes' => $total['totalmes'],
            ];
                  
                }
            }
        }
            
            
        return view('red.grupal')->with(compact('compras','moneda','grupo','TodosUsuarios','grupoMes','equipo'));    
    }
    
    
    public function todofecha(Request $datos){
        
        
         view()->share('title', 'Volumen Grupal');   
         $individual = 1;
        
        
        $fechas = [
            'inicio' => $datos->fecha1,
            'fin' => $datos->fecha2,
            ];
        
        $moneda = Monedas::where('principal', 1)->get()->first();
        $settings = Settings::first();
        $funciones = new IndexController;
        $trans = new TransacionesController;
        $compras = []; $grupo =0; $grupoMes=0;
        
        $TodosUsuarios = $funciones->generarArregloUsuario(Auth::user()->ID);
        $equipo = $this->EquipoTotal($TodosUsuarios);
        
        if(Auth::user()->rol_id != 0){
            
            $contarRed = $this->ContarRed(Auth::user()->ID);
            $total = $trans->agrupar(Auth::user()->ID, $fechas);
                
            $grupo = ($grupo + $total['total']);
            $grupoMes = ($grupoMes + $total['totalmes']);
                
            
                $compras [] = [
            'ID' => Auth::user()->ID,
            'nombre' =>  Auth::user()->display_name,
            'email' =>  Auth::user()->user_email,
            'nivel' =>  0,
            'total' => $total['total'],
            'concatenar' => $total['concatenar'],
            'directos' => $contarRed['directos'],
            'red' => $contarRed['red'],
            'totalmes' => $total['totalmes'],
            ];
           
        }
        
        if (!empty($TodosUsuarios)) {
            foreach($TodosUsuarios as $user){ 
                if($user['nivel'] == 1){
                
                $contarRed = $this->ContarRed($user['ID']);
                $total = $trans->agrupar($user['ID'], $fechas);
                
                $grupo = ($grupo + $total['total']);
                $grupoMes = ($grupoMes + $total['totalmes']);
                
                
                $compras [] = [
            'ID' => $user['ID'],
            'nombre' =>  $user['nombre'],
            'email' =>  $user['email'],
            'nivel' =>  $user['nivel'],
            'total' => $total['total'],
            'concatenar' => $total['concatenar'],
            'directos' => $contarRed['directos'],
            'red' => $contarRed['red'],
            'totalmes' => $total['totalmes'],
            ];
                   
                }
            }
        }
        
        return view('red.grupal')->with(compact('compras','moneda','grupo', 'individual','TodosUsuarios','grupoMes','equipo'));
        
    }
    
    
    /*filtro por usuarios*/
     public function filtrouser(Request $datos){
         
         view()->share('title', 'Volumen Grupal');   
         $individual = 1;
        
        $moneda = Monedas::where('principal', 1)->get()->first();
        $settings = Settings::first();
        $funciones = new IndexController;
        $trans = new TransacionesController;
        $compras = []; $grupo =0; $grupoMes=0; $equipo = [];
        
        $TodosUsuarios = $funciones->generarArregloUsuario(Auth::user()->ID);
        
        
        if (!empty($TodosUsuarios)) {
            foreach($TodosUsuarios as $user){
             if($datos->usuario == $user['nombre']){
                
                $contarRed = $this->ContarRed($user['ID']);
                $total = $trans->agrupar($user['ID'], []);
                
                $grupo = ($grupo + $total['total']);
                $grupoMes = ($grupoMes + $total['totalmes']);
                    
                $lista = $funciones->generarArregloUsuario($user['ID']);
                $equipo = $this->EquipoTotal($lista);
                    
                $compras [] = [
            'ID' => $user['ID'],
            'nombre' =>  $user['nombre'],
            'email' =>  $user['email'],
            'nivel' =>  $user['nivel'],
            'total' => $total['total'],
            'concatenar' => $total['concatenar'],
            'directos' => $contarRed['directos'],
            'red' => $contarRed['red'],
            'totalmes' => $total['totalmes'],
            ];
            
                }
            }
        }
        
        return view('red.grupal')->with(compact('compras','moneda','grupo', 'individual','TodosUsuarios','grupoMes','equipo'));
        
    }


}