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
use App\Models\Category;

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
        
        $anuncio =[];
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
            'time' => $banner->time,

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
         $cursos = Course::where('category_id', $fin->category_id)->first();
         $categoria = Category::find($fin->category_id);
         $comentarios = Rating::where('course_id', $cursos->id)->count('id');
         $fin->avatar = $user->avatar;
         $fin->nombre = $user->display_name;
         $fin->title_cate = $categoria->title;

         //vistas, comentarios, me gusta, compartir
         $fin->coment = $comentarios;
         $fin->views = $cursos->views;
         $fin->likes = $cursos->likes;
         $fin->shares = $cursos->shares;
        }

        return view('transmision.transmision',compact('proximas','total','anuncio','finalizados'));
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

    

}