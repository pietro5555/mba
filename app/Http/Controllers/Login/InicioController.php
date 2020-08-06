<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Noticias;
use App\Models\Wallet;
use App\Models\Monedas;
use App\Models\Settings; 
use App\Models\Componentenoticias;
use App\Models\Componentetransf;
use App\Models\Componentestransferencias;
use DB;
use Auth;
use Hash;
use Carbon\Carbon;

// llamado a los controlladores
use App\Http\Controllers\IndexController;

class InicioController extends Controller
{
    
     public function __construct()
    {
        // TITLE
		view()->share('title', 'Panel Principal');
		Carbon::setLocale('es');
    }
    
    public function inicio(){
        
        $moneda = Monedas::where('principal', 1)->get()->first();
        $cambio = Componentetransf::find(1);
        
        if(Auth::user()->rol_id == 0){
        $billeteras= Componentestransferencias::all();
        
        $totalTransferido = Componentestransferencias::where('tipotransacion', '0')->get()->sum('debito');
        }else{
        $billeteras = Componentestransferencias::where('iduser', Auth::user()->ID)->where('tipotransacion', '0')->get();
        
        $totalTransferido = Componentestransferencias::where('iduser', Auth::user()->ID)->get()->sum('debito');
        }
        
        $noticias = Componentenoticias::take(5)->get();
        
        return view('inicio.inicio',compact('moneda','billeteras','cambio','totalTransferido','noticias'));
    }
}