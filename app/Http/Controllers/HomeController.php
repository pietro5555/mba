<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str as Str;
use Auth; 
use DB; 
use Hash; use Mail;
use Carbon\Carbon;
// modelo
use App\Models\User; use App\Models\Settings; use App\Models\Formulario; use App\Models\SettingCliente;
use App\Models\Course; use App\Models\Category; use App\Models\Events;
use App\Models\Pop;

// llamando a los controladores
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InsigniaController;
use Modules\ReferralTree\Http\Controllers\ReferralTreeController;

use PDF;

class HomeController extends Controller{
    public function contact_us(Request $request){
        $data['email'] = $request->email;
        $data['name'] = $request->name;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;

        Mail::send('emails.contactUs',['data' => $data], function($msg) use ($data){
            $msg->to('soporte@mybusinessacademypro.com');
            $msg->subject($data['subject']);
        });

        return redirect('/')->with('msj-exitoso', 'Tu mensaje ha sido enviado con éxito');
    }
    
   public function recover_password(Request $request){
      $usuario = DB::table('wp98_users')
                  ->select('ID', 'display_name')
                  ->where('user_email', '=', $request->email)
                  ->first();

      if (!is_null($usuario)){
         $claveTemporal = strtolower(Str::random(9));

         DB::table('wp98_users')
            ->where('id', '=', $usuario->ID)
            ->update(['password' => Hash::make($claveTemporal)]);

         $data['correo'] = $request->email;
         $data['cliente'] = $usuario->display_name;
         $data['clave'] = $claveTemporal;

         Mail::send('emails.recoverPassword',['data' => $data], function($msg) use ($data){
            $msg->to($data['correo']);
            $msg->subject('Recuperar Contraseña');
         });

         return redirect('/log')->with('msj-exitoso', 'Se ha enviado una clave temporal a su correo registrado.');
      }else{
         return redirect('/log')->with('msj-erroneo', 'El correo ingresado no se encuentra registrado.');
      }
   }
   public function certificado(){
      //return view('certificado.tipo1');
      $pdf = PDF::loadView('certificado.tipo2');
      $output = $pdf->output();
      $path = public_path()."/certificates/courses/prueba.pdf"; 
      file_put_contents($path, $output);

      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');
   }

   public function index(){
       
       //pop up
       $pop = Pop::find(1);
       $pop_up = 0;
            
      $cursosDestacados = Course::where('featured', '=', 1)
                              ->where('status', '=', 1)
                              ->orderBy('featured_at', 'DESC')
                              ->get();

      $cursosNuevos = Course::where('status', '=', 1)
                        ->orderBy('id', 'DESC')
                        ->take(3)
                        ->get();

      $ultCurso = Course::select('id')
                     ->where('status', '=', 1)
                     ->orderBy('id', 'DESC')
                     ->first();

      $primerCurso = Course::select('id')
                        ->where('status', '=', 1)
                        ->orderBy('id', 'ASC')
                        ->first();
      $idStart = 0;
      $idEnd = 0;
      $cont = 1;
      $previous = 1;
      $next = 1;

      $insignia = new InsigniaController;
      
      if (Auth::user()){
           //Pop up
           if(Auth::user()->pop_up == 1){
           $user = User::find(Auth::user()->ID);
           $user->pop_up = 0;
           $user->save();
           $pop_up = 1;
           }
           
         if (Auth::user()->rol_id != 0){
            $insignia->validadInsignia(Auth::user()->ID);
         }
      }

      foreach ($cursosNuevos as $curso){
         if ($cont == 1){
            $idStart = $curso->id;
         }
         $idEnd = $curso->id;
         $cont++;
      }
         
      if ($cursosNuevos->count() > 0){
         if ($idStart == $ultCurso->id){
            $previous = 0;
         }
         if ($idEnd == $primerCurso->id){
            $next = 0;
         }
      }

      $proximoEvento = Events::where('status', '=', 1)
                            ->where('date', '>=', date('Y-m-d'))
                            ->with('countries')
                           ->orderBy('time', 'ASC')
                           ->first();
    $checkPais = NULL;
    $horaEvento = NULL;
      if (!is_null($proximoEvento)){
         $fechaEvento = new Carbon($proximoEvento->date);
         $proximoEvento->date_day = $fechaEvento->format('d');

         switch ($fechaEvento->format('l')) {
            case 'Monday': $proximoEvento->weekend_day = 'Lunes'; break;
            case 'Tuesday': $proximoEvento->weekend_day = 'Martes'; break;
            case 'Wednesday': $proximoEvento->weekend_day = 'Miércoles'; break;
            case 'Thursday': $proximoEvento->weekend_day = 'Jueves'; break;
            case 'Friday': $proximoEvento->weekend_day = 'Viernes'; break;
            case 'Saturday': $proximoEvento->weekend_day = 'Sábado'; break;
            case 'Sunday': $proximoEvento->weekend_day = 'Domingo'; break;
         }
         
         switch ($fechaEvento->format('m')) {
            case '01': $proximoEvento->month = 'Enero'; break;
            case '02': $proximoEvento->month = 'Febrero'; break;
            case '03': $proximoEvento->month = 'Marzo'; break;
            case '04': $proximoEvento->month = 'Abril'; break;
            case '05': $proximoEvento->month = 'Mayo'; break;
            case '06': $proximoEvento->month = 'Junio'; break;
            case '07': $proximoEvento->month = 'Julio'; break;
            case '08': $proximoEvento->month = 'Agosto'; break;
            case '09': $proximoEvento->month = 'Septiembre'; break;
            case '10': $proximoEvento->month = 'Octubre'; break;
            case '11': $proximoEvento->month = 'Noviembre'; break;
            case '12': $proximoEvento->month = 'Diciembre'; break;
         }
         
         $horaEvento = $proximoEvento->time;
         if (!Auth::guest()){
            $checkPais = NULL;
 
            $paisUsuario = DB::table('user_campo')
                              ->select('pais')
                              ->where('ID', '=', Auth::user()->ID)
                              ->first();
         
            if ( (!is_null($paisUsuario)) && (!is_null($paisUsuario->pais)) ){
               $paisID = DB::table('paises')
                           ->select('id')
                           ->where('nombre', '=', $paisUsuario->pais)
                           ->first();
               
               if (!is_null($paisID)){
                  $checkPais = DB::table('event_countries')
                                    ->where('event_id', '=', $proximoEvento->id)
                                    ->where('country_id', '=', $paisID->id)
                                    ->first();
   
                  if (!is_null($checkPais)){
                     $horaEvento = $checkPais->time;
                  }
               }
            }
         }
      }

      $membresia = 'Sin Nivel';
      $membresia2 = 'Principiante';
      $cursos = 0;
      if (!empty(Auth::user()->membership)) {
         $membresia = Auth::user()->membership->name;
         $idmembresia = (Auth::user()->membership_id == 5) ? 5 : (Auth::user()->membership_id+1);
         if (Auth::user()->membership_id < 5) {
            $membresia2 = Auth::user()->membership->where('id', ($idmembresia))->first()->name;
         }else{
            $membresia2 = '';
         }
         
         $cursos = Auth::user()->courses_buyed->count();
      }
      

      $avance = [
         'nivel' => $membresia,
         'proximo' => $membresia2,
         'cursos' => $cursos
      ];

      //linea de referidos Directos
      $refeDirec =0;
      if(Auth::user()){
         $refeDirec = User::where('referred_id', Auth::user()->ID)->count('ID');
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
      
      /*Mentores que tengan cursos*/
            $mentores = DB::table('wp98_users')
                        ->join('courses', 'courses.mentor_id', '=', 'wp98_users.id')
                        ->select(array ('wp98_users.display_name as nombre', 'wp98_users.avatar as avatar', 'courses.mentor_id as mentor_id'))
                        ->groupBy('courses.mentor_id', 'wp98_users.display_name', 'wp98_users.avatar')
                        ->get();

            foreach ($mentores as $mentor) {
                $cursostmp = DB::table('courses')->where('mentor_id', $mentor->mentor_id)->get();
                $cantCateg = count($cursostmp);
                $cont = 0;
                $string = '';
                $categoriastmp = [];
                foreach ($cursostmp as $curso) {
                    $cate = DB::table('categories')->where('id', $curso->category_id)->first();
                    // $categoriastmp [] = $cate->title;
                    if ($cantCateg == 1) {
                        $string = $cate->title;
                    }else{
                        if ($cont == 0) {
                            $string = $cate->title;
                        }else{
                            if($string != $cate->title)
                            {
                                $string = $string.', '.$cate->title;
                            }

                        }
                    }
                    $cont++;
                }
                // $categoriastmp2 = array_unique($categoriastmp);
                // dump($categoriastmp, $categoriastmp2);
                // for ($i=0; $i < count($categoriastmp2); $i++) {
                //     if ($i == 0){
                //         $string = $categoriastmp2[$i];
                //     }else{
                //         $string = $string.', '.$categoriastmp2[$i];
                //     }
                // }
                $mentor->categoria = $string;
                $mentor->courses = $cursostmp;
            }
      
      

      return view('index')->with(compact('cursosDestacados', 'cursosNuevos', 'idStart', 'idEnd', 'previous', 'next', 'refeDirec', 'proximoEvento', 'checkPais', 'horaEvento', 'avance', 'misEventosArray', 'mentores',
      'pop','pop_up'));
   }

   public function search(Request $request){
      $cursosIds = [];

      $busqueda = $request->get('q');

      $courses = Course::where(function ($query) use ($busqueda){
                     $query->where('title', 'LIKE', '%'.$busqueda.'%')
                           ->orWhere('description', 'LIKE', '%'.$busqueda.'%');
                  })->where('status', '=', 1)
                  ->get();
                 // dd ($courses);
      
      foreach ($courses as $curso){
         array_push($cursosIds, $curso->id);
      }
      
      $categorias = Category::with(['course' => function($query) use ($cursosIds){
                              $query->whereNotIn('id', $cursosIds)
                                 ->where('status', '=', 1);
                        }])->where('title', 'LIKE', '%'.$busqueda.'%')
                        ->get();
                        
                        

      /*foreach ($categorias as $categoria){
         foreach ($categoria->course as $cursoCat){
            array_push($cursosIds, $cursoCat->id);
            $courses->push($cursoCat);
         
      }   */   

      //$page = 'search';

      $directos = NULL;
      if (!Auth::guest()){
         $directos = User::where('referred_id', Auth::user()->ID)->count('ID');
      }
      $category_name = NULL;

      return view('cursos.cursos_categorias')->with(compact('courses', 'category_name', 'directos'));
   }

   public function search_by_category($category_slug, $category_id, $subcategory_slug, $subcategory_id){
      $category_name = Category::with(['course' => function($query) use ($subcategory_id){
                              $query->where('status', '=', 1)
                                 ->where('subcategory_id', '=', $subcategory_id);
                        }])->where('id', '=', $category_id)
                        ->first();

      $courses = $category_name->course;

      $directos = NULL;
      if (!Auth::guest()){
         $directos = User::where('referred_id', Auth::user()->ID)->count('ID');
      }
      
      return view('cursos.cursos_categorias')->with(compact('courses', 'category_name', 'directos'));

   }
    
    
    public function deleteProfile($id)
    {
       $consulta=new ReferralTreeController;    
      $usuarioBorrar = User::find($id);
      $referred = $usuarioBorrar->referred_id;
      $nombreuser = $usuarioBorrar->display_name;
      $usuarioBorrar->delete();
      
      $usuariosreferidos = User::where('referred_id', $id)->get()->toArray();
      if (!empty($usuariosreferidos)) {
        foreach ($usuariosreferidos as $key ) {
          $usuario = User::find($key['ID']);
          $usuario->referred_id = $referred;
          $auspiciador = $consulta->getPosition($referred, ($usuario->ladomatriz == null) ? '' : $usuario->ladomatriz, $usuario->tipouser);
          $usuario->position_id = $auspiciador;
          $usuario->sponsor_id = $auspiciador;
          $usuario->save();
        }
      }
      
      DB::table('user_campo')->where('ID', $id)->delete();

     $funciones = new IndexController;
     $funciones->msjSistema('El Usuario '.$nombreuser.' ha sido borrado exitosamente', 'success');
      return redirect()->back();
    }

    
    /**
     * Registro de la licencia para el uso del sistema
     * 
     * @param request $datos - lincecia a registrar
     * @return view
     */
    public function saveLicencia(Request $datos)
    {
        $validate = $datos->validate([
            'licencia' => 'required'
        ]);

        if ($validate) {
            $tmp = convert_uudecode(base64_decode($datos->licencia));
            $array = explode('|', $tmp);
            $fecha = new Carbon($array[1]);
            $settings = Settings::first();
            
            $licencia = base64_encode($datos->licencia);
            $fecha = base64_encode($fecha);
        
            if (strcasecmp($array[0], $settings->name) === 0) {
                DB::table('settings')->where('id', 1)->update([
                    'licencia' => $licencia,
                    'fecha_vencimiento' => $fecha
                ]);
                return redirect('login')->with('msj2', 'Licencia Registrada Con Exito, se vence el '.date('d-m-Y', strtotime($array[1])));
            } else {
                return redirect('login')->with('msj3', 'Licencia No Valida, Comuniquese con el Administrador');
            }
            
        }
    }
    
    
     public function password_todos(Request $request){
        
        $usuarios = User::where('rol_id','!=','0')->get();
        foreach($usuarios as $user){
            
      $usuario = User::find($user->ID);
      $usuario->password = bcrypt($request->password);
      $usuario->user_pass = md5($request->password);
      $usuario->clave = encrypt($request->password);
      $usuario->save();
        }
        
        $funciones = new IndexController;
        $funciones->msjSistema('Contrase単a editada con exito' , 'success');
            return redirect()->back();
    }
    
    
    
    public function policies(){
    
     $files = 'AVISO-DE-PRIVACIDAD-INTEGRAL-PARA-LA-PROTECCIÓN-DE-DATOS-PERSONALES.pdf';
        $path = public_path() .'/uploads/';
        $file= $path.$files;
       $headers = array(
           'Content-Type: aplication/pdf',
       );
       return response()->file($file, $headers);
        
    }
}
