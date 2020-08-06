<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Crypt; 
use DB; 
use Auth; 
use Carbon\Carbon; 
// modelo
use App\Models\User; 
use App\Models\Settings;
use App\Models\Binario;
use App\Models\Bonoinicio;
use App\Models\SettingsComision;
use App\Models\SettingActivacion; 
use App\Models\SettingsEstructura; 
// controladores
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ComisionesController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\BinarioController;

class ActivacionController extends Controller
{    	  
    /**
     * Verifica que es estado de los usuarios 
     * 
     * @access public 
     * @param int $userid - id del usuarios a verificar
     * @return string
     */
    public function activarUsuarios($userid)
    {
        $user = User::find($userid);
        $fechaProxActivacion = '';
        $fechaUltimaCompra = null;
        $settingAct = SettingActivacion::find(1);
        if ($settingAct->tipoactivacion == 1) {
            $fechaUltimaCompra = $this->verificarActID($userid, $settingAct->requisitoactivacion);
        }elseif($settingAct->tipoactivacion == 2){
            $fechaUltimaCompra = $this->verificarActMonto($userid, $settingAct->requisitoactivacion);
        }
        if ($settingAct->tiporecompra != 0 && $user->fecha_activacion != '') {
            if ($settingAct->tiporecompra == 1) {
                $fechaUltimaCompra = $this->verificarActID($userid, $settingAct->requisitorecompra);
            }elseif($settingAct->tiporecompra == 2){
                $fechaUltimaCompra = $this->verificarActMonto($userid, $settingAct->requisitorecompra);
            }
        }
        $fechaCompra = 'Sin Compras';
        if($fechaUltimaCompra != null){
        $fechaCompra = new Carbon($fechaUltimaCompra);
        $fechaUltimaCompra = new Carbon($fechaUltimaCompra);
        $fechaProxActivacion = $fechaUltimaCompra->addMonth(1);
        $mesCompra = $fechaCompra->format('m');
        $fechaActual = Carbon::now();
        $mesActual = $fechaActual->format('m');
        $finDeMes = Carbon::now()->endOfMonth();
        if ($settingAct->desativar_usuarios == 0) {
           if ($fechaProxActivacion > $fechaActual) {
                
                    $this->ActivarUsuario($userid, $fechaProxActivacion);
                
            }elseif ($fechaProxActivacion < $fechaActual) {
                $this->desactivarUsuario($userid);
            }
        }elseif ($settingAct->desativar_usuarios == 1) {
            if($user->status == 0){
                $this->ActivarUsuario($userid, $fechaCompra);
            }
            if (!empty($user->fecha_activacion)) {
                $fechauser = new Carbon($user->fecha_activacion);
                if ($fechauser->addMonth() == $fechaActual  && $user->status == 1) {
                    $this->desactivarUsuario($userid);
                }
            }
        }
     }
        return $fechaCompra;
    }

    /**
     * Activa al usuario y paga el bono de activacion
     *
     * @param integer $userid - id del usuario a activar
     * @param string $fechaActivacion - fecha de activacion
     * @return void
     */
    public function ActivarUsuario($userid, $fechaActivacion)
    {
        $user = User::find($userid);
        $settings = Settings::first();  
        $estructura = SettingsEstructura::find(1);
        
        DB::table($settings->prefijo_wp.'users')
                    ->where('ID', '=', $userid)
                    ->update([
                        'status' => true,
                        'fecha_activacion' => $fechaActivacion
                    ]);
          
        
        if($estructura->tipoestructura != 'binaria'){
        if ($user->activacion == 0) {
            $user->activacion = 1;
            $user->save();
            $settinComision = SettingsComision::find(1);
           
            if ($settinComision->bonoactivacion != null) {
                
                $iduser = 1;
                $concepto = 'Bono Activacion Usuario: '.$user->display_name;
                $funciones = new IndexController;
                if ($settinComision->directos != 0) {
                    if ($funciones->obtenerEstructura() == 'arbol') {
                        $iduser = $user->position_id;
                    } else {
                        $iduser = $user->position_id;
                    }
                    $this->pagaBonoActivacion($iduser, $user->user_email, $concepto, $user->ID);
                } else {
                    if ($funciones->obtenerEstructura() == 'arbol') {
                        $iduser = $user->position_id;
                    } else {
                        $iduser = $user->sponsor_id;
                    }
                    $this->pagaBonoActivacion($iduser, $user->user_email, $concepto, $user->ID);
                }
            }
        }
      }
      
      
      if($estructura->tipoestructura == 'binaria'){
        if ($user->activacion == 0) {
            $user->activacion = 1;
            $user->save();
            $binario = Binario::find(1);
              if(!empty($binario->inicio)){
                 if ($binario->inicio > 0) {
                
                $binario = new BinarioController;
                $concepto = 'Bono de inicio del Usuario: '.$user->display_name;
                    
                   $binario->bono_inicio($user->ID, $concepto);
                   }
                }
            }
        }
      
      
    }

    /**
     * Permite desactivar a los usuarios
     *
     * @param integer $userid - id del usuario a desactivar
     * @return void
     */
    public function desactivarUsuario($userid)
    {
        $settings = Settings::first();   
        DB::table($settings->prefijo_wp.'users')
                    ->where('ID', '=', $userid)
                    ->update([
                        'status' => false,
                    ]);
    }
    
    
    
    public function ultimaCompra($iduser){
        
         $comisiones = new ComisionesController;
        $compras = $comisiones->getShopping($iduser);
        $fechaUltimaCompra = null;
        foreach ($compras as $compra ) {

            $datocompra = $comisiones->getShoppingDetails($compra->post_id);
            if ($datocompra->post_status == 'wc-completed') {
                
                $fechaUltimaCompra = $datocompra->post_date;
              }
            }
            
        return $fechaUltimaCompra;    
    }
    
    
    public function ultimaCompraID($iduser){
        
         $comisiones = new ComisionesController;
        $compras = $comisiones->getShopping($iduser);
        $fechaUltimaCompra = 0;
        foreach ($compras as $compra ) {

            $datocompra = $comisiones->getShoppingDetails($compra->post_id);
            if ($datocompra->post_status == 'wc-completed') {
                $totalProductos = $comisiones->getProductos($compra->post_id);
                foreach ($totalProductos as $producto) {
                $productoID = $comisiones->getIdProductos($producto->order_item_id);
                    $totalPrecioProducto = $comisiones->getTotalProductos($producto->order_item_id);
                    
                $fechaUltimaCompra  += $totalPrecioProducto;
                }
              }
            }
            
        return $fechaUltimaCompra;    
    }

    /**
     * Permite Verificar la activacion por el Id del producto
     * 
     * @param integer $iduser - usuario a verificar, 
     * @param integer $productoVerificar - producto a comparar
     * @return  string
     */
    private function verificarActID($iduser, $productoVerificar)
    {
        $comisiones = new ComisionesController;
        $compras = $comisiones->getShopping($iduser);
        $fechaUltimaCompra = null;
        foreach ($compras as $compra ) {

            $datocompra = $comisiones->getShoppingDetails($compra->post_id);
            if ($datocompra->post_status == 'wc-completed') {
                $productos = $comisiones->getProductos($compra->post_id);
                foreach ($productos as $item ) {
                    if ($productoVerificar == $comisiones->getIdProductos($item->order_item_id)) {
                        $fechaUltimaCompra = $datocompra->post_date;
                    }
                }
            }
        }
        return $fechaUltimaCompra;
    }

    /**
     * Permite Verificar la activacion por el Monto Minimo
     * 
     * @param integer $iduser - usuario a verificar, 
     * @param float $montoVerificar
     * @return  string
     */
    private function verificarActMonto($iduser, $montoVerificar)
    {
        $comisiones = new ComisionesController;
        $compras = $comisiones->getShopping($iduser);
        $fechaUltimaCompra = null;
        foreach ($compras as $compra ) {
            $datocompra = $comisiones->getShoppingDetails($compra->post_id);
            if ($datocompra->post_status == 'wc-completed') {
                if ($comisiones->getShoppingTotal($compra->post_id) >= $montoVerificar) {
                    $fechaUltimaCompra = $datocompra->post_date;
                }
            }
        }
        return $fechaUltimaCompra;
    }
    
    
    public function primeraCompra($iduser){
    
     $comisiones = new ComisionesController;
    $totalPrecioProducto=0; $cont=0;
                  
        $compras = $comisiones->getShopping($iduser);
        
        foreach ($compras as $compra) {
            $cont++;
        $datocompra = $comisiones->getShoppingDetails($compra->post_id);
            if ($datocompra->post_status == 'wc-completed') {
                $productos = $comisiones->getProductos($compra->post_id);
                foreach ($productos as $item) {
                    if($cont == 1){
                    $totalPrecioProducto += $comisiones->getTotalProductos($item->order_item_id);
                           }
                        }
                    }
                }
                
            return  $totalPrecioProducto;
    }

    /**
     * Permite pagar el bono dependiendo del producto
     *
     * @param integer $idpadre - id del que va a cobrar el bono
     * @param string $email - correo del hijo
     * @param string $concepto - concepto del bono
     * @param integer $idhijo - id del hijo que se acaba de activar
     * @return void
     */
    public function pagaBonoActivacion($idpadre, $email, $concepto, $idhijo)
    {
        $funcionescomisiones = new ComisionesController;
        $index = new IndexController;
        $settinComision = SettingsComision::find(1);
        foreach (json_decode($settinComision->bonoactivacion) as $bono) {
            if($settinComision->tipobono != 'niveles'){
            if (!empty($this->verificarActID($idhijo, $bono->producto))) {
                $bonoApagar = $bono->bono;
                if ($bono->tipobono == 'porcentaje') {
                    
                   $bonoApagar = $this->ultimaCompraID($idhijo);
                   $bonoApagar = ($bonoApagar * $bono->bono);
                }
                $funcionescomisiones->guardarComision($idpadre, 15, $bonoApagar, $email, 0, $concepto, 'bono');
              }
           }else{
            $todos = $index->generarArregloReversa($idhijo);
            foreach($todos as $todo){
                if($bono->nivel == $todo['nivel']){
                    $bonoApagar = $bono->bono;
                    if($bono->tipobono == 'porcentaje'){
                        
                   $bonoApagar = $this->ultimaCompraID($idhijo);
                   $bonoApagar = ($bonoApagar * $bono->bono);
                      }
                      
                   $funcionescomisiones->guardarComision($todo['ID'], 15, $bonoApagar, $email, $todo['nivel'], $concepto, 'bono');   
                   }
               }
           }
        }
    }

    // *** VERIFICAR QUE EL AFILIADO TENGA SU COMPRA MENSUAL CORRESPONDIENTE ***//
    // se usaba antes
    // if ($fechaUltimaCompra != null){
    //     $fechaUltimaCompra = new Carbon($fechaUltimaCompra);
    //     $fechaActivacion = new Carbon($fechaUltimaCompra);
    //     $fechaProxActivacion = $fechaUltimaCompra->addMonth(1);

    //     $fechaActual = Carbon::now();
    //     //Verificar que no se haya vencido la fecha de la última compra
    //     if ($fechaProxActivacion < $fechaActual){
    //         $fechaProxActivacion = 'Compra Vencida';

    //         DB::table($settings->prefijo_wp.'users')
    //             ->where('ID', '=', $userid)
    //             ->update(['status' => false ]);

    //     }else{
    //          DB::table($settings->prefijo_wp.'users')
    //             ->where('ID', '=', $userid)
    //             ->update([
    //                 'status' => true,
    //                 'fecha_activacion' => $fechaActivacion
    //             ]);

            
    //         if ($user->activacion == 0) {
    //             $user->activacion = 1;
    //             $user->save();
    //             $settinComision = SettingsComision::find(1);
    //             if ($settinComision->bonoactivacion != 0) {
    //                 $iduser = 1;
    //                 $concepto = 'Bono Activacion Usuario: '.$user->display_name;
    //                 $funciones = new IndexController;
    //                 if ($settinComision->directos == 0) {
    //                     if ($funciones->obtenerEstructura() == 'arbol') {
    //                         $iduser = $user->position_id;
    //                     } else {
    //                         $iduser = $user->position_id;
    //                     }
    //                     $this->pagaBonoActivacion($iduser, $user->user_email, $concepto, $user->ID);
    //                 } else {
    //                     if ($funciones->obtenerEstructura() == 'arbol') {
    //                         $iduser = $user->referred_id;
    //                     } else {
    //                         $iduser = $user->sponsor_id;
    //                     }
    //                     $this->pagaBonoActivacion($iduser, $user->user_email, $concepto, $user->ID);
    //                 }
    //             }
    //         }

    //     }
    // }else{
    //     $fechaProxActivacion = 'Sin Compras';

    //     DB::table($settings->prefijo_wp.'users')
    //             ->where('ID', '=', $userid)
    //             ->update(['status' => false ]);

    // }
}
