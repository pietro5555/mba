<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Crypt;
use Closure;
use App\Models\Settings;
use Carbon\Carbon;

class licencia
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $setting = Settings::first();
        $fecha = new Carbon;
        
        if (!empty($setting->licencia)) {
        if ( base64_encode(base64_decode($setting->fecha_vencimiento, true)) === $setting->fecha_vencimiento){
        $fecha_v = base64_decode($setting->fecha_vencimiento);
        $fecha_v = new Carbon($fecha_v);
            if ($fecha->now() > $fecha_v) {
                return redirect('login')->with('msj3', 'Licencia Caducada, Comuniquese con el Administrador');    
            }
        return $next($request);
        
        }else{
            return redirect('login')->with('msj3', 'UPPS parece que hay problemas con la licencia');
        }
        
        }else{
            return redirect('login')->with('msj3', 'Licencia no Registrada, Comuniquese con el Administrador');
        }
    }
}
