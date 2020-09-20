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
        $this->middleware(['auth']);
    }


    public function timelive(){
         
         $evento = $this->obtenerEvento(0);

         $fecha = (empty($evento)) ? 0 : $evento['inicio'];
         $proxevent = $this->proxievents((empty($evento)) ? 0 : $evento['id']);
            //return $sig;
            date_default_timezone_set('Europe/Madrid');
            setlocale(LC_TIME, 'spanish');

            $finalizados = Events::where('status', '3')->orderBy('id', 'DESC')->take(9)->get();
         $banner = Events::where('status', '1')->where('image','!=',null)->take(1)->first();
        if($banner == null){
         $banner = Events::where('status', '1')->where('image', null)->take(1)->first();
        }
        $proximas = Events::where('status', '1')->where('id', '!=', ($banner == null) ? 0 : $banner->id)->take(6)->get();
        $total = count($proximas);

         if($banner != null){

           $dia = $this->dias($banner->date);
           $mes = $this->meses($banner->date);
           $fech = $dia.' '.date('d', strtotime($banner->dia)).' '.$mes;

           $anuncio =[
            'id' => $banner->id,
            'imagen' => ($banner->image == null) ? '3.png' : $banner->image,
            'title' => $banner->title,
            'fechacompleta' => $fech,
            'fecha' => $banner->date,

           ];
         }

        foreach($proximas as $proxima){
          $user = User::find($proxima->user_id);
          $proxima->avatar = $user->avatar;
          $dia = $this->dias($proxima->date);
          $mes = $this->meses($proxima->date);
          $proxima->fecha = $dia.' '.date('d', strtotime($proxima->date)).' '.$mes;

        }

        foreach($finalizados as $fin){
         $user = User::find($fin->user_id);
         $cursos = Course::find($fin->id_courses);
         $categoria = Category::find($cursos->category_id);
         $fin->avatar = $user->avatar;
         $fin->nombre = $user->display_name;
         $fin->title_cate = $categoria->title;

         //
         $fin->views = $cursos->views;
         $fin->likes = $cursos->likes;
         $fin->shares = $cursos->shares;
        }


        return view('timelive/timelive', compact('fecha','evento','proxevent','proximas','total','anuncio','finalizados'));

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



    public function proximo($id){
       $evento = $this->obtenerEvento($id);
       
       $fecha = (empty($evento)) ? 0 : $evento['inicio'];
       $proxevent = $this->proxievents((empty($evento)) ? 0 : $evento['id']);


            $finalizados = Events::where('status', '3')->orderBy('id', 'DESC')->take(9)->get();
         $banner = Events::where('status', '1')->where('image','!=',null)->take(1)->first();
        if($banner == null){
         $banner = Events::where('status', '1')->where('image', null)->take(1)->first();
        }
        $proximas = Events::where('status', '1')->where('id', '!=', ($banner == null) ? 0 : $banner->id)->take(6)->get();
        $total = count($proximas);

         if($banner != null){

           $dia = $this->dias($banner->date);
           $mes = $this->meses($banner->date);
           $fech = $dia.' '.date('d', strtotime($banner->dia)).' '.$mes;

           $anuncio =[
            'id' => $banner->id,
            'imagen' => ($banner->image == null) ? '3.png' : $banner->image,
            'title' => $banner->title,
            'fechacompleta' => $fech,
            'fecha' => $banner->date,

           ];
         }

        foreach($proximas as $proxima){
          $user = User::find($proxima->user_id);
          $proxima->avatar = $user->avatar;
          $dia = $this->dias($proxima->date);
          $mes = $this->meses($proxima->date);
          $proxima->fecha = $dia.' '.date('d', strtotime($proxima->date)).' '.$mes;

        }

        foreach($finalizados as $fin){
         $user = User::find($fin->user_id);
         $cursos = Course::find($fin->id_courses);
         $categoria = Category::find($cursos->category_id);
         $fin->avatar = $user->avatar;
         $fin->nombre = $user->display_name;
         $fin->title_cate = $categoria->title;

         //
         $fin->views = $cursos->views;
         $fin->likes = $cursos->likes;
         $fin->shares = $cursos->shares;
        }

       return view('timelive/timelive', compact('fecha','evento', 'proxevent', 'proximas','total','anuncio','finalizados'));
    }

    public function proxievents($id){
      
      $fechactual = Carbon::now();
      //VERIFICAR CONSULTA
      $proximos = Events::where('id', '!=', $id)->whereDate('date', '>=', $fechactual)->take('6')->get();

      return $proximos;
    }

    public function obtenerEvento($eventactual){
        $datos = [];
        $fechactual = Carbon::now();
        $fin = new Carbon('2020-09-10');

        //VERIFICAR CONSULTA
        $evento = Events::whereDate('date', '>=', $fechactual)->where('id', '>=', $eventactual)->orderBy('date', 'ASC')->take('1')->first();
         if($evento == null){
           $evento = Events::whereDate('date', '>=', $fechactual)->where('id', '<', $eventactual)->orderBy('date', 'ASC')->take('1')->first();
         }

        if($evento != null){

        $user = DB::table('wp98_users')->where('ID', $evento->user_id)->first();
        $courses = Course::where('id', '=', $evento->id_courses)
        ->first();
       

        $datos =[
            'id' => $evento->id,
            'title' => $evento->title,
            'date' => $evento->date,
            'descripcion' => $evento->description,
            'image' => $evento->image,
            'inicio' => $evento->date,
            'fin' => $fin,
            'user_id' => $user->ID,
            'nombre' => $user->display_name,
            'profession' => $user->profession,
            'about' => $user->about,
            'avatar' => $user->avatar,
            'subcategory' => $courses->subcategory->title,

        ];
       }

       return $datos;
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
         $funciones = new IndexController;
        
        if(Auth::user()->rol_id == 0){
        $todos = $funciones->generarArregloAdmin(Auth::user()->ID);
        $calendarios = $this->almacenadoAdmin($todos, Auth::user()->ID);
        }else{
            $todos = $funciones->generarArregloReversa(Auth::user()->ID);
            $calendarios = $this->almacenadoNormal($todos, Auth::user()->ID);
        }
        
        $pendientes = DB::table('notifications')
                                    ->where('user_id', '=', Auth::user()->ID)
                                    ->where('status', '=', '0')
                                    ->get();
                                    
        foreach($pendientes as $pendiente){
            $marca = Notification::find($pendiente->id);
            $marca->status = '1';
            $marca->save();
        }
        
        $usuario = Auth::user()->ID;
        $modal = 0;
        $correoprospecto = 0;
        date_default_timezone_set('Europe/Madrid');
            setlocale(LC_TIME, 'spanish');

        //TODOS LOS EVENTOS AGENDADOS POR ESE USUARIO
        $eventos_agendados = DB::table('events')
        ->join('events_users', 'events_users.event_id', '=', 'events.id')
        ->where('events_users.user_id', '=', $usuario)
        ->get();

        return view('agendar/calendar',compact('calendarios','usuario','modal','correoprospecto', 'eventos_agendados'));
    }


    /*AGENDAR EVENTOS DEL USUARIO*/
public function schedule($event_id, $user_id, Request $request){
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
        
        $funciones = new IndexController;
        
        if(Auth::user()->rol_id == 0){
        $todos = $funciones->generarArregloAdmin(Auth::user()->ID);
        $calendarios = $this->almacenadoAdmin($todos, Auth::user()->ID);
        }else{
            $todos = $funciones->generarArregloReversa(Auth::user()->ID);
            $calendarios = $this->almacenadoNormal($todos, Auth::user()->ID);
        }
        
        $pendientes = DB::table('notifications')
                                    ->where('user_id', '=', Auth::user()->ID)
                                    ->where('status', '=', '0')
                                    ->get();
                                    
        foreach($pendientes as $pendiente){
            $marca = Notification::find($pendiente->id);
            $marca->status = '1';
            $marca->save();
        }
        
        $usuario = Auth::user()->ID;
        $modal = 0;
        $correoprospecto = 0;

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
    
    
    //alamacenamos los datos del calendario que haya creado el admin
    //o sean especificos para el admin
    public function almacenadoAdmin($todos, $autenticado){
        
        $datos = [];
        $mios = Calendario::where('iduser', $autenticado)->get();
        foreach($mios as $mio){
            
            array_push($datos, [
            'ID' => $mio->id,
            'iduser' => $autenticado,
            'titulo' => $mio->titulo,
            'contenido' => $mio->contenido,
            'lugar' => $mio->lugar,
            'color' => $mio->color,
            'tipo' => $mio->tipo,
            'especifico' => $mio->especifico,
            'inicio' => $mio->inicio,
            'vence' => $mio->vence,
          ]);
          
        }
        
        
        foreach($todos as $todo){
            $calendario = Calendario::where('iduser', $todo['ID'])->get();
          if(!empty($calendario)){    
            foreach($calendario as $calen){
                if($calen->tipo == 5){
                    if($calen->especifico == Auth::user()->user_email){
                    array_push($datos, [
            'ID' => $calen->id,
            'iduser' => $calen->iduser,
            'titulo' => $calen->titulo,
            'contenido' => $calen->contenido,
            'lugar' => $calen->lugar,
            'color' => $calen->color,
            'tipo' => $calen->tipo,
            'especifico' => $calen->especifico,
            'inicio' => $calen->inicio,
            'vence' => $calen->vence,
          ]);
                  }
                }
              }
            }
        }
        
        return $datos;
    }
    
    
    
    
    
    //alamacenamos los datos del calendario que haya creado el usuario
    //o sean especificos para el usuario
    public function almacenadoNormal($todos, $autenticado){
        
        $datos = [];
        $mios = Calendario::where('iduser', $autenticado)->get();
        foreach($mios as $mio){
            
            array_push($datos, [
            'ID' => $mio->id,
            'iduser' => $autenticado,
            'titulo' => $mio->titulo,
            'contenido' => $mio->contenido,
            'lugar' => $mio->lugar,
            'color' => $mio->color,
            'tipo' => $mio->tipo,
            'especifico' => $mio->especifico,
            'inicio' => $mio->inicio,
            'vence' => $mio->vence,
          ]);
          
        }
        
        
        foreach($todos as $todo){
            $calendario = Calendario::where('iduser', $todo['ID'])->get();
          if(!empty($calendario)){    
            foreach($calendario as $calen){
                if($calen->tipo == 1){
                    
            array_push($datos, [
            'ID' => $calen->id,
            'iduser' => $calen->iduser,
            'titulo' => $calen->titulo,
            'contenido' => $calen->contenido,
            'lugar' => $calen->lugar,
            'color' => $calen->color,
            'tipo' => $calen->tipo,
            'especifico' => $calen->especifico,
            'inicio' => $calen->inicio,
            'vence' => $calen->vence,
          ]);
          
                }elseif($calen->tipo == 2){
                    if(Auth::user()->status == 1){
                        
            array_push($datos, [
            'ID' => $calen->id,
            'iduser' => $calen->iduser,
            'titulo' => $calen->titulo,
            'contenido' => $calen->contenido,
            'lugar' => $calen->lugar,
            'color' => $calen->color,
            'tipo' => $calen->tipo,
            'especifico' => $calen->especifico,
            'inicio' => $calen->inicio,
            'vence' => $calen->vence,
                      ]);
                    }
                    
                }elseif($calen->tipo == 3){
                    if(Auth::user()->status == 0){
                        
            array_push($datos, [
            'ID' => $calen->id,
            'iduser' => $calen->iduser,
            'titulo' => $calen->titulo,
            'contenido' => $calen->contenido,
            'lugar' => $calen->lugar,
            'color' => $calen->color,
            'tipo' => $calen->tipo,
            'especifico' => $calen->especifico,
            'inicio' => $calen->inicio,
            'vence' => $calen->vence,
                      ]);
                    }
                    
                }elseif($calen->tipo == 4){
                    
           $fechaActual = date('m', strtotime($calen->created_at));
           $ingreso = date('m', strtotime(Auth::user()->created_at));
           if($fechaActual == $ingreso){
               
            array_push($datos, [
            'ID' => $calen->id,
            'iduser' => $calen->iduser,
            'titulo' => $calen->titulo,
            'contenido' => $calen->contenido,
            'lugar' => $calen->lugar,
            'color' => $calen->color,
            'tipo' => $calen->tipo,
            'especifico' => $calen->especifico,
            'inicio' => $calen->inicio,
            'vence' => $calen->vence,
          ]);
          
           }
                }elseif($calen->tipo == 5){
                    if($calen->especifico == Auth::user()->user_email){
                        
            array_push($datos, [
            'ID' => $calen->id,
            'iduser' => $calen->iduser,
            'titulo' => $calen->titulo,
            'contenido' => $calen->contenido,
            'lugar' => $calen->lugar,
            'color' => $calen->color,
            'tipo' => $calen->tipo,
            'especifico' => $calen->especifico,
            'inicio' => $calen->inicio,
            'vence' => $calen->vence,
          ]);
          
                  }
                }
              }
            }
        }
        
        return $datos;
    }
    
    
    
    
    
    //buscamos las notificaciones tanto del admin como 
    //las de un usuario
    public function notificacion($todos, $usuario){
        
        $datos = [];
        
        $user = User::find($usuario);
        if($user->rol_id != 0){
        foreach($todos as $todo){
            $calendario = Calendario::where('iduser', $todo['ID'])->get();
          if(!empty($calendario)){    
            foreach($calendario as $calen){
                if($calen->tipo == 1){
                    
            array_push($datos, [
            'ID' => $calen->id,
            'iduser' => $calen->iduser,
            'titulo' => $calen->titulo,
            'contenido' => $calen->contenido,
            'lugar' => $calen->lugar,
            'color' => $calen->color,
            'tipo' => $calen->tipo,
            'especifico' => $calen->especifico,
            'inicio' => $calen->inicio,
            'vence' => $calen->vence,
          ]);
          
                }elseif($calen->tipo == 2){
                    if(Auth::user()->status == 1){
                        
            array_push($datos, [
            'ID' => $calen->id,
            'iduser' => $calen->iduser,
            'titulo' => $calen->titulo,
            'contenido' => $calen->contenido,
            'lugar' => $calen->lugar,
            'color' => $calen->color,
            'tipo' => $calen->tipo,
            'especifico' => $calen->especifico,
            'inicio' => $calen->inicio,
            'vence' => $calen->vence,
                      ]);
                    }
                    
                }elseif($calen->tipo == 3){
                    if(Auth::user()->status == 0){
                        
            array_push($datos, [
            'ID' => $calen->id,
            'iduser' => $calen->iduser,
            'titulo' => $calen->titulo,
            'contenido' => $calen->contenido,
            'lugar' => $calen->lugar,
            'color' => $calen->color,
            'tipo' => $calen->tipo,
            'especifico' => $calen->especifico,
            'inicio' => $calen->inicio,
            'vence' => $calen->vence,
                      ]);
                    }
                    
                }elseif($calen->tipo == 4){
                    
           $fechaActual = date('m', strtotime($calen->created_at));
           $ingreso = date('m', strtotime(Auth::user()->created_at));
           if($fechaActual == $ingreso){
               
            array_push($datos, [
            'ID' => $calen->id,
            'iduser' => $calen->iduser,
            'titulo' => $calen->titulo,
            'contenido' => $calen->contenido,
            'lugar' => $calen->lugar,
            'color' => $calen->color,
            'tipo' => $calen->tipo,
            'especifico' => $calen->especifico,
            'inicio' => $calen->inicio,
            'vence' => $calen->vence,
          ]);
          
           }
                }elseif($calen->tipo == 5){
                    if($calen->especifico == Auth::user()->user_email){
                        
            array_push($datos, [
            'ID' => $calen->id,
            'iduser' => $calen->iduser,
            'titulo' => $calen->titulo,
            'contenido' => $calen->contenido,
            'lugar' => $calen->lugar,
            'color' => $calen->color,
            'tipo' => $calen->tipo,
            'especifico' => $calen->especifico,
            'inicio' => $calen->inicio,
            'vence' => $calen->vence,
          ]);
          
                  }
                }
              }
            }
        }
      }else{
          
          foreach($todos as $todo){
            $calendario = Calendario::where('iduser', $todo['ID'])->get();
          if(!empty($calendario)){    
            foreach($calendario as $calen){
                if($calen->tipo == 5){
                    if($calen->especifico == Auth::user()->user_email){
                    array_push($datos, [
            'ID' => $calen->id,
            'iduser' => $calen->iduser,
            'titulo' => $calen->titulo,
            'contenido' => $calen->contenido,
            'lugar' => $calen->lugar,
            'color' => $calen->color,
            'tipo' => $calen->tipo,
            'especifico' => $calen->especifico,
            'inicio' => $calen->inicio,
            'vence' => $calen->vence,
          ]);
                  }
                }
              }
            }
        }
      }
      
      return $datos;
        
    }
}