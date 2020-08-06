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

class NoticiasController extends Controller
{
    
     public function __construct()
    {
        // TITLE
		view()->share('title', 'Noticias');
		Carbon::setLocale('es');
    }
    
    
    	public function noticias(){
	    
	    $noticias = Componentenoticias::all();
	    
	    return view('inicio.noticias',compact('noticias'));
	    
	}
	
	public function save(Request $request){
	    
	    $funciones = new IndexController;
	    
	    $tamano = str_replace('<iframe width=', '<iframe width="340"', $request->contenido);
          $conte = str_replace('height=', 'height="340"', $tamano);
          
          
          $noticias = new Componentenoticias();
    $noticias->noticias=$conte;
    $noticias->save();
    
    $funciones->msjSistema('Noticia creada con exito', 'success');
            return redirect()->back();
	}
	
	
	public function delete($id){
	    
	    $funciones = new IndexController;
	    
	    $noticias = Componentenoticias::find($id);
	    $noticias->delete();
	    
	    $funciones->msjSistema('Noticia Eliminada con exito', 'success');
            return redirect()->back();
	}
}