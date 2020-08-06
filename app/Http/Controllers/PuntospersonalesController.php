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

// llamado a los modelos
use App\Models\User; 
use App\Models\Monedas;
use App\Models\Settings; 
use App\Models\Commission; 
use App\Models\SettingsComision; 
use App\Models\SettingsEstructura;
use App\Models\SettingsPunto; 

// llamado a los controlladores
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ComisionesController;
use App\Http\Controllers\CarritoController;

class PuntospersonalesController extends Controller
{
    
    public function verificarPuntos($iduser){
        
      $comision= new ComisionesController;
      
      $compras = $comision->getShopping($iduser);
      
      foreach ($compras as $compra) {
            $check = DB::table('puntos')
                        ->select('id')
                        ->where('iduser', '=', $iduser)
                        ->where('idcompra', '=', $compra->post_id)
                        ->first();
    
            if ($check == null) {
                 $datosCompra = $comision->getShoppingDetails($compra->post_id);
    
    
              if ($datosCompra->post_status == 'wc-completed') {
                  
                  $this->comprasProductos($iduser, $compra->post_id);
                  
               }
            }
      }
   }  
      
     public function comprasProductos($iduser, $compra){ 
         
         $comision= new ComisionesController;
         $carrito= new CarritoController;
         $user = User::find($iduser);
         $total_puntos=0;
         
    $totalProductos = $comision->getProductos($compra);
        foreach ($totalProductos as $producto) {
        $productoID = $comision->getIdProductos($producto->order_item_id);
        $cantidad = $comision->getCantidad($producto->order_item_id);
        $totalPrecioProducto = $comision->getTotalProductos($producto->order_item_id);
        
        $total_puntos += $carrito->puntosCarrito($productoID, $cantidad);
                    
        }
        
        $concepto='Puntos por la orden : '.$compra.' '.$user->display_name;
      if($total_puntos > 0){
                        
      $comision->guardarPuntos($iduser, $compra, $total_puntos, $concepto);
          }
    }
    
    
    public function puntosRed($iduser){
        
        $red=0;
        $usuario = User::find($iduser);
        $funciones = new IndexController;
        
        $todousers = $funciones->generarArregloUsuario($iduser);
        foreach ($todousers as $user) {
            if ($user['rol'] != 0) {
                $red += $user['puntosred'];
            }
        }
        
        $usuario->puntosRed = $red;
        $usuario->save();
    }
    
}