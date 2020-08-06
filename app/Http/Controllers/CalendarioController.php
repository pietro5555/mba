<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Crypt;
use Auth; 
use DB; 
use Carbon\Carbon; 

// llamado a los modelos
use App\Models\User; 
use App\Models\Calendario; 
use App\Models\Settings;
use App\Models\Prospeccion; 
use App\Models\Notification;
use App\Models\SettingsEstructura;


// llamado a los controlladores
use App\Http\Controllers\IndexController;


class CalendarioController extends Controller
{
	function __construct()
	{
        // TITLE
		view()->share('title', 'Calendario');
	}

    //vista del calendario
    public function calendario()
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
        return view('calendario.calendario',compact('calendarios','usuario','modal','correoprospecto'));
    }
    
    //donde se puede agreguar el prospecto al calendario
    public function calendarioprospecto($id){
        
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
        $prospecto = Prospeccion::find($id);
        $modal = $prospecto->id;
        $correoprospecto = $prospecto->user_email;
        return view('calendario.calendario',compact('calendarios','usuario','modal','correoprospecto'));
    }
    
    //agregamos al calendario
    public function guardar(Request $request){

     $funciones = new IndexController;
     
     if($request->inicio > $request->vence){
          $funciones->msjSistema('La fecha de inicio debe ser mayor a la fecha final', 'danger');
          return redirect()->back();  
        } 
     
     $calendario = new Calendario();
     $calendario->titulo = $request->titulo;
     $calendario->contenido = $request->contenido;
     $calendario->inicio = $request->inicio;
     $calendario->vence = $request->vence;
     $calendario->color = $request->color;
     $calendario->lugar = $request->lugar;
     $calendario->tipo = $request->detalles;
     $calendario->especifico = $request->usuario;
     $calendario->iduser = Auth::user()->ID;
     $calendario->save();

     $funciones->msjSistema('Creado con éxito', 'success');
     return redirect('admin/calendario/calendario');
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