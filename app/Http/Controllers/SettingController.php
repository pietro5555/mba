<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Crypt;
use App\Models\Formulario; use App\Models\OpcionesSelect;
use App\Models\SettingsComision; use App\Models\SettingsEstructura;
use App\Models\SettingsRol; use App\Models\MetodoPago; use App\Models\Permiso;
use App\Models\SettingActivacion; use App\Models\SettingCliente;
use App\Models\Settings; use App\Models\Monedas;
use App\Models\User; use App\Models\Rol; use App\Models\SettingCorreo;
use Auth; use DB; use Carbon\Carbon; use Mail;
use App\Models\Monedadicional;
use App\Models\Avatar;
use App\Models\Pop;
use App\Models\ModuloComplementario;
use App\Models\Component;

use Brotzka\DotenvEditor\DotenvEditor;
use App\Http\Controllers\IndexController;

class SettingController extends Controller
{
	function __construct()
	{
        // TITLE
		view()->share('title', 'Configuración');
	}

	// Confi Sistema
	/**
	 * Dirige a la vista del Configuraciones del Sistema
	 *
	 * @access public
	 * @return view
	 */
	public function indexLogo(){

		$component = Component::all();

	    return view ('setting.logo')->with(compact('component'));
	}

	/**
	 * Actualiza el Logo del sistema
	 *
	 * @access public
	 * @param request $datos - El nuevo logo
	 * @return view
	 */
	public function saveLogo(Request $datos){
	    if(!empty($datos->file('logo'))){
	        $archivo = $_FILES['logo'];
            $rutadirectorio = public_path()."/assets/img";
            $rutaarchivo = public_path()."/assets/img/logo-light.png";
            if (!is_dir($rutadirectorio)) {
                mkdir($rutadirectorio, 0700, true);
                $movido = move_uploaded_file($archivo['tmp_name'], $rutaarchivo);
            } else {
                unlink($rutaarchivo);
                $movido = move_uploaded_file($archivo['tmp_name'], $rutaarchivo);
            }

            if($movido){
                return redirect('admin/settings/sistema')->with('msj', 'Logo Actualizado Con Exito');
            }
	    }else{
	        return redirect('admin/settings/sistema');
	    }
	}


		public function saveBannerFormulario(Request $datos){
	    if(!empty($datos->file('formulario'))){
	        $archivo = $_FILES['formulario'];
            $rutadirectorio = public_path()."/assets";
            $rutaarchivo = public_path()."/assets/formulario.png";
            if (!is_dir($rutadirectorio)) {
                mkdir($rutadirectorio, 0700, true);
                $movido = move_uploaded_file($archivo['tmp_name'], $rutaarchivo);
            } else {
                unlink($rutaarchivo);
                $movido = move_uploaded_file($archivo['tmp_name'], $rutaarchivo);
            }

            if($movido){
                return redirect('admin/settings/sistema')->with('msj', 'Banner Actualizado Con Exito');
            }
	    }else{
	        return redirect('admin/settings/sistema');
	    }
	}



	public function saveBanner(Request $datos){
	    if(!empty($datos->file('banner'))){
	        $archivo = $_FILES['banner'];
            $rutadirectorio = public_path()."/assets";
            $rutaarchivo = public_path()."/assets/blanco.png";
            if (!is_dir($rutadirectorio)) {
                mkdir($rutadirectorio, 0700, true);
                $movido = move_uploaded_file($archivo['tmp_name'], $rutaarchivo);
            } else {
                unlink($rutaarchivo);
                $movido = move_uploaded_file($archivo['tmp_name'], $rutaarchivo);
            }

            if($movido){
                return redirect('admin/settings/sistema')->with('msj', 'Banner Actualizado Con Exito');
            }
	    }else{
	        return redirect('admin/settings/sistema');
	    }
	}


	public function saveBannerInicio(Request $datos){
	    if(!empty($datos->file('inicio'))){
	        $archivo = $_FILES['inicio'];
            $rutadirectorio = public_path()."/assets";
            $rutaarchivo = public_path()."/assets/inicio.png";
            if (!is_dir($rutadirectorio)) {
                mkdir($rutadirectorio, 0700, true);
                $movido = move_uploaded_file($archivo['tmp_name'], $rutaarchivo);
            } else {
                unlink($rutaarchivo);
                $movido = move_uploaded_file($archivo['tmp_name'], $rutaarchivo);
            }

            if($movido){
                return redirect('admin/settings/sistema')->with('msj', 'Banner Actualizado Con Exito');
            }
	    }else{
	        return redirect('admin/settings/sistema');
	    }
	}

	/**
	 * Actualiza el Favicon del sistema
	 *
	 * @access public
	 * @param request $datos - El nuevo Favicon
	 * @return view
	 */
	public function savefavicon(Request $datos){
	    if(!empty($datos->file('favicon'))){
	        $archivo = $_FILES['favicon'];
            $rutadirectorio = public_path();
            $rutaarchivo = public_path()."/favicon.ico";
            if (!is_dir($rutadirectorio)) {
                mkdir($rutadirectorio, 0700, true);
                $movido = move_uploaded_file($archivo['tmp_name'], $rutaarchivo);
            } else {
                unlink($rutaarchivo);
                $movido = move_uploaded_file($archivo['tmp_name'], $rutaarchivo);
            }

            if($movido){
                return redirect('admin/settings/sistema')->with('msj', 'Favicon Actualizado Con Exito');
            }
	    }else{
	        return redirect('admin/settings/sistema');
	    }
	}

	/**
	 * Actualiza el Nombre del sistema
	 *
	 * @access public
	 * @param request $datos - El nuevo nombre
	 * @return view
	 */
	public function updateName(Request $datos){
	    if(!empty($datos)){
	        DB::table('settings')
	            ->where('id', 1)
				->update(['name' => $datos->namesystem, 'name_styled' => $datos->namesystem, 'edad_minino' => $datos->edad_minima]);
	        return redirect('admin/settings/sistema')->with('msj', 'Nombre del Sistema y Edad Minima Actualizado Con Exito');
	    }else{
	        return redirect('admin/settings/sistema');
	    }
	}

	// Fin Confi Sistema



	// Confi Plantilla de Correo
	/**
	 * Vista de para la configuracion de la plantilla
	 *
	 * @access public
	 * @return view
	 */
	public function indexPlantilla()
	{
		$plantillaB = SettingCorreo::find(1);
		$plantillaP = SettingCorreo::find(2);
		$plantillaC = SettingCorreo::find(3);
		$plantillaPC = SettingCorreo::find(4);
		$plantillaL = SettingCorreo::find(5);
		$plantillaPros = SettingCorreo::find(6);

		$firma ='';

	    $seting = Settings::find(1);
	   if (!empty($seting->firma)) {
	       $firma = $seting->firma;
	   }

	   $settings = Settings::first();
		$Correos = json_decode($settings->activarCorreos);

		return view('setting.plantilla')->with(compact('plantillaB', 'plantillaP','plantillaC','plantillaPC','plantillaL','firma','Correos','plantillaPros'));
	}


	//activamos o desactivamos los correos
	public function activarCorreo(Request $request){

	    if (!empty($request)) {
			$settings = Settings::first();
			$Correos = json_decode($settings->activarCorreos);
			$data = [
				'pago' => (!empty($request->pago)) ? $request->pago : $Correos->pago,
				'compra' => (!empty($request->compra)) ? $request->compra : $Correos->compra,
				'pc' => (!empty($request->pc)) ? $request->pc : $Correos->pc,

				'liquidacion' => (!empty($request->liquidacion)) ? $request->liquidacion : $Correos->liquidacion,
			];
			DB::table('settings')
	            ->where('id', 1)
				->update(['activarCorreos' => json_encode($data)]);

			$funciones = new IndexController;
			$funciones->msjSistema('Nueva configuracion de Correos', 'success');
		}
		return redirect()->back();
	}

	/**
	 * Guarda la informacion de las plantillas
	 *
	 * @access public
	 * @param request $datos - Datos de la plantilla
	 * @return view
	 */
	public function savePlantilla(Request $datos)
	{
		$validate = $datos->validate([
			'titulo' => 'required',
		]);

		if ($validate) {
			if ($datos->plantilla == 'bienvenida') {
				$this->plantillaBienvenida($datos);
			} elseif($datos->plantilla == 'pago'){
				$this->plantillaPago($datos);
			}elseif($datos->plantilla == 'compra'){
			    $this->plantillaCompra($datos);
			}elseif($datos->plantilla == 'pc'){
			    $this->plantillaPC($datos);
			}elseif($datos->plantilla == 'liquidacion'){
			    $this->plantillaL($datos);
			}elseif($datos->plantilla == 'prospeccion'){
			    $this->plantillaPros($datos);
			}
			return redirect('admin/settings/plantilla')->with('msj', 'Plantilla del Correo de '.$datos->plantilla.' ha sido actualizada');
		} else {
			return redirect('admin/settings/plantilla');
		}
	}


	public function plantillaPros($datos){

	    if (!empty($datos->idplantilla)) {
			SettingCorreo::where('id', $datos->idplantilla)->update([
				'titulo' => $datos->titulo,
				'contenido' => $datos->correo5
			]);
		}else{
			SettingCorreo::create([
				'titulo' => $datos->titulo,
				'contenido' => $datos->correo5
			]);
		}
	}


	//plantilla de compra por el carrito
	public function plantillaCompra($datos){
	    if (!empty($datos->idplantilla)) {
			SettingCorreo::where('id', $datos->idplantilla)->update([
				'titulo' => $datos->titulo,
				'contenido' => $datos->correo2
			]);
		}else{
			SettingCorreo::create([
				'titulo' => $datos->titulo,
				'contenido' => $datos->correo2
			]);
		}
	}


	public function plantillaPC($datos){
	     if (!empty($datos->idplantilla)) {
			SettingCorreo::where('id', $datos->idplantilla)->update([
				'titulo' => $datos->titulo,
				'contenido' => $datos->correo3
			]);
		}else{
			SettingCorreo::create([
				'titulo' => $datos->titulo,
				'contenido' => $datos->correo3
			]);
		}
	}

	public function plantillaL($datos){
	    if (!empty($datos->idplantilla)) {
			SettingCorreo::where('id', $datos->idplantilla)->update([
				'titulo' => $datos->titulo,
				'contenido' => $datos->correo4
			]);
		}else{
			SettingCorreo::create([
				'titulo' => $datos->titulo,
				'contenido' => $datos->correo4
			]);
		}
	}

	/**
	 * Guarda la informacion de la plantilla de bienvenida
	 *
	 * @access private
	 * @param array $datos - plantilla de bienvenida
	 */
	private function plantillaBienvenida($datos){
		if (!empty($datos->idplantilla)) {
			SettingCorreo::where('id', $datos->idplantilla)->update([
				'titulo' => $datos->titulo,
				'contenido' => $datos->correo
			]);
		}else{
			SettingCorreo::create([
				'titulo' => $datos->titulo,
				'contenido' => $datos->correo
			]);
		}
	}

	/**
	 * Guarda la informacion de la plantilla de pago
	 *
	 * @access private
	 * @param array $datos - plantilla de pago
	 */
	private function plantillaPago($datos)
	{
		if (!empty($datos->idplantilla)) {
			SettingCorreo::where('id', $datos->idplantilla)->update([
				'titulo' => $datos->titulo,
				'contenido' => $datos->correo1
			]);
		}else{
			SettingCorreo::create([
				'titulo' => $datos->titulo,
				'contenido' => $datos->correo1
			]);
		}
	}

	/**
	 * Permite Probar las Plantillas Creadas
	 *
	 * @access public
	 * @param request $datos para la prueba del correo
	 * @return view
	 */
	public function probarPlantilla(Request $datos)
	{
		$plantilla = SettingCorreo::find($datos->idplantilla);
		if (!empty($plantilla->contenido)) {
			$mensaje = str_replace('@nombre', ' '.$datos->nombre.' ', $plantilla->contenido);
			$mensaje = str_replace('@clave', ' '.$datos->clave.' ', $mensaje);
			$mensaje = str_replace('@usuario', ' '.$datos->clave.' ', $mensaje);
			$mensaje = str_replace('@idpatrocinio', ' '.$datos->clave.' ', $mensaje);
			$mensaje = str_replace('@correo', ' '.$datos->correo.' ', $mensaje);
			Mail::send('emails.plantilla',  ['data' => $mensaje], function($msj) use ($plantilla, $datos){
				$msj->subject($plantilla->titulo);
				$msj->to($datos->correod);
			});
			return redirect('admin/settings/plantilla')->with('msj', 'Prueba Realizada');
		} else {
			return redirect('admin/settings/plantilla');
		}
	}
	// Fin Confi Plantilla de Correo

	// Confi Permiso
	/**
	 * Lleva a la vista de configuración de permisos
	 *
	 * @access public
	 * @return view
	 */
	public function indexPermisos()
	{
		$admins = User::where('rol_id', 0)->get();
		return view('setting.permisos')->with(compact('admins'));
	}

	/**
	 * permite agregar los nuevos usuarios admin
	 */
	public function saveAdmin(Request $datos)
	{
		$settings = Settings::first();
		$validatedData = $datos->validate([
            'user_email' => 'required|string|email|max:100|unique:'.$settings->prefijo_wp.'users',
        ]);
		if ($validatedData) {
			$user = User::create([
				'user_email' => $datos->user_email,
				'user_status' => 1,
				'user_registered' => Carbon::now(),
				'user_login' => $datos->username,
				'user_nicename' => $datos->username,
				'display_name' => $datos->nombre,
				'user_pass' => md5($datos->clave),
				'password' => bcrypt($datos->clave),
				'clave' => encrypt($datos->clave),
				'referred_id' => 0,
				'status' => 1,
				'rol_id' => 0,
				'correos' =>'{"pago":"1","compra":"1","pc":"1","liquidacion":"1"}'
			]);

			DB::table('user_campo')->insert([
				'ID' => $user->ID,
				'firstname' => 'ADMIN',
				'lastname' => $datos->nombre,
				'nameuser' => $datos->username
			]);

			User::where('ID', $user->ID)->update(['rol_id' => 0]);
			Permiso::create([
				'iduser' => $user->ID,
				'nameuser' => $user->display_name,
				'nuevo_registro' => 0,
				'red_usuario' => 0,
				'vision_usuario' => 0,
				'billetera' => 0,
				'pago' => 0,
				'informes' => 0,
				'tickets' => 0,
				'buzon' => 0,
				'ranking' => 0,
				'historial_actividades' => 0,
				'email_marketing' => 0,
				'administrar_redes' => 0,
				'soporte' => 0,
				'ajuste' => 0,
				'herramienta' => 0,
				'calendario' => 0,
                'correos' => 0,
                'prospeccion' => 0,
                'puntos' => 0,
                'binario' => 0,
                'usuario' => 0,
                'tienda' => 0,
			]);
			return redirect('admin/settings/permisos')->with('msj', 'Nuevo Administrador');
		} else {
			# code...
		}
	}

	/**
	 * Obtiene los permiso de un usuario admin en especifico
	 *
	 * @access public
	 * @param int $id - id del usuario a buscar
	 * @return view
	 */
	public function getPermisos($id)
	{
		$user = User::find($id);
		$permiso = Permiso::where('iduser', $id)->get()->toArray();
		return view('setting.componentes.modalPermiso')->with(compact('permiso', 'user'));
	}

	/**
	 * Guarda los permisos de los usuarios
	 *
	 * @access public
	 * @param request $datos - los permiso del usuario
	 * @return view
	 */
	public function savePermisos(Request $datos)
	{
		if (!empty($datos)) {
			if (!(empty($datos->id))) {
				Permiso::where('id', $datos->id)->update([
					'nuevo_registro' => $datos->nuevo_registro,
					'red_usuario' => $datos->red_usuario,
					'vision_usuario' => $datos->vision_usuario,
					'billetera' => $datos->billetera,
					'pago' => $datos->pago,
					'informes' => $datos->informes,
					'tickets' => $datos->tickets,
					'buzon' => $datos->buzon,
					'ranking' => $datos->ranking,
					'historial_actividades' => $datos->historial_actividades,
					'email_marketing' => $datos->email_marketing,
					'administrar_redes' => $datos->administrar_redes,
					'soporte' => $datos->soporte,
					'ajuste' => $datos->ajuste,
					'herramienta' => $datos->herramienta,
					'calendario' => $datos->calendario,
                    'correos' => $datos->correos,
                    'prospeccion' => $datos->prospeccion,
                    'puntos' => $datos->puntos,
                    'binario' => $datos->binario,
                    'usuario' => $datos->usuario,
                    'tienda' => $datos->tienda,
                    'transacciones' => $datos->transacciones,
                    'usuarios' => $datos->usuarios,
                    'red' => $datos->red,
                    'cursos' => $datos->cursos,
                    'eventos' => $datos->eventos,
                    'historialcomision' => $datos->historialcomision,
				]);
			} else {
				Permiso::create([
					'iduser' => $datos->iduser,
					'nameuser' => $datos->nameuser,
					'nuevo_registro' => $datos->nuevo_registro,
					'red_usuario' => $datos->red_usuario,
					'vision_usuario' => $datos->vision_usuario,
					'billetera' => $datos->billetera,
					'pago' => $datos->pago,
					'informes' => $datos->informes,
					'tickets' => $datos->tickets,
					'buzon' => $datos->buzon,
					'ranking' => $datos->ranking,
					'historial_actividades' => $datos->historial_actividades,
					'email_marketing' => $datos->email_marketing,
					'administrar_redes' => $datos->administrar_redes,
					'soporte' => $datos->soporte,
					'ajuste' => $datos->ajuste,
					'herramienta' => $datos->herramienta,
					'calendario' => $datos->calendario,
                    'correos' => $datos->correos,
                    'prospeccion' => $datos->prospeccion,
                    'puntos' => $datos->puntos,
                    'binario' => $datos->binario,
                    'usuario' => $datos->usuario,
                    'tienda' => $datos->tienda,
                    'transacciones' => $datos->transacciones,
                    'usuarios' => $datos->usuarios,
                    'red' => $datos->red,
                    'cursos' => $datos->cursos,
                    'eventos' => $datos->eventos,
                    'historialcomision' => $datos->historialcomision,
				]);
			}
				return redirect()->back()->with('msj', 'Permisos al Usuario '.$datos->nameuser.' Actualizados');
		} else {
			return redirect()->back()->with('msj', 'Lo sentimos esta peticion no pudo ser procesada');
		}

	}
	// Fin Confi Permiso

	// Confi Moneda
	/**
	 * Lleva a la vista de configuración de monedas
	 *
	 * @access public
	 * @return view
	 */
	public function indexMonedas()
	{
		$monedas = Monedas::all();
		$monedap = Monedas::where('principal', 1)->get()->first();
		$monedaAdicional = Monedadicional::find(1);
		if (!empty($monedaAdicional)) {
         $monedaAdicional->configuracion = json_decode($monedaAdicional->configuracion);
        }

		return view('setting.monedas')->with(compact('monedas', 'monedap','monedaAdicional'));
	}

	public function indexActivacion(){
	    $settingAct = SettingActivacion::find(1);
	    return view('setting.activacion')->with(compact('settingAct'));
	}

	/**
	 * Guarda las monedas con las que trabajara el sistema
	 *
	 * @param request $datos - informacion de la moneda
	 * @return view
	 */
	public function saveMonedas(Request $datos)
	{
		$validate = $datos->validate([
			'nombre' => 'required',
			'simbolo' => 'required',
			'mostrar' => 'required'
		]);

		if ($validate) {
			Monedas::create([
				'nombre' => $datos->nombre,
				'simbolo' => $datos->simbolo,
				'mostrar_a_d' => $datos->mostrar,
				'principal' => 0
			]);

			return redirect('admin/settings/monedas')->with('msj', 'Moneda '.$datos->nombre.' Agregada Exitosamente');
		}
	}

	public function statusMoneda($id, $estado)
	{
		Monedas::where('principal', 1)->update(['principal' => 0]);
		if ($estado == 1) {
			Monedas::where('id', $id)->update(['principal' => $estado]);
		}
		$moneda = Monedas::find($id);
		return redirect('admin/settings/monedas')->with('msj', 'Moneda '.$moneda->nombre.' Actualizada Exitosamente');
	}

	public function deleteMoneda($id)
	{
		$moneda = Monedas::find($id);
		$nombre = $moneda->nombre;
		$moneda->delete();

		return redirect('admin/settings/monedas')->with('msj', 'Moneda '.$nombre.' Borrada Exitosamente');
	}
	//fin confi monedas



	//vista para cambiar las imagenes del arbol
    public function imagenes(){

        $avatares = Avatar::find(1);
        if (!empty($avatares)) {
         $avatares->avatar = json_decode($avatares->avatar);
        }


        return view('setting.imagenes',compact('avatares'));
    }

    //agregar los nuevos avatares de forma multiple
    public function agregaravatar(Request $request){

        $stringJson = [];
        $avatares = Avatar::find(1);


        if (!empty($avatares)) {
            $avatares->avatar = json_decode($avatares->avatar);
            foreach($avatares->avatar as $avatar){

                array_push($stringJson, [
                     'avatar' => $avatar->avatar
                     ]);

            }
        }

        //agregamos los nuevos avatares de forma multiple
        $files = $request['avatar'];
        $destinationPath = public_path() . '/arbol';
        $cont=0;
        // recorremos cada archivo y lo subimos individualmente
        foreach($files as $file) {
            $cont++;

        $filename = 'avatar_'. time().$cont. '.'.$file->getClientOriginalExtension();
            $upload_success = $file->move($destinationPath, $filename);

         array_push($stringJson, [
                     'avatar' => $filename
                     ]);

        }

        $datos = json_encode($stringJson);


         if (!empty($avatares)) {

             Avatar::where('id', 1)->update([
                 'avatar' => $datos,
                 ]);

         }else{

              Avatar::create([
                 'avatar' => $datos,
                 ]);

         }


            $funciones = new IndexController;
             $funciones->msjSistema('Agregado con exito', 'success');
                    return redirect()->back();

    }


    public function cambairavatar(Request $request){

        $funciones = new IndexController;
        $avatares = Avatar::find(1);

        if (empty($avatares)) {
        $funciones->msjSistema('Debe Agregar Avatares a su lista', 'warning');
        return redirect()->back();
        }else{
            $avatares->activo_mujer = $request->activo_mujer;
            $avatares->activo_hombre = $request->activo_hombre;
            $avatares->inactivo_mujer = $request->inactivo_mujer;
            $avatares->inactivo_hombre = $request->inactivo_hombre;
            $avatares->save();
        }
             $funciones->msjSistema('Modificado con exito', 'success');
                    return redirect()->back();
    }



    //activamos o desactivamos los correos de cada usuario

    public function vistacorreo(){

        $Correos = json_decode(Auth::user()->correos);
        return view('archivo.vistacorreo',compact('Correos'));
    }


	public function miscorreoactivos(Request $request){

	    if (!empty($request)) {
	        $user = User::find($request->id);
			$settings = Settings::first();
			$Correos = json_decode($user->correos);
			$data = [
				'pago' => (!empty($request->pago)) ? $request->pago : $Correos->pago,
				'compra' => (!empty($request->compra)) ? $request->compra : $Correos->compra,
				'pc' => (!empty($request->pc)) ? $request->pc : $Correos->pc,

				'liquidacion' => (!empty($request->liquidacion)) ? $request->liquidacion : $Correos->liquidacion,
			];

			$user->correos = json_encode($data);
			$user->save();

			$funciones = new IndexController;
			$funciones->msjSistema('Nueva configuracion de Correos', 'success');
		}
		return redirect()->back();
	}


	//modulo complementario
	public function modulo(){

	    view()->share('title', 'Modulo Complementario');

	    $modulo = ModuloComplementario::find(1);
	    return view('setting.moduloComplementario',compact('modulo'));
	}


	public function complemento(){

	    view()->share('title', 'Modulo');

	    $modulo = ModuloComplementario::find(1);
	    return view('setting.complementario',compact('modulo'));
	}

	public function guardarModulo(Request $request){


	     $validatedData = $request->validate([
          'contenido' => 'required',
          ]);

          	$funciones = new IndexController;
            $modulo = ModuloComplementario::find(1);

	    $tamano = str_replace('<iframe width=', '<iframe width="340"', $request->contenido);

           $contenido = str_replace('height=', 'height="340"', $tamano);

           if($modulo != null){
           ModuloComplementario::where('id', 1)->update([
					'contenido' => $contenido,
				]);
           }else{
               ModuloComplementario::create([
					'contenido' => $contenido,
				]);
           }
           $funciones->msjSistema('Modulo Agregado con exito', 'success');
           return redirect()->back();

	}


	//configurar servidor externo
	public function servidor(Request $datos){

	    $funciones = new IndexController;
	     $env = new DotenvEditor();

            // Cambiamos el .env
            $env->changeEnv([
                'MAIL_HOST'   => $datos->host,
                'MAIL_DRIVER'   => $datos->driver,
                'MAIL_PORT'   => $datos->port,
                'MAIL_USERNAME'   => $datos->username,
                'MAIL_PASSWORD'   => '"'.$datos->password.'"',
                'MAIL_FROM_NAME' => $datos->from_name
            ]);


             $funciones->msjSistema('Cambios agregados con exito', 'success');
           return redirect()->back();
	}


	//activar o desactivar traductor
	public function traductor(){

	    $funciones = new IndexController;
	    $settings = Settings::first();

	    if($settings->traductor == 1){
	        $traductor = 0;
	    }else{
	        $traductor = 1;
	    }

	    DB::table('settings')
	            ->where('id', 1)
				->update(['traductor' => $traductor]);

		$funciones->msjSistema('Cambios realizados con exito', 'success');
           return redirect()->back();
	}


		public function pop(){

	 view()->share('title', 'POP up');

	    $pop = Pop::find(1);
	    return view('setting.pop',compact('pop'));
	}

	public function desactivacion(){

	    $pop = Pop::find(1);

	    $pop->activado = ($pop->activado == 0) ? 1 : 0;
	    $pop->save();

	    $funciones = new IndexController;
		$funciones->msjSistema('Cambios realizados con exito', 'success');
           return redirect()->back();
	}

	public function up(Request $request){

	     $pop = Pop::find(1);

	    if (!empty($pop->contenido)) {
			Pop::where('id', '1')->update([
			    'titulo' => $request->titulo,
				'contenido' => $request->contenido
			]);
		}else{
			Pop::create([
			    'titulo' => $request->titulo,
				'contenido' => $request->contenido
			]);
		}

		$funciones = new IndexController;
		$funciones->msjSistema('Cambios realizados con exito', 'success');
           return redirect()->back();
	}


	public function recarga(){

	 $funciones = new IndexController;
	 $settings = Settings::first();


	 DB::table('settings')
	            ->where('id', 1)
				->update(['recarga' => ($settings->recarga == 0) ? 1 : 0]);

		$funciones->msjSistema('Cambios realizados con exito', 'success');
        return redirect()->back();
	}


	public function canje(){

	 $funciones = new IndexController;
	 $settings = Settings::first();


	 DB::table('settings')
	            ->where('id', 1)
				->update(['canje' => ($settings->canje == 0) ? 1 : 0]);

		$funciones->msjSistema('Cambios realizados con exito', 'success');
        return redirect()->back();
	}


	public function btc(){

	 $funciones = new IndexController;
	 $settings = Settings::first();


	 DB::table('settings')
	            ->where('id', 1)
				->update(['btc' => ($settings->btc == 0) ? 1 : 0]);

		$funciones->msjSistema('Cambios realizados con exito', 'success');
        return redirect()->back();
	}


	public function btcconfi(){

	    view()->share('title', 'Configuración BTC');

	    return view('setting.btc');
	}


	public function savebtc(Request $datos){

	    $env = new DotenvEditor();

            $env->changeEnv([
              'CRYPTO'  => $datos->crypto,
              'BILLETERA_BTC'  => $datos->billetera,
              'COIN_PAYMENT_PUBLIC_KEY'   => $datos->publickey,
              'COIN_PAYMENT_PRIVATE_KEY'   => $datos->privatekey,
                ]);

        $funciones = new IndexController;
		$funciones->msjSistema('Cambios realizados con exito', 'success');
           return redirect()->back();

	}



	public function modo_oscuro($iduser){

	    $user = User::find($iduser);

	    $user->modo_oscuro = ($user->modo_oscuro == 0) ? 1 : 0;
	    $user->save();

	    $funciones = new IndexController;
	    $funciones->msjSistema(($user->modo_oscuro == 0) ? 'Modo Oscuro Desactivado' : 'Modo Oscuro Activado' , 'success');
        return redirect()->back();
	}


	public function colores($tipo){

	    DB::table('settings')
	            ->where('id', 1)
				->update(['estilo' => $tipo]);

		$funciones = new IndexController;
		$funciones->msjSistema('Cambios realizados con exito si no visualiza los cambios por favor borre la cache de su navegador', 'success');
        return redirect()->back();
	}


	public function paypalboton(Request $datos){

	    DB::table('settings')
	            ->where('id', 1)
				->update(['paypal' => $datos->paypal]);

		$funciones = new IndexController;
		$funciones->msjSistema('Cambios realizados con exito', 'success');
        return redirect()->back();
	}

	public function scriptpaypal(Request $datos){


	    DB::table('settings')
	            ->where('id', 1)
				->update(
				    ['scriptpaypal' => $datos->scriptpaypal,
				    'htmlpaypal' => $datos->htmlpaypal]
				    );

		$funciones = new IndexController;
		$funciones->msjSistema('Cambios realizados con exito', 'success');
        return redirect()->back();
	}

	public function paypalutil(){

	    view()->share('title', 'Paypal');

	    return view('setting.paypal');
	}


	public function comple(){

	    return view('setting.comple');
	}


	public function complelogin(Request $datos){

	    DB::table('settings')
	            ->where('id', 1)
				->update(
				    ['login' => $datos->login]
				    );

	    $funciones = new IndexController;
		$funciones->msjSistema('Cambios realizados con exito', 'success');
        return redirect()->back();
	}


	public function compleregistro(Request $datos){

	    DB::table('settings')
	            ->where('id', 1)
				->update(
				    ['colorfondo' => $datos->fondo,
				    'cololetras' => $datos->color,
				    'registro' => $datos->registro,
				    ]
				    );

	    $funciones = new IndexController;
		$funciones->msjSistema('Cambios realizados con exito', 'success');
        return redirect()->back();
	}

}


