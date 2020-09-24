<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ShoopingCartController extends Controller
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
}
