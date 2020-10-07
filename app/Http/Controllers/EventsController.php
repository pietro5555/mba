<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Course; use App\Models\Events; use App\Models\Note; use App\Models\EventResources;
use App\Models\Category; use App\Models\Subcategory; use App\Models\Calendario;
use App\Models\SetEvent;
use App\Models\Survey;
use DB; use Auth; use Carbon\Carbon; use DateTime;

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
        $client = new Client(['base_uri' => 'https://streaming.shapinetwork.com']);

        if (is_null(Auth::user()->streaming_token)){
            $response = $client->request('POST', 'api/auth/login', [
                'headers' => ['Accept' => 'application/json', 'Content-Type' => 'application/x-www-form-urlencoded'],
                'form_params' => [
                    'email' => 'admin',
                    'password' => '123456789',
                    'device_name' => 'luisana',
                ]
            ]);

            $result = json_decode($response->getBody());

            DB::table('wp98_users')
                ->where('ID', '=', Auth::user()->ID)
                ->update(['streaming_token' => $result->token]);
        }

        $headers = [
            'Accept'        => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Bearer '.Auth::user()->streaming_token
        ];

        $p =  $request->date."T".$request->time;
        $carbon = new Carbon($p);
        $fecha = $carbon->subHours(5);
        $ultFecha = $fecha->format('Y-m-d H:i:s');
        $creacionEvento = $client->request('POST', 'api/meetings', [
            'headers' => $headers,
            'form_params' => [
                'title' => $request->title,
                'agenda' => $request->description,
                'description' => $request->description,
                'start_date_time' => $ultFecha,
                'period' => $request->duration,
                'category' =>[$request->category_id],
                'type' => ['webinar']
            ]
        ]);

        $result2 = json_decode($creacionEvento->getBody());

        $evento = new Events($request->all());
        $evento->uuid = $result2->meeting->uuid;
        $evento->url_streaming = 'https://streaming.shapinetwork.com/app/live/meetings/'.$evento->uuid;
        $evento->status = 1;
        $evento->save();

        if ($request->hasFile('banner')){
            $file = $request->file('banner');
            $name = $evento->id.".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/images/banner', $name);
            $evento->image = $name;
            $evento->save();
        }

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
        $surveys = Survey::where('content_event_id', $resources_survey ->id)->get();
       // return dd ($resources_survey , $surveys);
        // return response()->json([$menuResource], 201);

        return view('live.live', compact ('event','notes', 'menuResource', 'surveys'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento = Events::find($id);

        return response()->json(
            $evento
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        $evento = Events::find($request->event_id);

        $client = new Client(['base_uri' => 'https://streaming.shapinetwork.com']);

        if (is_null(Auth::user()->streaming_token)){
            $response = $client->request('POST', 'api/auth/login', [
                'headers' => ['Accept' => 'application/json', 'Content-Type' => 'application/x-www-form-urlencoded'],
                'form_params' => [
                    'email' => 'admin',
                    'password' => '123456789',
                    'device_name' => 'luisana',
                ]
            ]);

            $result = json_decode($response->getBody());

            DB::table('wp98_users')
                ->where('id', '=', Auth::user()->ID)
                ->update(['streaming_token' => $result->token]);
        }

        $headers = [
            'Accept'        => 'application/json',
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Bearer '.Auth::user()->streaming_token
        ];

        $actualizacionEvento = $client->request('PATCH', 'api/meetings/'.$evento->uuid, [
            'headers' => $headers,
            'form_params' => [
                'title' => $request->title,
                'agenda' => $request->description,
                'description' => $request->description,
                'start_date_time' => $request->date."T".$request->time,
                'period' => $request->duration,
                'category' =>[$request->category_id],
                'type' => ['webinar', 'video_conference']
            ]
        ]);

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
      //setlocale(LC_TIME, 'es_ES.UTF-8'); Para el server
      setlocale(LC_TIME, 'es');//Local
      Carbon::setLocale('es');
      //$total_eventos = count(Events::all());
      $total_eventos = Events::where('date', '>=', Carbon::now()->format('Y-m-d'))
                           ->where('status','1')->count();
      
      $evento = Events::where('date', '>=', Carbon::now()->format('Y-m-d'))
                  ->where('status', '=',1)
                  ->get()
                  ->first();

      if(!empty($evento)){
         //return dd($evento, !empty($evento));
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
         return view('timelive/timelive', compact('evento', 'nextEvent', 'proximos', 'total', 'total_eventos'));
      }

      /*PROXIMOS EVENTOS*/
      if($total_eventos>0){
         $proximos = Events::where('date', '>=', Carbon::now())
                        ->where('id', '!=', $evento->id)
                        ->where('status', '=', '1')
                        ->get();
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
     
      //dd($evento, $proximos);
      return view('timelive/timelive', compact('evento', 'nextEvent', 'proximos', 'total', 'total_eventos', 'fechaActual', 'checkEvento'));
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
