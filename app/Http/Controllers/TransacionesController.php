<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;
// llamado a los modelos
use App\Models\User;
use App\Models\Settings;
use App\Models\Compradirecta;
use App\Models\Monedadicional; 
use App\Models\Monedas;
use App\Models\Pagocarrito;
// llamado a los controladores
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\MonedaAdicionalController;
use App\Http\Controllers\ComisionesController;

class TransacionesController extends Controller
{
    /**
     * lleva a la vista de las ordenes personales
     *
     * @return view
     */
    public function personal_orders(){
        // TITLE
      view()->share('title', 'Transacciones Personales');
      
      $moneda = Monedas::where('principal', 1)->get()->first();
      $settings = Settings::first();
      $ordenes = DB::table($settings->prefijo_wp.'postmeta')
                  ->select('post_id')
                  ->where('meta_key', '=', '_customer_user')
                  ->where('meta_value', '=', Auth::user()->ID)
                  ->orderBy('post_id', 'DESC')
                  ->get();

    $compras = [];
    foreach ($ordenes as $orden){
        $compras = $this->getDetailsOrder($orden->post_id, $compras, 0, []);
    }

    return view('transaciones.personalOrders')->with(compact('compras','moneda'));
  }

    /**
     * Permite filtrar por fechas mis compras personales
     *
     * @param Request $datos - informacion de las fechas a buscar
     * @return view
     */
    public function buscarpersonalorder(Request $datos){
        
        $validate = $datos->validate([
            'fecha1' => 'required|date',
            'fecha2' => 'required|date'
        ]);
        if ($validate) {
            $settings = Settings::first();
            $primero = date('d-m-Y', strtotime($datos->fecha1));
            $segundo = date('d-m-Y', strtotime($datos->fecha2));

            if ($primero > $segundo) {
                $funciones = new IndexController;
                $funciones->msjSistema('La Fecha Desde no puede ser mayor que la Fecha Hasta', 'warning');
                return redirect()->back()->withInput();
            }

            // TITLE
            view()->share('title', 'Transacciones Personales rango de '.$primero.' a '.$segundo);

            $fechas = [
                'inicio' => $primero,
                'fin' => $segundo
            ];
        
            $ordenes = DB::table($settings->prefijo_wp.'postmeta')
                    ->select('post_id')
                    ->where('meta_key', '=', '_customer_user')
                    ->where('meta_value', '=', Auth::user()->ID)
                    ->orderBy('post_id', 'DESC')
                    ->get();

            $compras = [];
            foreach ($ordenes as $orden){
                $compras = $this->getDetailsOrder($orden->post_id, $compras, 0, $fechas);
            }
           
           $moneda = Monedas::where('principal', 1)->get()->first();
           
            return view('transaciones.personalOrders')->with(compact('compras','moneda'));
        }
    }

    /**
     * Permite obtener las informacion de las compras realizadas
     *
     * @param integer $order_id - id de la compra a verificar
     * @param array $array_datos - arreglo donde se va a guardar la informacion
     * @param integer $level - nivel de referido del usuario
     * @param array $fechas - arreglo para el filtro por fecha
     * @return array
     */
    public function getDetailsOrder($order_id, $array_datos, $level, $fechas){
        $settings = Settings::first();
        $numOrden = DB::table($settings->prefijo_wp.'postmeta')
                        ->select('meta_value')
                        ->where('post_id', '=', $order_id)
                        ->where('meta_key', '=', '_order_key')
                        ->first();

        $fechaOrden = DB::table($settings->prefijo_wp.'posts')
                        ->select('post_date')
                        ->where('ID', '=', $order_id)
                        ->first();

        $totalOrden = DB::table($settings->prefijo_wp.'postmeta')
                        ->select('meta_value')
                        ->where('post_id', '=', $order_id)
                        ->where('meta_key', '=', '_order_total')
                        ->first();

        $nombreOrden = DB::table($settings->prefijo_wp.'postmeta')
                        ->select('meta_value')
                        ->where('post_id', '=', $order_id)
                        ->where('meta_key', '=', '_billing_first_name')
                        ->first();

        $apellidoOrden = DB::table($settings->prefijo_wp.'postmeta')
                        ->select('meta_value')
                        ->where('post_id', '=', $order_id)
                        ->where('meta_key', '=', '_billing_last_name')
                        ->first();

    $nombreCompleto = '';
        if (!empty($nombreOrden->meta_value) && !empty($apellidoOrden->meta_value)) {
      $nombreCompleto = $nombreOrden->meta_value." ".$apellidoOrden->meta_value;
        }

        $itemsOrden = DB::table($settings->prefijo_wp.'woocommerce_order_items')
                        ->select('order_item_name')
                        ->where('order_id', '=', $order_id)
                        ->where('order_item_type', '=', 'line_item')
                        ->get();

        $estadoOrden = DB::table($settings->prefijo_wp.'posts')
                        ->select('post_status')
                        ->where('ID', '=', $order_id)
                        ->first();

        $estadoEntendible = '';
        switch ($estadoOrden->post_status) {
            case 'wc-completed':
                $estadoEntendible = 'Completado';
                break;
            case 'wc-pending':
                $estadoEntendible = 'Pendiente de Pago';
                break;
            case 'wc-processing':
                $estadoEntendible = 'Procesando';
                break;
            case 'wc-on-hold':
                $estadoEntendible = 'En Espera';
                break;
            case 'wc-cancelled':
                $estadoEntendible = 'Cancelado';
                break;
            case 'wc-refunded':
                $estadoEntendible = 'Reembolsado';
                break;
            case 'wc-failed':
                $estadoEntendible = 'Fallido';
                break;
        }

        $items = "";
        foreach ($itemsOrden as $item){
            $items = $items." ".$item->order_item_name;
        }
        

        if (empty($fechas)) {
            $array_datos [] = [
                'ordenID' => $order_id,
                'nombreUsuario' => $nombreCompleto,
                'fechaOrden' => $fechaOrden->post_date,
                'items' => $items,
                'total' => $totalOrden->meta_value,
                'nivelUsuario' => $level,
                'estadoCompra' => $estadoEntendible,
            ];
        } else {
            $fechaInicio = new Carbon($fechas['inicio']);
            $fechaFin = new Carbon($fechas['fin']);
            $fechacompra = new Carbon($fechaOrden->post_date);
            if ($fechacompra->format('ymd') >= $fechaInicio->format('ymd') && $fechacompra->format('ymd') <= $fechaFin->format('ymd')) {
                $array_datos [] = [
                    'ordenID' => $order_id,
                    'nombreUsuario' => $nombreCompleto,
                    'fechaOrden' => $fechaOrden->post_date,
                    'items' => $items,
                    'total' => $totalOrden->meta_value,
                    'nivelUsuario' => $level,
                    'estadoCompra' => $estadoEntendible,
                ];
            }
        }
        return($array_datos);
    }



    public function agrupar($iduser, $fechas){
        
        
        $total =0; $totalmes=0;
        $arreglo=[]; $concatenar ='';
        $user = User::find($iduser);
        $finDeMes = Carbon::now()->endOfMonth();
        $principioMes = Carbon::now()->startOfMonth();
        $fin = new Carbon($finDeMes);
        $principio = new Carbon($principioMes);
        
        $comisiones = new ComisionesController;
        $settings = Settings::first();
        $ordenes = DB::table($settings->prefijo_wp.'postmeta')
                            ->select('post_id')
                            ->where('meta_key', '=', '_customer_user')
                            ->where('meta_value', '=', $iduser)
                            ->orderBy('post_id', 'ASC')
                            ->get();
            
            
        foreach ($ordenes as $orden){
            
            $datosCompra = $comisiones->getShoppingDetails($orden->post_id);
            
            $totalOrden = DB::table($settings->prefijo_wp.'postmeta')
                        ->select('meta_value')
                        ->where('post_id', '=', $orden->post_id)
                        ->where('meta_key', '=', '_order_total')
                        ->first();
                        
            $estadoOrden = DB::table($settings->prefijo_wp.'posts')
                        ->select('post_status')
                        ->where('ID', '=', $orden->post_id)
                        ->first();
                        
            $estadoEntendible = '';
        switch ($estadoOrden->post_status) {
            case 'wc-completed':
                $estadoEntendible = 'Completado';
                break;
            case 'wc-pending':
                $estadoEntendible = 'Pendiente de Pago';
                break;
            case 'wc-processing':
                $estadoEntendible = 'Procesando';
                break;
            case 'wc-on-hold':
                $estadoEntendible = 'En Espera';
                break;
            case 'wc-cancelled':
                $estadoEntendible = 'Cancelado';
                break;
            case 'wc-refunded':
                $estadoEntendible = 'Reembolsado';
                break;
            case 'wc-failed':
                $estadoEntendible = 'Fallido';
                break;
        }            
        
          if (empty($fechas)) {           
            if($estadoEntendible == 'Completado'){
                
            $fechacompra = new Carbon($datosCompra->post_date);
                
            $concatenar .= $orden->post_id.', ';
            $total = ($total + $totalOrden->meta_value);
            
            if($fechacompra->format('ymd') >= $principio->format('ymd')
            && $fechacompra->format('ymd') <= $fin->format('ymd')){
                $totalmes = ($totalmes + $totalOrden->meta_value);
            }
            
            }
          }else{
            $fechaInicio = new Carbon($fechas['inicio']);
            $fechaFin = new Carbon($fechas['fin']);
            $fechacompra = new Carbon($datosCompra->post_date);
            
            if ($fechacompra->format('ymd') >= $fechaInicio->format('ymd') && $fechacompra->format('ymd') <= $fechaFin->format('ymd')) {
                if($estadoEntendible == 'Completado'){
                
                $concatenar .= $orden->post_id.', ';
                $total = ($total + $totalOrden->meta_value);
                
                if($fechacompra->format('ymd') >= $principio->format('ymd')
            && $fechacompra->format('ymd') <= $fin->format('ymd')){
                $totalmes = ($totalmes + $totalOrden->meta_value);
            }
                
                }
            }
          }
          
        }
        
        $arreglo=[
            'iduser' => $iduser,
            'nombre' => $user->display_name,
            'total' => $total, 
            'concatenar' => $concatenar,
            'totalmes' => $totalmes,
              ];
        
        return $arreglo;
    }

    /**
     * Genera toda las ordenes propias
     *
     * @return array
     */
    public function ordenesView()
    {
        $compras = array();
        $settings = Settings::first();
        $funciones = new IndexController;
        if (Auth::user()->rol_id == 0) {
            $TodosUsuarios = User::where('rol_id', '!=', 0)->get()->toArray();
             if (!empty($TodosUsuarios)) {
                foreach($TodosUsuarios as $user){
                    $ordenes = DB::table($settings->prefijo_wp.'postmeta')
                                    ->select('post_id')
                                    ->where('meta_key', '=', '_customer_user')
                                    ->where('meta_value', '=', $user['ID'])
                                    ->orderBy('post_id', 'DESC')
                                    ->get();
                    foreach ($ordenes as $orden){
                        $compras = $this->getDetailsOrder($orden->post_id, $compras, 1, []);        
                    }
                }
            }
        }else{
            $TodosUsuarios = $funciones->generarArregloUsuario(Auth::user()->ID);
             if (!empty($TodosUsuarios)) {
                foreach($TodosUsuarios as $user){
                    $ordenes = DB::table($settings->prefijo_wp.'postmeta')
                                    ->select('post_id')
                                    ->where('meta_key', '=', '_customer_user')
                                    ->where('meta_value', '=', $user['ID'])
                                    ->orderBy('post_id', 'DESC')
                                    ->get();
        
                    foreach ($ordenes as $orden){
                        $compras = $this->getDetailsOrder($orden->post_id, $compras, $user['nivel'], []);        
                    }
                }
            }
        }

        return $compras;
    }

    /**
     * Genera todas las ordenes de red de usuarios
     * 
     * @access public
     * @return view - vista de transacciones
     */
    public function network_orders(){
        view()->share('title', 'Transacciones de Red');
        
        $moneda = Monedas::where('principal', 1)->get()->first();
        $settings = Settings::first();
        $funciones = new IndexController;
        $TodosUsuarios = $funciones->generarArregloUsuario(Auth::user()->ID);
        $compras = array();
        if (!empty($TodosUsuarios)) {
            foreach($TodosUsuarios as $user){
                $ordenes = DB::table($settings->prefijo_wp.'postmeta')
                            ->select('post_id')
                            ->where('meta_key', '=', '_customer_user')
                            ->where('meta_value', '=', $user['ID'])
                            ->orderBy('post_id', 'DESC')
                            ->get();

                foreach ($ordenes as $orden){
                    $compras = $this->getDetailsOrder($orden->post_id, $compras, $user['nivel'], []);        
                }
            }
        }
        
        
        
        return view('transaciones.networkOrders')->with(compact('compras','moneda'));
    }

    /**
     * Permite filtrar por fecha las compras en mi red
     *
     * @param Request $datos - el rango de fecha a buscar 
     * @return view
     */
    public function buscarnetworkorder(Request $datos){
        
        $validate = $datos->validate([
            'fecha1' => 'required|date',
            'fecha2' => 'required|date'
        ]);
         
         $moneda = Monedas::where('principal', 1)->get()->first();
        if ($validate) {
            $settings = Settings::first();
            $primero = date('d-m-Y', strtotime($datos->fecha1));
            $segundo = date('d-m-Y', strtotime($datos->fecha2));

            if ($primero > $segundo) {
                $funciones = new IndexController;
                $funciones->msjSistema('La Fecha Desde no puede ser mayor que la Fecha Hasta', 'warning');
                return redirect()->back()->withInput();
            }

            $fechas = [
                'inicio' => $primero,
                'fin' => $segundo
            ];

            // TITLE
            view()->share('title', 'Transacciones en Red rango de '.$primero.' a '.$segundo);

            $compras = array();
            $funciones = new IndexController;
            $TodosUsuarios = $funciones->generarArregloUsuario(Auth::user()->ID);
            if (!empty($TodosUsuarios)) {
                foreach($TodosUsuarios as $user){
                    $ordenes = DB::table($settings->prefijo_wp.'postmeta')
                                ->select('post_id')
                                ->where('meta_key', '=', '_customer_user')
                                ->where('meta_value', '=', $user['ID'])
                                ->orderBy('post_id', 'DESC')
                                ->get();

                    foreach ($ordenes as $orden){
                        $compras = $this->getDetailsOrder($orden->post_id, $compras, $user['nivel'], $fechas);        
                    }
                }
            }
            
       

            return view('transaciones.networkOrders')->with(compact('compras','moneda'));
        }
  }
  
  
  //transacciones por link de compra solo compras directas
  public function ordenes_directas(){
      $datos = [];
      
      $tienda = new TiendaController;
      
      $moneda = Monedas::where('principal', 1)->get()->first();
      $adicional =0;
    $monedaAdicional = Monedadicional::find(1);
        if (!empty($monedaAdicional)) { 
            $adicional =1;
        }
      
       if(Auth::user()->rol_id == 0){
                $usuarios = User::all();
                foreach($usuarios as $usuario){
                   
        $directas = Compradirecta::where('iduser', $usuario->ID)->get();
      foreach($directas as $directa){
          $usuarios = Pagocarrito::where('idcompra', $directa->idcompra)->first();
          
          $product = $tienda->nombre_product($directa->idcompra);
          $precio = $tienda->precio_product($directa->idcompra);
          $estado = $tienda->estado($directa->idcompra);
          
           array_push($datos, [
            'orden' => $directa->idcompra,
            'usuario' => $usuarios->name,
            'fecha' => date('d-m-Y', strtotime($directa->created_at)),
            'productos' => $product,
            'total' => $precio,
            'nivel' => 1,
            'estado' => $estado,
          ]);
      }
      
                }
            }else{
               
               $directas = Compradirecta::where('iduser', Auth::user()->ID)->get();
      foreach($directas as $directa){
          $usuarios = Pagocarrito::where('idcompra', $directa->idcompra)->first();
          
          $product = $tienda->nombre_product($directa->idcompra);
          $precio = $tienda->precio_product($directa->idcompra);
          $estado = $tienda->estado($directa->idcompra);
     
           array_push($datos, [
            'orden' => $directa->idcompra,
            'usuario' => $usuarios->name,
            'fecha' => date('d-m-Y', strtotime($directa->created_at)),
            'productos' => $product,
            'total' => $precio,
            'nivel' => 1,
            'estado' => $estado,
          ]);
      }
            }
      
      
      view()->share('title', 'Transacciones Directas');
      
      return view('transaciones.directas')->with(compact('datos','moneda'));
      
  }
}
