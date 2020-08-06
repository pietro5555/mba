<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Settings;
use Auth;

class NotificationController extends Controller
{
    public function index(){
        // TITLE
        view()->share('title', 'Notificaciones');

        // DO MENU
       view()->share('do', collect(['name' => 'notificaciones', 'text' => 'Notificaciones']));

       $notificaciones = Notification::where('user_id', '=', Auth::user()->ID)
       						->orderBy('created_at', 'DESC')
       						->get();
        
       return view('dashboard.notifications')->with(compact('notificaciones'));
    }

    public function tienda(){
        if ( session('tienda') == '0'){
            // TITLE
            view()->share('title', 'Redireccionando a la Tienda');

            // DO MENU
            view()->share('do', 
                collect(['name' => 'tienda', 'text' => 'Tienda']));

            if (Auth::user()->clave == null){
                $primeravez = true;
                session(['tienda' => '0']);
            }else{
                $primeravez = false;
                session(['tienda' => '1']);
            }

            return view('redireccion')->with(compact('primeravez', 'estado'));
        }elseif ( session('tienda') == '1'){
            return redirect('https://emprende.network/privado/');
        }
    }

    public function guardar_clave(Request $request){
        $user = User::find(Auth::user()->ID);

        if (Hash::check($request->clave, $user->password)){
            $user->clave = encrypt($request->clave);
            $user->save();

            return redirect('admin/tienda');
        }else{
            return redirect('admin/tienda')->with('msj', 'Contraseña incorrecta. Por favor, intente nuevamente');
        } 
    }

    public function user_records(){
         view()->share('title', 'Listado de Usuarios');

            // DO MENU
        view()->share('do', 
                collect(['name' => 'usuarios', 'text' => 'Listado de Usuarios']));
        $settings = Settings::first();
        $usuarios = DB::table($settings->prefijo_wp.'users')
                        ->orderBy('display_name', 'ASC')
                        ->get();

        return view('admin.userRecords')->with(compact('usuarios'));
    }

    public function user_edit($id){
        // TITLE
        view()->share('title', 'Listado de Usuarios');

        // DO MENU
        view()->share('do', collect(['name' => 'editProfile', 'text' => 'Editar Perfil']));

        $usuario = User::find($id);

        return view('admin.userEdit')->with(compact('usuario'));
    }
}
