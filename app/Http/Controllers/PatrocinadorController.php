<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Auth; 
use DB; 
use Date; 
use Carbon\Carbon;
// llamada a los modelos
use App\Models\Rol;
use App\Models\User; 
use App\Models\Commission; 
use App\Models\Settings;
use App\Models\Binario;
use App\Models\SettingsRol; 
use App\Models\SettingsComision; 
use App\Models\SettingsPunto; 
use App\Models\Punto; 
// llamada a los controladores
use App\Http\Controllers\IndexController; 
use App\Http\Controllers\WalletController;
use App\Http\Controllers\CompraLinkController;
use App\Http\Controllers\ComisionesController;

class PatrocinadorController extends Controller
{
    
    
    public function BonoPatrocinador($iduser, $referidos, $cont, $lado){
        
        
        $comision = new ComisionesController;
        $user = User::find($iduser);
        $referido = User::find($referidos);
        if($cont == 2){
        $cont2=0; 
         
         $binario = Binario::find(1);
              if(!empty($binario->patrocinador)){
        $compras = $comision->getShopping($referidos);
          foreach ($compras as $compra) {
          $cont2++;
            if($cont2 == 1){  
       
               $check = DB::table('commissions')
                        ->select('id')
                        ->where('user_id', '=', $iduser)
                        ->where('compra_id', '=', $compra->post_id)
                        ->first();
                        
                if ($check == null) {
           
            //$porcentaje = $this->cal_pro($compra->post_id);
          
          // if($porcentaje > 0){
          
           $concepto = 'Bono de Patrocinio de la compra '.$compra->post_id.' del usuario '.$referido->display_name ;
          
        $comision->guardarComision($iduser, $compra->post_id, $binario->patrocinador, $referido->user_email, '1', $concepto, 'referido'); 
        
                     
                // }
                 }    
               }
             }
           }
        }
  }
  
  public function contarUser($iduser){
      $cont=0;
      $funciones = new IndexController;
      $todousuario = $funciones->generarArregloUsuario($iduser);
        if (!empty($todousuario)) {
        foreach ($todousuario as $usuario) {
            if ($usuario['status'] == 1 && $usuario['nivel'] == 1) {
                $cont++;
               }
            }
        }
        
        return $cont;
  }
  
  
  public function traerUser($iduser){
      
      $binario = Binario::find(1);
              if(!empty($binario->patrocinador)){
      
      $funciones = new IndexController;
      $todousuario = $funciones->generarArregloUsuario($iduser);
      foreach ($todousuario as $usuario) {
            if ($usuario['status'] == 1 && $usuario['nivel'] == 1) {
                $cont = $this->contarUser($iduser);
                $this->BonoPatrocinador($iduser, $usuario['ID'], $cont, $usuario['lado']);
            }
        }
    }
      
  }
  
  
  public function cal_pro($compra){
      
      $porcentaje=0; $valor=0; $total=0;
      $comision = new ComisionesController;
     
  $totalProductos = $comision->getProductos($compra);
        foreach ($totalProductos as $producto) {
            $productoID = $comision->getIdProductos($producto->order_item_id);
                $totalPrecioProducto = $comision->getTotalProductos($producto->order_item_id);
                
              $valor =  ($valor + $totalPrecioProducto);
              
        }
        
      $total = ($porcentaje * $valor);
        
        return $porcentaje;
  }
  
}