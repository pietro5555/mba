<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use App\Models\Course; use App\Models\Category; use App\Models\User;
use App\Models\Purchase; use App\Models\PurchaseDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Addresip;
use App\Models\OffersLive;
use App\Models\Paises; 
use Carbon\Carbon;
 
class ShoppingCartController extends Controller
{
    /**
     * Carrito de Compras (Usuarios No Registrados y Usuarios Registrados)
     */
    public function index(Request $request){
        
        /*Paises para el formulario*/
        $paises = Paises::all();

        if (Auth::guest()){

            $items = DB::table('shopping_cart')
                        ->where('user_id', '=', request()->ip())
                        ->orderBy('date', 'DESC')
                        ->get();
            
            $cantItems = 0;

            foreach ($items as $item){     
                $cantItems++;
            }
        }else{
             
            $this->cambioUsers();       

            $iteraciones = DB::table('shopping_cart')
                            ->where('user_id', '=', Auth::user()->ID)
                            ->orderBy('date', 'DESC')
                            ->get();
            
            $cantItems = 0;

            foreach ($iteraciones as $iterar){ 

                $contador = DB::table('shopping_cart')->where('user_id', '=', Auth::user()->ID)->where('course_id', $iterar->course_id)->count('id');

                if($contador == 1){
                    $cantItems++;
                }else{
                    $contador = DB::table('shopping_cart')->where('user_id', '=', Auth::user()->ID)->where('course_id', $iterar->course_id)->where('id', $iterar->id)->delete();
                }
            }

            $items = DB::table('shopping_cart')->where('user_id', '=', Auth::user()->ID)->orderBy('date', 'DESC')->get();
        }

        $membresia = null;
        $totalItems = 0;
        foreach ($items as $item) {

            if ($item->membership_id != null) {
                $membresia = DB::table('memberships')->where('id', $item->membership_id)->first();

                if (Auth::guest()){
                    if ($item->period == 'Mensual'){
                        $total = $membresia->price;
                    }else{
                        $total = $membresia->price_annual;
                    }  
                }else{
                    if ( (Auth::user()->sponsor_id != 0) && (!is_null(Auth::user()->sponsor_id)) ){
                        if ($item->period == 'Mensual'){
                            $total = $membresia->descuento;
                        }else{
                            $total = $membresia->discount_annual;
                        }
                    }else{
                        if ($item->period == 'Mensual'){
                            $total = $membresia->price;
                        }else{
                            $total = $membresia->price_annual;
                        }   
                    }
                }

                $item->curso = [
                    'titulo' => (!empty($membresia)) ? $membresia->name." (Plan ".$item->period.")" : 'Membresia no disponible',
                    'precio' => (!empty($membresia)) ? $total : 0,
                    'img' => (!empty($membresia)) ? asset('/uploads/images/courses/covers/'.$membresia->image) : 'no disponible'
                ];
                $totalItems += (!empty($membresia)) ? $total : 0;
            }elseif($item->offer_id != null){
                
                $oferta = OffersLive::find($item->offer_id);

                $item->curso = [
                    'titulo' => (!empty($oferta)) ? $oferta->title : 'Oferta no disponible',
                    'precio' => (!empty($oferta)) ? $oferta->price : 0,
                    'img' => (!empty($oferta)) ? asset('/upload/events/'.$oferta->url_resource) : 'no disponible'
                ];
                $totalItems += (!empty($oferta)) ? $oferta->price : 0; //before price
            }
          
        }
          
        
        //RETORNAR VISTA AQUÍ
        return view('carrito_user.index')->with(compact('items', 'totalItems', 'membresia','paises'));
    }


    /**
     * Almacenar en el Carrito de Compras (Usuarios No Registrados y Usuarios Registrados)
     */
    public function store(Request $request, $id, $type = null, $period = null){
        if (Auth::guest()){
            $itemAgregado = DB::table('shopping_cart')
                                ->where('user_id', '=', request()->ip())
                                ->where('membership_id', '=', $id)
                                ->count();

            if ($itemAgregado == 0){
                $item = new ShoppingCart();
                $item->user_id = request()->ip();
                //$item->course_id = $id;
                $item->membership_id = $id;
                $item->period = $period;
                $item->date = date('Y-m-d');
                $item->save();
            }elseif($itemAgregado == 1){
                
                //eliminamos la membresia y agregamos la otra
                $this->actualizarMembresias($id, $period, (Auth::user()) ? Auth::user()->ID : request()->ip());
            }

            return redirect('shopping-cart')->with('msj-exitoso', 'El item ha sido agregado a su carrito de compras con éxito.');
        }else{
            if ($request->type == 'membresia'){
                $itemAgregado = DB::table('shopping_cart')
                                ->where('user_id', '=', Auth::user()->ID)
                                ->where('membership_id', '=', $id)
                                ->count();

                if ($itemAgregado == 0){
                    $item = new ShoppingCart();
                    $item->user_id = Auth::user()->ID;
                    $item->membership_id = $id;
                    $item->period = $period;
                    $item->date = date('Y-m-d');
                    $item->save();
                }elseif($itemAgregado == 1){
                
                //eliminamos la membresia y agregamos la otra
                $this->actualizarMembresias($id, $period, (Auth::user()) ? Auth::user()->ID : request()->ip());
               }

            }else if ($request->type == 'oferta'){
                $itemAgregado = DB::table('shopping_cart')
                                    ->where('user_id', '=', Auth::user()->ID)
                                    ->where('offer_id', '=', $id)
                                    ->count();

                if ($itemAgregado == 0){
                    $item = new ShoppingCart();
                    $item->user_id = Auth::user()->ID;
                    $item->offer_id = $id;
                    $item->date = date('Y-m-d');
                    $item->save();
                    
                }elseif($itemAgregado == 1){
                
                //eliminamos la membresia y agregamos la otra
                $this->actualizarMembresias($id, $period, (Auth::user()) ? Auth::user()->ID : request()->ip());
                }
            }
        }
            
        return redirect('shopping-cart');
    }

    /*actualizar el carrito al presionar una membresia*/
    public function actualizarMembresias($id, $period, $iduser){
    
       $deletemembreship = DB::table('shopping_cart')->where('user_id', '=', $iduser)->delete();
                
        $item = new ShoppingCart();
        $item->user_id = $iduser;
        //$item->course_id = $id;
        $item->membership_id = $id;
        $item->period = $period;
        $item->date = date('Y-m-d');
        $item->save();
    }


    /**
     * Eliminar del Carrito de Compras (Usuarios No Registrados y Usuarios Registrados)
     */
    public function delete(Request $request, $id){
        if (Auth::guest()){

            ShoppingCart::destroy($id);

            return redirect('shopping-cart')->with('msj-exitoso', 'El item ha sido eliminado de su carrito de compras con éxito.');
        }else{
            ShoppingCart::destroy($id);

            return redirect('shopping-cart')->with('msj-exitoso', 'El item ha sido eliminado de su carrito de compras con éxito.');
        }
    }

    /**
     * Procesar Compra una vez verificado el pago
    */
    public function process_cart($order){

        $datosOrden = DB::table('courses_orden')
                        ->where('id', '=', $order)
                        ->first();

        $compra = new Purchase();
        $compra->user_id = $datosOrden->user_id;
        $compra->amount = $datosOrden->total;
        if (!is_null($datosOrden->idtransacion_stripe)){
            $compra->payment_method = 'Stripe';
            $compra->payment_id = $datosOrden->idtransacion_stripe;
        }else if (!is_null($datosOrden->idtransacion_coinpaymen)){
            $compra->payment_method = 'Coinpayment';
            $compra->payment_id = $datosOrden->idtransacion_coinpaymen;
        }
        $compra->date = date('Y-m-d');
        $compra->status = 1;

        $items = json_decode($datosOrden->detalles);
                    
        $fecha = date('Y-m-d H:i:s');

        foreach ($items as $item){
            $detalle = new PurchaseDetail();
            $detalle->purchase_id = $compra->id;
            $detalle->course_id = $item->idcurso;
            $detalle->amount = $item->precio;
            $detalle->save();

            DB::table('courses_users')
                ->insert(['course_id' => $item->idcurso,
                            'user_id' => $datosOrden->user_id,
                            'progress' => 0,
                            'start_date' => date('Y-m-d'),
                            'created_at' => $fecha,
                            'updated_at' => $fecha]);
                            
            $compra->link = $item->links;                
        }
        
        $compra->save();
    }

    /**
     * Procesar Compra de membresía una vez verificado el pago
    */
    public function process_membership_buy($order){
        $datosOrden = DB::table('courses_orden')
                        ->where('id', '=', $order)
                        ->first();

        $compra = new Purchase();
        $compra->user_id = $datosOrden->user_id;
        $compra->amount = $datosOrden->total;
        if (!is_null($datosOrden->idtransacion_stripe)){
            $compra->payment_method = 'Stripe';
            $compra->payment_id = $datosOrden->idtransacion_stripe;
        }else if (!is_null($datosOrden->idtransacion_coinpaymen)){
            $compra->payment_method = 'Coinpayment';
            $compra->payment_id = $datosOrden->idtransacion_coinpaymen;
        }else if(!is_null($datosOrden->idtransacion_paypal)){  
            $compra->payment_method = 'Paypal';
            $compra->payment_id = $datosOrden->idtransacion_paypal;
        }else if($datosOrden->idtransacion_stripe == null && $datosOrden->idtransacion_coinpaymen == null){
            $compra->payment_method = 'Billetera';
        }
        $compra->date = date('Y-m-d');
        $compra->status = 1;

        $detallesMembresia = json_decode($datosOrden->detalles);
        
        if ($datosOrden->type_product == 'membresia') {
            $compra->link = $detallesMembresia->links;
        }else{
            
        }
        $compra->save();

        $detalle = new PurchaseDetail();
        $detalle->purchase_id = $compra->id;
        if ($datosOrden->type_product == 'membresia') {
            $detalle->membership_id = $detallesMembresia->idmembresia;
            $detalle->membership_type = $detallesMembresia->tipo;
        } else {
            $detalle->offer_id = $detallesMembresia->idmembresia;
        }
        $detalle->amount = $detallesMembresia->precio;
        $detalle->save();
        
        if ($datosOrden->type_product == 'membresia') {
            $datosMembresia = DB::table('memberships')
                                ->select('type')
                                ->where('id', '=', $detallesMembresia->idmembresia)
                                ->first();
            
            $fechaCompra = Carbon::now();
            if ($detalle->membership_type == 'Mensual'){
                $fechaExpiracion = $fechaCompra->addMonth();
            }else{
                $fechaExpiracion = $fechaCompra->addYear();
            }

            DB::table('wp98_users')
            ->where('ID', '=', $datosOrden->user_id)
            ->update(['membership_id' => $detallesMembresia->idmembresia,
                      'status' => 1,
                      'membership_status' => 1,
                      'membership_expiration' => $fechaExpiracion]);
        }
                      
        DB::table('shopping_cart')
            ->where('user_id', '=', $datosOrden->user_id)
            ->delete();
    }
    
    

    /**
     * Lleva a la vista de las membresia para poder selecionar una
     *
     * @return void
     */
    public function memberships(){
        
        /* almacenamos el ID de la persona que envio el link */
        if(!empty(request()->ref)){
           $this->almacenar_addres();
        }
        
        
        $dataDescripcion = [
            'Ser' => 'Accesos a todos los cursos de nivel Ser',
            'Hacer' => 'Accesos a todos los cursos de nivel Hacer',
            'Tener' => 'Accesos a todos los cursos de nivel Tener',
            'Trascender' => 'Accesos a todos los cursos de nivel Trascender',
        ];
        $membresias = DB::table('memberships')->get();

        foreach ($membresias as $membresia) {
            $membresia->descripcion = $dataDescripcion[$membresia->name];
        }
       
      
        return view('carrito_user.membership', compact('membresias'));
    }


    public function almacenar_addres(){
      
      $direcccion = Addresip::where('ip', request()->ip())->first();

      if($direcccion == null){
       Addresip::create([
        'padre' => request()->ref,
        'ip' => request()->ip(),
       ]);
       }else{
        Addresip::where('id', $direcccion->id)->update([
         'padre' => request()->ref,
        ]);
       }
    }


    public function descuentogeneral($id){
       
       
       $descuento = DB::table('memberships')->where('id', $id)->first();
       
       if($descuento != null){
           $total = $descuento->descuento;
       }else{
           $total = $descuento->precio;
       }

       return $total;
    }


    public function cambioUsers(){

        $cambio = DB::table('shopping_cart')->where('user_id', '=', request()->ip())
                        ->get();
            foreach($cambio as $camb){
                $cambiando = ShoppingCart::find($camb->id);
                $cambiando->user_id = Auth::user()->ID;
                $cambiando->save();
            }    
    }

    public function purchases_record(){
        // TITLE
        view()->share('title', 'Historial de Compras');
        
        $compras = Purchase::with(['details'])->orderBy('id', 'DESC')->get();
        
        foreach ($compras as $compra){
            foreach ($compra->details as $p){
                $compra->membership = $p->membership;
            }
        }

        return view('admin.purchasesRecord')->with(compact('compras'));
    }


     /*filtro por fechas*/
    public function purchases_filtre(Request $datos){
        // TITLE
        view()->share('title', 'Historial de Compras');
        
        $compras = Purchase::with(['details'])->whereDate('date', '>=', $datos->fecha1)->whereDate('date', '<=', $datos->fecha2)->orderBy('id', 'DESC')->get();
        
        foreach ($compras as $compra){
            foreach ($compra->details as $p){
                $compra->membership = $p->membership;
            }
        }

        return view('admin.purchasesRecord')->with(compact('compras'));
    }
    
    /*filtro por tipo de pago*/
    public function purchases_forma(Request $datos){
        // TITLE
        view()->share('title', 'Historial de Compras');
        
        $compras = Purchase::with(['details'])->where('payment_method', $datos->lista)->orderBy('id', 'DESC')->get();
        
        foreach ($compras as $compra){
            foreach ($compra->details as $p){
                $compra->membership = $p->membership;
            }
        }

        return view('admin.purchasesRecord')->with(compact('compras'));
    }
}
