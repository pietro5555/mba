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
// modelo
use App\Models\Rol; 
use App\Models\User; 
use App\Models\Ticket; 
use App\Models\Settings; 
use App\Models\Comentario;
use App\Models\Commission;
use App\Models\Notification;
use App\Models\Push;
use App\Models\SettingsEstructura;
use App\Models\Notificacion_ticket;
// controladores
use App\Http\Controllers\RangoController;
use App\Http\Controllers\IndexController;


class TicketController extends Controller
{
	function __construct()
	{
        // TITLE
		view()->share('title', 'Tickets/Soporte');
		
	}
	
		function ticket(Request $request)
	{
        // TITLE
		view()->share('title', 'Tickets');
      
	return view('ticket.ticket');
	}
	
		function generarticket(Request $request)
	{
		
		$validatedData = $request->validate([
		    'asunto' => 'max:100',
        'comentario' => 'required'
       ]);
       
       $name= null;
       if ($request->file('archivo') != null) { 
       if ($request->file('archivo')) {
            $file = $request->file('archivo');
          $name = 'ticket_'. time(). '.'.$file->getClientOriginalExtension();
          $path = public_path() . '/ticket';
          $file->move($path, $name);
        }
       }

		     $ticket = new Ticket();
		     $ticket->titulo=$request->asunto;
		     $ticket->comentario=$request->comentario;
		     $ticket->tipo=$request->tipo;
         $ticket->user_id = Auth::user()->ID;
         $ticket->admin= '1';
         $ticket->status= '0';
         $ticket->archivo = $name;
         $ticket->save();
         
         
         $notificacion = new Notificacion_ticket();
		     $notificacion->contenido='Nuevo Ticket Abierto';
         $notificacion->user_id = Auth::user()->ID;
         $notificacion->user = $ticket->admin;
         $notificacion->ticket = $ticket->id;
         $notificacion->save();
         
        
         $push = new Push();
		     $push->titulo='Ticket';
		     $push->body='Nuevo Ticket Abierto';
         $push->iduser = $ticket->admin;
         $push->save();
         
      
	return redirect('admin/ticket/misticket');
	}
	
	
	function misticket()
	{
      
		view()->share('title', 'Mis Tickets');
            
     $ticket = DB::table('tickets')
          ->where('user_id', '=', Auth::user()->ID)
          ->get();

        return view('ticket.misticket', compact('ticket'));
    
	}
	
	public function comentar($id){
         
  $ticket = Ticket::find($id);

 	$comentario = DB::table('comentarios')
    ->where('tickets_id','=', $id)
 	->orderBy('id','=', 'ASC')
 	->get();
 	
 	$pendientes = DB::table('notificacion_tickets')
									->where('user', '=', Auth::user()->ID)
									->where('ticket', '=', $id)
									->where('status', '=', '0')
									->first();
									
			if(!empty($pendientes)){	
       $noti = Notificacion_ticket::find($pendientes->id);
       $noti->status = 1;
       $noti->save();
			}
				
				
   return view('ticket.comentar', compact('ticket','comentario'));
    }
    
    	public function subir(Request $request, $id){
  
   $validatedData = $request->validate([
        'comentario' => 'required'
       ]);
       
       $name= null;
       if ($request->file('archivo') != null) { 
       if ($request->file('archivo')) {
            $file = $request->file('archivo');
          $name = 'ticket_'. time(). '.'.$file->getClientOriginalExtension();
          $path = public_path() . '/ticket';
          $file->move($path, $name);
        }
       }

      $comentario = new Comentario();
      $comentario->tickets_id = $id;
      $comentario->user_id =  Auth::user()->ID;
      $comentario->comentario = $request->comentario;
      $comentario->archivo = $name;
      $comentario->save();
      
     
          $buscar = DB::table('tickets')
                            ->where('id', '=', $id)
                            ->first();
                                          
      
         $notificacion = new Notificacion_ticket();
		     $notificacion->contenido='Han respondido a tu ticket';
         $notificacion->user_id = Auth::user()->ID;
         $notificacion->user = (Auth::user()->ID != 1) ? 1 : $buscar->user_id;
         $notificacion->ticket = $id;
         $notificacion->save();
         
         $push = new Push();
		     $push->titulo='Ticket';
		     $push->body='Han respondido a tu ticket';
         $push->iduser = (Auth::user()->ID != 1) ? 1 : $buscar->user_id;
         $push->save();
       
 
        return redirect()->back();
    }
    
    public function todosticket(){

        	 $pendientes = DB::table('notificacion_tickets')
					 				->where('user', '=', Auth::user()->ID)
					 				->where('status', '=', '0')
					 				->orderBy('id', 'DESC')
					 				->get();

            $ticket = DB::table('tickets')
                 ->orderBy('id','=', 'DESC')
                 ->get();      

      if(!empty($pendientes)){  
        foreach($pendientes as $pendi){
       $noti = Notificacion_ticket::find($pendi->id);
       $noti->status = 1;
       $noti->save();
            }
        }     		
        

        return view('ticket.todosticket')->with('ticket', $ticket);
    }
    
    public function ver($id){

  $ticket = Ticket::find($id);

     $comentario = DB::table('comentarios')
    ->where('tickets_id','=', $id)
 	->orderBy('id','=', 'ASC')
 	->get();


   return view('ticket.ver', compact('ticket','comentario'));
    }
    
     public function cerrar($id){

       $tique = Ticket::find($id);
       $tique->status = 1;
       $tique->save();
                    
            $ticket = DB::table('tickets')
            ->orderBy('id','=', 'DESC')
            ->get();
            
        return view('ticket.todosticket')->with('ticket', $ticket);
    }
    
}