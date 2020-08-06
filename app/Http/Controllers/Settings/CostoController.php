<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Settings;
use App\Models\Departamento;
use App\Models\Capital;
use App\Models\Monedas;
// controlador
use App\Http\Controllers\IndexController;

class CostoController extends Controller
{
    
    public function departamento(){
        
        View::share('title', 'Ajustes - Costos de Envio');
        
        $departamentos = Departamento::all();
        $capitales = Capital::all();
        $moneda = Monedas::where('principal', 1)->get()->first();
        
        return view('setting.costo',compact('departamentos','capitales','moneda'));
    }
    
    public function savecosto(Request $request){
        
        Departamento::create([
            'nombre' => $request->nombre,
            ]);
            
               $funciones = new IndexController;
               $funciones->msjSistema('Creado Con exito', 'success');
               return redirect()->back();        
    }
    
    public function savecapital(Request $request){
        
        Capital::create([
            'nombre' => $request->nombre,
            'departa' => $request->depart,
            'costo' => $request->costo,
            ]);
            
               $funciones = new IndexController;
               $funciones->msjSistema('Creado Con exito', 'success');
               return redirect()->back();   
    }
    
    
    public function editcapital(Request $datos){
        
        $capital = Capital::find($datos->id);
        
        $capital->nombre = $datos->nombre;
        $capital->departa = $datos->depart;
        $capital->costo = $datos->costo;
        $capital->save();
        
        
               $funciones = new IndexController;
               $funciones->msjSistema('Editado Con exito', 'success');
               return redirect()->back();
    }
    
    public function editdepart(Request $datos){
        
        $capital = Departamento::find($datos->id);
        
        $capital->nombre = $datos->nombre;
        $capital->save();
        
        $funciones = new IndexController;
        $funciones->msjSistema('Editado Con exito', 'success');
        return redirect()->back();
    }
    
    public function eliminarcapital($id){
        
        $capital = Capital::find($id);
        $capital->delete();
        
        $funciones = new IndexController;
        $funciones->msjSistema('Eliminado Con exito', 'success');
        return redirect()->back();
    }
    
    public function eliminardepart($id){
        
        $departamento = Departamento::find($id);
        Capital::where('departa', $departamento->id)->delete();
        $departamento->delete();
        
        $funciones = new IndexController;
        $funciones->msjSistema('Eliminado Con exito', 'success');
        return redirect()->back();
    }
}