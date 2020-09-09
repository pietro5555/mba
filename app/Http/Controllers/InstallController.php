<?php

namespace App\Http\Controllers;

use Brotzka\DotenvEditor\DotenvEditor;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use App\Models\Settings;
use App\Models\User; use App\Models\Permiso;
use App\Models\Rol; use App\Models\SettingsEstructura;
use App\Models\SettingActivacion;
use App\Models\SettingCliente; use App\Models\Monedas;
use DB; use Carbon\Carbon;
use Hash;


class InstallController extends Controller
{
    /**
     * Lleva a la vista para la instalacion
     * 
     * @return view
     */
    public function index()
    {
        return view('install.index');
    }

    /**
     * Permite verificar si los datos son correptos y los guardas
     * 
     * @param request $datos - informacion del server
     * @return view
     */
    public function saveStep1(Request $datos)
    {
        $validate = $datos->validate([
            'servidor' => 'required',
            'puerto' => 'required',
            'basedato' => 'required',
            'usuario' => 'required',
            'clave' => 'required'
        ]);

        if ($validate) {
            if ($this->verificarConexion($datos)) {

                $ruta = explode('public_html', $datos->server('SCRIPT_FILENAME'));
                
                $env = new DotenvEditor();
                // Cambiamos el .env
                $env->changeEnv([
                    'DB_DATABASE'   => $datos->basedato,
                    'DB_USERNAME'   => $datos->usuario,
                    'DB_PASSWORD'   => $datos->clave,
                    'DB_HOST'       => $datos->servidor,
                ]);

                $this->insertarBD($datos, $ruta[0].'leopardus/bdgeneral.sql');

                // $command = 'mysql'
                //     . ' --host=' . $datos->servidor
                //     . ' --user=' . $datos->usuario
                //     . ' --password=' . $datos->clave
                //     . ' --database=' . $datos->basedato
                //     . ' --execute="SOURCE ' . $ruta[0].'leopardus/bdgeneral.sql" 2>&1';

                // $exe =shell_exec($command);
                return redirect()->route('install-step2');
            } else {
                return redirect()
                ->back()
                ->withErrors([
                    'Imposible conectar a la base de datos. Error: ' . mysqli_connect_error()
                ])
                ->withInput();
            }
        }
    }

    /**
     * Permite crear la bd en el sistema
     * 
     * @param array $datos - informacion para conexion con la bd, string $ruta - ruta del archivo sql
     */
    public function insertarBD($datos, $ruta)
    {
        $conn =  @mysqli_connect(
            $datos->servidor,
            $datos->usuario,
            $datos->clave,
            $datos->basedato
        );

        $query = '';
        $sqlScript = file($ruta);
        foreach ($sqlScript as $line)   {
                
                $startWith = substr(trim($line), 0 ,2);
                $endWith = substr(trim($line), -1 ,1);
                
                if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
                        continue;
                }
                        
                $query = $query . $line;
                if ($endWith == ';') {
                        mysqli_query($conn, $query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
                        $query= '';             
                }
        }

    }

    /**
     * Permite Verificar si los datos para conectarse a la bd son correctos
     * 
     * @param array $datos - los datos para la conexion
     * @return object
     */
    public function verificarConexion($datos)
    {
        $resul = false;
        $conexion =  @mysqli_connect(
            $datos->servidor,
            $datos->usuario,
            $datos->clave,
            $datos->basedato
        );
        if ($conexion) {
            $resul = true;
            mysqli_close($conexion);
        }
        return $resul;
    }

    /**
     * LLeva a la vista del paso 2
     * 
     * @return view
     */
    public function step2()
    {
        return view('install.step2');
    }

    /**
     * Guarda y modifica la informacion necesaria para el uso del sistema
     */
    public function saveStep2(Request $datos)
    {
        $url = $datos->server('REQUEST_SCHEME').'://'.$datos->server('SERVER_NAME');
        $servidor = $datos->server('SERVER_NAME');
        $validate = $datos->validate([
            'name' => 'required',
            'password' => 'required',
            'correoservidor' => 'required',
            'smtp' => 'required',
            'password_correo' => 'required',
            'prefijo' => 'required'
        ]);

        if ($validate) {

            $env = new DotenvEditor();
            // Cambiamos el .env
            $env->changeEnv([
                'APP_URL' => $url.'/mioficina',
                'MAIL_HOST'   => $datos->smtp,
                'MAIL_USERNAME'   => $datos->correoservidor,
                'MAIL_PASSWORD'   => '"'.$datos->password_correo.'"',
                'MAIL_FROM_NAME' => $datos->name
            ]);

            $this->configuracionBD($datos, $servidor);

            return redirect()->route('install-end')->with(compact('datos'));
        }
    }

    /**
     * Realiza las configuraciones necesarias a la bd
     * 
     * @param array $datos - informacion para la configuracion de la bd
     */
    public function configuracionBD($datos, $servidor)
    {
        $data = [
            'btn_transferencia' => 1,
            'btn_retiro' => 1,
            'btn_masivo' => 1,
            'btn_todo' => 1,
            'btn_liquida' => 1,
            'btn_monto' => 1
        ];
        
        $correo = [
            'pago' => 1,
            'compra' => 1,
            'pc' => 1,
            'liquidacion' => 1
            ];
        // Configuracion Inicial
        $settings = new Settings;
        $settings->name = $datos->name;
        $settings->name_styled = $datos->name;
        $settings->site_email = $datos->correoservidor;
        $settings->prefijo_wp = $datos->prefijo;
        $settings->edad_minino = $datos->edad;
        $settings->slogan = $datos->password;
        $settings->activarBotones = json_encode($data);
        $settings->activarCorreos = json_encode($correo);
        $settings->save();


        // insercion del admin
        $admin = DB::table($datos->prefijo.'users')
                    ->where('ID', 1)
                    ->get()->first();

        if ($servidor == 'localhost') {
            $servidor = $servidor.".com";
        }

        $idAdmin = DB::table('users2')->insertGetId([
            'user_login' => $admin->user_login,
            'user_pass' => $admin->user_pass,
            'user_nicename' => $admin->user_nicename,
            'user_email' => 'admin@'.$servidor,
            'user_registered' => Carbon::now(),
            'user_status' => 0,
            'display_name' => $datos->name,
            'referred_id' => 0,
            'sponsor_id' => 0,
            'position_id' => 0, 
            'status' => 1,
            'rol_id' => 0,
            'activacion' => 0,
            'clave' => Hash::make($datos->password),
            'password' => Hash::make($datos->password),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'correos' =>'{"pago":"1","compra":"1","pc":"1","liquidacion":"1"}'
        ]);

        DB::table('user_campo')->insert([
            'ID' => $idAdmin,
            'firstname' => 'ADMIN',
            'lastname' => strtoupper($datos->name),
            'nameuser' => $admin->user_nicename
        ]);

        
        $this->guardadadoInicial();
        

        // asignar los permisos totales al admin
        Permiso::create([
            'iduser' => $idAdmin,
            'nameuser' => 1,
            'nuevo_registro' => 1,
            'red_usuario' => 1,
            'vision_usuario' => 1,
            'billetera' => 1,
            'pago' => 1,
            'informes' => 1,
            'tickets' => 1,
            'buzon' => 1,
            'ranking' => 1,
            'historial_actividades' => 1,
            'email_marketing' => 1,
            'administrar_redes' => 1,
            'soporte' => 1,
            'ajuste' => 1,
            'herramienta' => 1,
            'calendario' => 1,
            'correos' => 1,
            'prospeccion' => 1,
            'puntos' => 1,
            'binario' => 1,
            'usuario' => 1,
            'tienda' => 1,
        ]);
        
        // Cambiamos a la tabla con la que vamos a trabajar
        $sql = "RENAME TABLE ".$datos->prefijo."users to ".$datos->prefijo."users_old, users2 to ".$datos->prefijo."users";
        DB::statement($sql);
        
    }
    /**
     * Guarda la informacion incial para el funcionamieto del sistema
     */
    public function guardadadoInicial()
    {
        // guardar primera moneda
        Monedas::create([
            'nombre' => "Dolar",
            'simbolo' => "$",
            'mostrar_a_d' => 0,
            'principal' => 1
        ]);

        // guardar el primer rol
        Rol::create([
			'id' => 0, 
            'name' => 'Administrador',
        ]);
        // guardar el rol cliente
        Rol::create([
			'id' => 100, 
            'name' => 'Cliente',
        ]);
        
        // guarda que el sistema por defecto sea general
        SettingCliente::create([
            'cliente' => 0,
            'permiso' => 0,
        ]);

        // guarda la configuracion de si es arbol o no
        SettingsEstructura::create([
            'tipoestructura' => 0,
            'cantnivel' => 0,
        ]);

        // Guarda la informacion de la activavion Inicial
        SettingActivacion::create([
            'tipoactivacion' => 2,
            'requisitoactivacion' => 0,
        ]);
    }

    /**
     * LLeva a la vista final con los detalles de la instalacion
     */
    public function end()
    {
        $inicio = Settings::first();
        $user = DB::table($inicio->prefijo_wp.'users')->select('user_email', 'display_name')->where('ID', 1)->get()->first();
        return view('install.end')->with(compact('inicio', 'user'));
    }
    
    /*
    *vista de la licencia solo para los creadores del sistema
    */
    public function licencia(){
     
     return view('install.licencia');   
    }
    
    public function encript(Request $request){
        
        $settings = Settings::first();
        
        $licencia = base64_encode($request->licencia);
        $fecha = base64_encode($request->fecha);
        
        DB::table('settings')->where('id', 1)->update([
            'licencia' => $licencia,
            'fecha_vencimiento' => $fecha
        ]);
        
        
        return redirect()->back()->with('msj', 'Licencia Registrada con exito');
    }


    public function  PermisosAdmin($idAdmin){

    // asignar los permisos totales al admin

        $user = User::find($idAdmin);
        Permiso::create([
            'iduser' => $idAdmin,
            'nameuser' => $user->display_name,
            'nuevo_registro' => 1,
            'red_usuario' => 1,
            'vision_usuario' => 1,
            'billetera' => 1,
            'pago' => 1,
            'informes' => 1,
            'tickets' => 1,
            'buzon' => 1,
            'ranking' => 1,
            'historial_actividades' => 1,
            'email_marketing' => 1,
            'administrar_redes' => 1,
            'soporte' => 1,
            'ajuste' => 1,
            'herramienta' => 1,
            'calendario' => 1,
            'correos' => 1,
            'prospeccion' => 1,
            'puntos' => 1,
            'binario' => 1,
            'usuario' => 1,
            'tienda' => 1,
            'transacciones' => 1,
            'usuarios' => 1,
            'red' => 1,
            'cursos' => 1,
            'eventos' => 1,
        ]);
    }
}
