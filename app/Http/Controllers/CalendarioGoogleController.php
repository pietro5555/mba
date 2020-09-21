<?php

namespace App\Http\Controllers;

use App\Models\User; 
use App\Models\Events; 
use App\Models\Schedule; 
use App\Models\Calendario; 
use App\Models\Subcategory;
use App\Models\Course;
use Auth; 
use DB; 
use Carbon\Carbon;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_EventDateTime;
use Illuminate\Http\Request;
use DateTime; 

class CalendarioGoogleController extends Controller
{
    protected $client;


    function __construct()
    {
        Carbon::setLocale('es'); 
        $this->middleware('auth');
    }


    public function timelive(Request $request){

        if ($request->sigEvent == '' or $request->sigEvent == null) {
            $evento = Events::where('date', '>=', Carbon::now())->first();
            $prox = true;
            $i = 1;
            while($prox){
                $nextEvent = Events::where('id', $evento->id+($i++))->get()->first();
                if($nextEvent != null)
                    $prox = false;
            }
        } else {
            $lastEvent = Events::all()->last();
            $evento = Events::find($request->sigEvent);
            if ($lastEvent->id == $evento->id) {
                $nextEvent = Events::where('date', '>=', Carbon::now())->first();
            } else {
                $prox = true;
                $i = 1;
                while($prox){
                    $nextEvent = Events::where('id', $evento->id+($i++))->get()->first();
                    if ($nextEvent != null)
                        $prox = false;
                }
            }
        } 
          
        /*PROXIMOS EVENTOS*/

        $proximos = Events::where('date', '>=', Carbon::now())
        ->where('id', '!=', $evento->id)
        ->where('status', '=', '1')->get();
        $total= count($proximos);

        //dd($evento->id, $proximos);
        return view('timelive/timelive', compact('evento', 'nextEvent', 'proximos', 'total'));

    }


     public function dias($fecha){

       $dia ='';
       $fech = Carbon::parse($fecha)->format('l');
       
       if($fech == 'Saturday'){
         $dia='Sábado';
       }elseif($fech == 'Sunday'){
           $dia='Domingo';
       }elseif($fech == 'Monday'){
           $dia='Lunes';
       }elseif($fech == 'Tuesday'){
            $dia='Martes';
       }elseif($fech == 'Wednesday'){
           $dia='Miércoles';
       }elseif($fech == 'Thursday'){
           $dia='Jueves';
       }elseif($fech == 'Friday'){
           $dia='Viernes';
       }


       return $dia;
    }

    public function meses($fecha){

       $mes ='';
       $fech = Carbon::parse($fecha)->format('F');
       
       if($fech == 'January'){
         $mes='Enero';
       }elseif($fech == 'February'){
           $mes='Febrero';
       }elseif($fech == 'March'){
            $mes='Marzo';
       }elseif($fech == 'April'){
           $mes='Abril';
       }elseif($fech == 'May'){
           $mes='Mayo';
       }elseif($fech == 'June'){
           $mes='Junio';
       }elseif($fech == 'July'){
           $mes='Julio';
       }elseif($fech == 'August'){
           $mes='Agosto';
       }elseif($fech == 'September'){
           $mes='Septiembre';
       }elseif($fech == 'October'){
           $mes='Octubre';
       }elseif($fech == 'November'){
           $mes='Noviembre';
       }elseif($fech == 'December'){
           $mes='Diciembre';
       }


       return $mes;
    } 



     public function oauth($id)
    {
        session_start();

        $client = new Google_Client();
        $client->setAuthConfig('client_secret.json');
        $client->addScope(Google_Service_Calendar::CALENDAR);

        $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false)));
        $client->setHttpClient($guzzleClient);
        $this->client = $client;

        $rurl = action('CalendarioGoogleController@oauth',['id' => $id]);
        $this->client->setRedirectUri($rurl);
        if (!isset($_GET['code'])) {
            $auth_url = $this->client->createAuthUrl();
            $filtered_url = filter_var($auth_url, FILTER_SANITIZE_URL);
            return redirect($filtered_url);
        } else {
            $this->client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $this->client->getAccessToken();

             if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);
            
            $evento = Events::find($id);  
            $start = new Carbon($evento->date);
            $end = new Carbon('2020-09-10');

            $calendarId = 'primary';
            $event = new Google_Service_Calendar_Event([
                'summary' => $evento->title,
                'description' => 'descripcion',
                'start' => ['dateTime' => $start->format(\DateTime::RFC3339)],
                'end' => ['dateTime' => $end->format(\DateTime::RFC3339)],
                'reminders' => ['useDefault' => true],
            ]);
            $results = $service->events->insert($calendarId, $event); 
               
            return redirect('time/timelive')->with('msj', 'El live a sido agregado con exito a Google Calendar');
           }   
        }
    }


    /*EVENTO FAVORITO*/
    public function event_favorite($event_id){

        $user_id = Auth::user()->ID;

        $favorite = DB::table('events_users')
        ->where('event_id', '=',$event_id)
        ->where('user_id', '=', $user_id)
        ->update(['favorite' => 1]);
        date_default_timezone_set('Europe/Madrid');
            setlocale(LC_TIME, 'spanish');
        //Eventos favoritos de un usuario
        $eventos_favoritos = DB::table('events')
        ->join('events_users', 'events_users.event_id', '=', 'events.id')
        ->where('events_users.user_id', '=',$user_id )
        ->where('events_users.favorite', '=',1 )
        ->get();
        return view('timelive.favorite', compact('eventos_favoritos'));

    }

    /*LISTADO DE EVENTOS AGENDADOS POR EL USUARIO*/

    /*MOSTRAR CALENDARIO DE EVENTOS DEL USUARIO*/
    public function calendar()
    {
            /*DATOS PARA PINTAR EL CALENDARIO*/
        $user_calendar = Calendario::where('iduser', Auth::user()->ID)->get();
        $usuario = Auth::user()->ID;
        date_default_timezone_set('Europe/Madrid');
            setlocale(LC_TIME, 'spanish');

        //TODOS LOS EVENTOS AGENDADOS POR ESE USUARIO
        $eventos_agendados = DB::table('events')
        ->join('events_users', 'events_users.event_id', '=', 'events.id')
        ->where('events_users.user_id', '=', Auth::user()->ID)
        ->get();

        
      //  return dd($user_calendar);

        return view('agendar/calendar',compact('usuario','eventos_agendados', 'user_calendar'));
    }


    /*AGENDAR EVENTOS DEL USUARIO*/
public function schedule($event_id, Request $request){
 $check = DB::table('events_users')
                    ->where('user_id', '=', Auth::user()->ID)
                    ->where('event_id', '=', $event_id)
                    ->first();

        if (is_null($check)){
            $events = DB::table('events')
                            ->select('date')
                            ->where('id', '=', $event_id)
                            ->first();

            $date_event = date('Y-m-d', strtotime($events->date));
            $time_event = date('H:i:s', strtotime($events->date));

            $disponibilidad = DB::table('events_users')
                                ->where('user_id', '=', Auth::user()->ID)
                                ->where('date', '=', $date_event)
                                ->where('time', '=', $time_event)
                                ->first();

            if (is_null($disponibilidad)){
                Auth::user()->events()->attach($event_id, ['date' => $date_event, 'time' => $time_event]);
                $new_calendar = Events::where('id', '=', $event_id)
                ->first();
        

         $calendario = new Calendario();
         $calendario->titulo = $new_calendar->title;
         $calendario->contenido = $new_calendar->description;
         $calendario->inicio = $new_calendar->date;
         $calendario->vence = $new_calendar->date_end;
         $calendario->color = '#28a745';
         $calendario->lugar = 'Ninguno';
         $calendario->iduser = Auth::user()->ID;
         $calendario->save();

        //return redirect('agendar/calendar');

        return redirect()->action('CalendarioGoogleController@calendar');


        }else{
                return redirect()->back()->with('msj-erroneo', 'No se puede agendar este evento porque ya posee en su agenda otro evento en la misma fecha y hora.');
            }
        }else{
            return redirect()->back()->with('msj-erroneo', 'Este evento se encuentra registrado en su agenda.');
    
        }


        
    }




    //modificamos algun dato del calendario
    public function modificar(Request $request){
        
        $funciones = new IndexController;
        
    if($request->inicio > $request->vence){
          $funciones->msjSistema('La fecha de inicio debe ser mayor a la fecha final', 'danger');
          return redirect()->back();  
        }     

     $calendar = Calendario::find($request->ID);
     $calendar->titulo = $request->titulo;
     $calendar->contenido = $request->contenido;
     $calendar->inicio = $request->inicio;
     $calendar->vence = $request->vence;
     $calendar->color = $request->color;
     $calendar->lugar = $request->lugar;
     $calendar->tipo = $request->detalle;
     $calendar->especifico = $request->usuario;
     $calendar->save();
     
     $funciones->msjSistema('Modificado con exito', 'success');
     return redirect()->back();
    }
    
    //eliminamos datos del calendario
    public function eliminar(Request $request){
        
        $funciones = new IndexController;

     $calendar = Calendario::find($request->ID);
     $calendar->delete();
     
     $funciones->msjSistema('Eliminado con exito', 'success');
     return redirect()->back();
    }
    
}