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

// llamado a los modelos
use App\Models\Rol;
use App\Models\User; 
use App\Models\Ticket;
use App\Models\Monedas;
use App\Models\Permiso; 
use App\Models\Wallet; 
use App\Models\Anuncio; 
use App\Models\Settings; 
use App\Models\Commission; 
use App\Models\SettingsComision; 
use App\Models\SettingsEstructura;
use App\Models\SettingsPunto; 
use App\Models\Archivo;
use App\Models\Contenido;
use App\Models\Binario;
use App\Models\Monedadicional; 
use App\Models\Redesociales; 
use App\Models\Pop;
use App\Models\Component;

// llamado a los controlladores
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RangoController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\ActivacionController;
use App\Http\Controllers\ComisionesController;
use App\Http\Controllers\ComisionController;
use App\Http\Controllers\TransacionesController;
use App\Http\Controllers\PuntospersonalesController;
use App\Http\Controllers\BinarioController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\MonedaAdicionalController;
use App\Http\Controllers\CryptoController;

class AdminController extends Controller
{
	function __construct()
	{
        // TITLE
		view()->share('title', 'Panel de administración');
	}

    public function index()
    {  
        $fechaProxActivacion = NULL;
        $desde = NULL;
        $binario = NULL;
        $moneda = Monedas::where('principal', 1)->get()->first();
        session(['tienda' => '0']);
        $settings = Settings::first();
        
        $settingEstructura = SettingsEstructura::find(1);
        $settingPuntos = SettingsPunto::find(1);
        
        $cantReferidosDirectos = count($this->getReferreds(Auth::user()->ID));
        $cantReferidosIndirectos = 0;
        $cantReferidosActivos = 0;
        
        $TodosUsuarios = $this->generarArregloUsuario(Auth::user()->ID);
        
        foreach($TodosUsuarios as $user){
            if ($user['nivel'] > 1){
                $cantReferidosIndirectos++;
            }
            if ($user['status'] == 1){
                $cantReferidosActivos++;
            }
        }
        $fullname= '';
        $datanombre = DB::table('user_campo')->select('firstname', 'lastname')->where('ID', Auth::user()->ID)->get();
        if (!empty($datanombre->toArray())) {
            $fullname = $datanombre[0]->firstname.' '.$datanombre[0]->lastname;
        }
        
        // activacion de usuarios
        if (Auth::user()->rol_id != 0) {
            $activacion = new ActivacionController;
            $rango = new RangoController;
            
            $rango->ValidarRango(Auth::user()->ID);
            $fechaProxActivacion = $activacion->activarUsuarios(Auth::user()->ID);
            
            $desde = $fechaProxActivacion;
            if($desde != 'Sin Compras' && $desde != 'Compra Vencida'){
                $desde = $fechaProxActivacion;
            }
        }
        
        $rol = Rol::find(Auth::user()->rol_id);
        $nombreRol = '';
        if (!empty($rol)) {
            $nombreRol = $rol->name;
        }

        // Informacion del Index
            $informacion = new IndexController;
            // tienda
            $tienda = new TiendaController;
            // obtiene a los nuevos miembros de los usuarios
            if (Auth::user()->ID != 1) {
                $new_member = $informacion->newMembers(Auth::user()->ID);
            }else{
                $new_member = User::select('display_name', 'created_at')->get()->sortByDesc('created_at')->take(4);
            }
            // cantidad de todos los rangos en el sistema
            $rangos = json_decode($informacion->chartRangos(Auth::user()->ID));
            // Ranking de mayo usuario con mas comisiones
            $rankingComisiones = $informacion->rankingComisiones();
            // Ranking de mayo usuario con mas Ventas
            $rankingVentas = $informacion->rankingVentas();
            // noticia
             $noticias = $informacion->noticias();
             // Total ventas 
            $totalventas = $informacion->totalventas(Auth::user()->ID);
            // cantidad de ventas 
            $cantventas = $informacion->countOrderNetwork(Auth::user()->ID);
            // cantidad de montos de  ventas 
            $cantventasmont = $informacion->countOrderNetworkMont(Auth::user()->ID);
            // todos los usuarios de un determinado usuario
            $cantAllUsers = (Auth::user()->ID != 1) ? count($TodosUsuarios) : User::all()->count('ID') ;
            $cantAllUsers = ($cantAllUsers == 0) ? 1 : $cantAllUsers;
            // todos los Tickes
            $contTicket = Ticket::all()->count('ID');
            // ordenes de la vista principal
            $transaciones = new TransacionesController;
            $ordenesView = array_slice($transaciones->ordenesView(), 0, 7);
            // Productos nuevos
            $productosnuevos = $tienda->getProductoWP();
            // verificacion de los que compran por el sistema y son aprobado en wordpress
            $informacion->ordenesSistema();
            
            //total cobrado del index de la grafica
            $totalcobrado = Wallet::where('iduser', Auth::user()->ID)->where('tipotransacion', '2')->sum('debito');
            
            //Redes Sociales
            $redes = Redesociales::orderBy('id', 'ASC')->get();
            
            //Pop up
            $pop = Pop::find(1);
            $user = User::find(Auth::user()->ID);
            $user->pop_up = 0;
            $user->save();
            
            //mostrar noticias y gestion de materiales
            $archivo = new ArchivoController;
            
            //noticias
            $noticias = Archivo::orderBy('id','DESC')->get()->take(5);
            $materiales = Contenido::orderBy('id','DESC')->get()->take(5);
            
            //buscar las notificaciones para el calendario
            $calendario = new CalendarioController;
            $calendario->notificarCalendario(Auth::user()->ID);
            
            $monedaAdi = new MonedaAdicionalController;
	        $moneda1 = $monedaAdi->calcularValorMonedas(Auth::user()->wallet_amount, 1);
	        $moneda2 = $monedaAdi->calcularValorMonedas(Auth::user()->wallet_amount, 2);
	        $moneda3 = $monedaAdi->calcularValorMonedas(Auth::user()->wallet_amount, 3);
	        
	        $adicional =0;
		   $monedaAdicional = Monedadicional::find(1);
           if (!empty($monedaAdicional)) { 
            $adicional =1;
           }
       
        
        $component = Component::all();
        //fin Informacion Index
            
        
        
        //anuncios
        $fechaActual = Carbon::now();
        $anuncios = Anuncio::whereDate('inicio','<=', $fechaActual)->whereDate('vencimiento','>=', $fechaActual)->get();
        

            if(Auth::user()->rol_id == 0){ 
                //$permiso = Permiso::where('iduser', Auth::user()->ID)->get()->toArray();
                         DB::table($settings->prefijo_wp.'users')
                        ->where('ID', '=', Auth::user()->ID)
                        ->update(['status' => 1 ]);
    
                       Auth::user()->status = true;
                         }
                         
            
            if(Auth::user()->rol_id != 0){
            view()->share('title', 'Tienda Interna');             
            }else{
             view()->share('title', 'Panel de administración');     
            }
  
        return view('dashboard.index')->with(compact('cantReferidosDirectos', 'cantReferidosIndirectos', 'cantReferidosActivos', 'fechaProxActivacion', 'new_member',
                    'cantventas', 'cantventasmont', 'fullname', 'rangos', 'cantAllUsers', 'rankingComisiones', 'rankingVentas','noticias', 'contTicket', 'moneda',
                    'nombreRol','desde', 'ordenesView', 'productosnuevos','settingPuntos','totalventas','totalcobrado','anuncios','noticias','materiales','binario',
                    'settingEstructura','moneda1','moneda2','moneda3','adicional','redes','pop','component'
            ));
    }

    /**
     * Permite actualizar las informacion de los usuarios 
     * 
     * @access public
     * @return view
     */
    public function ActualizarTodo()
    {
        
        $activacion = new ActivacionController;
        $comi = new ComisionController;  
        $comisiones = new ComisionesController;
        $binario = new BinarioController;
        $funciones = new IndexController;
        $personales = new PuntospersonalesController;
        $crypto = new CryptoController;
        $settingPuntos = SettingsPunto::find(1);
        $seting = Settings::find(1);
        
        //solo si esta activado la configuracion
        //de cryptomoneda se verifican
        //las compras en crypto
        /*
        if($seting->btc == 1){
        $crypto->consultaCompra();
        }
        */
        
        // todo los usuarios del admin
        if(Auth::user()->rol_id == 0){
        $users = User::where('rol_id','!=','0')->get();
        foreach($users as $user){
                $activacion->activarUsuarios($user->ID);
                $comi->verificarCompras($user->ID);
         }
        }
         
        // activa a mis referidos
        if(Auth::user()->rol_id != 0){
        $todousers = $this->generarArregloUsuario(Auth::user()->ID);
        foreach ($todousers as $user ) {
            if ($user['rol'] != 0) {
                $activacion->activarUsuarios($user['ID']);
                $comi->verificarCompras($user['ID']);
            }
          }
        }
        
        $comi->verificarCompras(Auth::user()->ID);
        
        //puntos por compras propias y de red
        /*
        if (!empty($settingPuntos)) {
        $personales->verificarPuntos(Auth::user()->ID);
        $personales->puntosRed(Auth::user()->ID);
        }
        */
        
        // cobra mis comisiones
        $comisiones->ObtenerUsuarios();
        
        //verificamos el bono binario
        //$binario->BonoBinario();
         
        $funciones->msjSistema('Informacion Actualizada Con Exito', 'success');
        return redirect('admin');
    }

    
    /**
     * Función que devuelve los patrocinados de un determinado usuario
     * 
     * @access private
     * @param int $id - id del usuario 
     * @return array
     */
    private function getSponsor($user_id){
        $tmp = User::select('ID', 'user_email', 'status', 'display_name', 'created_at', 'rol_id','puntosPro')->where('position_id', $user_id)->get()->toArray();
		return $tmp;
    }
    
   /**
     * Función que devuelve los referidos de un determinado usuario
     * 
     * @access private
     * @param int $user_id - id del usuario
     * @return array - listado de los referidos del usuario
     */
    public function getReferreds($user_id){
        $referidos = User::select('ID', 'user_email', 'status', 'display_name', 'created_at', 'rol_id','puntosPro')->where('position_id', $user_id)->get()->toArray();
		return $referidos;
	}
    
    /**
     * Obtienen a todo los usuarios referidos de un usuario determinado
     * 
     * @access private
     * @param array $arregloUser - listado de usuario, int $niveles - niveles a recorrer,
     * int $para - nivel a detenerse, array $allUser - todos los usuario referidos
     * @return array - listado de todos los usuario
     */
	private function getReferredsAll($arregloUser, $niveles, $para, $allUser, $tipoestructura)
    {
        if ($niveles <= $para) {
            $llaves =  array_keys($arregloUser);
            $finFor = end($llaves);
            $cont = 0;
            $tmparry = [];
            foreach ($arregloUser as $user) {
                $allUser [] = [
                    'ID' => $user['ID'],
                    'email' => $user['user_email'],
                    'nombre' => $user['display_name'],
                    'status' => $user['status'],
                    'nivel' => $niveles,
                    'fecha' => $user['created_at'],
                    'rol' => $user['rol_id'],
                    'puntosred' => $user['puntosPro'],
                ];
                if ($tipoestructura == 'arbol') {
                    if (!empty($this->getReferreds($user['ID']))) {
                        $tmparry [] = $this->getReferreds($user['ID']);
                    }
                }else{
                    if (!empty($this->getSponsor($user['ID']))) {
                        $tmparry [] = $this->getSponsor($user['ID']);
                    }
                }
                if ($finFor == $cont) {
                    if (!empty($tmparry)) {
                        $tmp2 = $tmparry[0];
                        for($i = 1; $i < count($tmparry); $i++){
                            $tmp2 = array_merge($tmp2,$tmparry[$i]);
                        }
                        $this->getReferredsAll($tmp2, ($niveles+1), $para, $allUser, $tipoestructura);
                    }else{
                        $GLOBALS['allUsers'] = $allUser;
                    }
                }else{
                    $cont++;
                }
          }
        }else{
            $GLOBALS['allUsers'] = $allUser;
        }
    }

    /**
     * Devuelve el tipo de estructura con que se esta trabajando en el sistema
     * 
     * @access public
     * @return string
     */
    public function obtenerEstructura()
    {
        $settingEstructura = SettingsEstructura::find(1);
        $estructura = "";
        if ($settingEstructura->tipoestructura == 'arbol') {
            $estructura = "arbol";
        } elseif ($settingEstructura->tipoestructura == 'matriz') {
            $estructura = "matriz";
        }else{
            if ($settingEstructura->estructuraprincipal == 1) {
                if ($settingEstructura->usuarioprincipal == 1) {
                    $estructura = "arbol";
                } else {
                    $estructura = "matriz";
                }
            } else {
                if ($settingEstructura->usuarioprincipal == 1) {
                    $estructura = "arbol";
                } else {
                    $estructura = "matriz";
                }
            }
        }
        return  $estructura;
    }

    /**
     * Genera el Arreglo de los usuarios referidos
     * 
     * @access public
     * @param $iduser - id del usuario 
     * @return array
     */
    public function generarArregloUsuario($iduser)
    {
        $settingEstructura = SettingsEstructura::find(1);
        $GLOBALS['allUsers'] = [];

        if ($this->obtenerEstructura() == 'arbol') {
            $referidosDirectos = $this->getReferreds($iduser);
            $this->getReferredsAll($referidosDirectos, 1, $settingEstructura->cantnivel, [], 'arbol');
        } else {
            $referidosDirectos = $this->getSponsor($iduser);
            $this->getReferredsAll($referidosDirectos, 1, $settingEstructura->cantnivel, [], 'matriz');
        }

        return $GLOBALS['allUsers'];
    }

    /**
     * Permite Borrar a todos los usuarios del sistema menos al admin
     *
     * @return void
     */
    public function deleteTodos()
        {
            $usuario = User::All();

		foreach ($usuario as $usuari) {
			if ($usuari->ID != 1) {
            $user = User::find($usuari->ID);
            DB::table('user_campo')->where('ID', $usuari->ID)->delete();
            $user->delete();  
            }
		}
            return redirect('admin/userrecords')->with('msj', 'Todos los usuarios han sidos borrados menos el Administrador');
        }
}
