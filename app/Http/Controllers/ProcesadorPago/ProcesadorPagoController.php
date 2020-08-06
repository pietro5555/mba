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
use App\Models\Rol;
use App\Models\User; 
use App\Models\Ticket;
use App\Models\Monedas;
use App\Models\Permiso; 
use App\Models\Punto; 
use App\Models\Settings; 
use App\Models\Commission; 
use App\Models\SettingsComision; 
use App\Models\SettingsEstructura;

// llamado a los controlladores
use App\Http\Controllers\IndexController;
use Brotzka\DotenvEditor\DotenvEditor;

class ProcesadorPagoController extends Controller
{
	function __construct()
	{
	    
	}
	
	
	public function paypal(Request $request){
	    
	    
	    $env = new DotenvEditor();
	    
	    $env->changeEnv([
            'PAYPAL_CLIENT_ID'   => $request->cliente,
            'PAYPAL_SECRET'   => $request->secreto,
            'PAYPAL_MODE'   => $request->modelo,
            ]);
            
            
     $funciones = new IndexController;
     $funciones->msjSistema('Agregado con exito datos de paypal', 'success');
      return redirect()->back();    
	}
}