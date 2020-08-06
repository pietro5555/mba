<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
// modelo
use App\Models\User;
use App\Models\Seguridad;
// controlador
use App\Http\Controllers\IndexController;

class SeguridadController extends Controller
{
    
    public function envioseguridad(){
        
        View::share('title', 'Ajustes - Seguridad');
        
        $seguridad = Seguridad::find(1);
        $seguriti = Seguridad::where('id','!=','1')->get();
        
        return view('setting.seguridad.seguridad', compact('seguridad','seguriti')); 
    }
    
    
    public function saveseguridad(Request $datos){
        
         Seguridad::where('id', $datos->id)->update([
           'contenido' => $datos->correo,
         ]);
         
         $funciones = new IndexController;
         $funciones->msjSistema('Actualizado con exito', 'success');
         
         return redirect()->back();
    }
    
    
    public function active($id){
        
        $seguridad = Seguridad::all();
        
        foreach($seguridad as $segu){
            
        $seg = Seguridad::find($segu->id);
        
        if($seg->id == $id){
             $seg->status = 1;
             $seg->save();
           }else{
              $seg->status = 0;
              $seg->save(); 
           }
        
        }
        
        $users = User::all();
        foreach($users as $user){
            $use = User::find($user->ID);
            $use->fechaver = null;
            $use->save();
        }
        
        $funciones = new IndexController;
        $funciones->msjSistema('Activado con exito', 'success');
         
         return redirect()->back();
    }
    
    
    public function desactivado($id){
        
        $seg = Seguridad::find($id);
        
        $seg->status = 0;
        $seg->save(); 
        
        $funciones = new IndexController;
        $funciones->msjSistema('Desactivado con exito', 'success');
         
         return redirect()->back();
        
    }
    
    
    public function editar(Request $request){
        
        if($request->id != 3){
        $seg = Seguridad::find($request->id);
        $seg->tipo = $request->tipo;
        $seg->save();
        }else{
          $seg = Seguridad::find($request->id);
          $seg->tipo = $request->tipo;
          $seg->contenido = $request->contenido;
          $seg->save();  
        }
         $funciones = new IndexController;
         $funciones->msjSistema('Actualizado con exito', 'success');
         
         return redirect()->back();
        
    }
}

