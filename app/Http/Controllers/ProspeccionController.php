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

// llamado a los controlladores
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RangoController;
use App\Http\Controllers\Auth\RegisterController;
use Modules\ReferralTree\Http\Controllers\ReferralTreeController;

class ProspeccionController extends Controller
{
	function __construct()
	{
        // TITLE
		view()->share('title', 'Prospección');
	}

    //vista de prospeccion para registrar
    public function inicio()
    {  
        
        $cliente = SettingCliente::find(1);
        $estructura='';
        $settingEstructura = SettingsEstructura::find(1);
        if(!empty($settingEstructura)){
            if($settingEstructura->tipoestructura == 'binaria'){
        $estructura = $settingEstructura->tipoestructura;
            }
        }
        
        
         $patrocinadores = User::all();
         $prospecto = Prospeccion::where('iduser', Auth::user()->ID)->get();
        
        return view('prospeccion.inicio')->with(compact('prospecto','estructura','patrocinadores','cliente'));
    }
    
    //guardar datos de prospeccion
    public function guardar(Request $data){
        
        $settings = Settings::find(1);
        
        $validatedData = $data->validate([
                   'user_email' => 'required|string|email|max:100|unique:'.$settings->prefijo_wp.'users',
                ]);
                
                
        $consulta = $this->consultaData($data);
        $funciones = new IndexController;
        
        if($consulta['error'] != null){
            $funciones->msjSistema($consulta['error'], 'info');
            return redirect()->back()->withInput();
        }
        
        
        $user = Prospeccion::create([
            'iduser' => Auth::user()->ID,
            'persona_natural' => $data['persona_natural'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'direccion' => $data['direccion'],
            'ciudad' => $data['ciudad'],
            'estado' => $data['estado'],
            'local' => $data['local'],
            'pais' => $data['pais'],
            'telefono' => $data['telefono'],
            'user_email' => $data['user_email'],
            'ladomatriz' => $data['ladomatriz'], // esto es para lo binario
            'referred_id' => $consulta['referido'],
            'position_id' => $consulta['posicion'],
            'tipo' => $data['tipo'],
            'comentario' => $data['comentario'],
            'perfil' => $data['perfil'],
        ]);
    
    $funciones->msjSistema('Agregado con exito', 'success');
            return redirect()->back();
            
   }
   
   //eliminar los registros de prospeccion
   public function eliminar($id){
       
       $funciones = new IndexController;
       $user = Prospeccion::find($id);
       $user->delete();
       
        $funciones->msjSistema('Eliminado con exito', 'success');
            return redirect()->back();
   }
   
   
   public function cambioestado(Request $request){
       
       $funciones = new IndexController;
       
       Prospeccion::where('id', $request->id)->update([

            'estado' => $request->estado,
            
        ]);
        
        $funciones->msjSistema('Estado modificado con exito', 'success');
            return redirect()->back();
   }
   
   
   //editar los datos de prospeccion
   public function editar(Request $data){
       
       $settings = Settings::find(1);
       $usuario = Prospeccion::find($data->id);
       
       
       $validatedData = $data->validate([
                   'user_email' => 'required|string|email|max:100|unique:'.$settings->prefijo_wp.'users',
                ]);
       
       $consulta = $this->consultaData($data);
        $funciones = new IndexController;
        
        if($consulta['error'] != null){
            $funciones->msjSistema($consulta['error'], 'info');
            return redirect()->back()->withInput();
        }
        
        
        $user = Prospeccion::where('id', $data->id)->update([
            'iduser' => Auth::user()->ID,
            'persona_natural' => $data['persona_natural'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'direccion' => $data['direccion'],
            'ciudad' => $data['ciudad'],
            'estado' => $data['estado'],
            'local' => $data['local'],
            'pais' => $data['pais'],
            'telefono' => $data['telefono'],
            'user_email' => $data['user_email'],
            'ladomatriz' => $data['ladomatriz'], 
            'referred_id' => $consulta['referido'],
            'position_id' => $consulta['posicion'],
            'tipo' => $data['tipo'],
            'comentario' => $data['comentario'],
            'perfil' => $data['perfil'],
        ]);
        
        
        $funciones->msjSistema('Editado con exito', 'success');
            return redirect()->back();
   }
   
   //almacenar los registros para que sean usuarios registrados en el sistema
   public function insertar(Request $data){ 
                
       $user = Prospeccion::find($data->id);
       
       $funciones = new IndexController;
       $registro = new RegisterController;
       $settings = Settings::find(1);
          
          $verificar = User::where('user_email', $user->user_email)->first();
          if($verificar != null){
              $funciones->msjSistema('El correo ('.$user->user_email.') ya se encuentra registrado', 'info');
            return redirect()->back();
          }else{
              /*
              $verificar = DB::table('user_campo')->where('firstname', $user->firstname)->first();
              if($verificar != null){
                  $funciones->msjSistema('El nombre ('.$user->firstname.') ya se encuentra registrado', 'info');
            return redirect()->back();
            
              }
              */
          }
                
        $consulta = $this->consultaData($user);
        
        if($consulta['error'] != null){
            $funciones->msjSistema($consulta['error'], 'info');
            return redirect()->back();
        }
        
        $rol_id = ($data['tipo'] == 'Cliente') ? 100 : 1;
        $usuario = User::create([
            'user_email' => $user->user_email,
            'user_status' => '0',
            'user_login' => $user->firstname,
            'user_nicename' => $user->firstname,
            'display_name' => $user->firstname.' '.$user->lastname,
            'user_registered' => Carbon::now(),
            'user_pass' => md5($data['password']),
            'password' => bcrypt($data['password']),
            'clave' => encrypt($data['password']),
            'rol_id' => $rol_id,
            'referred_id' => $user->referred_id,
            'ladomatriz' => $user->ladomatriz, 
            'sponsor_id' => $user->position_id,
            'position_id' => $user->position_id,
            'tipouser' => $user->tipo,
            'status' => '0',
            'correos' =>'{"pago":"1","compra":"1","pc":"1","liquidacion":"1"}'
        ]);
        
        
        DB::table('user_campo')
            ->insert([
                'ID' => $usuario->ID, 
                'firstname' => $user->firstname, 
                'lastname' => $user->lastname,
                'nameuser' => $user->firstname.' '.$user->lastname,
                'direccion' => $user->direccion,
                'ciudad' => $user->ciudad,
                'estado' => $user->local,
                'pais' => $user->pais,
                'phone' => $user->telefono,
                'ciudad' => $user->ciudad,
                
                ]);
                
                
        $user->status = 1;
        $user->save();
        
        // insertar en la tabla del woocomer 
        $registro->insertUserMeta($usuario, $user);
        
        // enviar correo de bienvenida
        $datacorreo = [
                    'user_email' => $user->user_email,
                    'firstname' => $user->firstname,
                    'lastname' => $user->lastname,
                    'password' => $data->password,
                    'nameuser' => $usuario->display_name,
                ];
                
        $envio = $registro->EnvioCorreo($datacorreo, $user->referred_id, $user);
        
        if($envio['error'] != null){
            $funciones->msjSistema($envio['error'], 'warning');
            return redirect()->back()->withInput();
        }
        //fin envio de correo
        
        $funciones->msjSistema('Su Registro ha sido exitoso', 'success');
         return redirect()->back();
       
   }
   
   //envio de correo al prospecto
   public function correo($id){
       
       $funciones = new IndexController;
       $plantilla = SettingCorreo::find(6);
       $seting = Settings::find(1);
       $user = Prospeccion::find($id);
       
       $firma = null;
	   if (!empty($seting->firma)) {
	       $firma = $seting->firma;
	   }
       
       if($user->envioCorreo != 1){
           
           if (!empty($plantilla->contenido)) {
               
           $user->envioCorreo = 1;
           $user->save();
           
			$mensaje = str_replace('@nombrecompleto', ' '.$user->firstname.' '.$user->lastname.' ', $plantilla->contenido);
			$mensaje = str_replace('@correo', ' '.$user->user_email.' ', $mensaje);
			$mensaje = str_replace('@usuario', ' '.$user->firstname.' ', $mensaje);
			$mensaje = str_replace('@idpatrocinio', ' '.$user->referred_id.' ', $mensaje);
			Mail::send('emails.plantilla',  ['data' => $mensaje, 'firma' => $firma], function($msj) use ($plantilla, $user){
				$msj->subject($plantilla->titulo);
				$msj->to($user->user_email);
			});
           
          }else{
              $funciones->msjSistema('El correo no pudo ser enviado si requiere mas informacion comuniquese con el administrador', 'success');
         return redirect()->back();
          }
           
       }else{
          $funciones->msjSistema('Solo se puede enviar el correo una ves a cada prospecto', 'success');
         return redirect()->back();
       }
       
       $funciones->msjSistema('Correo enviado con exito', 'success');
         return redirect()->back();
   }
   
   
   public function consultaData($data){
       
       $registro = new RegisterController;
       $error = null; $posicion=0; $referido=0;
        
        // Obtenemos las configuraciones por defecto
    	$settings = Settings::first();
        $settingEstructura = SettingsEstructura::find(1);
        $funciones = new IndexController;
        // Usuario referido por defecto.
        // 0: NONE.
        $user_id_default = $settings->referred_id_default;

        // Obtenemos el referido.
        
        $data['referred_id'] = Auth::user()->ID;
        $referido = $user_id_default;
        if(isset($data['referred_id'])){
            if ($registro->VerificarUser($data['referred_id'])) {
                
                $error = 'El Usuario con el ID Referido Suministrado ('.$data['referred_id'].') No Se Encuentra Registrado, Pruebe Con Otro';
            }
            $referido =  $data['referred_id'];
        }
        $posicion = 0;

        
        if ($settingEstructura->tipoestructura != 'binaria') {
            if (empty($data['position_id'])) {
            
                if ($settingEstructura->tipoestructura != 'arbol') {
                    $consulta=new ReferralTreeController;
                    $auspiciador = $consulta->getPosition($referido, '', $data['tipo']);
                    $posicion = $auspiciador;
                }else{
                    $posicion = $referido;
                }
                
            } else {
                if ($registro->VerificarUser($data['position_id'])) {
                    $error = 'El Usuario con el ID Posicionamiento Suministrado ('.$data['position_id'].') No Se Encuentra Registrado, Pruebe Con Otro';
                }
                if ($settingEstructura->tipoestructura != 'arbol') {
                    $consulta=new ReferralTreeController;
                    $auspiciador = $consulta->getPosition($data['position_id'], '', $data['tipo']);
                    if ($auspiciador != $data['position_id']) {
                        $error = 'El ID Posicionamiento Suministrado ('.$data['position_id'].') Tiene Sus Lugares LLeno, le Recomendamos este ID Posicionamiento ('.$auspiciador.')';
                    }
                }
                $posicion = $data['position_id'];
            }
        }else{
          
                $consulta=new ReferralTreeController;
                $auspiciador = $consulta->getPosition($referido, $data['ladomatriz'], $data['tipo']);
                $posicion = $auspiciador;
            
        }
        
        $required = [
                    'posicion' => $posicion,
                    'referido' => $referido,
                    'error' => $error,
                ];
                
                
                return $required;
    }
                
}