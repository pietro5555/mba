<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Sidebar; use App\Models\MenuAction; 
use App\Models\Commission; use App\Models\User; 
use App\Models\Transfer; use App\Models\Notification;
use App\Models\Settings;  use App\Models\Monedas;
use App\Models\Carrito;
use App\Models\Compradirecta;
use App\Models\Pagocarrito;
use App\Models\Iva;
use App\Models\Optioncarrito;
use App\Models\SettingsPunto; 
use App\Models\SettingCorreo;
use App\Models\Departamento;
use App\Models\Capital;
use App\Models\Costo;
use Auth; use DB; use Date; use Carbon\Carbon; use Mail; 

use App\Http\Controllers\IndexController;


class CarritoController extends Controller
{

    /*guardar los productos en la tabla carrito
    * $id del producto
    * $precio del producto
    * $referido persona que dio el link del producto
    * 
    */
    public function guardar($id, $precio, $sesion, $referido){ 
        
        $autenticado = $this->autenticado();
        
        if($autenticado){
        $carro = Carrito::where('idproducto',$id)->where('iduser',Auth::user()->ID)->first();
        }else{
        $carro = Carrito::where('idproducto',$id)->where('ip',request()->ip())->first();   
        }
        
        $settings = Settings::first();
        $product_nombre = DB::table($settings->prefijo_wp.'posts')
                    ->select('post_title')
                    ->where('ID', $id)
                    ->first();
        
        if($carro == null){
            
        $descuento = $this->SoloDescuento($precio, $referido);    
            
        $iva = $this->ivaCarrito($id, $precio);
        $info = $this->descuentoTotal($precio, $iva);
        
         $carrito = new Carrito();
  		$carrito->iduser = (Auth::user()) ? Auth::user()->ID : 0;
  		$carrito->producto = $product_nombre->post_title;
  		$carrito->precio = $precio;
        $carrito->idproducto = $id;
        $carrito->cantidad = 1;
        $carrito->iva = $info['iva'];
        $carrito->total = ($descuento > 0) ? $descuento : $precio;
        $carrito->ip = (Auth::user()) ? null : request()->ip();
        $carrito->referido = $referido;
        $carrito->info = $info['info'];
        $carrito->porcentaje = $info['porcentaje'];
        $carrito->save();
        
          }
          
        
       if($sesion == 0){
         return redirect('link/carrito');
       }elseif($sesion == 1){
         
         view()->share('title', 'Carrito de Compras');
         
         $carritos = DB::table('carritos')
         ->where('ip', '=', request()->ip())->get(); 
         $moneda = Monedas::where('principal', 1)->get()->first();
         $pagos = Optioncarrito::where('activo','1')->get();
         $cont = $this->arreglo($carritos);
         $enlace = trim(str_replace('/mioficina', ' ', request()->root()));
         $autorizado = false;
         $todo = Costo::where('iduser', request()->ip())->first();  
         $envio = ($todo == null) ? null : $todo->costo;
         $departamentos = Departamento::all(); 
         $capitales = Capital::all();
         $settingPuntos = SettingsPunto::find(1);
          if (!empty($settingPuntos)) {
            $autorizado = true;
          }
          $ivas = false;
          $iva = Iva::find(1);
          if (!empty($iva)) {
            $ivas = true;
          }
          
         $tienda = '/link/linktienda?user='.$sesion;  
         return view('carrito.carrito')->with(compact('carritos','moneda','pagos','cont','autorizado','enlace','ivas','tienda','envio','departamentos','capitales','todo')); 
       }
          
    }
    
    
    public function SoloDescuento($precio, $idreferido){
        
        $descuento = 0;
        if($idreferido != 0){
            $descuento = ($precio * 0.25);
            $descuento = ($precio - $descuento);
        }
        
        return $descuento;
    }
    
    //vista donde se ven los datos del carrito
    public function carrito(){
        
        view()->share('title', 'Carrito de Compras');
       
       $enlace = trim(str_replace('/mioficina', ' ', request()->root()));
       $moneda = Monedas::where('principal', 1)->get()->first();
       $pagos = Optioncarrito::where('activo','1')->get();
       
       
       $autorizado = false;
       $settingPuntos = SettingsPunto::find(1);
       if (!empty($settingPuntos)) {
            $autorizado = true;
       }
       
       $ivas = false;
       $iva = Iva::find(1);
       if (!empty($iva)) {
            $ivas = true;
       }
        
        
    $autenticado = $this->autenticado();    
    if ($autenticado){
    
    $todo = Costo::where('iduser', Auth::user()->ID)->first();
    $carritos = DB::table('carritos')
    ->where('iduser', '=', Auth::user()->ID)
    ->get(); 
    
    }else{
        
   $todo = Costo::where('iduser', request()->ip())->first();        
   $carritos = DB::table('carritos')
    ->where('ip', '=', request()->ip())
    ->get(); 
    }
    
    $envio = $envio = ($todo == null) ? null : $todo->costo;
    $departamentos = Departamento::all();
    $capitales = Capital::all();
    $cont = $this->arreglo($carritos);
    $tienda = ' ';
    
        return view('carrito.carrito',compact('carritos','moneda','pagos','cont','autorizado','enlace','ivas','tienda','envio','departamentos','capitales','todo'));
    }
    
    
    public function arreglo($carritos){
        $cont =0;
        foreach($carritos as $carrito){
          $cont += $this->puntosCarrito($carrito->idproducto, $carrito->cantidad);
        }
        
        return $cont;
    }
    
    public function puntosCarrito($idproducto, $cantidadCompra){
        
        $total_puntos =0;
         $settingPuntos = SettingsPunto::find(1);
        if (!empty($settingPuntos)) {
            $tipopuntos = $settingPuntos->tipopuntos;      
         $settingPuntos->configuracion = json_decode($settingPuntos->configuracion);
        }
        
        if(!empty($settingPuntos->configuracion)){
            if($tipopuntos == 'ambas' || $tipopuntos == 'propias'){
            foreach($settingPuntos->configuracion as $puntos){
                
         if($puntos->idproductos == $idproducto){
             $total_puntos = ($cantidadCompra * $puntos->puntos);
               }
             }
           }
        }
        
        return $total_puntos;
    }
    
    public function ivaCarrito($idproducto, $precio){
        
        $total_iva =0;
        $iva = Iva::find(1);
        $settings = Settings::first();
        
        if (!empty($iva)) {
            $tipo = $iva->tipo;      
         $iva->configuracion = json_decode($iva->configuracion);
        }
        
        if(!empty($iva->configuracion)){
            if($tipo == 'producto'){
            foreach($iva->configuracion as $ivas){
                
         if($ivas->productos == $idproducto){
             $total_iva = $ivas->iva;
             
               }
             }
           }elseif($tipo == 'categoria'){
               
        $idcategoria = DB::table($settings->prefijo_wp.'term_relationships')
            ->where('object_id', $idproducto)->first();     
              
        if($idcategoria != null){       
          foreach($iva->configuracion as $ivas){
                
         if($ivas->productos == $idcategoria->term_taxonomy_id){
             $total_iva = $ivas->iva;
                 }
               }
             }
           }
        }
        
        return $total_iva;
    }
    
    
    public function descuentoTotal($precio, $iva){
        
        $settings = Settings::first();
        
         if($iva > 0){
        $informacion = round($precio / ($iva + 1), 1, PHP_ROUND_HALF_UP);
        $ivas = round($precio - $informacion, 1, PHP_ROUND_HALF_UP);
        
        
         $info = [
        'porcentaje' => $iva,     
        'iva' => $ivas, 
        'info' => $informacion,
         ];
        
         }else{
             
         $info = [
        'porcentaje' => 0,
        'iva' => 0, 
        'info' => 0,
         ];
         
        }
        
        return $info;
    }
    
    //actualizamos los montos y las cantidaddes del carrito
    public function actualizar(Request $request){
        
        $actualizar = Carrito::find($request->id);
        
        $total = ($actualizar->precio * $request->cantidad); 
        $iva = $this->ivaCarrito($actualizar->idproducto, $total);
        $info = $this->descuentoTotal($total, $iva);  
	    
	$descuento = $this->SoloDescuento($total, $actualizar->referido);     
        
        $actualizar->cantidad = $request->cantidad;
        $actualizar->iva = $info['iva'];
        $actualizar->total = ($descuento > 0) ? $descuento : $total;
        $actualizar->save();
        
        return redirect()->back();
    }
    
    //se cancela el producto seleccionado
    public function delete($id){
        
         $delete = Carrito::find($id);
         $delete->delete();
         
         return redirect()->back();
    }
    
    //eliminamos todos los productos del carrito
    public function cancelar(){
        
        $autenticado = $this->autenticado();
        
    if ($autenticado){
    
    $todo = Costo::where('iduser', Auth::user()->ID)->delete();    
    
    $carritos = DB::table('carritos')
    ->where('iduser', '=', Auth::user()->ID)
    ->delete();  
    
    }else{
        
    $todo = Costo::where('iduser', request()->ip())->delete();    
    
    $carritos = DB::table('carritos')
    ->where('ip', '=', request()->ip())
    ->delete();
    }
    
   return redirect('/admin');
    }
    
    //se acepta todos los productos
    public function aceptar(Request $request){
        
       $funciones = new IndexController;    
       $autenticado = $this->autenticado();
       $car = $this->car($autenticado);
       $varios = $this->datos_carro($car);
       $total = $this->total($car);
       $iva = $this->iva($car);
       $directo = $this->referido($car);
       $required = $this->requerimientos($autenticado, $request, $total);
       $descripcion = $this->descripcion($varios);
       
       if($required['medio'] == 1){
       $billetera = $this->billetera($autenticado, $required);
          if($billetera == false){
             $funciones->msjSistema('Lo sentimos no se puede realizar la compra ya que no posee cuenta por favor escoja otro metodo de pago', 'warning');
            return redirect()->back();
          }else{
           $saldo = $this->saldo($autenticado, $required);  
           
           if($saldo == false){
               $funciones->msjSistema('Lo sentimos usted no posee esa cantidad en su billetera le recomendamos que utilice otro metodo de pago', 'warning');
            return redirect()->back();
            }
          }
       }
            
            
        if($total > 0){    
            $settings = Settings::first();
                $fecha = new Carbon();
                $title = 'Orden&ndash;'.$fecha->now()->toFormattedDateString().' @ '.$fecha->now()->format('h:i A');
                $tpmname = str_replace(' ', '-', $fecha->now()->toFormattedDateString());
                $tpmname = str_replace(',', '', $tpmname);
                $tpmname2 = str_replace(' ', '-', $fecha->now()->format('hi a'));
                $name = 'perdido-'.$tpmname.'-'.$tpmname2;
                $id = DB::table($settings->prefijo_wp.'posts')->insertGetId([
                    'post_author' => 1,
                    'post_date' => $fecha->now(),
                    'post_date_gmt' => $fecha->now(),
                    'post_content' => ' ',
                    'post_title' => $title,
                    'post_excerpt' => ' ',
                    'post_status' => 'wc-on-hold',
                    'comment_status' => 'open',
                    'ping_status' => 'closed',
                    'post_password' => 'order_'.base64_encode($fecha->now()),
                    'post_name' => $name,
                    'to_ping' => ' ',
                    'pinged' => ' ',
                    'post_modified' => $fecha->now(),
                    'post_modified_gmt' => $fecha->now(),
                    'post_content_filtered' => ' ',
                    'post_parent' => 0,
                    'menu_order' => 0,
                    'post_type' => 'shop_order',
                    'post_mime_type' => ' ',
                    'comment_count' => 1
                ]);

                $data = [
                    '_order_key' => 'wc_order_'.base64_encode($fecha->now()),
                    'ip' => request()->ip(),
                    'total' => $total.'.00'
                ];

                if ($id) {
                    $linkProducto = str_replace('mioficina', '?post_type=shop_order&#038;p=', request()->root());
                    DB::table($settings->prefijo_wp.'posts')->where('ID', $id)->update([
                        'guid' => $linkProducto.$id
                    ]);
                    $this->saveOrdenPostmeta($id, $data, $required, $iva);
                    $this->saveOrderItems($id, $varios, $data, $required);
                    
        }
        
        $this->eliminarTodo($autenticado);
        $this->compradirecta($autenticado, $directo, $id, $required);
        $this->obtener_datos($varios, $total, $required, $id);
        
        
        //metodo de pago con paypal
         if($required['medio'] == 2 && env('PAYPAL_CLIENT_ID') != '' ){
           
          return \Redirect::route('pago-pay',['pagina' => $required['pagina'], 'total' => $total, 'descripcion' => $descripcion, 'idcompra' => $id]);
        
        }
        
        if($directo != 0){
            $url = str_replace('mioficina', '', request()->root());
        return redirect($url);
        }else{
            
            $funciones->msjSistema('Compra realizada con exito', 'success');
            return redirect()->back();
        }
        
        }else{
        
        $funciones->msjSistema('Debe comprar un producto', 'warning');
            return redirect()->back();
        
        }
        
    }
    
    
     /**
     * Guarda la informacion necesaria en esta tabla con respecto a la compra
     * 
     * @access public 
     * @param int $post_id - id de la compra, string $name - nombre del Producto, array $data - informacion compra
     */
    public function saveOrderItems($post_id, $varios, $valores, $required)
    {
        $settings = Settings::first();
        $concatenar =''; $impuestoTotal =0; $cantidad =0; $porccentaje='';
        
        foreach($varios as $dato){
            
        $concatenar .= $dato['nombre_producto'].' '.'&times;'.' '.$dato['cantidad'].' ';
        
        $impuestoTotal = ($impuestoTotal + $dato['iva']);
        $cantidad++;
            
        $id = DB::table($settings->prefijo_wp.'woocommerce_order_items')->insertGetId([
            'order_item_name' => $dato['nombre_producto'],
            'order_item_type' => 'line_item',
            'order_id' => $post_id,
        ]);
        
        
        $porccentaje=''.($dato['porcentaje']*100);
        
        $envio = [
            '_order_key' => $valores['_order_key'],
            'ip' => $valores['ip'],
            'total' => $dato['total'],
            'idproducto' => $dato['idproducto'],
            'cantidad' => $dato['cantidad'],
            'iva' => $dato['iva'],
            'info' => $dato['info'],
                ];

        $this->saveOrderItemeta($id, $envio);
        
        }
        
        //numero 2 cuidades 
        $departamentos = Departamento::all(); 
        $contar = count($departamentos);
        if(!empty($contar > 0)){
        $ciudad = DB::table($settings->prefijo_wp.'woocommerce_order_items')->insertGetId([
            'order_item_name' => 'Ciudades',
            'order_item_type' => 'shipping',
            'order_id' => $post_id,
        ]);
        $this->ciudadeswoorpres($ciudad, $concatenar, $required);
        }
        
        if($dato['info'] > 0){
        //numero 3  
        $impu = DB::table($settings->prefijo_wp.'woocommerce_order_items')->insertGetId([
            'order_item_name' => 'CO-IMPUESTO DEL '.$porccentaje.'%-1',
            'order_item_type' => 'tax',
            'order_id' => $post_id,
        ]);
        $this->Impuestos($impu, $impuestoTotal, $cantidad, $porccentaje);
         }
    }

    /**
     * Guarda la informacion necesaria en esta tabla con respecto a la compra
     * 
     * @access public
     * @param int $post_id - id de la compra, array $data - informacion de la compra
     */
    public function saveOrderItemeta($post_id, $data)
    {
        $settings = Settings::first();
        
        $total =0;
        $total = ($data['info'] * $data['cantidad']);
        
        DB::table($settings->prefijo_wp.'woocommerce_order_itemmeta')->insert([
            ['order_item_id' => $post_id, 'meta_key' => '_product_id', 'meta_value' => $data['idproducto']],
            ['order_item_id' => $post_id, 'meta_key' => '_variation_id', 'meta_value' => 0],
            ['order_item_id' => $post_id, 'meta_key' => '_qty', 'meta_value' => $data['cantidad']],
            ['order_item_id' => $post_id, 'meta_key' => '_tax_class', 'meta_value' => ''],
            ['order_item_id' => $post_id, 'meta_key' => '_line_subtotal', 'meta_value' => ($data['info'] > 0) ? $total : $data['total']],
            ['order_item_id' => $post_id, 'meta_key' => '_line_subtotal_tax', 'meta_value' => $data['iva']],
            ['order_item_id' => $post_id, 'meta_key' => '_line_total', 'meta_value' => ($data['info'] > 0) ? $total : $data['total']],
            ['order_item_id' => $post_id, 'meta_key' => '_line_tax', 'meta_value' => $data['iva']],
            ['order_item_id' => $post_id, 'meta_key' => '_line_tax_data', 'meta_value' => 'a:2:{s:5:"total";a:0:{}s:8:"subtotal";a:0:{}}'],
        ]);
        
    }

    /**
     * Guarda la informacion necesaria en esta tabla con respecto a la compra
     * 
     * @access public
     * @param int $post_id - id de la compra, array $data - informacion de la compra
     */
    public function saveOrdenPostmeta($post_id, $datos, $required, $iva)
    {
        $settings = Settings::first();
        
        $infofull = $required['names'].' '.$required['last_names'].' '.$required['address'].' '.$required['address2'].' '.$required['departamento'].' '.$required['country'].' '.$required['user_email'].' '.$required['phone'];
        DB::table($settings->prefijo_wp.'postmeta')
            ->insert([
                ['post_id' => $post_id, 'meta_key' => '_orden_key', 'meta_value' => $datos['_order_key']],
                ['post_id' => $post_id, 'meta_key' => '_customer_user', 'meta_value' => $required['ID']],
                ['post_id' => $post_id, 'meta_key' => '_payment_method', 'meta_value' => 'bacs'],
                ['post_id' => $post_id, 'meta_key' => '_payment_method_title', 'meta_value' => 'Wallet'],
                ['post_id' => $post_id, 'meta_key' => '_transaction_id', 'meta_value' => ' '],
                ['post_id' => $post_id, 'meta_key' => '_customer_ip_address', 'meta_value' => $datos['ip']],
                ['post_id' => $post_id, 'meta_key' => '_customer_user_agent', 'meta_value' => $_SERVER['HTTP_USER_AGENT']],
                ['post_id' => $post_id, 'meta_key' => '_created_via', 'meta_value' => 'checkout'],
                ['post_id' => $post_id, 'meta_key' => '_date_completed', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_completed_date', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_date_paid', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_paid_date', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_cart_hash', 'meta_value' => md5(Carbon::now())],
                ['post_id' => $post_id, 'meta_key' => '_billing_first_name', 'meta_value' => $required['names']],
                ['post_id' => $post_id, 'meta_key' => '_billing_last_name', 'meta_value' => $required['last_names']],
                ['post_id' => $post_id, 'meta_key' => '_billing_company', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_billing_address_1', 'meta_value' => $required['address']],
                ['post_id' => $post_id, 'meta_key' => '_billing_address_2', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_billing_city', 'meta_value' => $required['departamento']],
                ['post_id' => $post_id, 'meta_key' => '_billing_state', 'meta_value' => $required['departamento']],
                ['post_id' => $post_id, 'meta_key' => '_billing_postcode', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_billing_country', 'meta_value' => $required['country']],
                ['post_id' => $post_id, 'meta_key' => '_billing_email', 'meta_value' => $required['user_email']],
                ['post_id' => $post_id, 'meta_key' => '_billing_phone', 'meta_value' => $required['phone']],
                ['post_id' => $post_id, 'meta_key' => '_shipping_first_name', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_shipping_last_name', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_shipping_company', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_shipping_address_1', 'meta_value' => $required['address']],
                ['post_id' => $post_id, 'meta_key' => '_shipping_address_2', 'meta_value' => $required['address2']],
                ['post_id' => $post_id, 'meta_key' => '_shipping_city', 'meta_value' => $required['localidad']],
                ['post_id' => $post_id, 'meta_key' => '_shipping_state', 'meta_value' => $required['provincia']],
                ['post_id' => $post_id, 'meta_key' => '_shipping_postcode', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_shipping_country', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_order_currency', 'meta_value' => 'USD'],
                ['post_id' => $post_id, 'meta_key' => '_cart_discount', 'meta_value' => 0],
                ['post_id' => $post_id, 'meta_key' => '_cart_discount_tax', 'meta_value' => 0],
                ['post_id' => $post_id, 'meta_key' => '_order_shipping', 'meta_value' => $required['costo']],
                ['post_id' => $post_id, 'meta_key' => '_order_shipping_tax', 'meta_value' => 0],
                ['post_id' => $post_id, 'meta_key' => '_order_tax', 'meta_value' => $iva],
                ['post_id' => $post_id, 'meta_key' => '_order_total', 'meta_value' => ($datos['total'] + $required['costo'])],
                ['post_id' => $post_id, 'meta_key' => '_order_version', 'meta_value' => '3.5.2'],
                ['post_id' => $post_id, 'meta_key' => '_prices_include_tax', 'meta_value' => 'no'],
                ['post_id' => $post_id, 'meta_key' => '_billing_address_index', 'meta_value' => $infofull],
                ['post_id' => $post_id, 'meta_key' => '_shipping_address_index', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_recorded_sales', 'meta_value' => 'yes'],
                ['post_id' => $post_id, 'meta_key' => '_recorded_coupon_usage_counts', 'meta_value' => 'yes'],
                ['post_id' => $post_id, 'meta_key' => '_order_stock_reduced', 'meta_value' => 'yes'],
            ]);
            
    } 
    
    
    public function ciudadeswoorpres($post_id, $concatenar, $required)
    {
        $settings = Settings::first();
        
        DB::table($settings->prefijo_wp.'woocommerce_order_itemmeta')->insert([
            ['order_item_id' => $post_id, 'meta_key' => 'method_id', 'meta_value' => 'flat_rate'],
            ['order_item_id' => $post_id, 'meta_key' => 'instance_id', 'meta_value' => 10],
            ['order_item_id' => $post_id, 'meta_key' => 'cost', 'meta_value' => $required['costo']],
            ['order_item_id' => $post_id, 'meta_key' => 'total_tax', 'meta_value' => 0],
            ['order_item_id' => $post_id, 'meta_key' => 'taxes', 'meta_value' => 'a:1:{s:5:"total";a:0:{}}'],
            ['order_item_id' => $post_id, 'meta_key' => 'Artículos', 'meta_value' => $concatenar],
           
        ]);
        
    }
    
    
    public function Impuestos($post_id, $impuesto, $cantidad, $porccentaje)
    {
        $settings = Settings::first();
        
        DB::table($settings->prefijo_wp.'woocommerce_order_itemmeta')->insert([
            ['order_item_id' => $post_id, 'meta_key' => 'rate_id', 'meta_value' => 2],
            ['order_item_id' => $post_id, 'meta_key' => 'label', 'meta_value' => 'Impuesto del '.$porccentaje.'%'],
            ['order_item_id' => $post_id, 'meta_key' => 'compound', 'meta_value' => $cantidad],
            ['order_item_id' => $post_id, 'meta_key' => 'tax_amount', 'meta_value' => $impuesto],
            ['order_item_id' => $post_id, 'meta_key' => 'shipping_tax_amount', 'meta_value' => 0],
            ['order_item_id' => $post_id, 'meta_key' => 'rate_percent', 'meta_value' => $porccentaje],
           
        ]);
        
    }
    
   // verificar que si el usuario ya inicio sesion o no
    public function autenticado(){
        if (Auth::guest()){
            $autenticado = false;
        }else{
            $autenticado = true;
        }
       
        return $autenticado;
    }
    
    /* guardamos los datos que se ingresaran en la tabla Postmeta del woocomerce
    *  si la compra es aprobada
    */
    public function requerimientos($autenticado, $request, $total){
        
         $metodo_pago = DB::table('optioncarritos')
        ->where('id', '=', $request->medio_pago)
        ->first();
        
        $direccion = 'Compra';
        
        
        if($autenticado){
            
    $todo = Costo::where('iduser', Auth::user()->ID)->first();          
    $user = DB::table('user_campo')->where('ID', Auth::user()->ID)->first();
    
            $required = [
                    'ID' => Auth::user()->ID,
                    'names' => $user->firstname,
                    'last_names' => $user->lastname,
                    'address' => $request->direccion,
                    'address2' => $request->direccion2,
                    'departamento' => '',
                    'user_email' => Auth::user()->user_email,
                    'country' => $user->pais,
                    'phone' => $user->phone,
                    'metodo' => $metodo_pago->nombre,
                    'medio' => $metodo_pago->medio_pago,
                    'precio' => $total,
                    'pagina' => $direccion,
                    'provincia' => ($todo == null) ? ' ' : $todo->provincia,
                    'localidad' => ($todo == null) ? ' ' : $todo->localidad,
                    'costo' => ($todo == null) ? 0 : $todo->costo,
                ];
        }else{
            $user = User::where('user_email', $request->correo)->first();
            
            if($user != null){
            
            $todo = Costo::where('iduser', $user->ID)->first(); 
            
            $required = [
                    'ID' => $user->ID,
                    'names' => $request->nombre,
                    'last_names' => $request->apellido,
                    'address' => $request->direccion,
                    'address2' => $request->direccion2,
                    'departamento' => $request->departamento,
                    'user_email' => $request->correo,
                    'country' => $request->pais,
                    'phone' => $request->telefono,
                    'metodo' => $metodo_pago->nombre,
                    'medio' => $metodo_pago->medio_pago,
                    'precio' => $total,
                    'pagina' => $direccion,
                    'provincia' => ($todo == null) ? ' ' : $todo->provincia,
                    'localidad' => ($todo == null) ? ' ' : $todo->localidad,
                    'costo' => ($todo == null) ? 0 : $todo->costo,
                ];
            }else{
                
                $todo = Costo::where('iduser', request()->ip())->first(); 
                
                $required = [
                    'ID' => '0',
                    'names' => $request->nombre,
                    'last_names' => $request->apellido,
                    'address' => $request->direccion,
                    'address2' => $request->direccion2,
                    'departamento' => $request->departamento,
                    'user_email' => $request->correo,
                    'country' => $request->pais,
                    'phone' => $request->telefono,
                    'metodo' => $metodo_pago->nombre,
                    'medio' => $metodo_pago->medio_pago,
                    'precio' => $total,
                    'pagina' => $direccion,
                    'provincia' => ($todo == null) ? ' ' : $todo->provincia,
                    'localidad' => ($todo == null) ? ' ' : $todo->localidad,
                    'costo' => ($todo == null) ? 0 : $todo->costo,
                ];
            }
        }
        
        return $required;
    }
    
    //nos traemos los datos de la tabla carritos que es lo que esta comprando
    // usuario
    public function car($autenticado){
        
        if($autenticado){
            $carritos = DB::table('carritos')
        ->where('iduser', '=', Auth::user()->ID)
        ->get(); 
        }else{
        $carritos = DB::table('carritos')
        ->where('ip', '=', request()->ip())
        ->get();
        }
        
        return $carritos;
    }
    
    //pasamos los datos del carrito a un array para luego guardar en el woocomer
    public function datos_carro($car){
        
         $varios = [];
    foreach($car as $ca){
           array_push($varios, [
            'nombre_producto' => $ca->producto,
            'idproducto' => $ca->idproducto,
            'total' => $ca->total,
            'precio' => $ca->precio,
            'cantidad' => $ca->cantidad,
            'iva' => $ca->iva,
            'info' => $ca->info,
            'porcentaje' => $ca->porcentaje,
          ]);
          
       }
       
       return $varios;
    }
    
    //obtenemos el total de las compras
    public function total($car){
        
        $total= 0; 
    foreach($car as $ca){
        
          $total += $ca->total; 
          
       }
       
       return $total;
    }
    
    //obtenemos el total del iva
    public function iva($car){
        
        $iva= 0; 
    foreach($car as $ca){
        
          $iva += $ca->iva; 
          
       }
       
       return $iva;
    }
    
  
  //obtenemos el id de la persona que mando el link
  public function referido($car){
    $directo = 0;
    foreach($car as $ca){
          
         if($ca->referido != 0){
             $directo = $ca->referido;
          } 
      }
      
      return $directo;
  }
  
  public function billetera($autenticado, $required){
      $billetera = false; 
      if($autenticado){
          if($required['medio'] == 1){
                  $billetera = true;
          }else{
             $billetera = false; 
          }
       }else{
           if($required['medio'] == 1){
            $user = User::where('user_email', $required['user_email'])->first(); if($user == null){
                $billetera = false;
            }else{
                $billetera = true;
            } 
          }
       }
       
       return $billetera;
      
    }
    
    public function saldo($autenticado, $required){
        
        if($autenticado){
          if($required['medio'] == 1){
            if(Auth::user()->wallet_amount >= $required['precio']){
                $saldo = true;
            }else{
                $saldo = false;
            }
          }
       }else{
           if($required['medio'] == 1){
            $user = User::where('user_email', $required['user_email'])->first(); if($user != null){
                if($user->wallet_amount >= $required['precio']){
                    $saldo = true;
                }else{
                    $saldo = false;
                }
            }    
          }
       }
       
       return $saldo;
    }
    
    public function compradirecta($autenticado, $directo, $id, $required){
    
        $pagocarrito = new Pagocarrito();
  		$pagocarrito->idcompra = $id;
  		$pagocarrito->iduser = $required['ID'];
  		$pagocarrito->name = $required['names'].' '.$required['last_names'];
  		$pagocarrito->metodo = $required['medio'];
  		$pagocarrito->nombre = $required['metodo'];
        $pagocarrito->save();
    
    if($directo != 0){
        $compra = new Compradirecta();
  		$compra->iduser = $directo;
  		$compra->idcompra = $id;
  		$compra->precio = $required['precio'];
  		$compra->status = 0;
  		$compra->referido_correo = $required['user_email'];
        $compra->save();
        
            }
        
    }
    
    
    public function eliminarTodo($autenticado){
        
        if($autenticado){  
            
    $todo = Costo::where('iduser', Auth::user()->ID)->delete();   
    
    $carritos = DB::table('carritos')
    ->where('iduser', '=', Auth::user()->ID)
    ->delete();
    
        }else{
            
    $todo = Costo::where('iduser', request()->ip())->delete();   
    
    $carritos = DB::table('carritos')
    ->where('ip', '=', request()->ip())
    ->delete();    
    
        }
    }
    
    public function descripcion($datos){
        
        $descripcion = '';
        foreach($datos as $dato){
          
          $descripcion .= $dato['nombre_producto'].'-';
          
        }
        
        return $descripcion;
    }
    
    
    public function almacenar($provincia, $localidad){
       
       $envio = $this->costoenvio($localidad);
       $region = $this->region($provincia);
       
       if (Auth::user()){
           $id = Auth::user()->ID;
       }else{
           $id = request()->ip();
       }
       
       $todo = Costo::where('iduser', $id)->first();
       
       if($todo == null){
       Costo::create([
            'iduser' => $id,
            'idlocalidad' => $envio->departa,
            'localidad' => $envio->nombre,
            'provincia' => $region->nombre,
            'costo' => $envio->costo,
        ]); 
       }else{
          Costo::where('iduser', $id)->update([
            'iduser' => $id,
            'idlocalidad' => $envio->departa,
            'localidad' => $envio->nombre,
            'provincia' => $region->nombre,
            'costo' => $envio->costo,
        ]); 
       }
   }
   
   
   public function buscarcostoenvio($id){
       
       $capitales = Capital::where('departa', $id)->get();
       
       return json_encode($capitales);
   }
   
   
    public function costoenvio($provincia){
        
        $provincias = Capital::find($provincia);
        
        return $provincias;
    }
    
    
    public function region($provincia){
        
        $region = Departamento::find($provincia);
        
        return $region;
    }
    
    
       public function obtener_datos($datos, $total, $required, $idcompra){
        
        $correo =$required['user_email'];
        $productos = '';
        $iva = '';
    foreach($datos as $dato){
          
          if($dato['iva'] > 0){
              $iva = 'Valor del iva: '.$dato['iva'];
          }
          $productos .= 'Nombre del Producto: '. $dato['nombre_producto'].' Cantidad Comprada: '.$dato['cantidad'].' '.$iva;
          
    }
    
        
        $nombre = $required['names'].' '.$required['last_names'];
        
        $seting = Settings::find(1);
        $plantilla = SettingCorreo::find(3);
        $fechaActual = Carbon::now();
		$Correos = json_decode($seting->activarCorreos);
         $firma = null;
	   if (!empty($seting->firma)) {
	       $firma = $seting->firma;
	   }
        
        
        if($required['ID'] != 0){
	   $user = User::find($required['ID']);
	   $correoUser = json_decode($user->correos);
	   
        if($Correos->compra == 1 && $correoUser->compra == 1){
        if (!empty($plantilla->contenido)) {
             $mensaje = str_replace('@nombre', ' '.$nombre.' ', $plantilla->contenido);
            $mensaje = str_replace('@fecha', ' '.$fechaActual.' ', $mensaje);
            $mensaje = str_replace('@total', ' '.$total.' ', $mensaje);
            $mensaje = str_replace('@correo', ' '.$correo.' ', $mensaje);
            $mensaje = str_replace('@datos', ' '.$productos.' ', $mensaje);
            
         Mail::send('emails.compraypagos',  ['data' => $mensaje, 'firma' => $firma], function($msj) use ($plantilla, $correo){
            $msj->subject($plantilla->titulo);
            $msj->to($correo);
        });
            }
          }
        }
    }

	
}
