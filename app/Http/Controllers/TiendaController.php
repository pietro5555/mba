<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use DB; 
use Auth; 
use Date; 
use Mail; 
use Carbon\Carbon;

// modelos
use App\Models\User; 
use App\Models\Monedas;
use App\Models\Settings; 
use App\Models\Commission; 
use App\Models\Compradirecta;
use App\Models\Pagocarrito;
use App\Models\SettingCorreo;
use App\Models\Bancaria; 
use App\Models\LinkPago;
use App\Models\ConsultaCrypto;
use Barryvdh\DomPDF\Facade as PDF;

// Controller
use App\Http\Controllers\WalletController;
use App\Http\Controllers\ComisionesController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CryptoController;


class TiendaController extends Controller
{
	function __construct()
	{
        // TITLE
		view()->share('title', 'Tienda Interna');
	}
    /**
     * Mostramos el home de la aplicación.
     *
     * @return view()
     */

    //Historial de Comisiones para el usuario
    public function index(){
        
        $crypto = new CryptoController;
        $settings = Settings::first();
        
        $productos = $this->getProductoWP();
        $moneda = Monedas::where('principal', 1)->get()->first();
        
        if($settings->btc == 1){
        $valorbtc = $crypto->rates();
        }else{
        $valorbtc =0;    
        }
        
        return view('tienda.index')->with(compact('productos', 'moneda','valorbtc'));
    }
    
     public function filtro(Request $request){
         
        $crypto = new CryptoController;
        $settings = Settings::first();
        $productos = $this->getProductoWP();
        $datos = [];
        
        
        if($settings->btc == 1){
        $valorbtc = $crypto->rates();
          }else{
        $valorbtc =0;    
        }
        
        $result = DB::table($settings->prefijo_wp.'posts')->where('post_title', 'like', '%'.$request->nombre.'%')->get();
        
        foreach($result as $resu){
        foreach ($productos as $item){
            if($resu->ID == $item->ID){
            array_push($datos, [
            'img' => $item->img,
            'titulo' => $item->post_title,
            'ID' => $item->ID,
            'contenido' => $item->post_content,
            'guid' => $item->guid,
            'valor' => $item->meta_value,
          ]);
              }
            }
        }
        
        $moneda = Monedas::where('principal', 1)->get()->first();
        return view('tienda.filtro')->with(compact('datos', 'moneda','valorbtc'));
    }
    

    /**
     * Obtiene los Productos de la tienda de wordpress
     */
    public function getProductoWP()
    { 
        
        $settings = Settings::first();
        $result = DB::table($settings->prefijo_wp.'posts as wp')
                    ->join($settings->prefijo_wp.'postmeta as wpm', 'wp.ID', '=', 'wpm.post_id' )
                    ->where([
                        ['wpm.meta_key', '=', '_price'],
                        ['wp.post_type', '=', 'product'],
                    ])
                    ->select('wp.ID', 'wp.post_title', 'wp.post_content','post_date', 'wp.guid', 'wpm.meta_value', 'wp.post_password as img')
                    ->orderBy('wp.ID', 'DECS')
                    ->get();
        
        $cont = 0;
        foreach ($result as $element) {
            $idimg = DB::table($settings->prefijo_wp.'postmeta as wpm')
                ->where('wpm.post_id', '=', $element->ID)
                ->where('wpm.meta_key', '=', '_thumbnail_id')
                ->select('wpm.meta_value')
                ->get()->toArray();

                if (!empty($idimg)) {
                    $result[$cont]->img = DB::table($settings->prefijo_wp.'posts as wp')
                                        ->where('ID', $idimg[0]->meta_value)
                                        ->select('wp.guid')
                                        ->get()[0]->guid;
                }else {
                    $result[$cont]->img = 'https://core360.com.br/shop/skin/adminhtml/default/default/lib/jlukic_semanticui/examples/assets/images/wireframe/image.png';
                }
            $cont++;
        }  
        return $result;
    }


    /**
     * Permite Guardar la informacion de la entrada en wp
     * 
     * @access public
     * @param request $datos - informacion de la compra
     * @return view
     */
    public function saveOrdenPosts(Request $datos)
    {
         $validate = $datos->validate([
            'precio' => 'required',
            'name' => 'required',
        ]); 
        $settings = Settings::first();
        $crypto = new CryptoController;
        $funciones = new IndexController;
        
        if ($validate) {
            if($datos->tipo == 0){
            if(env('BILLETERA_BTC') != null){
                
                $id = $this->realizarCompra($datos);
                
            $cmd = 'create_transaction';
			// creo el arreglo de la transacion en coipayment
			$dataPago = [
				'amount' => $datos->btc,
				'currency1' => env('CRYPTO'),
				'currency2' => env('CRYPTO'),
				'address' => env('BILLETERA_BTC'),
				'item_name' => $datos->name,
				'item_number' => $id,
				'success_url' => 'https://masteryod.com/mioficina/admin',
				'cancel_url' => 'https://masteryod.com/mioficina/admin',
				'buyer_email' => Auth::user()->user_email,
			];
                $result = $crypto->coinpayments_api_call($cmd, $dataPago);
                
                if (!empty($result['result'])) {
                    
            
            $this->guardarInfo($result['result']['txn_id'], $id);        
                
            $this->correoCompra(Auth::user()->ID, $datos->precio, $datos->name);
                    return redirect($result['result']['checkout_url']);
                }

            }else{
                
                $funciones = new IndexController; 
                $funciones->msjSistema('Lo sentimos tenemos problemas en estos momentos por favor comuniquese con el administrador para mas detalles', 'warning');
                
                 return redirect()->back();
              }
            }else{
            
            $this->realizarCompra($datos);
            
            $this->correoCompra(Auth::user()->ID, $datos->precio, $datos->name);
            
            $funciones->msjSistema('Compra Realizada con exito', 'warning');
                
            return redirect('/admin');
            
            }
            
        }
    }
    
    
    public function realizarCompra($datos){
        
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
                    'ip' => $datos->ip(),
                    'total' => $datos->precio.'.00',
                    'idproducto' => $datos->idproducto,
                    'tipo' => ($datos->tipo == 0) ? env('CRYPTO') : 'Transaferencia Bancaria',
                ];

                if ($id) {
                    $linkProducto = str_replace('mioficina', '?post_type=shop_order&#038;p=', $datos->root());
                    DB::table($settings->prefijo_wp.'posts')->where('ID', $id)->update([
                        'guid' => $linkProducto.$id
                    ]);
                    $this->saveOrdenPostmeta($id, $data);
                    $this->saveOrderItems($id, $datos->name, $data);
                    
                }
                
         return $id;        
    }
    
    
    public function guardarInfo($idconsulta, $idcompra){
        
         ConsultaCrypto::create([
            'idcompra' => $idcompra,
            'idconsulta' => $idconsulta,
            'status' => 0,
        ]);
    }
    
    
    public function correoCompra($iduser, $total, $produc){
        
        $fechaActual = Carbon::now();
        $user = User::find($iduser);
        $seting = Settings::find(1);
        $plantilla = SettingCorreo::find(3);
        
        $productos = '';
        $productos .= 'Nombre del Producto: '. $produc.' Cantidad Comprada: '.'1';
        
        $Correos = json_decode($seting->activarCorreos);
         $firma = null;
	   if (!empty($seting->firma)) {
	       $firma = $seting->firma;
	   }
	   
	   
	   $correoUser = json_decode($user->correos);
	   
        if($Correos->compra == 1 && $correoUser->compra == 1){
        if (!empty($plantilla->contenido)) {
             $mensaje = str_replace('@nombre', ' '.$user->display_name.' ', $plantilla->contenido);
            $mensaje = str_replace('@fecha', ' '.$fechaActual.' ', $mensaje);
            $mensaje = str_replace('@total', ' '.$total.' ', $mensaje);
            $mensaje = str_replace('@correo', ' '.$user->user_email.' ', $mensaje);
            $mensaje = str_replace('@datos', ' '.$productos.' ', $mensaje);
            
         Mail::send('emails.compraypagos',  ['data' => $mensaje, 'firma' => $firma], function($msj) use ($plantilla, $user){
            $msj->subject($plantilla->titulo);
            $msj->to($user->user_email);
        });
            }
          }
        
    }

    /**
     * Guarda la informacion necesaria en esta tabla con respecto a la compra
     * 
     * @access public 
     * @param int $post_id - id de la compra, string $name - nombre del Producto, array $data - informacion compra
     */
    public function saveOrderItems($post_id, $name, $data)
    {
        $settings = Settings::first();
        $id = DB::table($settings->prefijo_wp.'woocommerce_order_items')->insertGetId([
            'order_item_name' => $name,
            'order_item_type' => 'line_item',
            'order_id' => $post_id,
        ]);

        $this->saveOrderItemeta($id, $data);

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
        DB::table($settings->prefijo_wp.'woocommerce_order_itemmeta')->insert([
            ['order_item_id' => $post_id, 'meta_key' => '_product_id', 'meta_value' => $data['idproducto']],
            ['order_item_id' => $post_id, 'meta_key' => '_variation_id', 'meta_value' => 0],
            ['order_item_id' => $post_id, 'meta_key' => '_qty', 'meta_value' => 1],
            ['order_item_id' => $post_id, 'meta_key' => '_tax_class', 'meta_value' => ''],
            ['order_item_id' => $post_id, 'meta_key' => '_line_subtotal', 'meta_value' => $data['total']],
            ['order_item_id' => $post_id, 'meta_key' => '_line_subtotal_tax', 'meta_value' => 0],
            ['order_item_id' => $post_id, 'meta_key' => '_line_total', 'meta_value' => $data['total']],
            ['order_item_id' => $post_id, 'meta_key' => '_line_tax', 'meta_value' => 0],
            ['order_item_id' => $post_id, 'meta_key' => '_line_tax_data', 'meta_value' => 'a:2:{s:5:"total";a:0:{}s:8:"subtotal";a:0:{}}'],
        ]);
    }

    /**
     * Guarda la informacion necesaria en esta tabla con respecto a la compra
     * 
     * @access public
     * @param int $post_id - id de la compra, array $data - informacion de la compra
     */
    public function saveOrdenPostmeta($post_id, $datos)
    {
        $settings = Settings::first();
        $user = User::find(Auth::user()->ID);
        $infofull = $user->names.' '.$user->last_names.' '.$user->address.' '.$user->departamento.' '.$user->country.' '.$user->user_email.' '.$user->phone;
        DB::table($settings->prefijo_wp.'postmeta')
            ->insert([
                ['post_id' => $post_id, 'meta_key' => '_orden_key', 'meta_value' => $datos['_order_key']],
                ['post_id' => $post_id, 'meta_key' => '_customer_user', 'meta_value' => $user->ID],
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
                ['post_id' => $post_id, 'meta_key' => '_billing_first_name', 'meta_value' => $user->names],
                ['post_id' => $post_id, 'meta_key' => '_billing_last_name', 'meta_value' => $user->last_names],
                ['post_id' => $post_id, 'meta_key' => '_billing_company', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_billing_address_1', 'meta_value' => $user->address],
                ['post_id' => $post_id, 'meta_key' => '_billing_address_2', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_billing_city', 'meta_value' => $user->departamento],
                ['post_id' => $post_id, 'meta_key' => '_billing_state', 'meta_value' => $user->departamento],
                ['post_id' => $post_id, 'meta_key' => '_billing_postcode', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_billing_country', 'meta_value' => $user->country],
                ['post_id' => $post_id, 'meta_key' => '_billing_email', 'meta_value' => $user->user_email],
                ['post_id' => $post_id, 'meta_key' => '_billing_phone', 'meta_value' => $user->phone],
                ['post_id' => $post_id, 'meta_key' => '_shipping_first_name', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_shipping_last_name', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_shipping_company', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_shipping_address_1', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_shipping_address_2', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_shipping_city', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_shipping_state', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_shipping_postcode', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_shipping_country', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_order_currency', 'meta_value' => 'USD'],
                ['post_id' => $post_id, 'meta_key' => '_cart_discount', 'meta_value' => 0],
                ['post_id' => $post_id, 'meta_key' => '_cart_discount_tax', 'meta_value' => 0],
                ['post_id' => $post_id, 'meta_key' => '_order_shipping', 'meta_value' => 0.00],
                ['post_id' => $post_id, 'meta_key' => '_order_shipping_tax', 'meta_value' => 0],
                ['post_id' => $post_id, 'meta_key' => '_order_tax', 'meta_value' => 0],
                ['post_id' => $post_id, 'meta_key' => '_order_total', 'meta_value' => $datos['total']],
                ['post_id' => $post_id, 'meta_key' => '_order_version', 'meta_value' => '3.5.2'],
                ['post_id' => $post_id, 'meta_key' => '_prices_include_tax', 'meta_value' => 'no'],
                ['post_id' => $post_id, 'meta_key' => '_billing_address_index', 'meta_value' => $infofull],
                ['post_id' => $post_id, 'meta_key' => '_shipping_address_index', 'meta_value' => ''],
                ['post_id' => $post_id, 'meta_key' => '_recorded_sales', 'meta_value' => 'yes'],
                ['post_id' => $post_id, 'meta_key' => '_recorded_coupon_usage_counts', 'meta_value' => 'yes'],
                ['post_id' => $post_id, 'meta_key' => '_order_stock_reduced', 'meta_value' => 'yes'],
                ['post_id' => $post_id, 'meta_key' => 'tipo', 'meta_value' => $datos['tipo']],
            ]);
            
            
    }    

    /**
     * LLeva a la Vista para aceptar o rechazar las solicitudes
     * 
     * @access public
     * @return view
     */
    public function solicitudes()
    {        
                
        $solicitudes = $this->ArregloCompra();
        $moneda = Monedas::where('principal', 1)->get()->first();
        return view('tienda.solicitudes')->with(compact('solicitudes', 'moneda'));
    }

    /**
     * Obtiene todas las compras que fueron hecha dentro del sistema
     * 
     * @access public
     * @return array
     */
	public function getShopping(){
        $settings = Settings::first();
        $comprasID = DB::table($settings->prefijo_wp.'postmeta as wpm')
                    ->join($settings->prefijo_wp.'posts as wp', 'wp.ID', 'wpm.post_id')
                    ->select('wpm.post_id', 'wp.post_date', 'wp.post_status')
                    ->where([
                        ['meta_key', '=', '_payment_method_title'],
                        ['meta_value', '=', 'Wallet']
                    ])
                    ->get();

        return $comprasID;
    }
    /**
     * Obtiene informacion detallada de las compras
     * 
     * @access public
     * @param int $idpost - id de la compra
     * @return array
     */
    public function getDatos($idpost)
    {
        $settings = Settings::first();
        $total = DB::table($settings->prefijo_wp.'postmeta')
                    ->select('meta_value')
                    ->where([
                        ['post_id', '=', $idpost],
                        ['meta_key', '=', '_order_total'],
                    ])->first();

        $iduser = DB::table($settings->prefijo_wp.'postmeta')
                    ->select('meta_value')
                    ->where([
                        ['post_id', '=', $idpost],
                        ['meta_key', '=', '_customer_user'],
                    ])->first();
        
        $tip = DB::table($settings->prefijo_wp.'postmeta')
                    ->select('meta_value')
                    ->where([
                        ['post_id', '=', $idpost],
                        ['meta_key', '=', 'tipo'],
                    ])->first();            
        
        $datos = [
        'total' => (!empty($total->meta_value)) ? $total->meta_value : '',
        'iduser' => (!empty($iduser->meta_value)) ? $iduser->meta_value : '',
        'tipo' => (!empty($tip->meta_value)) ? $tip->meta_value : '',
        ];
        return $datos;
    }
    
    /**
     * Armar el arreglo Completo que se mostrara en la vista
     * 
     * @access public
     * @return array
     */
    public function ArregloCompra()
    {
        $compras = $this->getShopping();
        $arregloCompras = [];
        foreach ($compras as $compra) {
            $estadoEntendible = '';
            switch ($compra->post_status) {
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
            
           $seting = Settings::find(1);
           $datos = $this->getDatos($compra->post_id);
           $pagocarrito = Pagocarrito::where('idcompra', $compra->post_id)->first();
           $product_name = $this->nombre_product($compra->post_id);
           $user = User::find($datos['iduser']);
            
            if($seting->btc == 0){
             array_push($arregloCompras,[
                'usuario' => ($user != null) ? $user->display_name : $pagocarrito->name,
                'idcompra' => $compra->post_id,
                'idusuario' => $datos['iduser'],
                'total' => $datos['total'],
                'metodo' => ($pagocarrito == null) ? 'N/A' : $pagocarrito->nombre,
                'product_name' => $product_name,
                'fecha' => $compra->post_date,
                'estado' => $estadoEntendible,
            ]);
          }else{
              array_push($arregloCompras,[
                'usuario' => ($user != null) ? $user->display_name : 'N/A',
                'idcompra' => $compra->post_id,
                'idusuario' => $datos['iduser'],
                'total' => $datos['total'],
                'metodo' => $datos['tipo'],
                'product_name' => $product_name,
                'fecha' => $compra->post_date,
                'estado' => $estadoEntendible,
            ]);
          }
        }

        if (!empty($arregloCompras)) {
            $tmparray = $arregloCompras[0];
            for ($i=1; $i < count($arregloCompras); $i++) { 
                $tmparray = array_merge($tmparray, $arregloCompras[$i]);
            }
        }

        return $arregloCompras;
    }

    /**
     * Actualiza las solicitude pendientes
     * 
     * @access public
     * @param int $id - id compra, string $estado - el estado al que va a pasar la compra
     * @return view
     */
    public function accionSolicitud($id, $estado)
    {
        if ($estado == 'wc-completed') {
                
            $datoscompra = $this->getDatos($id);
            $user = User::find($datoscompra['iduser']);
            $admin = User::find(1);
            
            $this->envioCorreo($id);
        }
        
        $this->actualizarBD($id, $estado);
        return redirect('tienda/solicitudes')->with('msj', 'Estado de la Solicitud Actualizada con Exito');
    }
    
    /**
     * Actualiza la informacion de la ordenes de compra en el wp
     * 
     * @access public 
     * @param int $id - id Compra, string $estado - estado de la compra
     */
    public function actualizarBD($id, $estado)
    {
        $settings = Settings::first();
        DB::table($settings->prefijo_wp.'posts')
            ->where('ID', $id)
            ->update([
                'post_status' => $estado,
                'post_modified' => Carbon::now(),
                'post_modified_gmt' => Carbon::now(),
            ]);

        $order_key = DB::table($settings->prefijo_wp.'postmeta')->where(['post_id' => $id, 'meta_key' => '_orden_key'])
                            ->select('meta_value')->first();
        
        if($order_key != null){
        DB::table($settings->prefijo_wp.'postmeta')->insert([
            ['post_id' => $id, 'meta_key' => '_edit_lock', 'meta_value' => Carbon::now()->format('dmYs').':1'],
            ['post_id' => $id, 'meta_key' => '_edit_last', 'meta_value' => 1],
            ['post_id' => $id, 'meta_key' => '_order_key', 'meta_value' => $order_key->meta_value],
        ]);
        
        if ($estado == 'wc-completed') {
            DB::table($settings->prefijo_wp.'postmeta')->where(['post_id' => $id, 'meta_key' => '_date_completed'])
                    ->update(['meta_value' => Carbon::now()->format('dmYs')]);

            DB::table($settings->prefijo_wp.'postmeta')->where(['post_id' => $id, 'meta_key' => '_completed_date'])
                    ->update(['meta_value' => Carbon::now()->format('dmYs')]);

            DB::table($settings->prefijo_wp.'postmeta')->where([ 'post_id' => $id, 'meta_key' => '_date_paid'])
                    ->update(['meta_value' => Carbon::now()->format('dmYs')]);

            DB::table($settings->prefijo_wp.'postmeta')->where([ 'post_id' => $id, 'meta_key' => '_paid_date'])
                    ->update(['meta_value' => Carbon::now()->format('dmYs')]);

            DB::table($settings->prefijo_wp.'postmeta')->insert([
                ['post_id' => $id, 'meta_key' => '_download_permissions_granted', 'meta_value' => 'yes'],
            ]);
           }
        }        
    }
    
    
    public function estado($compra){
        $comisiones = new ComisionesController;
        
        $datosCompra = $comisiones->getShoppingDetails($compra);
       
        $estadoEntendible = 'Eliminada';
        if($datosCompra != null){
            switch ($datosCompra->post_status) {
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
        }
            
            return  $estadoEntendible;
    }
    
    public function precio_product($compra){
        $comisiones = new ComisionesController;
        $cont =0;
        
        $totalProductos = $comisiones->getProductos($compra);
                foreach ($totalProductos as $producto) {
                    $productoID = $comisiones->getIdProductos($producto->order_item_id);
                    $totalPrecioProducto = $comisiones->getTotalProductos($producto->order_item_id);
                    $cont += $totalPrecioProducto;
                }
            
            return $cont;    
    }
    
    public function nombre_product($compra){
        
        $settings = Settings::first();
        $comisiones = new ComisionesController;
            $product_name='';
            
             $totalProductos = $comisiones->getProductos($compra);
                foreach ($totalProductos as $producto) {
                    $productoID = $comisiones->getIdProductos($producto->order_item_id);
                   
                    $product_nombre = DB::table($settings->prefijo_wp.'posts')
                    ->select('post_title')
                    ->where('ID', $productoID)
                    ->first();
                    
                    if($product_nombre != null){
                $product_name .= $product_nombre->post_title.',';
                    }
                }
                
            return $product_name;    
    }
    
    
    //se envia el correo una ves se a aceptado la compra
    public function envioCorreo($idcompra){
        
        $productos = ''; $fechaActual = ''; $correo='';
        $settings = Settings::first();
        $Correos = json_decode($settings->activarCorreos);
        
        $total = DB::table($settings->prefijo_wp.'postmeta')
                    ->select('meta_value')
                    ->where([
                        ['post_id', '=', $idcompra],
                        ['meta_key', '=', '_order_total'],
                    ])->first();
                    
        $email = DB::table($settings->prefijo_wp.'postmeta')
                    ->select('meta_value')
                    ->where([
                        ['post_id', '=', $idcompra],
                        ['meta_key', '=', '_billing_email'],
                    ])->first();   
                    
        $fecha = DB::table($settings->prefijo_wp.'posts')
                    ->select('post_date')
                    ->where([
                        ['ID', '=', $idcompra],
                    ])->first();  
                    
        $names = DB::table($settings->prefijo_wp.'postmeta')
                    ->select('meta_value')
                    ->where([
                        ['post_id', '=', $idcompra],
                        ['meta_key', '=', '_billing_first_name'],
                    ])->first();
        
        $last_names = DB::table($settings->prefijo_wp.'postmeta')
                    ->select('meta_value')
                    ->where([
                        ['post_id', '=', $idcompra],
                        ['meta_key', '=', '_billing_last_name'],
                    ])->first(); 
                    
                    
        $customer = DB::table($settings->prefijo_wp.'postmeta')
                    ->select('meta_value')
                    ->where([
                        ['post_id', '=', $idcompra],
                        ['meta_key', '=', '_customer_user'],
                    ])->first();           
                    
        $nombres = DB::table($settings->prefijo_wp.'woocommerce_order_items')->where('order_id', $idcompra)->get();
        $iva = '';
        
        foreach($nombres as $nombre){
            
            $cantidad = DB::table($settings->prefijo_wp.'woocommerce_order_itemmeta')->where('order_item_id', $nombre->order_item_id)
            ->where('meta_key','_qty')->select('meta_value')->first();
            
            $ivas = DB::table($settings->prefijo_wp.'woocommerce_order_itemmeta')->where('order_item_id', $nombre->order_item_id)
            ->where('meta_key','_line_tax')->select('meta_value')->first();
            
            if($ivas != null){
              if($ivas->meta_value > 0){
              $iva = 'Valor del iva: '.$ivas->meta_value;
              }
            }
                
                if($cantidad != null){    
            $productos .= 'Nombre del Producto: '. $nombre->order_item_name.' Cantidad Comprada: '.$cantidad->meta_value.' '.$iva;
                }
        }
        
        $plantilla = SettingCorreo::find(4);
        $nombre = $names->meta_value.' '.$last_names->meta_value;
        $correo = $email->meta_value;
        $firma = null;
	   if (!empty($settings->firma)) {
	       $firma = $settings->firma;
	   }
	   
	   
	   if($customer->meta_value != 0){
	   $user = User::find($customer->meta_value);
	   $correoUser = json_decode($user->correos);
	   
    if($Correos->pc == 1 && $correoUser->pc == 1){    
       if (!empty($plantilla->contenido)) {
             $mensaje = str_replace('@nombre', ' '.$nombre.' ', $plantilla->contenido);
            $mensaje = str_replace('@fecha', ' '.$fecha->post_date.' ', $mensaje);
            $mensaje = str_replace('@total', ' '.$total->meta_value.' ', $mensaje);
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
    
    
    
     /*vista principal
     * para subir la informacion del banco
     */
    public function bancaria()
    {
       
        view()->share('title', 'Informacion Bancaria');
        $bancaria = Bancaria::first();
        return view('tienda.bancaria',compact('bancaria'));
    }
    
    /*guardar informacion
    * del banco y otros datos de cuentas 
    * a donde deben depositar
    */
    public function guardar(Request $request){
        
        $funciones = new IndexController;
        
        $bancaria = Bancaria::first();
        if(empty($bancaria)){
            
         $banca = new Bancaria();
		 $banca->titulo = $request->titulo;
		 $banca->contenido = $request->contenido;
         $banca->save();
         
        }else{
            $banca = Bancaria::find(1);
            $banca->titulo = $request->titulo;
		 $banca->contenido = $request->contenido;
         $banca->save();
        }
        
        
        $funciones->msjSistema('Agregado con exito', 'success');
            return redirect()->back();
    }
    
    /*descargar el archivo
    *con la informacion bancaria
    */
    public function descargar(){
        
        $funciones = new IndexController;
        
        $settings = Settings::first(); 
        $bancaria = Bancaria::first();
        if(empty($bancaria)){
            
            $funciones->msjSistema('No se a cargado todavia los archivos', 'warning');
            return redirect()->back();
        }
        
        $finales = view('tienda.descarga',compact('bancaria','settings'));
           $pdf =  PDF::loadHTML($finales);
         return $pdf->download($bancaria->titulo.'.pdf');
    }
    
    
    /*
    * Link donde pueden cargar los link de los pagos
    */
    public function pago()
    {
        view()->share('title', 'Link de Pago');
        
        return view('tienda.pago');
    }
    
    
    /*
    *almacenamos la informacion de los 
    *link de pagos
    */
    public function subir(Request $request){
         $funciones = new IndexController;
        
 if ($request->file('archivo') != null) {
     if ($request->file('archivo')) {
            $file = $request->file('archivo');
          $name = 'linkpago_'. time(). '.'.$file->getClientOriginalExtension();
          $path = public_path() . '/link-pagos';
          $file->move($path, $name);

             $pago = new LinkPago();
		 $pago->titulo=$request->titulo;
         $pago->iduser = \Auth::user()->ID;
         $pago->archivo= $name;
         $pago->save();
          }
      }
      
      $funciones->msjSistema('Informacion Subida con exito','success');
            return redirect()->back();
    }
    
    /*
    *lista del administrados para ver
    * los link de pagos
    */
    public function listado(){
        view()->share('title', 'Listados de pago');
        
        if(Auth::user()->rol_id == 0){
        $listados = LinkPago::all();
        }else{
         $listados = LinkPago::where('iduser', Auth::user()->ID)->get();   
        }
        
        return view('tienda.listado',compact('listados'));
    }
    
    
    /*
    *eliminamos los link de pagos
    */
    public function cerrar($id){
        $funciones = new IndexController;
        
       $contenido = LinkPago::find($id);
       $contenido->delete();
       
    $funciones->msjSistema('Eliminado con exito','success');
    return redirect()->back();
    }
}
