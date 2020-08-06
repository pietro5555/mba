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
// llamada a los controladores
use App\Http\Controllers\IndexController; 
use App\Http\Controllers\WalletController;
use App\Http\Controllers\CompraLinkController;
use App\Http\Controllers\PatrocinadorController;

class ComisionesController extends Controller
{
    /**
     * Lleva a la vista de Comisiones
     *
     * @return void
     */
    public function index(){
    	// DO MENU
        view()->share('do', collect(['name' => 'inicio', 'text' => 'Inicio']));
        //

        $comisiones = Commission::where('user_id', '=', Auth::user()->ID)->get();

        //******************
        //Marcar como leídas las notificaciones pendientes de Nuevas Comisiones de Fin de Mes
        $notificaciones_pendientes = DB::table('notifications')
                                        ->select('id')
                                        ->where('user_id', '=', Auth::user()->ID)
                                        ->where('notification_type', '=', 'CO')
                                        ->where('status', '=', 0)
                                        ->get();

        foreach ($notificaciones_pendientes as $not){
            Notification::find($not->id)->update(['status' => 1]);
        }
        //********************

        return view('dashboard.commissionsRecords')->with(compact('comisiones'));
    }

	/**
     * Permite obtener las compras realizadas por un usuario en especifico
     *
     * @param integer $user_id - id del usuario a busvar las ventas
     * @return object
     */
	public function getShopping($user_id){
        $settings = Settings::first();
        $comprasID = DB::table($settings->prefijo_wp.'postmeta')
                    ->select('post_id')
                    ->where('meta_key', '=', '_customer_user')
                    ->where('meta_value', '=', $user_id)
                    ->get();

        return $comprasID;
	}

	/**
     * Permite obtener los detalles de una compra en especifico
     *
     * @param integer $shop_id - id de la compra
     * @return object
     */
	public function getShoppingDetails($shop_id){
        $settings = Settings::first();
		$datosCompra = DB::table($settings->prefijo_wp.'posts')
                        ->select('post_date', 'post_status')
                        ->where('ID', '=', $shop_id)
                        ->first();

        return $datosCompra;
	}

	/**
     * Permite obtenter todos los productos de una orden o compra
     *
     * @param integer $shop_id - id de la compra
     * @return object
     */
	public function getProductos($shop_id)
	{
        $settings = Settings::first();
		$totalProductos = DB::table($settings->prefijo_wp.'woocommerce_order_items')
													->select('order_item_id')
													->where('order_id', '=', $shop_id)
													->get();

		return $totalProductos;
	}

	/**
     * Permite obtener el id del producto comprado
     *
     * @param integer $id_item - id de la factura de la compra
     * @return integer
     */
	public function getIdProductos($id_item)
	{
        $settings = Settings::first();
        $valor = 0;
		$IdProducto = DB::table($settings->prefijo_wp.'woocommerce_order_itemmeta')
													->select('meta_value')
													->where('order_item_id', '=', $id_item)
													->where('meta_key', '=', '_product_id')
													->first();

        if (!empty($IdProducto)) {
            $valor = $IdProducto->meta_value;
        }
		return $valor;
	}
	
		/**
     * funcion para obtener la cantidad de veces que se compro ese producto
     * 
     * @access private
     * @param int $id_item - id de la orden de la factura
     * @return int el id del producto comprado
     */
	public function getCantidad($id_item)
	{
        $settings = Settings::first();   

		$cantidad = DB::table($settings->prefijo_wp.'woocommerce_order_itemmeta')
													->select('meta_value')
													->where('order_item_id', '=', $id_item)
													->where('meta_key', '=', '_qty')
													->first();


		return $cantidad->meta_value;
    }

    /**
     * Permite obtener el precio del producto comprado
     *
     * @param integer $id_item - id de la factura
     * @return float
     */
	public function getTotalProductos($id_item)
	{
        $valor = 0;
        $settings = Settings::first();
		$IdProducto = DB::table($settings->prefijo_wp.'woocommerce_order_itemmeta')
													->select('meta_value')
													->where('order_item_id', '=', $id_item)
													->where('meta_key', '=', '_line_total')
													->first();

        if (!empty($IdProducto)) {
            $valor = $IdProducto->meta_value;
        }
		return $valor;
	}

	/**
     * Permite obtener el total de la orden o compra
     *
     * @param integer $shop_id - id de la compra
     * @return float
     */
	public function getShoppingTotal($shop_id){
        $settings = Settings::first();
		$totalCompra = DB::table($settings->prefijo_wp.'postmeta')
				        ->select('meta_value')
				        ->where('post_id', '=', $shop_id)
				        ->where('meta_key', '=', '_order_total')
				        ->first();

		return $totalCompra->meta_value;
	}



  /**
   * Obteniene a todos los usuarios para realizar el proceso de comision
   *
   * @return void
   */
  public function ObtenerUsuarios()
  {
    $GLOBALS['settingsComision'] = SettingsComision::find(1);
    $patron = new PatrocinadorController;
    
    if (Auth::user()->rol_id == 0) {
      $usuarios = User::select('ID', 'status', 'rol_id', 'display_name')->get();
      foreach ($usuarios as $user) {
        $this->generarComision($user->ID);
        $patron->traerUser($user->ID);
        
      }
      return redirect('admin/commissionrecords')->with('mjs', 'Las comisiones han sido generadas con éxito.');
    } else {
      $this->generarComision(Auth::user()->ID);
      $patron->traerUser(Auth::user()->ID);
     
      return redirect('admin/network/commissionsrecords');
    }
  }
  
  
  public function ComisionDirecta($iduser, $valorComision){
     
     $settings = Settings::first();
    $idsnocomision = explode(', ', $settings->id_no_comision);

       $compradirectas = DB::table('compradirectas')->where('iduser', $iduser)
                        ->get();
                        
        foreach($compradirectas as $compradirecta){
            
            $check = DB::table('commissions')
                        ->select('id')
                        ->where('user_id', '=', $iduser)
                        ->where('compra_id', '=', $compradirecta->idcompra)
                        ->first();
                
                if($check == null){
            
            $datosCompra = $this->getShoppingDetails($compradirecta->idcompra);
             $fechaCompra = new Carbon($compradirecta->created_at);
              $mesCompra = $fechaCompra->format('m');
              $fechaActual = Carbon::now();
              $mesActual = $fechaActual->format('m');
              if ($mesActual == $mesCompra && $datosCompra == 'wc-completed') {
                  $totalProductos = $this->getProductos($compradirecta->idcompra);
                foreach ($totalProductos as $producto) {
                $productoID = $this->getIdProductos($producto->order_item_id);
                    $totalPrecioProducto = $this->getTotalProductos($producto->order_item_id);
                     foreach ($idsnocomision as $value) {
                            if ($productoID != $value) {
                                if ($totalPrecioProducto != 0) {
                    
                    $compralink = new CompraLinkController;
                 $compralink->CompraDirectaComision($iduser, $compradirecta->referido_correo, 1, $valorComision, $compradirecta->idcompra);
                 
                            }
                        }
                     }
                   }
                }
            }        
        }                
      
  }

  /**
   * Proceso de comision
   * 
   * Permite Verificar si una compra cumple con los requisitos para sacar la comision
   *
   * @param integer $iduser - id del usuario que va a cobrar la comision
   * @param integer $idreferido - id del usuario que va a general la comision
   * @param string $referred_email - correo del usuario que va a general la comision
   * @param integer $nivel - nivel del usuario que va a general la comision
   * @param float $valorComision - valor por el cual se va a calcular la comision
   * @return void
   */
  public function detallesComision($iduser, $idreferido, $referred_email, $nivel, $valorComision)
  {
    $detalles = "";
    $user = User::find($iduser);
    $referido = User::find($idreferido);
    $settings = Settings::first();
    $idsnocomision = explode(', ', $settings->id_no_comision);
    $compras = $this->getShopping($idreferido);
    $validacionPrimeraCompra = true;
    if ($GLOBALS['settingsComision']->primera_compra == 0) {
        if (count($compras) < 2) {
            $validacionPrimeraCompra = false;
        }
    }
    if ($validacionPrimeraCompra) {
        foreach ($compras as $compra) {
            $check = DB::table('commissions')
                        ->select('id')
                        ->where('user_id', '=', $iduser)
                        ->where('compra_id', '=', $compra->post_id)
                        ->first();
                        
            $compradirecta = DB::table('compradirectas')
                        ->select('id')
                        ->where('idcompra', '=', $compra->post_id)
                        ->first();
    
            if ($check == null && $compradirecta == null) {
              //Se obtienen los datos de cada compra
              $datosCompra = $this->getShoppingDetails($compra->post_id);
    
              //Se verifica que la compra sea del mes que se está pagando
              $fechaCompra = new Carbon($datosCompra->post_date);
              $fechaActual = Carbon::now();
              $actual = Carbon::parse($fechaActual);
              $fechaCompra = Carbon::parse($fechaCompra);
              $diferencia = $actual->diffInDays($fechaCompra);
              
              if ($diferencia <= 30 && $datosCompra->post_status == 'wc-completed') {
                  $concepto = 'Comision del usuario: '.$referido->display_name.' de la orden: '.$compra->post_id;
                // $totalCompra = $this->getShoppingTotal($compra->post_id);
                $totalProductos = $this->getProductos($compra->post_id);
                foreach ($totalProductos as $producto) {
                    $productoID = $this->getIdProductos($producto->order_item_id);
                    $totalPrecioProducto = $this->getTotalProductos($producto->order_item_id);
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
                                            $this->guardarComision($iduser, $compra->post_id, $totalcomision, $referred_email, $nivel, $concepto, 'referido');   
                                            
                                        $this->comprasProductos($iduser, $compra->post_id);
                                        }else{
                                            $this->guardarComision($iduser, $compra->post_id, 0, $referred_email, $nivel, 'Compra antes de la activacion del usuario', 'referido');
                                            
                                        $this->comprasProductos($iduser, $compra->post_id);
                                        }
                                    }else{
                                        $this->guardarComision($iduser, $compra->post_id, $totalcomision, $referred_email, $nivel, $concepto, 'referido');
                                        
                                        $this->comprasProductos($iduser, $compra->post_id);
                                    }
                                }
                            }    
                        }
                    } else {
                        $valorComisiones = json_decode($GLOBALS['settingsComision']->valordetallado);
                        if ($GLOBALS['settingsComision']->tipocomision == 'categoria') {
                            $user = User::find($iduser);
                            $rol = Rol::find($user->rol_id);
                            foreach ($valorComisiones as $comisones) {
                                if ($this->validarCategoria($productoID, $comisones->nombre)) {
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
                                                            $this->guardarComision($iduser, $compra->post_id, $totalcomision, $referred_email, $nivel, $concepto, 'referido');    
                                        
                                        $this->comprasProductos($iduser, $compra->post_id);                    
                                                        }else{
                                                            $this->guardarComision($iduser, $compra->post_id, 0, $referred_email, $nivel, 'Compra antes de la activacion del usuario', 'referido');
                                        
                                        $this->comprasProductos($iduser, $compra->post_id);                    
                                                        }
                                                    }else{
                                                        $this->guardarComision($iduser, $compra->post_id, $totalcomision, $referred_email, $nivel, $concepto, 'referido');
                                                        
                                        $this->comprasProductos($iduser, $compra->post_id);                
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
                                                            $this->guardarComision($iduser, $compra->post_id, $totalcomision, $referred_email, $nivel, $concepto, 'referido');  
                                                            
                                        $this->comprasProductos($iduser, $compra->post_id);                    
                                                        }else{
                                                            $this->guardarComision($iduser, $compra->post_id, 0, $referred_email, $nivel, 'Compra antes de la activacion del usuario', 'referido');
                                                            
                                        $this->comprasProductos($iduser, $compra->post_id);                    
                                                        }
                                                    }else{
                                                        $this->guardarComision($iduser, $compra->post_id, $totalcomision, $referred_email, $nivel, $concepto, 'referido');
                                                        
                                        $this->comprasProductos($iduser, $compra->post_id);                
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
    } else {
        $this->guardarComision($iduser, $compras[0]->post_id, 0, $referred_email, $nivel, 'Primera Compra sin Comision', 'referido');
    }
    
  }
  
  
    
  public function verificarPuntos($iduser){
      
      $compras = $this->getShopping($iduser);
      
      foreach ($compras as $compra) {
            $check = DB::table('puntos')
                        ->select('id')
                        ->where('iduser', '=', $iduser)
                        ->where('idcompra', '=', $compra->post_id)
                        ->first();
    
            if ($check == null) {
                 $datosCompra = $this->getShoppingDetails($compra->post_id);
    
              //Se verifica que la compra sea del mes que se está pagando
              $fechaCompra = new Carbon($datosCompra->post_date);
              $mesCompra = $fechaCompra->format('m');
              $fechaActual = Carbon::now();
              $mesActual = $fechaActual->format('m');
              if ($mesActual == $mesCompra && $datosCompra->post_status == 'wc-completed') {
                  
                  $this->comprasProductos($iduser, $compra->post_id);
                  
               }
            }
      }
   }  
      
     public function comprasProductos($iduser, $compra){ 
         
         $user = User::find($iduser);
         $total_puntos=0;
         
    $totalProductos = $this->getProductos($compra);
        foreach ($totalProductos as $producto) {
        $productoID = $this->getIdProductos($producto->order_item_id);
        $cantidad = $this->getCantidad($producto->order_item_id);
        $totalPrecioProducto = $this->getTotalProductos($producto->order_item_id);
        
        $total_puntos += $this->contarpuntos($productoID, $cantidad);
                    
        }
        
        $concepto='Puntos por la orden : '.$compra.' '.$user->display_name;
      if($total_puntos > 0){
                        
      $this->guardarPuntos($iduser, $compra, $total_puntos, $concepto);
          }
    }
    
    
    public function contarpuntos($idproducto, $cantidadCompra){
        $total_puntos=0;
        
         
     $settingPuntos = SettingsPunto::find(1);
        if (!empty($settingPuntos)) {
            $tipopuntos = $settingPuntos->tipopuntos;  
         $settingPuntos->configuracion = json_decode($settingPuntos->configuracion);
        }
         
        if(!empty($settingPuntos->configuracion)){
            if($tipopuntos == 'ambas' || $tipopuntos == 'comision'){
            foreach($settingPuntos->configuracion as $puntos){
                
         if($puntos->idproductos == $idproducto){
             $total_puntos = ($cantidadCompra * $puntos->puntos);
               }
             }
           }
        }
        
        return $total_puntos;
    }
    
    
  
  public function guardarPuntos($iduser, $compra, $total_puntos, $concepto){
        $user = User::find($iduser);
        $user->puntosPro = ($user->puntosPro + $total_puntos);
        $user->save();
        
        $punto = Punto::create([
            'iduser' => $iduser,
            'idcompra' => $compra,
            'puntos' => $total_puntos,
            'concepto' => $concepto,
            'usuario' => $user->display_name,
            'cantidad' => $user->puntosPro,
        ]);
  }

  /**
   * Permite validar la categoria del producto es la misma de la comisiones
   *
   * @param integer $IdProducto
   * @param string $categoria - nombre de la categoria a buscar
   * @return void
   */
  public function validarCategoria(int $IdProducto, $categoria)
  {
        $settings = Settings::first();
        $resul = false;
        $sql = "SELECT wp.ID, wp.post_name, wt.name FROM ".$settings->prefijo_wp."posts as wp INNER JOIN ".$settings->prefijo_wp."term_relationships as wtr on (wtr.object_id = wp.ID) INNER JOIN ".$settings->prefijo_wp."term_taxonomy as wtt on (wtr.term_taxonomy_id = wtt.term_taxonomy_id) INNER JOIN ".$settings->prefijo_wp."terms as wt on (wtt.term_id = wt.term_id) WHERE post_type = 'product' AND wp.ID = ? AND wt.name = ? ";
        $verifica = DB::select($sql, [$IdProducto, $categoria]);
        if (!empty($verifica)) {
            $resul = true;
        }
        return $resul;
  }


  /**
   * Permite guardar la comision una vez ya procesada
   *
   * @param integer $iduser - id del usuario que cobrara la comision
   * @param integer $idcompra - id de la orden o compra procesada
   * @param float $totalComision - total de la comision a pagar
   * @param string $referred_email - correo del usuario que va a general la comision
   * @param integer $referred_level - nivel del usuario que va a general la comision
   * @param string $concepto - concepto de la comision
   * @param string $tipo_comision - que tipo de comision se va a procesar
   * @return void
   */
  public function guardarComision($iduser, $idcompra, $totalComision, $referred_email, $referred_level, $concepto, $tipo_comision)
  {
        $user = User::find($iduser);
        $comision = Commission::create([
            'user_id' => $iduser,
            'compra_id' => $idcompra,
            'date' => Carbon::now(),
            'total' => $totalComision,
            'concepto' => $concepto,
            'tipo_comision' => $tipo_comision,
            'referred_email' => $referred_email,
            'referred_level' => $referred_level,
            'status' => true,
            'eliminada' => false,
        ]);
  		
        if ($concepto != 'Primera Compra sin Comision') {
            $user = User::find($iduser);
            $user->wallet_amount = ($user->wallet_amount + $totalComision);
            $user->save();
            $datos = [
                'iduser' => $iduser,
                'idcomision' => $comision->id,
                'usuario' => $user->display_name,
                'descripcion' => $concepto,
                'descuento' => 0,
                'debito' => $totalComision,
                'credito' => 0,
                'balance' => $user->wallet_amount,
                'tipotransacion' => ($tipo_comision == 'recarga') ? 4 : 2
            ];
            $funciones = new WalletController;
            $funciones->saveWallet($datos);
        }
  }

  /**
   * Que tipo de Comision se va a general y el usuario que la generada
   * 
   * Permite saber cual es la comision que se va a general dependiendo de la configuraciones realizada y
   *    que usuario de mi lista de referido me dara la comision
   *
   * @param integer $iduser - id del usuario que va a cobrar la comision
   * @return void
   */
  public function generarComision($iduser)
  {
        $settingsRol = SettingsRol::find(1);
        $user = User::find($iduser);
        $rol = Rol::find($user->rol_id);
        $funciones = new IndexController;
        $todousuario = $funciones->generarArregloUsuario($iduser);
        if (!empty($todousuario)) {
        foreach ($todousuario as $usuario) {
            if ($usuario['status'] == 1) {
               
                if ($GLOBALS['settingsComision']->tipocomision == 'detallado') {
                    $valorComisiones = json_decode($GLOBALS['settingsComision']->valordetallado);
                    foreach ($valorComisiones as $comisones) {
                        foreach ($comisones as $llave => $value) {
                            if ($value != 0) {
                                $selecionarcomision = 'nivel'.$usuario['nivel'];
                                if ($selecionarcomision == $llave) {
                                    if ($rol->acepta_comision == 1) {
                                        if ($settingsRol->niveles == 1) {
                                            if ($usuario['nivel'] <= $rol->niveles) {
                                                $this->detallesComision($iduser, $usuario['ID'], $usuario['email'], $usuario['nivel'], $value);
                                                
                                        $this->ComisionDirecta($iduser, $value );
                                            }
                                        } else {
                                            $this->detallesComision($iduser, $usuario['ID'], $usuario['email'], $usuario['nivel'], $value);
                                            
                                            $this->ComisionDirecta($iduser, $value );
                                        }
                                    }
                                }
                            }
                        }
                    }
                } elseif($GLOBALS['settingsComision']->tipocomision == 'general') {
                    $valorComisiones = $GLOBALS['settingsComision']->valorgeneral;
                    if ($valorComisiones != 0) {
                        if ($rol->acepta_comision == 1) {
                            if ($settingsRol->niveles == 1) {
                                if ($usuario['nivel'] <= $rol->niveles) {
                                    $this->detallesComision($iduser, $usuario['ID'], $usuario['email'], $usuario['nivel'], $valorComisiones);
                                    
                                    $this->ComisionDirecta($iduser, $value );
                                }
                            } else {
                                $this->detallesComision($iduser, $usuario['ID'], $usuario['email'], $usuario['nivel'], $valorComisiones);
                                
                                $this->ComisionDirecta($iduser, $valorComisiones );
                            }
                        }
                    }
                }else{
                    $this->detallesComision($iduser, $usuario['ID'], $usuario['email'], $usuario['nivel'], 0);
                    
                    $this->ComisionDirecta($iduser, 0 );
                }
            }
        }
      }
  }

    /**
     * Permite aprobar las comisiones - ya no se usa
     *
     * @param integer $id
     * @return void
     */
  	public function aprobarComision($id)
	{
		$comision = Commission::find($id);
		$user = User::find($comision->user_id);
		$user->wallet_amount = $user->wallet_amount + $comision->total;
		$user->save();
		$comision->status = '1';
		$comision->save();

		return redirect('admin/commissionrecords')->with('msj', 'La Comision del usuario '.$user->display_name.' ha sido aprobada');
	}

    /**
     * LLeva a la vista del historial de comisiones
     *
     * @return void
     */
    public function record_commissions(){
    	// DO MENU
    	view()->share('title', 'Historial de Comisiones');
        view()->share('do', collect(['name' => 'Historial de Comisiones', 'text' => 'Reportes']));
        //

        $settings = Settings::first();
        $sql="SELECT c.*, wu.display_name FROM commissions c, ".$settings->prefijo_wp."users wu WHERE c.user_id=wu.ID and c.tipo=1  order by c.date desc";
            $comisiones =DB::select($sql);



    	return view('admin.commissionRecords')->with(compact('comisiones'));
    }
    
     /**
      * Lleva a la vista de las comisiones por filtro de fecha
      *
      * @return void
      */
    public function comisiones_filter()
    {
        //TITLE
        View::share('title', 'Comisiones');

     $comision = Commission::orderBy('id','DESC')->where('user_id',auth()->user()->ID)->paginate(5);
     return view('admin.comisiones_filter')->with(compact('comision'));
    }
    
    /**
     * Aplica el filtro de comisiones por fecha
     *
     * @return void
     */
    public function filter_comisiones()
    {
        //TITLE
        View::share('title', 'Comisiones');
        
        $primero = $_POST["primero"];
         $segundo = $_POST["segundo"];
         
          $comision=Commission::whereDate("date",">=",$primero)
             ->whereDate("date","<=",$segundo)
             ->where('user_id', '=', Auth::user()->ID )
             ->get(); 
     
     return view('admin.filter_comisiones')->with(compact('comision'));
    }
}
