<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Crypt;
use DB; 
use Auth; 
use Session;
use Carbon\Carbon; 
// llamada a los modelos
use App\Models\Rol; 
use App\Models\User; 
use App\Models\Wallet;
use App\Models\Monedas;
use App\Models\Settings; 
use App\Models\Contenido; 
use App\Models\Commission;
use App\Models\SettingsEstructura; 
use App\Models\Pagocarrito;
// controlador
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\WalletControler;


class IndexController extends Controller
{
    /**
     * Función que devuelve los patrocinados de un determinado usuario
     * 
     * @param int $id - id del usuario 
     * @return array
     */
    private function getSponsor($user_id){
        $tmp = User::select('*')->where('position_id', $user_id)->get()->toArray();
		return $tmp;
    }
    
    private function posicion($user_id){
        $tmp = User::select('*')->where('ID', $user_id)->get()->toArray();
		return $tmp;
    }
    /**
     * Función que devuelve los referidos de un determinado usuario
     * 
     * @param int $user_id - id del usuario
     * @return array - listado de los referidos del usuario
     */
    public function getReferreds($user_id){
        $referidos = User::select('*')->where('position_id', $user_id)->get()->toArray();
		return $referidos;
	}
	
	public function referido($user_id){
        $referidos = User::select('*')->where('ID', $user_id)->get()->toArray();
		return $referidos;
	}    
    
    /**
     * Obtienen a todo los usuarios referidos de un usuario determinado
     *
     * @param array $arregloUser - arreglo de usuarios sucio
     * @param integer $niveles - indica el nivel recorrido se empieza de 1
     * @param integer $para - nivel a para el recorrido
     * @param array $allUser - arreglo de usuario limpio
     * @param string $tipoestructura - si es arbo o matriz
     * @return array
     */
	public function getReferredsAll($arregloUser, $niveles, $para, $allUser, $tipoestructura)
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
                    'avatar' => $user['avatar'],
                    'nivel' => $niveles,
                    'fecha' => $user['created_at'],
                    'rol' => $user['rol_id'],
                    'wallet' => $user['wallet_amount'],
                    'tipouser' => $user['tipouser'],
                    'referred' => $user['referred_id'],
                    'lado' => $user['ladomatriz'],
                    'codigo' => $user['codigo'],
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
    
    
    //utilizado por el bono de inicio para obtener la generacion de abajo hacia arriba
    public function buscar($arregloUser, $niveles, $para, $allUser, $tipoestructura)
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
                    'avatar' => $user['avatar'],
                    'nivel' => $niveles,
                    'fecha' => $user['created_at'],
                    'rol' => $user['rol_id'],
                    'wallet' => $user['wallet_amount'],
                    'tipouser' => $user['tipouser'],
                    'lado' => $user['ladomatriz'],
                    'referred' => $user['referred_id'],
                    'position' => $user['position_id'],
                    'codigo' => $user['codigo'],
                ];
                if ($tipoestructura == 'arbol') {
                    if (!empty($this->referido($user['referred_id']))) {
                        $tmparry [] = $this->referido($user['referred_id']);
                    }
                }else{
                    if (!empty($this->posicion($user['position_id']))) {
                        $tmparry [] = $this->posicion($user['position_id']);
                    }
                }
                if ($finFor == $cont) {
                    if (!empty($tmparry)) {
                        $tmp2 = $tmparry[0];
                        for($i = 1; $i < count($tmparry); $i++){
                            $tmp2 = array_merge($tmp2,$tmparry[$i]);
                        }
                        $this->buscar($tmp2, ($niveles+1), $para, $allUser, $tipoestructura);
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
     * Genera el Arreglo de todo la red solo para el admin
     * 
     * @param $iduser - id del usuario 
     * @return array
     */
    public function generarArregloAdmin($iduser)
    {
        
        $cantidad = User::count('ID');
        
        $settingEstructura = SettingsEstructura::find(1);
        $GLOBALS['allUsers'] = [];
        if ($this->obtenerEstructura() == 'arbol') {
            $referidosDirectos = $this->getReferreds($iduser);
            $this->getReferredsAll($referidosDirectos, 1, $cantidad, [], 'arbol');
        } else {
            $referidosDirectos = $this->getSponsor($iduser);
            $this->getReferredsAll($referidosDirectos, 1, $cantidad, [], 'matriz');
        }

        return $GLOBALS['allUsers'];
    }
    
    
    //genera la lista de referidos al reverso de abajo hacia arriba hasta el infinito para bono de inicio
    public function generarArregloReversa($iduser)
    {
        
        $cantidad = User::count('ID');
        
        $user = User::find($iduser);
        $settingEstructura = SettingsEstructura::find(1);
        $GLOBALS['allUsers'] = [];
        if ($this->obtenerEstructura() == 'arbol') {
            $referidosDirectos = $this->referido($user->referred_id);
            $this->buscar($referidosDirectos, 1, $cantidad, [], 'arbol');
        } else {
            $referidosDirectos = $this->posicion($user->position_id);
            $this->buscar($referidosDirectos, 1, $cantidad, [], 'matriz');
        }

        return $GLOBALS['allUsers'];
    }

    /**
     * Obtenie a los nuevos miembros en el sistema
     *  de un usuario en especifico
     *
     * @param integer $iduser  
     * @return void
     */
    public function newMembers($iduser)
    {
        $TodosUsuarios = $this->generarArregloUsuario($iduser);
        $TodosUsuarios = $this->ordenarArreglosMultiDimensiones($TodosUsuarios, 'ID', 'numero');
        return array_slice($TodosUsuarios, 0, 4);
    }

    /**
     * Obtiene la información de las ventas
     * 
     * calcula la cantidad de ventas mensuales
     * 
     * @return array
     */
    public function chartVentas()
    {
        $settings = Settings::first();
        // $sql = "SELECT month(wp.post_date) as mes, SUM(wpm.meta_value) as total FROM $settings->prefijo_wp.postmeta as wpm INNER JOIN $settings->prefijo_wp.posts as wp on (wp.ID = wpm.post_id) WHERE wp.post_status = 'wc-completed' AND wpm.meta_key = '_order_total' AND YEAR(wp.post_date) = year(now()) GROUP BY month(wp.post_date)";
        if (Auth::user()->rol_id != 0) {
            $ventas = DB::table($settings->prefijo_wp.'postmeta')
                        ->join($settings->prefijo_wp.'posts', $settings->prefijo_wp.'postmeta.post_id', '=', $settings->prefijo_wp.'posts.ID')
                        ->join($settings->prefijo_wp.'postmeta as wpm', $settings->prefijo_wp.'postmeta.post_id', '=', 'wpm.post_id')
                        ->select(DB::raw('month('.$settings->prefijo_wp.'posts.post_date) as mes'), DB::raw('SUM('.$settings->prefijo_wp.'postmeta.meta_value) as total'))
                        ->where([
                            [$settings->prefijo_wp.'posts.post_status', '=', 'wc-completed'],
                            [$settings->prefijo_wp.'postmeta.meta_key', '=', '_order_total'],
                            ['wpm.meta_key', '=', '_customer_user'],
                            ['wpm.meta_value', '=', Auth::user()->ID],
                            [DB::raw('YEAR('.$settings->prefijo_wp.'posts.post_date)'), '=', DB::raw('year(now())')],
                        ])->groupBy(DB::raw('month('.$settings->prefijo_wp.'posts.post_date)'))->get();

            $ganancias = DB::table('walletlog')
                        ->select(DB::raw('month(created_at) as mes'), DB::raw('SUM(debito) as total'))
                        ->where([
                            ['iduser', '=', Auth::user()->ID],
                            [DB::raw('YEAR(created_at)'), '=', DB::raw('year(now())')],
                        ])->groupBy(DB::raw('month(created_at)'))->get();

        } else {
            $ventas = DB::table($settings->prefijo_wp.'postmeta')
                        ->join($settings->prefijo_wp.'posts', $settings->prefijo_wp.'postmeta.post_id', '=', $settings->prefijo_wp.'posts.ID')
                        ->select(DB::raw('month('.$settings->prefijo_wp.'posts.post_date) as mes'), DB::raw('SUM('.$settings->prefijo_wp.'postmeta.meta_value) as total'))
                        ->where([
                            [$settings->prefijo_wp.'posts.post_status', '=', 'wc-completed'],
                            [$settings->prefijo_wp.'postmeta.meta_key', '=', '_order_total'],
                            [DB::raw('YEAR('.$settings->prefijo_wp.'posts.post_date)'), '=', DB::raw('year(now())')],
                        ])->groupBy(DB::raw('month('.$settings->prefijo_wp.'posts.post_date)'))->get();
            
            $ganancias = DB::table('walletlog')
                            ->select(DB::raw('month(created_at) as mes'), DB::raw('SUM(debito) as total'))
                            ->where(DB::raw('YEAR(created_at)'), '=', DB::raw('year(now())'))
                            ->groupBy(DB::raw('month(created_at)'))->get();
        }
        $tmp = [];
        for ($i=1; $i < 13; $i++) { 
            array_push($tmp, [
                'mes' => $i,
                'total' => 0,
                'ganancia' => 0
            ]);
        }
        if (!empty($ventas)) {
            foreach ($ventas as $venta) {
                $tmp[($venta->mes -1)]['total'] = $venta->total;
            }
        }
        if (!empty($ganancias)) {
            foreach ($ganancias as $ganancia) {
                $tmp[($ganancia->mes -1)]['ganancia'] = $ganancia->total;
            }
        }

        return json_encode($tmp);
    }

    /**
     * Obtiene la información de los rangos
     * 
     * calcula la cantidad de rangos que estan en el sistema
     * 
     * @return array
     */
    public function chartRangos()
    {
        $settings = Settings::first();
        // $sql = "SELECT r.name, COUNT(wu.rol_id) FROM roles as r LEFT JOIN $settings->prefijo_wp.users as wu on (r.id = wu.rol_id) GROUP BY r.name";
        if (Auth::user()->ID != 1) {
            if ($this->obtenerEstructura() == 'arbol') {
                $roles = DB::table('roles')
                    ->leftjoin($settings->prefijo_wp.'users', 'roles.id', '=', $settings->prefijo_wp.'users.rol_id')
                    ->select('roles.name', DB::raw('COUNT('.$settings->prefijo_wp.'users.rol_id) as cantidad'))
                    ->where($settings->prefijo_wp.'users.position_id', Auth::user()->ID)
                    ->orderBy('roles.id', 'asc')
                    ->groupBy('roles.name')->get();
            } else {
                $roles = DB::table('roles')
                    ->leftjoin($settings->prefijo_wp.'users', 'roles.id', '=', $settings->prefijo_wp.'users.rol_id')
                    ->select('roles.name', DB::raw('COUNT('.$settings->prefijo_wp.'users.rol_id) as cantidad'))
                    ->where($settings->prefijo_wp.'users.position_id', Auth::user()->ID)
                    ->orderBy('roles.id', 'asc')
                    ->groupBy('roles.name')->get();
            }
        } else {
            $roles = DB::table('roles')
                    ->join($settings->prefijo_wp.'users', 'roles.id', '=', $settings->prefijo_wp.'users.rol_id')
                    ->select('roles.name', DB::raw('COUNT('.$settings->prefijo_wp.'users.rol_id) as cantidad'))
                    ->orderBy('roles.id', 'asc')
                    ->groupBy('roles.name')->get();
        }
        
        return json_encode($roles);
    }

    /**
     * Obtiene la información de los usuarios
     * 
     * calcula la cantidad de usuario que tiene el sistema, tambien calcula la cantidad activos e inactivos
     * 
     * @return array
     */
    public function chartUsuarios()
    {
        $cantReferidosActivos = 0;
        $cantReferidosInactivos = 0;
        if (Auth::user()->ID != 1) {
        
        $allUser = $this->generarArregloUsuario(Auth::user()->ID);
        foreach ($allUser as $user) {
            if ($user['status'] == 1) {
                $cantReferidosActivos++;
            } else {
                $cantReferidosInactivos++;
            }   
        }
        } else {
            $cantReferidosActivos = User::where([['ID', '!=', 1], ['status', '=', 1]])->count('ID');
            $cantReferidosInactivos = User::where([['ID', '!=', 1], ['status', '=', 0]])->count('ID'); 
        }
        
        $datos = [
            'activos' => $cantReferidosActivos,
            'inactivos' => $cantReferidosInactivos
        ];
        return json_encode($datos);
    }

    /**
     * Realiza un rankig de los 5 usuarios com mas comisiones
     * 
     * @return array
     */
    public function rankingComisiones()
    {
        $ranking = [];
        $clave = "";
        if (Auth::user()->ID != 1) {
            $users = $this->generarArregloUsuario(Auth::user()->ID);
            $clave = 'nombre';
        } else {
            $users = User::all()->toArray();
            $clave = 'display_name';
        }
        foreach ($users as $user) {
            $ranking [] = [
                'usuario' => $user[$clave],
                'totalcomision' => Commission::where('user_id', $user['ID'])->get()->sum('total'),
            ];
        }

        $ranking = $this->ordenarArreglosMultiDimensiones($ranking, 'totalcomision', 'numero');
        
        return array_slice($ranking, 0, 5);;
    }

    /**
     * Realiza un rankig de los usuarios com mas comisiones
     * 
     * @access public
     * @return array
     */
    public function rankingComisiones2()
    {
        $ranking = [];
        $clave = "";
        if (Auth::user()->rol_id != 0) {
            $users = $this->generarArregloUsuario(Auth::user()->ID);
            $clave1 = 'ID';
            $clave4 = 'wallet';
        } else {
            $users = User::all()->toArray();
            $clave1 = 'ID';
            $clave4 = 'wallet_amount';
        }
        foreach ($users as $user) {     
            $usuario = DB::table('user_campo')
                        ->where('ID', '=', $user['ID'] )
                        ->get();
            foreach ($usuario as $usua){
                $usuario1=$usua->ID;
                $usuario=$usua->nameuser;
                $usuario2=$usua->firstname;
                $usuario3=$usua->lastname;
            
                $ranking [] = [
                    'usuario' => $usuario,
                    'usuario1' => $usuario1,
                    'usuario2' => $usuario2,
                    'usuario3' => $usuario3,
                    'usuario4' => $user[$clave4],
                    'total' => Wallet::where('iduser', $user['ID'])->get()->sum('debito'),
                ];
            } 
        }
        $ranking = $this->ordenarArreglosMultiDimensiones($ranking, 'total', 'numero');
        
        return array_slice($ranking, 0, 50);;
    }
    
    
    public function noticias()
    {
        $contenido=Contenido::orderBy('id','DESC')->paginate(3);
        return $contenido;
    }

    /**
     * Realiza un rankig de los 5 usuarios com mas Compras
     * 
     * @return array
     */
    public function rankingVentas()
    {
        $settings = Settings::first();
        $moneda = Monedas::where('principal', 1)->get()->first();
        $ranking = [];
        $clave = "";
        if (Auth::user()->ID != 1) {
            $users = $this->generarArregloUsuario(Auth::user()->ID);
            $clave = "nombre";
        } else {
            $users = User::all()->toArray();
            $clave = "display_name";
        }
        foreach ($users as $user) {
            $cantVentasMont = 0;
            $ordenes = DB::table($settings->prefijo_wp.'postmeta')
                            ->select('post_id')
                            ->where('meta_key', '=', '_customer_user')
                            ->where('meta_value', '=', $user['ID'])
                            ->orderBy('post_id', 'DESC')
                            ->get();

            foreach ($ordenes as $orden){
                $totalOrden = DB::table($settings->prefijo_wp.'postmeta')
                        ->select('meta_value')
                        ->where('post_id', '=', $orden->post_id)
                        ->where('meta_key', '=', '_order_total')
                        ->first();
                        $valor = trim(str_replace($moneda->simbolo, ' ', $totalOrden->meta_value));
                        $cantVentasMont = ((int)$valor + $cantVentasMont);
            }
            $ranking [] = [
                'usuario' => $user[$clave],
                'totalventas' => $cantVentasMont,
            ];
        }

        $ranking = $this->ordenarArreglosMultiDimensiones($ranking, 'totalventas', 'numero');
        
        return array_slice($ranking, 0, 5);
    }

    /**
     * Permite ordenar el arreglo primario con las claves de los arreglos segundarios
     * 
     * @param array $arreglo - el arreglo que se va a ordenar, string $clave - con que se hara la comparecion de ordenamiento,
     * stridn $forma - es si es cadena o numero
     * @return array
     */
    public function ordenarArreglosMultiDimensiones($arreglo, $clave, $forma)
    {
        usort($arreglo, $this->build_sorter($clave, $forma));
        return $arreglo;
    }

    /**
     * compara las clave del arreglo
     * 
     * @param string $clave - llave o clave del arreglo segundario a comparar
     * @return string
     */
    private function build_sorter($clave, $forma) {
        return function ($a, $b) use ($clave, $forma) {
            if ($forma == 'cadena') {
                return strnatcmp($a[$clave], $b[$clave]);
            } else {
                return $b[$clave] - $a[$clave] ;
            }
        };
    }

    /**
     * Obtiene todas las ventas de la red
     * 
     * @param int $iduser - id del usuario
     * @return int 
     */
    public function countOrderNetwork($iduser)
    {
        $TodosUsuarios = $this->generarArregloUsuario($iduser);
        $compras = array();
        $cantVentas = 0;
        $settings = Settings::first();
        foreach($TodosUsuarios as $user){
            $ordenes = DB::table($settings->prefijo_wp.'postmeta')
                            ->select('post_id')
                            ->where('meta_key', '=', '_customer_user')
                            ->where('meta_value', '=', $user['ID'])
                            ->orderBy('post_id', 'DESC')
                            ->get();

            foreach ($ordenes as $orden){
                $cantVentas++;
            }
        }
        return $cantVentas;
    }
    
    
    public function totalventas($iduser)
    {
        $TodosUsuarios = $this->generarArregloUsuario($iduser);
        $compras = array();
        $totalventas = 0;
        $settings = Settings::first();
        foreach($TodosUsuarios as $user){
            $ordenes = DB::table($settings->prefijo_wp.'postmeta')
                            ->select('post_id')
                            ->where('meta_key', '=', '_customer_user')
                            ->where('meta_value', '=', $user['ID'])
                            ->orderBy('post_id', 'DESC')
                            ->get();

            foreach ($ordenes as $orden){
                $totalOrden = DB::table($settings->prefijo_wp.'postmeta')
                        ->select('meta_value')
                        ->where('post_id', '=', $orden->post_id)
                        ->where('meta_key', '=', '_order_total')
                        ->first();
                $totalventas = ($totalOrden->meta_value + $totalventas);
            }
        }
        
        return $totalventas;
    }

    /**
     * Obtiene el monto de todas las ventas de la red
     * 
     * @param int $iduser - id del usuario
     * @return float
     */
    public function countOrderNetworkMont($iduser)
    {
        $TodosUsuarios = $this->generarArregloUsuario($iduser);
        $compras = array();
        $cantVentasMont = 0;
        $settings = Settings::first();
        foreach($TodosUsuarios as $user){
            $ordenes = DB::table($settings->prefijo_wp.'postmeta')
                            ->select('post_id')
                            ->where('meta_key', '=', '_customer_user')
                            ->where('meta_value', '=', $user['ID'])
                            ->orderBy('post_id', 'DESC')
                            ->get();

            foreach ($ordenes as $orden){
                $totalOrden = DB::table($settings->prefijo_wp.'postmeta')
                        ->select('meta_value')
                        ->where('post_id', '=', $orden->post_id)
                        ->where('meta_key', '=', '_order_total')
                        ->first();
                $cantVentasMont = ($totalOrden->meta_value + $cantVentasMont);
            }
        }
        return $cantVentasMont;
    }

    /**
     * Permite general los mensajes hacia el usuario y el tipo
     *
     * @param string $msj - mensajes a mostrar al usuario
     * @param string $tipo - (success) si es bueno, 
     *  (info) si es informativo
     *  (warning) si es de advertencia
     *  (danger) si es de error
     * @return void
     */
    public function msjSistema(string $msj, string $tipo)
    {
        Session::flash('msj', $msj);
        Session::flash('tipo', $tipo);
    }

    /**
     * Permite Saber cuales cuales compras se aprobaron por el wordpress 
     *  para poder descontar que se compro
     *
     * @return void
     */
    public function ordenesSistema()
    {
        
        $seting = Settings::find(1);
        
        if($seting->btc == 0){
        $tienda = new TiendaController;
        $solicitudes = $tienda->ArregloCompra();
        foreach ($solicitudes as $solicitud) {
            $pagocarrito = Pagocarrito::where('idcompra', $solicitud['idcompra'])->first();
            
            if($pagocarrito != null){
            if($pagocarrito->metodo == 1){
            $idcomision = $solicitud['idcompra'].$solicitud['idusuario'];
            $verificar = Wallet::where('idcomision', $idcomision)->first();
            if (empty($verificar) && $solicitud['estado'] == 'Completado') {
                $user = User::find($solicitud['idusuario']);
                $admin = User::find(1);
                $user->wallet_amount = ($user->wallet_amount - floatval($solicitud['total']));
                $admin->wallet_amount = ($admin->wallet_amount + floatval($solicitud['total']));
                $user->save();
                $datos = [
                    'iduser' => $solicitud['idusuario'],
                    'idcomision' => $idcomision,
                    'usuario' => $user->display_name,
                    'descripcion' => 'Orden '.$solicitud['idcompra'].' realizada en el sistema, usuario: '.$user->display_name,
                    'descuento' => 0,
                    'debito' => 0,
                    'credito' => floatval($solicitud['total']),
                    'balance' => $user->wallet_amount,
                    'tipotransacion' => 1
                ];
                $wallet = new WalletController;
                $wallet->saveWallet($datos);
                      }
                   }
               }
            }
        }
    }

}
