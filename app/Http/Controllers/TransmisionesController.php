<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
// llamado de modelo
use App\Models\Rol;
use App\Models\User;
use App\Models\EventResources;
use App\Models\Course; 
use App\Models\Events;
use App\Models\Permiso;

// llamado de Controlladores
use App\Http\Controllers\IndexController;

class TransmisionesController extends Controller
{

	function __construct()
	{
        
	    Carbon::setLocale('es');
	}

	//vista de transmisiones
    public function transmisiones(){
        
        $proximas = Events::where('status', '1')->take(6)->get();
        $total = count($proximas);

        foreach($proximas as $proxima){
          $user = User::find($proxima->user_id);
          $proxima->avatar = $user->avatar;
        }

        return view('transmision.transmision',compact('proximas','total'));
    }


     public function agendar($evento){
        $check = DB::table('events_users')
                    ->where('user_id', '=', Auth::user()->ID)
                    ->where('event_id', '=', $evento)
                    ->first();

        if (is_null($check)){
            $datosEvento = DB::table('events')
                            ->select('date')
                            ->where('id', '=', $evento)
                            ->first();

            $fechaEvento = date('Y-m-d', strtotime($datosEvento->date));
            $horaEvento = date('H:i:s', strtotime($datosEvento->date));

            $disponibilidad = DB::table('events_users')
                                ->where('user_id', '=', Auth::user()->ID)
                                ->where('date', '=', $fechaEvento)
                                ->where('time', '=', $horaEvento)
                                ->first();

            if (is_null($disponibilidad)){
                Auth::user()->events()->attach($evento, ['date' => $fechaEvento, 'time' => $horaEvento]);

                return redirect()->back()->with('msj', 'El evento ha sido reservado en su agenda con éxito.');
            }else{
                return redirect()->back()->with('msj2', 'No se puede agendar este evento porque ya posee en su agenda otro evento en la misma fecha y hora.');
            }
        }else{
            return redirect()->back()->with('msj2', 'Ya este evento se encuentra registrado en su agenda.');
    
        }
    }
    

}