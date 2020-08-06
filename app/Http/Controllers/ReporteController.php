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
use App\Models\Pagos;
use App\Models\Wallet;
use App\Models\Settings; 
use App\Models\Commission;
use App\Models\Notification;
use App\Models\SettingsEstructura; 
use App\Models\Ganancia;
// controladores
use App\Http\Controllers\RangoController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ActivacionController;

class ReporteController extends Controller
{
	function __construct()
	{
        // TITLE
		view()->share('title', 'Informes');
	}


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
    
    public function getReferreds($user_id){
        $referidos = User::select('*')->where('position_id', $user_id)->get()->toArray();
    return $referidos;
  }
  
  private function getSponsor($user_id){
        $tmp = User::select('*')->where('position_id', $user_id)->get()->toArray();
    return $tmp;
    }
  
    private function getReferredsAll($arregloUser, $niveles, $para, $allUser, $tipoestructura)
    {
        if ($niveles < $para) {
            $llaves =  array_keys($arregloUser);
            $finFor = end($llaves);
            $cont = 0;
            $tmparry = [];
            foreach ($arregloUser as $user) {
                $allUser [] = [
                    'ID' => $user['ID'],
                    'referred' => $user['referred_id'],
                    'email' => $user['user_email'],
                    'nombre' => $user['display_name'],
                    'status' => $user['status'],
                    'nivel' => $niveles,
                    'fecha' => $user['created_at'],
                    'rol' => $user['rol_id'],
                    'wallet' => $user['wallet_amount'],
                    'tipouser' => $user['tipouser']
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
	
	//perfil
	 public function perfil()
    {
        view()->share('title', 'Informes de Perfil');
        
        return view('info.perfil');
    }
    
    //buscar por nombre para los reportes de perfil
    public function nombre(Request $request)
    {
        
        view()->share('title', 'Informes de Perfil');
        
        $funciones = new IndexController;
        view()->share('do', collect(['name' => 'inicio', 'text' => 'Inicio']));
        $settings = Settings::first();        

          $buscar = DB::table($settings->prefijo_wp.'users')
                    ->where('user_nicename', '=', $request->user_nicename)
                    ->first();
                           
                            
            if($buscar == null){
                $funciones->msjSistema('El nombre ('.$request->user_nicename.'), no esta registrado en el sistema', 'warning');
                return redirect()->back();
            }
                
             if($buscar != null){   
    
                  $buscar = DB::table($settings->prefijo_wp.'users')
                ->where('user_nicename', '=', $request->user_nicename)
                ->get();  
       
            }
             return view('info.nombre')->with(compact('buscar'));
    }
    
    
     public function usuario(Request $request)
    {
        $funciones = new IndexController;
        view()->share('title', 'Informes de Perfil');
        view()->share('do', collect(['name' => 'inicio', 'text' => 'Inicio']));
        
        $settings = Settings::first();

          $buscar = DB::table($settings->prefijo_wp.'users')
                            ->where('ID', '=', $request->id)
                            ->first();
                           
                            
            if($buscar == null){
                $funciones->msjSistema('El ID ('.$request->id.'), no esta registrado en el sistema', 'warning');
                return redirect()->back();
            }
                
             if($buscar != null){   
              
                  $buscar = DB::table($settings->prefijo_wp.'users')
                            ->where('ID', '=', $request->id)
                            ->get();  
       
            }
             return view('info.mostrar-usuario')->with(compact('buscar'));
    }
    
    public function mostrarusuario()
    {
        view()->share('title', 'Informes de Perfil');
        
        return view('info.mostrar-usuario');
    }
    
    public function lista(Request $request)
    {
        
        view()->share('title', 'Informes de Perfil');
        
       $primero = $request->primer_id;
         $segundo = $request->segundo_id;
         
         
         $usuario = User::All();
      
        return view('info.lista-final')->with(compact('usuario','primero','segundo'));
      
    }
    
    public function listafinal()
    {
        view()->share('title', 'Informes de Perfil');
        
        return view('info.lista-final');
    }
    
    //termina el perfil
    
    
    //empieza activacion
     public function activacion()
    {
        view()->share('title', 'Informes de Activacion');
        
        return view('info.activacion');
    }
    
    
     public function mostraractivo(Request $request)
    {
      view()->share('title', 'Informes de Activacion');
         
      $usuario = $this->generarArregloUsuario(Auth::user()->ID);
     $primero =date('d-m-Y', strtotime($request->primer_id));
        $segundo =date('d-m-Y', strtotime($request->segundo_id));
         
     
        return view('info.mostrar-activo')->with(compact('usuario','primero','segundo'));
    }
    
    
    
     public function fecha(Request $request)
    {
        view()->share('title', 'Informes de Activacion');
        
       $usuario = $this->generarArregloUsuario(Auth::user()->ID);
     $primero =date('d-m-Y', strtotime($request->fecha));
     
                
        return view('info.fecha')->with(compact('usuario','primero'));
    }
    
    //termina la activacion
    
    
    //rango
     public function rango()
    {
        view()->share('title', 'Informes de Rango');
        
        $rangos = Rol::all();
        return view('info.rango')->with(compact('rangos'));
    }
    
    public function mostrarrango(Request $request)
    {
        view()->share('title', 'Informes de Rango');
        
        $settings = Settings::first();
      $rango = DB::table($settings->prefijo_wp.'users')
                            ->where('rol_id', '=', $request->rango)
                            ->get();
    
    return view('info.mostrar-rango')->with(compact('rango'));
    }
    //fin rango
    
    
    //comisiones
    public function comisiones()
    {
        view()->share('title', 'Informes de Comisiones');
        
        return view('info.comisiones');
    }
    
     public function mostrarcomisiones(Request $request)
    {
        view()->share('title', 'Informes de Comisiones');
         
      $lista=Commission::where('user_id', '=', Auth::user()->ID)
             ->whereDate("date",">=",$request->primero)
             ->whereDate("date","<=",$request->segundo)
             ->where('total', '!=', 0)
             ->get(); 
        return view('info.mostrar-comisiones')->with(compact('lista'));
    }
    //termina comisiones
    
    //pagos
     public function pagos()
    {
        view()->share('title', 'Informes de Pagos');
        
        $pagos = Pagos::where('estado', 1)->get();
        return view('info.pagos')->with(compact('pagos'));
    }
    
    public function pagosusuario(Request $request)
    {
        view()->share('title', 'Informes de Pagos');
        
       $pagos=Pagos::search($request->get('iduser'))->orderBy('id','ASC')->paginate(1);
      
     return view('info.pagosusuario')->with('pagos',$pagos);
    }
    
     public function buscar(Request $request)
    {
       view()->share('title', 'Informes de Pagos');
         
      $pagos=Pagos::whereDate("fechapago",">=",$request->primero)
             ->whereDate("fechapago","<=",$request->segundo)
             ->get(); 
        return view('info.pagosusuario')->with('pagos',$pagos);
      
    }
    //fin pagos
    
    //inicio reportes de pagos
    public function reportes()
    {
        view()->share('title', 'Informes de Pagos');
        
        return view('info.reportes');
    }
    
    public function todos()
    {
        view()->share('title', 'Informes de Pagos');
        
         $pago=Pagos::orderBy('id','ASC')->paginate(10);
       return view('info.todos')->with('pago',$pago);
    }
    
     public function reporfecha(Request $request)
    {
      view()->share('title', 'Informes de Pagos');
         
      $pago=Pagos::whereDate("fechapago",">=",$request->primero)
             ->whereDate("fechapago","<=",$request->segundo)
             ->get(); 
        return view('info.todos')->with('pago',$pago);
    }
    
    public function nombrebus(Request $request)
    {
        view()->share('title', 'Informes de Pagos');
        
        $funciones = new IndexController;
        $pago = DB::table('pagos')
                            ->where('username', '=', $request->nombre)
                            ->first();
                           
                            
            if($pago == null){
                $funciones->msjSistema('El nombre ('.$request->nombre.'), no tiene pago en el sistema', 'warning');
                return redirect()->back();
            }
            
            if($pago != null){   
             
                  $pago = DB::table('pagos')
                            ->where('username', '=', $request->nombre)
                            ->get();  
       
            }
             return view('info.todos')->with('pago',$pago);
    }
    //fin reportes de pagos
    
    
    
    //inicio de reporte comision
    public function reporcomi()
    {
        view()->share('title', 'Informes de Comisiones');
        
        return view('info.repor-comi');
    }
    
    public function reportodos(Request $request)
    {
      view()->share('title', 'Informes de Comisiones');
        
        $comision=Commission::where('user_id', '=', Auth::user()->ID)
              ->whereDate("date", '>=', $request->primero)
             ->whereDate("date", '<=', $request->segundo)
             ->where('total', '!=', 0)
             ->get(); 
        return view('info.repor-todos')->with('comision',$comision);
    }
    //fin de reporte de comision
    
    //inicia ventas
    public function ventas()
    {
        view()->share('title', 'Informes de Ventas');
        
        return view('info.ventas');
    }
    
    public function informe_fecha()
    {
        view()->share('title', 'Informes de Ventas');
        
       $primero =date('d-m-Y', strtotime($_POST['fecha']));
      $settings = Settings::first();
     $ordenes = DB::table($settings->prefijo_wp.'postmeta')
                    ->select('post_id')
                    ->where('meta_key', '=', '_customer_user')
                    ->orderBy('post_id', 'DESC')
                    ->get();
                    
        return view('info.informe_fecha')->with(compact('ordenes','primero'));
    }
    
    public function informe_ventas()
    {
        view()->share('title', 'Informes de Ventas');
        
       $primero =date('d-m-Y', strtotime($_POST['fecha1']));
       $segundo =date('d-m-Y', strtotime($_POST['fecha2']));
      $settings = Settings::first();
     $ordenes = DB::table($settings->prefijo_wp.'postmeta')
                    ->select('post_id')
                    ->where('meta_key', '=', '_customer_user')
                    ->orderBy('post_id', 'DESC')
                    ->get();
                    
        return view('info.informe_ventas')->with(compact('ordenes','primero','segundo'));
    }
    //fin informe de ventas
    
    //informe de liquidacion 
    public function liquidacion()
    {
        view()->share('title', 'Informes de Liquidacion');
        
            $liquidacion = Wallet::where([
                    ['iduser', '=', Auth::user()->ID],
                    ['tipotransacion', '=', 0],
                ])->orWhere([
                    ['iduser', '=', Auth::user()->ID],
                    ['tipotransacion', '=', 1]
                ])
                ->get();
                
        return view('info.liquidacion')->with(compact('liquidacion'));
    }

    /**
     * Permite visualizar los feed que se gana el admin
     *
     * @return view
     */
    public function descuentos()
    {
        view()->share('title', 'Informes de Descuentos');
        
        $pagos = Wallet::where([
            ['tipotransacion', '=', 0],
        ])->orWhere([
            ['tipotransacion', '=', 1]
        ])
        ->get();
        
        return view('info.descuento')->with(compact('pagos'));
    }
    
    
    public function ganancia(){
        
        view()->share('title', 'Informes de Comisiones');
        
          $ganancias = Ganancia::find(1);
        if (!empty($ganancias)) {
            $tipo = $ganancias->tipo;
         $ganancias->configuracion = json_decode($ganancias->configuracion);
        }
        
         return view('info.ganancia')->with(compact('ganancias','tipo'));
    }
    
    
    
    public function referidoscompleto(){
        
        view()->share('title', 'Informes de Referidos');
        
        $activar = new ActivacionController;
        $index = new IndexController;
        $datos = [];
        
        if(Auth::user()->rol_id != 0){
         $usuario = $this->generarArregloUsuario(Auth::user()->ID);
        }else{
            $usuario = $index->generarArregloAdmin(Auth::user()->ID);
        }
         foreach($usuario as $usuari){
             
              $dni = DB::table('user_campo')
                ->select('document')
                ->where('ID', '=', $usuari['ID'])
                ->first(); 
             
             $user = User::find($usuari['ID']);
             $referido = User::find($usuari['referred']);
             
            $ultima = $activar->ultimaCompra($usuari['ID']);
            
            $afiliados = $this->cantidadAfiliados($usuari['ID']);
             
              array_push($datos, [
            'ID' => $usuari['ID'],
            'usuario' => $usuari['nombre'],
            'dni' => $dni->document,
            'tipo' => $usuari['tipouser'],
            'patrocinador' => $referido->display_name,
            'nivel' => $usuari['nivel'],
            'billetera' => $usuari['wallet'],
            'ultimacompra' => $ultima,
            'ingreso' => $usuari['fecha'],
            'afiliados' => $afiliados,
            'ganancia' => Wallet::where('iduser', $usuari['ID'])->sum('debito'),
          ]);
         }
        
        return view('info.referidoscompleto')->with(compact('datos'));
    }
    
    
   public function cantidadAfiliados($iduser){
       
       $usuario = $this->generarArregloUsuario($iduser);
       
       $cantidad = count($usuario);
       
       return $cantidad;
   }
    
}	