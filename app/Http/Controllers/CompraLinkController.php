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
use App\Models\SettingsRol; 
use App\Models\SettingsComision; 
use App\Models\SettingsPunto; 
use App\Models\Punto; 
use App\Models\SettingsEstructura;
// llamada a los controladores
use App\Http\Controllers\IndexController; 
use App\Http\Controllers\ComisionesController; 
use App\Http\Controllers\WalletController;

class CompraLinkController extends Controller
{
    public function CompraDirectaComision($iduser, $referred_email, $nivel, $valorComision, $compras){
        
         $comisiones = new ComisionesController;
         
        $detalles = "";
    $user = User::find($iduser);
    
        $GLOBALS['settingsComision'] = SettingsComision::find(1);
         $settings = Settings::first();
    $idsnocomision = explode(', ', $settings->id_no_comision);
    
    $validacionPrimeraCompra = true;
    if($GLOBALS['settingsComision'] != null){
    if ($GLOBALS['settingsComision']->primera_compra == 0) {
        if (count($compras) < 2) {
            $validacionPrimeraCompra = false;
        }
     }
    }
    
   
    
    if ($validacionPrimeraCompra) {
        
            $check = DB::table('commissions')
                        ->select('id')
                        ->where('user_id', '=', $iduser)
                        ->where('compra_id', '=', $compras)
                        ->first();
                        
                if ($check == null) {
                    
                    //Se obtienen los datos de cada compra
              $datosCompra = $comisiones->getShoppingDetails($compras);
             
    
              //Se verifica que la compra sea del mes que se está pagando
              $fechaCompra = new Carbon($datosCompra->post_date);
              $mesCompra = $fechaCompra->format('m');
              $fechaActual = Carbon::now();
              $mesActual = $fechaActual->format('m');
              if ($mesActual == $mesCompra && $datosCompra->post_status == 'wc-completed') {
                  $concepto = 'Comision por la compra directa de la orden: '.$compras;
                // $totalCompra = $comisiones->getShoppingTotal($compras);
                $totalProductos = $comisiones->getProductos($compras);
                foreach ($totalProductos as $producto) {
                    $productoID = $comisiones->getIdProductos($producto->order_item_id);
                    $totalPrecioProducto = $comisiones->getTotalProductos($producto->order_item_id);
                        
                    if ($valorComision > 0) {
                        // id de productos que no generan comision
                        foreach ($idsnocomision as $value) {
                            if ($productoID != $value) {
                                if ($totalPrecioProducto != 0) {
                                    $totalcomision = $valorComision;
                                    if ($GLOBALS['settingsComision']->tipopago == 'porcentaje') {
                                        $totalcomision = ($totalPrecioProducto * $valorComision);
                                    } 
                                    
                                    if ($GLOBALS['settingsComision']->activacioncomision == 1) {
                                        $fechaActivacion = new Carbon($user->fecha_activacion);
                                        if ($fechaCompra >= $fechaActivacion) {
                                            $comisiones->guardarComision($iduser, $compras, $totalcomision, $referred_email, $nivel, $concepto, 'referido');    
                                        }else{
                                            $comisiones->guardarComision($iduser, $compras, 0, $referred_email, $nivel, 'Compra antes de la activacion del usuario', 'referido');
                                        }
                                    }else{
                                        $comisiones->guardarComision($iduser, $compras, $totalcomision, $referred_email, $nivel, $concepto, 'referido');
                                    }
                                }
                            }    
                        }
                    }else{
                        $valorComisiones = json_decode($GLOBALS['settingsComision']->valordetallado);
                        if ($GLOBALS['settingsComision']->tipocomision == 'categoria') {
                            $user = User::find($iduser);
                            $rol = Rol::find($user->rol_id);
                            foreach ($valorComisiones as $comisones) {
                                if ($comisiones->validarCategoria($productoID, $comisones->nombre)) {
                                    foreach ($comisones->comisiones as $item) {
                                        if ($item->comision != 0) {
                                            if ($rol->acepta_comision == 1) {
                                                if ($rol->id == $item->idrango) {
                                                    $totalcomision = $item->comision;
                                                    if ($GLOBALS['settingsComision']->tipopago == 'porcentaje') {
                                                        $totalcomision = ($totalPrecioProducto * $item->comision);
                                                    } 
                                                    if ($GLOBALS['settingsComision']->activacioncomision == 1) {
                                                        $fechaActivacion = new Carbon($user->fecha_activacion);
                                                        if ($fechaCompra >= $fechaActivacion) {
                                                            $comisiones->guardarComision($iduser, $compras, $totalcomision, $referred_email, $nivel, $concepto, 'referido');    
                                                        }else{
                                                            $comisiones->guardarComision($iduser, $compras, 0, $referred_email, $nivel, 'Compra antes de la activacion del usuario', 'referido');
                                                        }
                                                    }else{
                                                        $comisiones->guardarComision($iduser, $compras, $totalcomision, $referred_email, $nivel, $concepto, 'referido');
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }elseif($GLOBALS['settingsComision']->tipocomision == 'producto'){
                            foreach ($valorComisiones as $comision) {
                                if ($productoID == $comision->idproductos) {
                                    foreach ($comision->comisiones as $item ) {
                                        if ($item->nivel == $nivel) {
                                            if ($item->comision != 0) {
                                                if ($totalPrecioProducto != 0) {
                                                    $totalcomision = $item->comision;
                                                    if ($GLOBALS['settingsComision']->tipopago == 'porcentaje') {
                                                        $totalcomision = ($totalPrecioProducto * $item->comision);
                                                    } 
                                                    if ($GLOBALS['settingsComision']->activacioncomision == 1) {
                                                        $fechaActivacion = new Carbon($user->fecha_activacion);
                                                        if ($fechaCompra >= $fechaActivacion) {
                                                            $comisiones->guardarComision($iduser, $compras, $totalcomision, $referred_email, $nivel, $concepto, 'referido');    
                                                        }else{
                                                            $comisiones->guardarComision($iduser, $compras, 0, $referred_email, $nivel, 'Compra antes de la activacion del usuario', 'referido');
                                                        }
                                                    }else{
                                                        $comisiones->guardarComision($iduser, $compras, $totalcomision, $referred_email, $nivel, $concepto, 'referido');
                                                    }
                                                }              
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            } 
        }
     
   }
 }
 
}