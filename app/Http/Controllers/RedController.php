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

// controladores
use App\Http\Controllers\IndexController;

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

}