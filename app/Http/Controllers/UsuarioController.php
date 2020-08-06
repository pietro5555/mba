<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
// llamado de modelo
use App\Models\Rol;
use App\Models\User;
use App\Models\Settings;
use App\Models\SettingsEstructura;
use App\Models\SettingsRol;
// llamado de Controlladores
use App\Http\Controllers\IndexController;

class UsuarioController extends Controller
{
    /**
     * lleva a la vista de todos los usuarios 
     * 
     * Esta vista solo la puede ver el admin
     *
     * @return view
     */
    public function index()
    {
        view()->share('title', 'Listado de Usuarios');


        $estructura='';
        $funciones = new IndexController;
        $settingEstructura = SettingsEstructura::find(1);
        if(!empty($settingEstructura)){
            if($settingEstructura->tipoestructura == 'binaria'){
        $estructura = $settingEstructura->tipoestructura;
            }
        }
        
        $settings = Settings::first();
        $usuarios = User::all();
        $settingsRol = SettingsRol::first();
        if (empty($settingsRol)) {
            $funciones->msjSistema('Por Favor Configure los rangos primero, en Ajustes Rangos', 'warning');
            return redirect()->back();
        }
        foreach ($usuarios as $llave) {
            
        $nivel = $this->coincidirNivel($llave->ID);    
          if ($llave->ID != 1) {
            $referido = 'Administrador';
            if ($llave->referred_id != 0) {
                $usuario = User::find($llave->referred_id);
                $referido = (!empty($usuario->display_name)) ? $usuario->display_name : 'Usuario no Disponible';
            }
            $usercampo = DB::table('user_campo')->where('ID', '=', $llave->ID)->get()->first();
            $rol = Rol::find($llave->rol_id);
            $llave->nombre_referido = $referido;
            $llave->pais = (!empty($usercampo->pais)) ? $usercampo->pais : '';
            $llave->rol = $rol->name;
            $llave->nivel = $nivel;
          }else{
            $llave->nombre_referido = 'Administrador';
            $llave->pais = 'Administrador';
            $llave->rol = 'Administrador';
            $llave->nivel = $nivel;
          }
        }
        return view('usuario.userRecords')->with(compact('usuarios','estructura'));   
    }
    
    /*
    * buscamos el nivel de cada usuario 
    */
    public function coincidirNivel($id){
        
        $funciones = new IndexController;
        $nivel =0;
        
        $todos = $funciones->generarArregloAdmin(1);
        
        foreach($todos as $todo){
            if($todo['ID'] == $id){
                $nivel = $todo['nivel'];
            }
        }
        
        return $nivel;
        
    }

    /**
     * Lleva a la vista de registros directos
     *
     * @return view
     */
    public function direct_records(){
        // TITLE
        view()->share('title', 'Registros Directos');

        $funciones = new IndexController;
        $estructura='';
        $settingEstructura = SettingsEstructura::find(1);
        if(!empty($settingEstructura)){
            if($settingEstructura->tipoestructura == 'binaria'){
        $estructura = $settingEstructura->tipoestructura;
            }
        }

        if ($funciones->obtenerEstructura() == 'arbol') {
            $referidosDirectos = User::where('referred_id', '=', Auth::user()->ID)
                                ->orderBy('created_at', 'DESC')
                                ->get();
        } else {
            $referidosDirectos = User::where('sponsor_id', '=', Auth::user()->ID)
                                ->orderBy('created_at', 'DESC')
                                ->get();
        }

        return view('usuario.directRecords')->with(compact('referidosDirectos','estructura'));
    }
    
    /**
     * Filtra por fecha a los usuarios directos
     * 
     * Permite filtrar por fecha de ingreso a los usuarios directos
     *
     * @return view
     */
    public function buscardirectos(){
        // TITLE
        view()->share('title', 'Registros Directos');

        $funciones = new IndexController;
        $estructura='';
        $settingEstructura = SettingsEstructura::find(1);
        if(!empty($settingEstructura)){
            if($settingEstructura->tipoestructura == 'binaria'){
        $estructura = $settingEstructura->tipoestructura;
            }
        }

        $primero = $_POST["fecha1"];
        $segundo = $_POST["fecha2"];
         
        if ($funciones->obtenerEstructura() == 'arbol') {
            $referidosDirectos =User::whereDate("created_at",">=",$primero)
             ->whereDate("created_at","<=",$segundo)
             ->where('referred_id', '=', Auth::user()->ID)
             ->orderBy('created_at', 'DESC')
             ->get();
        } else {
            $referidosDirectos =User::whereDate("created_at",">=",$primero)
             ->whereDate("created_at","<=",$segundo)
             ->where('sponsor_id', '=', Auth::user()->ID)
             ->orderBy('created_at', 'DESC')
             ->get();
        }
      
        return view('usuario.directRecords')->with(compact('referidosDirectos','estructura'));
    }
    /**
     * Lleva a la vista que me muestra a todos los usuarios de mi red
     *
     * @return view
     */
    public function network_records(){
        // TITLE
        view()->share('title', 'Registros de Red');    
        $funciones = new IndexController;
        $estructura='';
        $settingEstructura = SettingsEstructura::find(1);
        if(!empty($settingEstructura)){
            if($settingEstructura->tipoestructura == 'binaria'){
        $estructura = $settingEstructura->tipoestructura;
            }
        }
        
        $allReferido = $funciones->generarArregloUsuario(Auth::user()->ID);

        return view('usuario.networkRecords')->with(compact('allReferido','estructura'));
    }
    /**
     * Permite filtrar por fecha a los usuarios de mi red
     *
     * @return view
     */
    public function buscarnetwork(){
        // TITLE
        view()->share('title', 'Registros de Red');

        $funciones = new IndexController;
        $estructura='';
        $settingEstructura = SettingsEstructura::find(1);
        if(!empty($settingEstructura)){
            if($settingEstructura->tipoestructura == 'binaria'){
        $estructura = $settingEstructura->tipoestructura;
            }
        }

        $primero = new Carbon($_POST['fecha1']);
        $segundo = new Carbon($_POST['fecha2']);
         
        $tmpusers = $funciones->generarArregloUsuario(Auth::user()->ID);
        $allReferido = [];
        foreach ($tmpusers as $user) {
            $ingreso = new Carbon($user['fecha']);
            if ($ingreso->format('y-m-d') >= $primero->format('y-m-d') && $ingreso->format('y-m-d') <= $segundo->format('y-m-d')) {
                $allReferido [] = $user;
            }
        }

        return view('usuario.networkRecords')->with(compact('allReferido','estructura'));
    }

    /**
     * Permite Descargar la informacion de la red
     *
     * @return void
     */
    public function exportUsers()
    {
        $settings = Settings::first();
        $nombreArchivo = 'Listado de usuario del sistema '.$settings->name.'_'.Carbon::now();
        $segundaInfo = DB::table('user_campo')->where('ID', 1)->first();
        return Excel::download(new UsersExport, $nombreArchivo.'.xlsx');
    }
}
