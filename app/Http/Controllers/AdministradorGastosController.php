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
use App\Models\Settings;
use App\Models\Monedas;

use App\Models\Administradorlista;
use App\Models\Administradorgastos; 

// controladores
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ComisionesController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\BinarioController;

class AdministradorGastosController extends Controller
{
    
    public function administrador(){
        
        view()->share('title', 'Control de Gastos');
        
        $moneda = Monedas::where('principal', 1)->get()->first();
        
        $lista = Administradorlista::all();
        $gasto = Administradorgastos::all();
        
        return view('setting.administradorgastos', compact('lista','gasto','moneda'));  

    }
    
    
    public function crearlista(Request $request){
        
        Administradorlista::create([
            'nombre' => $request->nombre,
            'tipo' => $request->tipo,
        ]);
        
        $funciones = new IndexController;
        $funciones->msjSistema('Creado con éxito', 'success');
       return redirect()->back();
    }
    
    
    public function creargasto(Request $request){
        
        Administradorgastos::create([
            'cantidad' => $request->saldo,
            'descripcion' => $request->contenido,
            'date' => $request->date,
            'tipo' => $request->tipo,
            'nombre' => ($request->tipo == 1) ? $request->ingresos : $request->gastos,
        ]);
        
        
        $funciones = new IndexController;
        $funciones->msjSistema('Creado con éxito', 'success');
       return redirect()->back();
    }
    
    
    public function editarAdmin(Request $request){
     
     Administradorgastos::where('id', $request->id)->update([
         'nombre' => ($request->ingresos == null) ? $request->gastos : $request->ingresos,
         'cantidad' => $request->cantidad,
         'descripcion' => $request->contenido,
         'date' => $request->fecha,
         ]);
         
         $funciones = new IndexController;
        $funciones->msjSistema('Actualizado con exito', 'success');
       return redirect()->back();
    }
    
    
    public function eliminargasto(Request $request){
     
         $eliminar = Administradorgastos::find($request->ID);
         $eliminar->delete();
         
         $funciones = new IndexController;
         $funciones->msjSistema('Eliminado con exito', 'success');
         return redirect()->back();
    }
    
    
    public function consulta($inicio, $fin, $tipo){
        
        $consulta = Administradorgastos::whereDate('date', '>=', $inicio)->whereDate('date','<=', $fin)->where('tipo', $tipo)->get();
        
        return json_encode($consulta);
    }
    
    
    public function consulta_top($inicio, $fin){
        
        $consulta = Administradorgastos::whereDate('date', '>=', $inicio)->whereDate('date','<=', $fin)->get();
        
        return json_encode($consulta);
    }
    
    
    
}