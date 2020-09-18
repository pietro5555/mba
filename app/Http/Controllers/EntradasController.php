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
// modelo
use App\Models\Rol; 
use App\Models\User;
use App\Models\Entradas;

// llamado a los controlladores
use App\Http\Controllers\IndexController; 

class EntradasController extends Controller
{

	public function index(){

		view()->share('title', 'Entradas');
          
          $entradas = Entradas::all();
		 return view('entradas.entrada', compact('entradas'));  
	}

	public function saveentrada(Request $datos){
      
      $destacada = $this->imagenDestacada($datos);

      Entradas::create([
      	'titulo' => $datos->titulo,
      	'autor' => $datos->autor,
      	'descripcion' => $datos->contenido,
      	'imagen_destacada' => $destacada,
      ]);


      $funciones = new IndexController;
      $funciones->msjSistema('Creado Con exito', 'success');
      return redirect()->back();


	}


	public function imagenDestacada($datos){

        $nombre_imagen = null;
		 if ($datos->file('destacada')) {
            $imagen = $datos->file('destacada');
            $nombre_imagen = 'entrada_'.time().'.'.$imagen->getClientOriginalExtension();
            $path = public_path() .'/uploads/entradas';
            $imagen->move($path,$nombre_imagen);
        }

        return $nombre_imagen;
	}


	public function actualentrada($id){

         view()->share('title', 'Editar Entrada');
          
          $entradas = Entradas::find($id);
		 return view('entradas.actualizar', compact('entradas'));  
	}

	public function editentrada(Request $datos){
        
        $destacada = $this->imagenDestacada($datos);
         
        $entradas = Entradas::find($datos->id);
        $entradas->titulo = $datos->titulo;
        $entradas->autor = $datos->autor;
        $entradas->descripcion = $datos->contenido;
        $entradas->imagen_destacada = ($destacada == null) ? $entradas->imagen_destacada : $destacada;
        $entradas->save();
        

        $funciones = new IndexController;
        $funciones->msjSistema('Actualizado con exito', 'success');
        return redirect('/admin/entradas/entrada');
	}


	public function deletentrada($id){
         
        $archivo = Entradas::find($id);
        $archivo->delete(); 

        $funciones = new IndexController;
        $funciones->msjSistema('Eliminado con exito', 'success');
        return redirect('/admin/entradas/entrada');
	}

}