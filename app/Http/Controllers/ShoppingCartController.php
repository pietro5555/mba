<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use App\Models\Course; use App\Models\Category; use App\Models\User;
use App\Models\Purchase; use App\Models\PurchaseDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShoppingCartController extends Controller
{
    /**
     * Carrito de Compras (Usuarios No Registrados y Usuarios Registrados)
     */
    public function index(Request $request){
        if (Auth::guest()){
            $cantItems = 0;

            $itemsA = array();

            if ($request->session()->has('cart')) {
                $itemsA = $request->session()->get('cart');
            }

            $items = collect();
            foreach ($itemsA as $itemA) {
                $item = Course::where('id', '=', $itemA)->first();
                $cantItems++;

                $items->push($item);
            }
        }else{
            $items = DB::table('shopping_cart')->where('user_id', '=', Auth::user()->ID)
                        ->orderBy('date', 'DESC')
                        ->get();
            
            $cantItems = 0;

            foreach ($items as $item){     
                $cantItems++;
            }
        }
        $totalItems = 0;
        foreach ($items as $item) {
            $curso = Course::find($item->course_id);
            $categoria = null;
            $mentor = null;
            if (!empty($curso)) {
                $categoria = Category::find($curso->category_id);
                $mentor = User::find($curso->mentor_id);
            }
            $item->curso = [
                'titulo' => (!empty($curso)) ? $curso->title : 'Curso no disponible',
                'categoria' => (!empty($categoria)) ? $categoria->title : 'Categoria no disponible',
                'mentor' => (!empty($mentor)) ? $mentor->display_name : 'Mento no disponible',
                'precio' => (!empty($curso)) ? $curso->price : 0,
                'img' => (!empty($curso)) ? asset('uploads/images/courses/covers/'.$curso->cover) : 'no disponible'
            ];
            $totalItems += (!empty($curso)) ? $curso->price : 0;
        }

        //RETORNAR VISTA AQUÍ
        return view('carrito_user.index')->with(compact('items', 'totalItems'));
    }


    /**
     * Almacenar en el Carrito de Compras (Usuarios No Registrados y Usuarios Registrados)
     */
    public function store(Request $request, $id){
        if (Auth::guest()){
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
            $items = $request->session()->pull('cart');

            foreach ($items as $item) {
                if ($item != $id){
                    $request->session()->push('cart', $item);
                }               
            }

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
        $compra->save();

        $items = ShoppingCart::where('user_id', '=', $datosOrden->user_id)
                    ->orderBy('id', 'ASC')
                    ->get();
                    
        $fecha = date('Y-m-d H:i:s');

        foreach ($items as $item){
            $detalle = new PurchaseDetail();
            $detalle->purchase_id = $compra->id;

            if (!is_null($item->course_id)){
                $detalle->course_id = $item->course_id;
                $detalle->amount = $item->course->price;
                $detalle->save();

                DB::table('courses_users')
                    ->insert(['course_id' => $item->course_id,
                              'user_id' => $datosOrden->user_id,
                              'progress' => 0,
                              'start_date' => date('Y-m-d'),
                              'created_at' => $fecha,
                              'updated_at' => $fecha]);
            }else if(!is_null($item->membership_id)){
                $detalle->membership_id = $item->membership_id;
                $detalle->amount = $item->membership->price;
                $detalle->save();

                DB::table('wp98_users')
                    ->where('ID', '=', $usuario)
                    ->update(['membership_id' => $item->membership_id]);
            }

            $item->delete();
        }
    }
}
