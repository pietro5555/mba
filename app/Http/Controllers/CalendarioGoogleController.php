<?php

namespace App\Http\Controllers;

use App\Models\User; 
use App\Models\Events; 
use App\Models\Schedule; 
use App\Models\Calendario; 
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
    }


    public function timelive(){
         
         $evento = $this->obtenerEvento(1);
         $fecha = (empty($evento)) ? 1 : $evento['inicio'];
         $proxevent = $this->proxievents((empty($evento)) ? 1 : $evento['id']);
        return view('timelive', compact('fecha','evento','proxevent'));


    }

    public function proximo($id){
      
       $evento = $this->obtenerEvento($id);
       $fecha = (empty($evento)) ? 1 : $evento['inicio'];
       return view('timelive', compact('fecha','evento'));
    }

    public function proxievents($id){
      
      $fechactual = Carbon::now();
      $proximos = Events::where('id', '!=', $id)->whereDate('date', '>=', $fechactual)->take('6')->get();

      return $proximos;
    }

    public function obtenerEvento($eventactual){
        $datos = [];
        $fechactual = Carbon::now();
        $fin = new Carbon('2020-09-10');

        if($eventactual == 1){
        $evento = Events::whereDate('date', '>=', $fechactual)->orderBy('date', 'ASC')->take('1')->first();
        }else{
        $evento = Events::whereDate('date', '>=', $fechactual)->where('id', '>', $eventactual)->orderBy('date', 'ASC')->take('1')->first();
         if($evento == null){
           $evento = Events::whereDate('date', '>=', $fechactual)->where('id', '<', $eventactual)->orderBy('date', 'ASC')->take('1')->first();
         }
        }

        if($evento != null){

        $user = DB::table('wp98_users')->where('ID', $evento->user_id)->first();

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
    

    public function schedule($event_id, $user_id, Request $request){

        $agendar = Schedule::create([
        'user_id' => $user_id,
        'event_id' => $event_id,
        ]);

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
         $calendario->color = $request->color;
         $calendario->lugar = 'Ninguno';
         $calendario->iduser = Auth::user()->ID;
         $calendario->save();
         return view('agendar.calendar',compact('calendarios','usuario','modal','correoprospecto'));
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
    
    
    //buscamos nuevos eventos del calendario para notificarlo
    public function notificarCalendario($usuario){
        
        $funciones = new IndexController;
        $user = User::find($usuario);
        
        if($user->rol_id != 0){
            $todos = $funciones->generarArregloReversa($usuario);
            $calendarios = $this->notificacion($todos, $usuario);
        }else{
            $todos = $funciones->generarArregloAdmin($usuario);
            $calendarios = $this->notificacion($todos, $usuario);
        }
            
            foreach($calendarios as $calendario){
                
                $buscar = DB::table('notifications')->where('calendario', $calendario['ID'])->first();
                
                if($buscar == null){
                $notifica = new Notification();
     $notifica->user_id = $usuario;
     $notifica->date = Carbon::now();
     $notifica->route = 'admin/calendario/calendario';
     $notifica->description = 'Nuevo anuncio del calendario';
     $notifica->icon = 'fas fa-calendar-alt';
     $notifica->label = 'calendario';
     $notifica->status = '0';
     $notifica->calendario = $calendario['ID'];
     $notifica->save();
                }
            }
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