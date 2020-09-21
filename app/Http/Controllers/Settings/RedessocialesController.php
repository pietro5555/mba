<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;

// modelo
use Carbon\Carbon;
use DB;
use App\Models\Settings;
use App\Models\Redesociales;
// controlador
use App\Http\Controllers\IndexController;

class RedessocialesController extends Controller
{
    
    public function red(){
        
        View::share('title', 'Ajustes - Redes Sociales');
        
        $redes = Redesociales::all();
        return view('setting.redes.red')->with(compact('redes'));
    }
    
    public function savered(Request $datos){
        
        $funciones = new IndexController;
        
        for ($i=1; $i < ($datos->cantidad + 1); $i++) {
        
        $requisitos = $this->requisitos($datos, $i);
        
        Redesociales::create([
          'link' => $datos['link'.$i],
          'tipo' => $requisitos['tipo'],
          'imagen' => ($requisitos['imagen'] != null) ? $requisitos['imagen'] : $requisitos['gly'],
          'color' => $datos['color'.$i],
          'nombre' => $datos['nombre'.$i],
        ]);
        
        }
        
        $funciones->msjSistema('Redes Sociales Agregadas con exito', 'success');
        return redirect()->back();    
    }
    
    
    public function requisitos($datos, $i){
        
        $tipo ='1'; $name=null;
        if (!empty($datos->file('imagen'.$i))) {
          if ($datos->file('imagen'.$i)) {
            $file = $datos->file('imagen'.$i);
            $name = 'redes_'. time(). '.'.$file->getClientOriginalExtension();
            $path = public_path() . '/redes';
            $file->move($path, $name);
            $tipo ='2';
            }
        }
               
        $required = [
            'tipo' => $tipo,
            'imagen' => $name,
            'gly' => $datos['icono'.$i],
                ];
                
        return $required;        
    }
    
    
    public function editar(Request $datos){
        
        $funciones = new IndexController;
        $requisitos = $this->requisitos($datos, 1);
        
        Redesociales::where('id', $datos->id)->update([
          'link' => $datos['link'],
          'tipo' => $requisitos['tipo'],
          'imagen' => ($requisitos['imagen'] != null) ? $requisitos['imagen'] : $requisitos['gly'],
          'color' => $datos['color'],
          'nombre' => $datos['nombre'],
        ]);
        
         $funciones->msjSistema('Redes Sociales Agregadas con exito', 'success');
         return redirect()->back();    
    }
    
    
    public function eliminar($id){
        
        $funciones = new IndexController;
        $redes = Redesociales::find($id);
        $redes->delete();
        
        $funciones->msjSistema('Eliminado con exito', 'success');
        return redirect()->back();
    }
}