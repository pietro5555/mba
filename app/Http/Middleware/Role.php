<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Crypt;
use Closure;
use App\Models\Settings;
use Carbon\Carbon;
use Auth;

class role
{

	public function handle($request, Closure $next)
    {

    	if (Auth::user()->rol_id >= 2){
    		 return redirect('/')->with('msj-erroneo', 'Usted no posee acceso a la ruta ruta que esta tratando de ingresar');
    	}

    	return $next($request);
    }

}