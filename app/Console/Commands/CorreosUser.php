<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Events;
use App\Models\Streaming\Meeting;
use App\Models\SettingCorreo;
use App\Models\Notification;
use App\Models\User; 
use DB;
use Auth; 
use Mail;

use App\Http\Controllers\Notificaciones\CorreoController;

class CorreosUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'correos:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'En vio de correos a las personas que esten registradas al live';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            
        $eventos = Events::where('date', '=', date('Y-m-d'))->get();
        $horaActual = Carbon::now()->timezone("Africa/Accra");
            foreach ($eventos as $evento){
                $p = $evento->date."T".$evento->time;
                $horaEvento = new Carbon($p);
                $horaLimite = new Carbon($p);
                $horaLimite->addHours(5);
                
                
                if ($horaActual->diffInMinutes($horaLimite) <= 60){
                    $this->Horalive($evento->id, $horaLimite);
                }elseif($horaActual->diffInMinutes($horaLimite) <= 1){
                    $this->Empesolive($evento->id);
                }
            }
            
        } catch (\Throwable $th) {
            $this->info($th);
        }
    }
    
    
    public function Horalive($evento, $fecha){
        
        $plantilla = SettingCorreo::find(9);
        $event = Events::find($evento);
        $mentor = User::find($event->user_id);
        $users = DB::table('events_users')->where('event_id', '=', $evento)->get();
        
        if($event->correos == 0){
          foreach($users as $user){    
             if (!empty($plantilla->contenido)) {
            $mensaje = str_replace('@titulo', ' '.$event->title.' ', $plantilla->contenido);
            $mensaje = str_replace('@mentor', ' '.$mentor->display_name.' ', $mensaje);
            $mensaje = str_replace('@nombre', ' '.$user->display_name.' ', $mensaje);
            Mail::send('emails.plantilla',  ['data' => $mensaje], function($msj) use ($plantilla, $user){
                $msj->subject($plantilla->titulo);
                $msj->to($user->user_email);
             });
            }
            
            //agendar notificacion
            $notifiacion = new CorreoController;
            $notifiacion->notificar($user->ID, 'EL live va a iniciar', 'calendar', 'fas fa-video', 'Iniciar Live');
          }
          
          $event->correos = 1;
          $event->save();
        }
    }
    
    
    public function Empesolive($evento){
        
        $plantilla = SettingCorreo::find(10);
        $event = Events::find($evento);
        $mentor = User::find($event->user_id);
        $users = DB::table('events_users')->where('event_id', '=', $evento)->get();
        
        if($event->correos == 1){
          foreach($users as $user){    
             if (!empty($plantilla->contenido)) {
            $mensaje = str_replace('@titulo', ' '.$event->title.' ', $plantilla->contenido);
            $mensaje = str_replace('@mentor', ' '.$mentor->display_name.' ', $mensaje);
            $mensaje = str_replace('@nombre', ' '.$user->display_name.' ', $mensaje);
            Mail::send('emails.plantilla',  ['data' => $mensaje], function($msj) use ($plantilla, $user){
                $msj->subject($plantilla->titulo);
                $msj->to($user->user_email);
             });
            }
            
            //agendar notificacion
            $notifiacion = new CorreoController;
            $notifiacion->notificar($user->ID, 'EL live ya a iniciado', 'calendar', 'fas fa-video', 'Live inicio');
          }
          
          $event->correos = 2;
          $event->save();
        }
    }
}