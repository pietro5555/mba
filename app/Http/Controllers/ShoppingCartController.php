<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use App\Models\Course; use App\Models\Category; use App\Models\User;
use App\Models\Purchase; use App\Models\PurchaseDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Addresip;
use App\Models\Paises; 
 
class ShoppingCartController extends Controller
{
    /**
     * Carrito de Compras (Usuarios No Registrados y Usuarios Registrados)
     */
    public function index(Request $request){
        
        /*Paises para el formulario*/
        $paises = Paises::all();

        /* almacenamos el ID de la persona que envio el link */
        if(!empty(request()->ref)){
           $this->almacenar_addres();
        }

        if (Auth::guest()){

            $items = DB::table('shopping_cart')->where('user_id', '=', request()->ip())
                        ->orderBy('date', 'DESC')
                        ->get();
            
            $cantItems = 0;

            foreach ($items as $item){     
                $cantItems++;
            }

            /*
            $cantItems = 0;

            $itemsA = array();

            if ($request->session()->has('cart')) {
                $itemsA = $request->session()->get('cart');
            }

            $items = collect();
            foreach ($itemsA as $itemA) {
                $item = DB::table('memberships')->where('id', '=', $itemA)->first();
                $cantItems++;

                $items->push($item);
            }
            */
        }else{
             
            $this->cambioUsers();       

            $iteraciones = DB::table('shopping_cart')->where('user_id', '=', Auth::user()->ID)
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


        $totalItems = 0;
        foreach ($items as $item) {

            $curso = DB::table('memberships')->where('id', $item->course_id)->first();
            $direcip = Addresip::where('ip', request()->ip())->first();

            if($direcip == null){
              $total = $curso->price;          
              }else{
              $total = $this->descuentogeneral($curso->price); 
            }
            // $categoria = null;
            // $mentor = null;
            // if (!empty($curso)) {
            //     $categoria = Category::find($curso->category_id);
            //     $mentor = User::find($curso->mentor_id);
            // }
            $item->curso = [
                'titulo' => (!empty($curso)) ? $curso->name : 'Membresia no disponible',
                // 'categoria' => (!empty($categoria)) ? $categoria->title : 'Categoria no disponible',
                // 'mentor' => (!empty($mentor)) ? $mentor->display_name : 'Mento no disponible',
                'precio' => (!empty($curso)) ? $total : 0,
                'img' => (!empty($curso)) ? asset('/uploads/images/courses/covers/'.$curso->image) : 'no disponible'
            ];
            $totalItems += (!empty($curso)) ? $total : 0;
          
        }

        $membresia = null;
        //RETORNAR VISTA AQUÍ
        return view('carrito_user.index')->with(compact('items', 'totalItems', 'membresia','paises'));
    }


    /**
     * Almacenar en el Carrito de Compras (Usuarios No Registrados y Usuarios Registrados)
     */
    public function store(Request $request, $id){

        if (Auth::guest()){

             $itemAgregado = DB::table('shopping_cart')
                                ->where('user_id', '=', request()->ip())
                                ->where('course_id', '=', $id)
                                ->count();

            if ($itemAgregado == 0){
                $item = new ShoppingCart();
                $item->user_id = request()->ip();
                $item->course_id = $id;
                $item->date = date('Y-m-d');
                $item->save();

                return redirect('shopping-cart')->with('msj-exitoso', 'El item ha sido agregado a su carrito de compras con éxito.');
            }else{
                return redirect('shopping-cart')->with('msj-informativo', 'El item ya se encuentra en su carrito de compras.');
            }

            /*
            $cont = 0;

            if ($request->session()->has('cart')) {

                $items = $request->session()->pull('cart');
                 
                foreach ($items as $item) {
                    if ($item == $id){
                        $cont++;
                    }else{
                        $request->session()->push('cart', $item);
                    }       
                }

                $request->session()->push('cart', $id);

                if ($cont > 0){
                    return redirect('shopping-cart')->with('msj-informativo', 'El item ya se encuentra en su carrito de compras.');
                }
            }else{

                $request->session()->push('cart', $id);
            }
            
            return redirect('shopping-cart')->with('msj-exitoso', 'El item ha sido agregado a su carrito de compras con éxito.');
            */

        }else{
            $itemAgregado = DB::table('shopping_cart')
                                ->where('user_id', '=', Auth::user()->ID)
                                ->where('course_id', '=', $id)
                                ->count();

            if ($itemAgregado == 0){
                $item = new ShoppingCart();
                $item->user_id = Auth::user()->ID;
                $item->course_id = $id;
                $item->date = date('Y-m-d');
                $item->save();

                return redirect('shopping-cart')->with('msj-exitoso', 'El item ha sido agregado a su carrito de compras con éxito.');
            }else{
                return redirect('shopping-cart')->with('msj-informativo', 'El item ya se encuentra en su carrito de compras.');
            }
        }
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
           
        /* obtener el ID de la persona que envio el link */
        $enlace = Addresip::where('ip', request()->ip())->first();

        $datosOrden = DB::table('courses_orden')
                        ->where('id', '=', $order)
                        ->first();

        $compra = new Purchase();
        $compra->user_id = $datosOrden->user_id;
        $compra->amount = $datosOrden->total;
        if (!is_null($datosOrden->idtransacion_stripe)){
            $compra->payment_method = 'Stripe';
            $compra->payment_id = $datosOrden->idtransacion_stripe;
            $compra->link = ($enlace != null) ? $enlace->padre : 0;
        }else if (!is_null($datosOrden->idtransacion_coinpaymen)){
            $compra->payment_method = 'Coinpayment';
            $compra->payment_id = $datosOrden->idtransacion_coinpaymen;
            $compra->link = ($enlace != null) ? $enlace->padre : 0;
        }
        $compra->date = date('Y-m-d');
        $compra->status = 1;
        $compra->save();

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
        }

        /* eliminar la direccion ip y el id de la persona que me dio el link*/
        Addresip::where('ip', request()->ip())->delete();
    }

    /**
     * Procesar Compra de membresía una vez verificado el pago
    */
    public function process_membership_buy($order){

        /* obtener el ID de la persona que envio el link */
        $enlace = Addresip::where('ip', request()->ip())->first();

        $datosOrden = DB::table('courses_orden')
                        ->where('id', '=', $order)
                        ->first();

        $compra = new Purchase();
        $compra->user_id = $datosOrden->user_id;
        $compra->amount = $datosOrden->total;
        if (!is_null($datosOrden->idtransacion_stripe)){
            $compra->payment_method = 'Stripe';
            $compra->payment_id = $datosOrden->idtransacion_stripe;
            $compra->link = ($enlace != null) ? $enlace->padre : 0;
        }else if (!is_null($datosOrden->idtransacion_coinpaymen)){
            $compra->payment_method = 'Coinpayment';
            $compra->payment_id = $datosOrden->idtransacion_coinpaymen;
            $compra->link = ($enlace != null) ? $enlace->padre : 0;
        }
        $compra->date = date('Y-m-d');
        $compra->status = 1;
        $compra->save();

        $detallesMembresia = json_decode($datosOrden->detalles);

        $detalle = new PurchaseDetail();
        $detalle->purchase_id = $compra->id;
        $detalle->membership_id = $detallesMembresia->idmembresia;
        $detalle->amount = $detallesMembresia->precio;
        $detalle->save();

        $cursos = Course::where('subcategory_id', $detallesMembresia->idmembresia)->get();

        $fecha = date('Y-m-d H:i:s');

        foreach ($cursos as $curso) {
            DB::table('courses_users')
                ->insert(['course_id' => $curso->idcurso,
                            'user_id' => $datosOrden->user_id,
                            'progress' => 0,
                            'start_date' => date('Y-m-d'),
                            'created_at' => $fecha,
                            'updated_at' => $fecha]);
        }

        DB::table('wp98_users')
            ->where('ID', '=', $datosOrden->user_id)
            ->update(['membership_id' => $detallesMembresia->idmembresia]);

        /* eliminar la direccion ip y el id de la persona que me dio el link*/
        Addresip::where('ip', request()->ip())->delete();
    }


    /**
     * Lleva a la vista de las membresia para poder selecionar una
     *
     * @return void
     */
    public function memberships()
    {
        $dataDescripcion = [
            'Principiante' => 'Accesos a todos los cursos de nivel principiante',
            'Basico' => 'Accesos a todos los cursos de nivel Basico',
            'Intermedio' => 'Accesos a todos los cursos de nivel Intermedio',
            'Avanzado' => 'Accesos a todos los cursos de nivel Avanzado',
            'Pro' => 'Accesos a todos los cursos de nivel Profesional',
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


    public function descuentogeneral($precio){
       
       $total = $precio;

       if($precio == 24){
         $total = 9.99;
       }elseif($precio == 22){
         $total = 10.99;
       }elseif($precio == 20){
         $total = 11.99;
       }elseif($precio == 18){
         $total = 12.99;
       }elseif($precio == 16){
         $total = 13.99; 
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
}
