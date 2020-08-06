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
use App\Models\ConsultaCrypto;

// controladores
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ComisionesController;
use App\Http\Controllers\TiendaController;

class CryptoController extends Controller
{
    public function rates(){
        
        $crypto = env('CRYPTO');
        $rate=0;
        $cURL = curl_init();
		// toda la informacion del arreglo de coinbase
		curl_setopt_array($cURL, array(
            CURLOPT_URL => "https://api.coinbase.com/v2/exchange-rates",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => ['Content-Type: application/json']
			));
			
		$tmpResult = curl_exec($cURL);
		
		if ($tmpResult !== false) {
			$currency = json_decode($tmpResult);
			
			$rate = $currency->data->rates->$crypto;
			
		}
		
		return $rate;
    }
    
    
    
    public function coinpayments_api_call($cmd, $req = array()) {
		// Fill these in from your API Keys page
		$public_key = env('COIN_PAYMENT_PUBLIC_KEY', '');
		$private_key = env('COIN_PAYMENT_PRIVATE_KEY', '');
		
		// Set the API command and required fields
		$req['version'] = 1;
		$req['cmd'] = $cmd;
		$req['key'] = $public_key;
		$req['format'] = 'json'; //supported values are json and xml
		
		// Generate the query string
		$post_data = http_build_query($req, '', '&');
		
		// Calculate the HMAC signature on the POST data
		$hmac = hash_hmac('sha512', $post_data, $private_key);
		
		// Create cURL handle and initialize (if needed)
		static $ch = NULL;
		if ($ch === NULL) {
			$ch = curl_init('https://www.coinpayments.net/api.php');
			curl_setopt($ch, CURLOPT_FAILONERROR, TRUE);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		}
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('HMAC: '.$hmac));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
		
		// Execute the call and close cURL handle     
		$data = curl_exec($ch);                
		// Parse and return data if successful.
		if ($data !== FALSE) {
			if (PHP_INT_SIZE < 8 && version_compare(PHP_VERSION, '5.4.0') >= 0) {
				// We are on 32-bit PHP, so use the bigint as string option. If you are using any API calls with Satoshis it is highly NOT recommended to use 32-bit PHP
				$dec = json_decode($data, TRUE, 512, JSON_BIGINT_AS_STRING);
			} else {
				$dec = json_decode($data, TRUE);
			}
			if ($dec !== NULL && count($dec)) {
				return $dec;
			} else {
				// If you are using PHP 5.5.0 or higher you can use json_last_error_msg() for a better error message
				return array('error' => 'Unable to parse JSON result ('.json_last_error().')');
			}
		} else {
			return array('error' => 'cURL error: '.curl_error($ch));
		}
		
	} 
	
	
	
	public function consultaCompra(){
	    
	    $tienda = new TiendaController;
	    $consultas = ConsultaCrypto::where('status', '0')->get();
	    
	    foreach($consultas as $consulta){
	        
	        $cmd = 'get_tx_info';
        
            $dataPago = [
			'txid' => $consulta->idconsulta,
		    ];
		    
		 $true = $this->BuscarCompra($consulta->id, $consulta->idcompra);   
		
		if($true){	
        $revision = $this->coinpayments_api_call($cmd, $dataPago);
        
         if (!empty($revision['result'])) {
            
            if($revision['result']['status'] == 100){
                
              $tienda->accionSolicitud($consulta->idcompra, 'wc-completed');
              
              $cambio = ConsultaCrypto::find($consulta->id);
              $cambio->status = 1;
              $cambio->save();
              
              }elseif($revision['result']['status'] == -1){
                
              $tienda->accionSolicitud($consulta->idcompra, 'wc-cancelled');
              
              $cambio = ConsultaCrypto::find($consulta->id);
              $cambio->status = 2;
              $cambio->save();  
                 }
              }
           } 
	    }
	}
	
	
	public function BuscarCompra($id, $idcompra){
	    
	    $true = true;
	    $settings = Settings::first();
        $consulta = DB::table($settings->prefijo_wp.'posts')
            ->where('ID', $idcompra)
            ->first();
            
        if($consulta != null){    
            if($consulta->post_status == 'wc-completed'){
                
                $cryp = ConsultaCrypto::find($id);
                $cryp->status = 1;
                $cryp->save();
                $true = false;
                
            }elseif($consulta->post_status == 'wc-cancelled'){
                
                $cryp = ConsultaCrypto::find($id);
                $cryp->status = 2;
                $cryp->save();
                $true = false;
            } 
        }
            
            return $true;
	}
}