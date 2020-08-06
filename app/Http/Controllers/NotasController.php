<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Auth; 
use DB; 
use Mail; 
use Carbon\Carbon; 

// llamado a los modelos
use App\Models\Rol;
use App\Models\User; 
use App\Models\Prospeccion; 
use App\Models\Settings; 
use App\Models\SettingsEstructura;
use App\Models\SettingCliente;
use App\Models\SettingCorreo;
use App\Models\Notas;

// llamado a los controlladores
use App\Http\Controllers\IndexController;


class NotasController extends Controller
{
	function __construct()
	{
        // TITLE
		view()->share('title', 'Notas');
	}

    
    public function inicio()
    {
        
        
        $notas = Notas::where('iduser', Auth::user()->ID)->get();
        
        return view('notas.notas')->with(compact('notas'));
        
    }
    
    
    public function guardar(Request $data){
        
        $funciones = new IndexController;
        
        Notas::create([
            'iduser' => Auth::user()->ID,
            'titulo' => $data['titulo'],
            'contenido' => $data['contenido'],
            'inicio' => $data['inicio'],
            'fin' => $data['fin'],
        ]);
        
        $funciones->msjSistema('Agregado con exito', 'success');
            return redirect()->back();
    }
    
    
    
   public function eliminar($id){
       
       $funciones = new IndexController;
       $notas = Notas::find($id);
       $notas->delete();
       
        $funciones->msjSistema('Eliminado con exito', 'success');
            return redirect()->back();
   }
   
   
   public function editar(Request $data){
       
       $funciones = new IndexController;
       
       $notas = Notas::where('id', $data->id)->update([
            'titulo' => $data['titulo'],
            'contenido' => $data['contenido'],
            'inicio' => $data['inicio'],
            'fin' => $data['fin'],
        ]);
        
        
        $funciones->msjSistema('Actualizado con exito', 'success');
            return redirect()->back();
        
   }
    
}
        