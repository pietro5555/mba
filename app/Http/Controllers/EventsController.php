<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Crypt;
use App\Models\Course;
use App\Models\Events;
use App\Models\Note;
use App\Models\EventResources;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Calendario;
use App\Models\OffersLive;
use App\Models\SetEvent;
use App\Models\SurveyOptions;
use App\Models\SurveyResponse;
use App\Models\Streaming\Meeting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;

class EventsController extends Controller
{

    function __construct(){
        // TITLE
        view()->share('title', 'Eventos');
        Carbon::setLocale('es');
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $events = Events::orderBy('id', 'DESC')->get();

        $mentores = DB::table('wp98_users')
                        ->select('ID', 'user_email')
                        ->where('rol_id', '=', 2)
                        ->orderBy('user_email', 'ASC')
                        ->get();

        $categorias = DB::table('categories')
                        ->select('id', 'title')
                        ->orderBy('id', 'ASC')
                        ->get();

        return view('admin.events.index')->with(compact('events', 'mentores', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $streamingConnect = new StreamingController();


        $datosMentor = DB::table('wp98_users')
                        ->select('display_name', 'user_email', 'password')
                        ->where('ID', '=', $request->user_id)
                        ->first();
        $userStreaming = $streamingConnect->verifyUser($datosMentor->user_email);
        if (!is_null($userStreaming)){
            $userId = $userStreaming->id;
            $contactStreaming = $streamingConnect->verifyContact($userId);

            if (!is_null($contactStreaming)){
                $contactId = $contactStreaming->id;
            }else{
                $requestContact = new Request(array('name' => $datosMentor->user_email, 'email' => $datosMentor->user_email, 'user_id' => $userId));
                $contactId = $streamingConnect->newContact($requestContact);
            }
        }else{
            $requestUser = new Request(array('role_id' => 4, 'name' => $datosMentor->display_name, 'email' => $datosMentor->user_email, 'username' => $datosMentor->user_email, 'password' => $datosMentor->password));
            $userId = $streamingConnect->newUser($requestUser);

            $requestContact = new Request(array('name' => $datosMentor->user_email, 'email' => $datosMentor->user_email, 'user_id' => $userId));
            $contactId = $streamingConnect->newContact($requestContact);
        }

        if (is_null(Auth::user()->streaming_token)){
            $streamingConnect->setToken();
        }

        $meetingUuid = $streamingConnect->newMeeting($request, $userId);

        $evento = new Events($request->all());
        $evento->uuid = $meetingUuid;
        $evento->url_streaming = 'https://streaming.mybusinessacademypro.com/app/live/meetings/'.$evento->uuid;
        $evento->status = 1;
        $evento->save();

        $fecha = date('Y-m-d H:i:s');
        DB::table('events_users')
            ->insert(['event_id' => $evento->id, 'user_id' => $evento->user_id, 'date' => $evento->date, 'time' => $evento->time, 'created_at' => $fecha, 'updated_at' => $fecha]);

        $calendario = new Calendario();
        $calendario->titulo = $evento->title;
        $calendario->contenido = $evento->description;
        $calendario->inicio = $evento->date;
        $calendario->time = $evento->time;
        $calendario->color = '#28a745';
        $calendario->lugar = 'Ninguno';
        $calendario->iduser = $evento->user_id;
        $calendario->save();

        if ($request->hasFile('banner')){
            $file = $request->file('banner');
            $name = $evento->id.".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/images/banner', $name);
            $evento->image = $name;
            $evento->save();
        }
        /*Habilitar recursos por defecto: Configuracion y Participantes*/

        $resourceOne = EventResources::create([
            'resources_id' => 1,
            'event_id' => $evento->id,
            'status' => 1,
        ]);
        $resourceTwo = EventResources::create([
            'resources_id' => 2,
            'event_id' => $evento->id,
            'status' => 1,
        ]);
        $resourceThree= EventResources::create([
            'resources_id' => 3,
            'event_id' => $evento->id,
            'status' => 1,
        ]);

        //return dd ($resourceOne, $resourceTwo);

        return redirect('admin/events')->with('msj-exitoso', 'El evento '.$evento->title.' ha sido creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_event($event_id){
        //return dd(Auth::user()->rol_id);
        $notes = Note::all();
        $event = Events::find($event_id);
        $menuResource = $event->getResource();
        $resources_survey = SetEvent::where('event_id', $event_id)->where('type', 'survey')->get()->first();
        $resources_video = SetEvent::where('event_id', $event_id)->where('type', 'video')->get()->first();
        $resources_offer = OffersLive::all()->where('event_id', $event_id);
      // return  dd($resources_survey, $menuResource);
        $survey_response = null;
        if (!empty($resources_survey))
        {
            $surveys = SurveyOptions::where('content_event_id', $resources_survey->id)->first();
            $survey_id =$surveys->id;
            if(Empty($surveys)){
                $survey_response = null;
            }else
            {
                $survey_response = SurveyResponse::where('survey_options_id', $surveys->id)->where('selected', 0)->get();
            }
        }
        else
        {
            $surveys = null;
            $survey_id =null;
        }

       // return dd ($resources_survey , $surveys);
        // return response()->json([$menuResource], 201);
     //  dd($survey_response);
        
        /*Files*/
        $files = SetEvent::where('event_id', $event_id)
        ->where('type', 'file')
        ->get();
        /*Presentations */
        $presentations = SetEvent::where('event_id', $event_id)
        ->where('type', 'presentation')
        ->get();
        return view('live.live', compact ('event','notes', 'menuResource', 'surveys', 'resources_video', 'files', 'presentations','survey_id', 'resources_offer', 'survey_response'));

        
        
    }
    
    public function timeliveEvent($event_id){
        $evento = Events::find($event_id);

        /*$client = new Client(['base_uri' => 'https://streaming.mybusinessacademypro.com']);

        $response = $client->request('POST', 'api/auth/login', [
            'headers' => ['Accept' => 'application/json', 'Content-Type' => 'application/x-www-form-urlencoded'],
            'form_params' => [
                'email' => 'mbapro',
                'password' => 'mbapro2020',
                'device_name' => 'admin-device',
            ]
        ]);
        
        $result = json_decode($response->getBody());
        
        $headers = [
            'Accept'        => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Bearer '.$result->token
        ];
        
        $consultaEvento = $client->request('GET', 'api/meetings/'.$evento->uuid, ['headers' => $headers]);
        $detallesEvento = json_decode($consultaEvento->getBody());
        $statusLive = $detallesEvento->status;*/
        
        $meeting = Meeting::where('uuid', '=', $evento->uuid)->first();
        $info = json_decode($meeting->meta);
        $statusLive =  $info->status;

        return view('timelive.timeliveEvent')->with(compact('evento', 'statusLive'));
    }
   

    public function edit($id){
        $evento = Events::find($id);

        return response()->json(
            $evento
        );
    }

    public function update(Request $request){
        $streamingConnect = new StreamingController();

        $evento = Events::find($request->event_id);

        if (is_null(Auth::user()->streaming_token)){
            $streamingConnect->setToken();
        }

        if ($evento->user_id != $request->user_id){
            $datosMentor = DB::table('wp98_users')
                                ->select('display_name', 'user_email', 'password')
                                ->where('id', '=', $request->user_id)
                                ->first();

            $userStreaming = $streamingConnect->verifyUser($datosMentor->user_email);
            if (!is_null($userStreaming)){
                $userId = $userStreaming->id;
                $contactStreaming = $streamingConnect->verifyContact($userId);

                if (!is_null($contactStreaming)){
                    $contactId = $contactStreaming->id;
                }else{
                    $requestContact = new Request(array('name' => $datosMentor->user_email, 'email' => $datosMentor->user_email, 'user_id' => $userId));
                    $contactId = $streamingConnect->newContact($requestContact);
                }
            }else{
                $requestUser = new Request(array('role_id' => 4, 'name' => $datosMentor->display_name, 'email' => $datosMentor->user_email, 'username' => $datosMentor->user_email, 'password' => $datosMentor->password));
                $userId = $streamingConnect->newUser($requestUser);

                $requestContact = new Request(array('name' => $datosMentor->user_email, 'email' => $datosMentor->user_email, 'user_id' => $userId));
                $contactId = $streamingConnect->newContact($requestContact);
            }

            $request->user_streaming_id = $userId;
        }

        $streamingConnect->updateMeeting($request, $evento->uuid);

        $evento->fill($request->all());
        if ($request->hasFile('banner')){
            $file = $request->file('banner');
            $name = $evento->id.".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/images/banner', $name);
            $evento->image = $name;
        }
        $evento->save();

        return redirect('admin/events')->with('msj-exitoso', 'El evento '.$evento->title.' ha sido modificado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    /* Reservar Evento */
    /* Añadirlo a la agenda de eventos del usuario*/
    public function book($evento){
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

                return redirect('/')->with('msj-exitoso', 'El evento ha sido reservado en su agenda con éxito.');
            }else{
                return redirect('/')->with('msj-erroneo', 'No se puede agendar este evento porque ya posee en su agenda otro evento en la misma fecha y hora.');
            }
        }else{
            return redirect('/')->with('msj-erroneo', 'Ya este evento se encuentra registrado en su agenda.');

        }
    }


    /**
    * Admin / Cursos / Listado de Cursos / Eliminar Curso (Lógico)
    */
    public function change_status($id, $status){
        $event = Events::find($id);
        $event->status = $status;
        $event->save();

        if ($status == 0){
            return redirect('admin/events')->with('msj-exitoso', 'El evento '.$event->title.' ha sido deshabilitado con éxito.');
        }else{
            return redirect('admin/events')->with('msj-exitoso', 'El evento '.$event->title.' ha sido habilitado con éxito.');
        }
    }


   /*Vista con la información del streaming Time/timelive*/
   public function timelive(Request $request){
      setlocale(LC_TIME, 'es_ES.UTF-8');
      //setlocale(LC_TIME, 'es');//Local
     // Carbon::setLocale('es');
      //$total_eventos = count(Events::all());
      $total_eventos = Events::where('date', '>', Carbon::now()->format('Y-m-d'))
                      ->orwhere('date', '=', date('Y-m-d'))
                      ->where('time', '>=', date('H:i:s'))
                           ->where('status','1')->count();
        //return dd( $total_eventos, date('H:i:s'));
      $evento = Events::where('date', '>=', date('Y-m-d'))
                  ->where('time', '>=', date('H:i:s'))
                  ->where('status', '=',1)
                  ->get()
                  ->first();
                  
                  //dd($evento);

      if(!empty($evento)){
          //dd($evento, $total_eventos);
         if ($request->sigEvent == '' or $request->sigEvent == null) {
             
            if($total_eventos > 1){
               $prox = true;
               $i = 1;
               $id = $evento->id;
               while($prox){
                  $id = $id+1;
                  $nextEvent = Events::where('id', $id)->get()->first();
                  if($nextEvent != null)
                     $prox = false;
               }
            }else{
               $nextEvent = null;
               
            }
         }else {
            $lastEvent = Events::all()->last();
            $evento = Events::find($request->sigEvent);

            if ($lastEvent->id == $evento->id) {
               $nextEvent = Events::where('date', '>=', Carbon::now())->first();
               //return dd($lastEvent, $total_eventos, $nextEvent);
            }else {
               if($total_eventos > 1){
                  $prox = true;
                  $i = 1;
                  $id = $evento->id;
                  while($prox){
                     $id = $id+1;
                     $nextEvent = Events::where('id', $id)->get()->first();
                     //return dd($lastEvent, $evento, $id, $total_eventos, $nextEvent);
                     if ($nextEvent != null)
                        $prox = false;
                  }
               }else{
                  $nextEvent = null;
               }
            }
         }
      }else{
         $evento= '';
         $nextEvent = '';
         $proximos = '';
         $total= $total_eventos;
         $fechaActual = Carbon::now()->format('Y-m-d');
         return view('timelive/timelive', compact('evento', 'nextEvent', 'proximos', 'total', 'total_eventos', 'fechaActual'));
      }

      /*PROXIMOS EVENTOS*/
      if($total_eventos>0){
         $proximos = Events::where('date', '>', date('Y-m-d'))
                      ->where('id', '!=', $evento->id)
                      ->orwhere('date', '=', date('Y-m-d'))
                      ->where('time', '>=', date('H:i:s'))
                      ->get();
                      //dd(date_default_timezone_get(),Carbon::now()->format('H:i:s') , date('Y-m-d'), date('H:i:s'));
         $total = count($proximos);
      }else{
         $proximos ='';
         $total =0;
      }

      $fechaActual = Carbon::now()->format('Y-m-d');
      $checkEvento = NULL;
      if (!Auth::guest()){
        $checkEvento = DB::table('events_users')
                        ->where('event_id', '=', $evento->id)
                        ->where('user_id', '=', Auth::user()->ID)
                        ->first();
                        
        
        
      }
      
      
      $misEventosArray = [];
      if (!Auth::guest()){
         $misEventos = DB::table('events_users')
                        ->select('event_id')
                        ->where('user_id', '=', Auth::user()->ID)
                        ->get();

         foreach ($misEventos as $miEvento){
            array_push($misEventosArray, $miEvento->event_id);
         }
      }
      
        if ((!is_null($evento)) && ($evento != '') ){
            $meeting = Meeting::where('uuid', '=', $evento->uuid)->first();
            $info = json_decode($meeting->meta);
            $statusLive =  $info->status;
        }

      //dd($evento, $proximos);
      return view('timelive/timelive', compact('evento', 'nextEvent', 'proximos', 'total', 'total_eventos', 'fechaActual', 'checkEvento' , 'misEventosArray', 'statusLive'));
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
        return redirect()->action('CourseController@favorites');

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
        $eventos_agendados = Events::join('events_users', 'events_users.event_id', '=', 'events.id')
        ->where('events_users.user_id', '=', Auth::user()->ID)
        ->select('events.*')
        ->get();
        $misEventosArray = [];
      if (!Auth::guest()){
         $misEventos = DB::table('events_users')
                        ->select('event_id')
                        ->where('user_id', '=', Auth::user()->ID)
                        ->get();

         foreach ($misEventos as $miEvento){
            array_push($misEventosArray, $miEvento->event_id);
         }
      }

      //  return dd($user_calendar);
      //linea de referidos Directos
      $refeDirec =0;
      if(Auth::user()){
         $refeDirec = User::where('referred_id', Auth::user()->ID)->count('ID');
      }
        return view('agendar/calendar',compact('usuario','eventos_agendados', 'user_calendar', 'refeDirec','misEventosArray'));
    }


  /*AGENDAR EVENTOS DEL USUARIO*/
    public function schedule($event_id){
        $check = DB::table('events_users')
                    ->where('user_id', '=', Auth::user()->ID)
                    ->where('event_id', '=', $event_id)
                    ->first();

        if (is_null($check)){
            $events = DB::table('events')
                        ->select('date', 'time')
                        ->where('id', '=', $event_id)
                        ->first();

            $date_event = date('Y-m-d', strtotime($events->date));
            $time_event = date('H:i:s', strtotime($events->time));

            $disponibilidad = DB::table('events_users')
                                ->where('user_id', '=', Auth::user()->ID)
                                ->where('date', '=', $date_event)
                                ->where('time', '=', $time_event)
                                ->first();
        
            if (is_null($disponibilidad)){
                $streamingConnect = new StreamingController();

                $userStreaming = $streamingConnect->verifyUser(Auth::user()->user_email);
                if (!is_null($userStreaming)){
                    $userId = $userStreaming->id;
                    $contactStreaming = $streamingConnect->verifyContact($userId);

                    if (!is_null($contactStreaming)){
                        $contactId = $contactStreaming->id;
                    }else{
                        $requestContact = new Request(array('name' => Auth::user()->user_email, 'email' => Auth::user()->user_email, 'user_id' => $userId));
                        $contactId = $streamingConnect->newContact($requestContact);
                    }
                }else{
                    $requestUser = new Request(array('role_id' => 3, 'name' => Auth::user()->display_name, 'email' => Auth::user()->user_email, 'username' => Auth::user()->user_email, 'password' => Auth::user()->password));
                    $userId = $streamingConnect->newUser($requestUser);

                    $requestContact = new Request(array('name' => Auth::user()->user_email, 'email' => Auth::user()->user_email, 'user_id' => $userId));
                    $contactId = $streamingConnect->newContact($requestContact);
                }

                $evento = Events::find($event_id);

                $streamingId = $streamingConnect->getMeetingId($evento->uuid);

                $streamingConnect->newInvitation($streamingId, $contactId);

                Auth::user()->events()->attach($event_id, ['date' => $date_event, 'time' => $time_event]);

                $new_calendar = Events::where('id', '=', $event_id)->first();

                $calendario = new Calendario();
                $calendario->titulo = $new_calendar->title;
                $calendario->contenido = $new_calendar->description;
                $calendario->inicio = $new_calendar->date;
                $calendario->time = $new_calendar->time;
                $calendario->color = '#28a745';
                $calendario->lugar = 'Ninguno';
                $calendario->iduser = Auth::user()->ID;
                $calendario->save();

                //return redirect('agendar/calendar');

                return redirect()->action('EventsController@calendar');
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

    public function transmitir($id){
        $evento = Events::find($id);
        $fecha = $evento->date."T".$evento->time;
        $fecha2 = "2020-09-27T18:55:00";
        $fechaEvento = new Carbon($fecha);
        $fechaActual = new Carbon($fecha2);
        //dd($fecha2);

        return view('transmitir')->with(compact('evento', 'fechaEvento', 'fechaActual'));
    }
}
