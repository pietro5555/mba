<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Auth; 
use DB; 
use Date; 
use Carbon\Carbon;
// llamada a los modelos
use App\Models\User; 
use App\Models\Purchase;
use App\Models\PurchaseDetail;

// llamada a los controladores
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ComisionesController; 

class ComisionController extends Controller
{
   
   public function verificarCompras($iduser){
     
     $user = User::find($iduser);
     $comisiones = new ComisionesController;
     $compras = Purchase::where('link', $iduser)->where('status', '1')->get();

     foreach($compras as $compra){
       
        $check = DB::table('commissions')
            ->select('id')
            ->where('user_id', '=', $iduser)
            ->where('compra_id', '=', $compra->id)
            ->first();

       if($check == null){
       $hijo = User::find($compra->user_id);
       $detailPurchas = PurchaseDetail::where('purchase_id', $compra->id)->first();
       if($detailPurchas != null){
         $membresias = DB::table('memberships')->where('id', $detailPurchas->membership_id)->first();
         if($membresias != null){
           $ganancia = $membresias->ganancia;
           if($ganancia > 0){
            $concepto= 'Ganancia por la compra Directa del usuario '.$hijo->display_name.' por la Membresia '.$membresias->name;
            $comisiones->guardarComision($iduser, $compra->id, $ganancia, $user->user_email, 1, $concepto, 'membresias');
             }
           }
         }
       }
     }
   }
   
   
   /*Compras Afiliados directos*/
   public function  verificarAfiliados($iduser){
       
     $user = User::find($iduser);
     $comisiones = new ComisionesController;
     $directos = User::where('referred_id', $iduser)->get();
     foreach($directos as $directo){
         $this->comprasRed($directo->ID, $iduser);
     }
   }
   
   public function comprasRed($directo, $iduser){
      
      $comisiones = new ComisionesController;
      $hijo = User::find($directo);
      $padre = User::find($iduser);
      $compras = Purchase::where('user_id', $hijo->ID)->where('status', '1')->get(); 
      
      foreach($compras as $compra){
          
          $check = DB::table('commissions')
            ->select('id')
            ->where('user_id', '=', $iduser)
            ->where('compra_id', '=', $compra->id)
            ->first();

         if($check == null){
       $detailPurchas = PurchaseDetail::where('purchase_id', $compra->id)->first();
       if($detailPurchas != null){
         $membresias = DB::table('memberships')->where('id', $detailPurchas->membership_id)->first();
         if($membresias != null){
           $ganancia = $membresias->ganancia;
           if($ganancia > 0){
            $concepto= 'Ganancia por la compra del referido '.$hijo->display_name.' por la Membresia '.$membresias->name;
            $comisiones->guardarComision($iduser, $compra->id, $ganancia, $hijo->user_email, 1, $concepto, 'membresias');
               }
             }
           }
         }
      }
   }

}