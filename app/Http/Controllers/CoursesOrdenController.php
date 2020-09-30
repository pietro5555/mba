<?php

namespace App\Http\Controllers;

use App\Models\CourseOrden;
use App\Models\User;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Customer;
use Stripe\Charge;
use App\Models\ShoppingCart;
use App\Models\Course;
use App\Models\Category;
use App\Models\Addresip;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CoursesOrdenController extends Controller
{
    
    /**
     * Permite procesar las compras por los diferentes medios de pagos
     *
     * @param Request $request
     * @return void
     */
    public function procesarCompra(Request $request){
        try {
            $iduser = Auth::user()->ID;
            $detalles = $this->getDataillOrden($iduser);
            $data = [
                'user_id' => $iduser,
                'total' => $detalles['total'],
                'detalles' => $detalles['detalles']
            ];
            $idorden = $this->saveCourseOrden($data);
            if ($request->metodo == 'stripe') {
                $dataStripe = [
                    'email' => $request->stripeEmail,
                    'token' => $request->stripeToken,
                    'precio' => ($detalles['total'] * 100),
                    'idorden' => $idorden
                ];
                $this->stripe($dataStripe);
                
                return redirect('courses')->with('msj-exitoso', 'Su compra ha sido procesada con éxito.');
            }elseif($request->metodo == 'cripto'){
                $dataCripto = [
                    'total' => $detalles['total'],
                    'idorden' => $idorden,
                    'email' => Auth::user()->user_email,
                    'productos' => $detalles['detalles']
                ];
                $ruta = $this->coinpayment($dataCripto);
                return redirect($ruta);
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Permite guardar la informacion de la orden
     *
     * @param array $data
     * @return integer
     */
    public function saveCourseOrden($data): int
    {
        $orden = CourseOrden::create($data);
        return $orden->id;
    }

    /**
     * Permite procesar las compras con stripe
     *
     * @param array $data
     * @return void
     */
    public function stripe($data){
        try {
            $secret_key = env('STRIPE_SECRET');
            Stripe::setApiKey($secret_key);

            $customer = Customer::create(array(
                'email' => $data['email'],
                'source'  => $data['token']
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount'   => $data['precio'],
                'currency' => 'usd'
            ));

            CourseOrden::where('id', $data['idorden'])->update([
                'idtransacion_stripe' => $data['token'],
                'status' => 1
            ]);

            $carrito = new ShoppingCartController();
            $carrito->process_cart($data['idorden']);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    /**
     * Permite procesar el pago por medio de coinpayment
     *
     * @param array $data
     * @return string
     */
    public function coinpayment($data) : string{
        try {
            $transacion = [
                'amountTotal' => $data['total'],
                'note' => 'Compra curso por '.number_format($data['total'], 2, ',', '.').' USD',
                'idorden' => $data['idorden'],
                'buyer_email' => $data['email'],
                'redirect_url' => route('courses')
            ];
            $productos = json_decode($data['productos']);
            foreach ($productos as $producto) {
                $transacion['items'][] = [
                    'itemDescription' => $producto->titulo,
                    'itemPrice' => $producto->precio, // USD
                    'itemQty' => (INT) 1,
                    'itemSubtotalAmount' => $producto->precio // USD
                ];
            }

            $ruta = \CoinPayment::generatelink($transacion);
            return $ruta;
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Permite obtener los detalles de la compras
     *
     * @param integer $iduser
     * @return array
     */
    public function getDataillOrden($iduser): array
    {
        $items = ShoppingCart::where('user_id', '=', $iduser)
        ->orderBy('date', 'DESC')
        ->get();
        
        $enlace = Addresip::where('ip', request()->ip())->first();

        $arrayCursos = [];

        $totalItems = 0;
        foreach ($items as $item) {
            
            if($direcip == null){
              $precio = $curso->price;          
              }else{
              $precio = $curso->descuento; 
            }
            
            $curso = Course::find($item->course_id);
            $categoria = null;
            $mentor = null;
            if (!empty($curso)) {
                $categoria = Category::find($curso->category_id);
                $mentor = User::find($curso->mentor_id);
            }
            $arrayCursos [] = [
                'idcurso' => $item->course_id,
                'titulo' => (!empty($curso)) ? $curso->title : 'Curso no disponible',
                'categoria' => (!empty($categoria)) ? $categoria->title : 'Categoria no disponible',
                'mentor' => (!empty($mentor)) ? $mentor->display_name : 'Mento no disponible',
                'precio' => (!empty($curso)) ? $precio : 0,
                'img' => (!empty($curso)) ? asset('uploads/images/courses/covers/'.$curso->cover) : 'no disponible'
            ];
            $totalItems += (!empty($curso)) ? $precio : 0;

            $item->delete();
        }
        $data = [
            'total' => $totalItems,
            'detalles' => json_encode($arrayCursos)
        ];
        return $data;
    }

    public function getDataMembeship($iduser)
    {
        $items = ShoppingCart::where('user_id', '=', $iduser)->first();
        return $items->course_id;
    }

    public function pay_membership_stripe(Request $request){
        try {
            $secret_key = env('STRIPE_SECRET');
            Stripe::setApiKey($secret_key);

            $idmembresia = $this->getDataMembeship(Auth::user()->ID);
            
            $enlace = Addresip::where('ip', request()->ip())->first();

            $membresia = DB::table('memberships')->where('id', $idmembresia)->first();

            $customer = Customer::create(array(
                'email' => $request->stripeEmail,
                'source'  => $request->stripeToken
            ));

            $charge = Charge::create(array(
                'customer' => $customer->id,
                'amount'   => (($enlace != null) ? $membresia->descuento : $membresia->price * 100),
                'currency' => 'usd'
            ));

            $datosMembresia = [
                'idmembresia' => $membresia->id,
                'nombre' => $membresia->name,
                'precio' => ($enlace != null) ? $membresia->descuento : $membresia->price,
                'img' => asset('uploads/images/memberships/'.$membresia->image),
                'links' => ($enlace != null) ? $enlace->padre : 0,
            ];
            
            $orden = new CourseOrden();
            $orden->user_id = Auth::user()->ID;
            $orden->total = ($enlace != null) ? $membresia->descuento : $membresia->price;
            $orden->detalles = json_encode($datosMembresia);
            $orden->idtransacion_stripe = $request->stripeToken;
            $orden->status = 1;
            $orden->save();

            $carrito = new ShoppingCartController();
            $carrito->process_membership_buy($orden->id);
                
            /* eliminar la direccion ip y el id de la persona que me dio el link*/
             Addresip::where('ip', request()->ip())->delete();    

            return redirect('/')->with('msj-exitoso', 'Tu compra de membresría ha sido completada con éxito.');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function pay_membership_coinpayment(Request $request){
        try {

            $idmembresia = $this->getDataMembeship(Auth::user()->ID);
            $enlace = Addresip::where('ip', request()->ip())->first();

            $membresia = DB::table('memberships')->where('id', $idmembresia)->first();
           
            $datosMembresia = [
                'idmembresia' => $membresia->id,
                'nombre' => $membresia->name,
                'precio' => ($enlace != null) ? $membresia->descuento : $membresia->price,
                'links' => ($enlace != null) ? $enlace->padre : 0,
                'img' => asset('uploads/images/memberships/'.$membresia->image)
            ];
            
            $orden = new CourseOrden();
            $orden->user_id = Auth::user()->ID;
            $orden->total = ($enlace != null) ? $membresia->descuento : $membresia->price;
            $orden->detalles = json_encode($datosMembresia);
            $orden->status = 0;
            $orden->save();

            $transacion = [
                'amountTotal' => ($enlace != null) ? $membresia->descuento : $membresia->price,
                'note' => 'Compra membresía por '.number_format(($enlace != null) ? $membresia->descuento : $membresia->price, 2, ',', '.').' USD',
                'idorden' => $orden->id,
                'buyer_email' => Auth::user()->user_email,
                'redirect_url' => route('courses')
            ];

            $transacion['items'][] = [
                'itemDescription' => $membresia->name,
                'itemPrice' => ($enlace != null) ? $membresia->descuento : $membresia->price, // USD
                'itemQty' => (INT) 1,
                'itemSubtotalAmount' => ($enlace != null) ? $membresia->descuento : $membresia->price // USD
            ];
            
            /* eliminar la direccion ip y el id de la persona que me dio el link*/
            Addresip::where('ip', request()->ip())->delete();
         
            $ruta = \CoinPayment::generatelink($transacion);
            return redirect($ruta);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
