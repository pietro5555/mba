<?php

namespace App\Http\Controllers\ProcesadorPago;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Sidebar; use App\Models\MenuAction; 
use App\Models\Commission; use App\Models\User; 
use App\Models\Transfer; use App\Models\Notification;
use App\Models\Settings;  use App\Models\Monedas;
use App\Models\Carrito;
use App\Models\Compradirecta;
use App\Models\Pagocarrito;
use App\Models\Optioncarrito;
use App\Models\SettingsPunto; 
use App\Models\SettingCorreo;
use Auth; use DB; use Date; use Carbon\Carbon; use Mail; 

//solo para paypal
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

use App\Http\Controllers\IndexController;
use App\Http\Controllers\TiendaController;


class PaypalController extends Controller
{
    
     public function __construct()
    {
        // setup PayPal api context
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    
    public function pay($pagina, $total, $descripcion, $idcompra){
        
         // setup PayPal api context
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
        
        
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
 
        $items = array();
        $cart = \Session::get('cart');
        $currency = 'USD';
 
       
            $item = new Item();
            $item->setName($pagina)
            ->setCurrency($currency)
            ->setDescription($descripcion)
            ->setQuantity(1)
            ->setPrice($total);
 
            $items[] = $item;
    
 
        $item_list = new ItemList();
        $item_list->setItems($items);
 
        $details = new Details();
        $details->setSubtotal($total);
 
        $amount = new Amount();
        $amount->setCurrency($currency)
            ->setTotal($total)
            ->setDetails($details);
 
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription($descripcion);
 
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(\URL::route('payment.status', ['idcompra' => $idcompra]))
            ->setCancelUrl(\URL::route('payment.status', ['idcompra' => $idcompra]));
 
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
 
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                echo "Exception: " . $ex->getMessage() . PHP_EOL;
                $err_data = json_decode($ex->getData(), true);
                exit;
            } else {
                die('Ups! Algo sali贸 mal');
            }
        }
 
        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
 
        // add payment ID to session
        \Session::put('paypal_payment_id', $payment->getId());
 
        if(isset($redirect_url)) {
            // redirect to paypal
            return \Redirect::away($redirect_url);
        }
        
        $mensaje->msjSistema('Ups! Error desconocido.', 'danger');
        return \Redirect::route('carrito-carrito');
    }
    
    
    //cancelacion o aceptacion de paypal
    public function getPaymentStatus($idcompra)
    {
        
         // setup PayPal api context
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);

        $mensaje = new IndexController;
        $tienda = new TiendaController;

        // Get the payment ID before session clear
        $payment_id = \Session::get('paypal_payment_id');
 
        // clear the session payment ID
        \Session::forget('paypal_payment_id');
 
        $payerId = \Input::get('PayerID');
        $token = \Input::get('token');
 
 
        if (empty($payerId) || empty($token)) {

        $tienda->accionSolicitud($idcompra, 'wc-cancelled');
        
        $mensaje->msjSistema('La compra fue cancelada', 'danger');
            return \Redirect::route('carrito-carrito');
        }
 
        $payment = Payment::get($payment_id, $this->_api_context);
 
        $execution = new PaymentExecution();
        $execution->setPayerId(\Input::get('PayerID'));
 
        $result = $payment->execute($execution, $this->_api_context);
 
 
        if ($result->getState() == 'approved') {
           
           $tienda->accionSolicitud($idcompra, 'wc-completed');
           
            $mensaje->msjSistema('Compra realizada de forma correcta', 'success');
            return \Redirect::route('carrito-carrito');
        }
        
        
        $tienda->accionSolicitud($idcompra, 'wc-cancelled');
        
        $mensaje->msjSistema('La compra fue cancelada', 'danger');
        return \Redirect::route('carrito-carrito');
    }
}