<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShoppingCart;
use App\Models\Course;
use Auth;

class ShoopingCartController extends Controller
{
    /**
     * Carrito de Compras (Usuarios No Registrados y Usuarios Registrados)
     */
    public function index(Request $request){
        if (Auth::guest()){
            $cantItems = 0;
            $totalItems = 0;

            $itemsA = array();

            if ($request->session()->has('cart')) {
                $itemsA = $request->session()->get('cart');
            }

            $items = collect();
            foreach ($itemsA as $itemA) {
                $item = Course::where('id', '=', $itemA)->first();
                $totalItems += $item->price;
                $cantItems++;

                $items->push($item);
            }
        }else{
            $items = ShoppingCart::where('user_id', '=', Auth::user()->ID)
                        ->orderBy('date', 'DESC')
                        ->get();
            
            $cantItems = 0;
            $totalItems = 0;

            foreach ($items as $item){     
                $cantItems++;
                $totalItems += $item->price;
            }
        }

        dd($items);
        //RETORNAR VISTA AQUÍ
        //return view('vista-de-carrito')->with(compact('items'));
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
}
