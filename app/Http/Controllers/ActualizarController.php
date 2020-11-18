<?php

namespace App\Http\Controllers;
// llamando a las funciones de laravel

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


// llamando a los modelos
use App\Models\Rol;
use App\Models\User;
use App\Models\Streaming\User as UserStreaming;
use App\Models\Seguridad;
use App\Models\Settings;
use App\Models\Notification;
use App\Models\SettingsEstructura;
use App\Models\InsigniaUser;
use App\Models\Insignia;
use App\Models\Note;
use App\Models\Events;
// llamando a los controladores
use App\Http\Controllers\IndexController;
use Modules\ReferralTree\Http\Controllers\ReferralTreeController;

class ActualizarController extends Controller
{
    /**
     * Lleva la vista donde el usuario actualiza su perfil
     *
     * @return void
     */
    public function editProfile(){
        // TITLE
        view()->share('title', 'Editar Perfil');

        $data = $this->infoUsuario(Auth::user()->ID);
        $yo = null;
        $notes = Note::where('user_id', Auth::user()->ID)->with('streaming')->get();
        return view('usuario.userEdit')->with(compact('data','yo', 'notes'));
    }

    /**
     * permite llenar la informacion del usuario en cuestion
     *
     * @param int $id - id de usuario
     * @return void
     */
    public function infoUsuario($id)
    {
        $user = User::find($id);
        $rol = Rol::find($user->rol_id);
        $nombre = '';
        if (!empty($rol)) {
            $nombre = $rol->name;
        }

        $insignia = '';
        $insigniaUser = InsigniaUser::where('status', 1)->take(1)->orderBy('id', 'desc')->first();
        $model_insignia = Insignia::find($insigniaUser->insignia_id);
        if ($model_insignia != null) {
            $insignia = asset($model_insignia->insignia);
        }

        $data = [
            'principal' => $user,
            'segundo' => DB::table('user_campo')->where('ID', $user->ID)->get(),
            'rol' =>  $nombre,
            'insignia' => $insignia,
            'referido' => (Auth::user()->rol_id != 0) ? User::find($user->referred_id) : ['display_name' => 'Administrador'] ,
            'controler' => 'ActualizarController@updateProfile'
        ];

        $data['segundo'] = $data['segundo'][0];

        return $data;
    }

    /**
     * Lleva a la vista donde el admin Actualiza el perfil de un usuario
     *
     * @param int $id
     * @return void
     */
    public function user_edit($id){
        // TITLE
        view()->share('title', 'Editar Perfil');
        $data = $this->infoUsuario($id);
        $yo = null;

        return view('usuario.userEdit')->with(compact('data','yo'));
    }


    /* Enviamos un codigo al usuario para poder
    * editar su perfil
    */
    public function enviocodigo($id){

        $codigo = random_int(100000, 999999);
        $usuario = User::find($id);

        $usuario->codigo = $codigo;
        $usuario->save();

        $plantilla = Seguridad::find(1);

         if (!empty($plantilla->contenido)) {

        $mensaje = str_replace('@nombre', ' '.$usuario->display_name.' ', $plantilla->contenido);
        $mensaje = str_replace('@correo', ' '.$usuario->user_email.' ', $mensaje);
        $mensaje = str_replace('@codigo', ' '.$usuario->codigo.' ', $mensaje);

         Mail::send('emails.codigoPerfil',  ['data' => $mensaje], function($msj) use ($usuario){
          $msj->subject('Confirmacion de Codigo');
          $msj->to($usuario->user_email);
           });
         }


    }


    public function verificarcodigo($id, $codigo){

        $user = User::where('ID', '0')->get();
        $usuario = User::where('ID', $id)->where('codigo', $codigo)->first();

        if($usuario != null){

            $user = User::where('ID', $id)->where('codigo', $codigo)->get();
        }

        return json_encode($user);
    }

    /**
     * Permite Actualizar la informacion de los usuario
     *
     * @param Request $request
     * @return view
     */
    public function updateProfile(Request $request){
        $funciones = new IndexController;
        $settings = Settings::find(1);
        $settingEstructura = SettingsEstructura::find(1);
        $concepto = 'Sección '.$request->data.' Actualizada Exitosamente';
        $user = User::find($request->id);

        if ($request->data == 'general'){

                DB::table('user_campo')
                    ->where('ID', '=', $user->ID)
                    ->update([
                            'firstname' => $request['firstname'],
                            'lastname' => $request['lastname'],
                            'genero' => $request['genero'],
                            'edad' => $request['edad'],
                            'document' => $request['n_document'],
                            'biografia' => $request['biografia']
                            ]);

                $user->display_name = $request['firstname'].' '.$request['lastname'];
                $user->birthdate = $request['edad'];
                $user->gender = $request['genero'];

                if (Auth::user()->rol_id == 0) {
                    $validate2 = $request->validate([
                        'id_position' => 'required',
                        'id_referred' => 'required'
                    ]);

                    if ($validate2) {
                        if ($this->VerificarUser($request['id_position'])) {
                            $funciones->msjSistema('El Usuario con el ID Posicionamiento Suministrado ('.$request['id_position'].') No Se Encuentra Registrado, Pruebe Con Otro', 'warning');
                            return redirect()->back()->withInput();
                        }
                        if ($this->VerificarUser($request['id_referred'])) {
                            $funciones->msjSistema('El Usuario con el ID Referido Suministrado ('.$request['id_referred'].') No Se Encuentra Registrado, Pruebe Con Otro', 'warning');
                            return redirect()->back()->withInput();
                        }
                        if ($settingEstructura->tipoestructura != 'arbol') {
                            if ($user->position_id != $request['id_position']) {
                                $consulta=new ReferralTreeController;
                                $auspiciador = $consulta->getPosition($request['id_position']);
                                if ($auspiciador != $request['id_position']) {
                                    $funciones->msjSistema('El ID Posicionamiento Suministrado ('.$request['id_position'].') Tiene Sus Lugares LLeno, le Recomendamos este ID Posicionamiento ('.$auspiciador.') ', 'warning');
                                    return redirect()->back();
                                }else{
                                    $user->position_id = $auspiciador;
                                }
                            }else{
                                $user->position_id = $request['id_position'];
                            }
                        }else{
                            $user->position_id = $request['id_position'];
                        }
                        $user->referred_id = $request['id_referred'];
                    }
                }
                $user->save();


        }elseif ($request->data == 'contacto'){

                if ($user->user_email != $request->user_email) {
                    $validate2 = $request->validate([
                        'user_email' => 'required|max:100|unique:'.$settings->prefijo_wp.'users|confirmed',
                    ]);
                    if ($validate2) {
                        $user->user_email = $request->user_email;
                    }
                }

                if ($request->clave != null){
                    $user->user_pass = md5($request->clave);
                    $user->password = bcrypt($request->clave);
                    $user->clave = encrypt($request->clave);
                }

                $user->save();

                DB::table('user_campo')
                    ->where('ID', '=', $user->ID)
                    ->update([
                        'direccion' => $request['dirección'],
                        'direccion2' => $request['direccion2'],
                        'pais' => $request['pais'],
                        'estado' => $request['estado'],
                        'ciudad' => $request['ciudad'],
                        'codigo' => $request['codigo'],
                        'phone' => $request['phone'],
                        'fijo' => $request['fijo'],
                        ]);

        }elseif ($request->data == 'social'){
            DB::table('user_campo')
           ->where('ID', '=', $user->ID)
           ->update([
                    'facebook' => $request['facebook'],
                    'twitter' => $request['twitter'],
                    'instagram' => $request['instagram'],
                    'youtube' => $request['youtube'],
                    'linkedin' => $request['linkedin'],
                    ]);


        }elseif ($request->data == 'bancarios'){
           /* $validate = $request->validate([
                'cuenta' => 'numeric',
                'pan' => 'numeric'
            ]);
            */

                DB::table('user_campo')
                ->where('ID', '=', $user->ID)
                ->update([
                            'banco' => $request['banco'],
                            'tipocuenta' => $request['tipocuenta'],
                            'titular' => $request['titular'],
                            'cuenta' => $request['cuenta'],
                            'documento_identidad_titular' => $request['documento_identidad_titular'],
                            'swift' => $request['swift'],
                            'pan' => $request['pan'],
                            ]);


        }elseif ($request->data == 'pago'){

          DB::table('user_campo')
                ->where('ID', '=', $user->ID)
                ->update([
                            'paypal' => $request['paypal'],
                            'blocktrail' => $request['blocktrail'],
                            'blockchain' => $request['blockchain'],
                            'bitgo' => $request['bitgo'],
                            'pago' => $request['pago'],
                            ]);
        }

        if (Auth::user()->rol_id != 0){
            $funciones->msjSistema($concepto, 'success');
            return redirect()->back();
        }else{
            $funciones->msjSistema($concepto.' del usuario '.$user->display_name, 'success');
            return redirect()->back();
        }

    }
    /**
     * Permite Actualizar la imagen del usuario
     *
     * @param Request $request
     * @param int $id -> ID del usuario
     * @return void
     */
    public function actualizar(Request $request, $id)
    {
        $user = User::find($id);

        if ($request->file('avatar')) {
            $imagen = $request->file('avatar');
            $nombre_imagen = 'user_'.$id.'_'.time().'.'.$imagen->getClientOriginalExtension();
            $path = public_path() .'/uploads/avatar';
            //unlink($path.'/'.$user->avatar);
            $imagen->move($path,$nombre_imagen);
            $user->avatar = $nombre_imagen;
            $user->save();

            $streamingConnect = new StreamingController();
            $userStreaming = $streamingConnect->verifyUser($user->user_email);
            if (!is_null($userStreaming)) {
                $usuarioStre = UserStreaming::find($userStreaming->id);
                $nombre2 = $usuarioStre->id.'.'.$imagen->getClientOriginalExtension();
                copy('/home/mbapro/public_html/academia/uploads/avatar/'.$nombre_imagen, '/home/mbapro/public_html/streaming/storage/app/public/avatar/'.$nombre2);
                $usuarioStre->avatar = '/storage/avatar/'.$nombre2;
                $usuarioStre->save();
            }

            return redirect()->back()->with('msj', 'La imagen de usuario se ha actualizado');
        }else{
            return redirect()->back()->with('msj', 'Hubo un Problema al subir la imagen');
        }
    }

        /**
     * Permite Verificar si los usuarios o id suministrado existen
     *
     * @param int $id
     * @return bolean
     */
    public function VerificarUser($id)
    {
        $resul = true;
        $user = User::where('ID', $id)->get()->toArray();
        if (!empty($user)) {
            $resul = false;
        }
        return $resul;
    }

}
