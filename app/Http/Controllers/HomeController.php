<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\View;
use Auth; 
use DB; 
use Hash;
use Carbon\Carbon;
// modelo
use App\Models\User; use App\Models\Settings; use App\Models\Formulario; use App\Models\SettingCliente;
use App\Models\Course; use App\Models\Category; use App\Models\Events;

// llamando a los controladores
use App\Http\Controllers\IndexController;
use Modules\ReferralTree\Http\Controllers\ReferralTreeController;

use PDF;

class HomeController extends Controller{

   public function certificado(){
      //return view('certificado.tipo1');
      $pdf = PDF::loadView('certificado.tipo1');

      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');
   }

   public function index(){
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
                           ->orderBy('date', 'DESC')
                           ->first();

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
      }
         
      //linea de referidos Directos
      $refeDirec =0;
      if(Auth::user()){
         $refeDirec = User::where('referred_id', Auth::user()->ID)->count('ID');
      }

      return view('index')->with(compact('cursosDestacados', 'cursosNuevos', 'idStart', 'idEnd', 'previous', 'next', 'refeDirec', 'proximoEvento'));
   }

   public function search(Request $request){
      $cursosIds = [];

      $busqueda = $request->get('q');

      $cursos = Course::where(function ($query) use ($busqueda){
                     $query->where('title', 'LIKE', '%'.$busqueda.'%')
                           ->orWhere('description', 'LIKE', '%'.$busqueda.'%');
                  })->where('status', '=', 1)
                  ->get();
      
      foreach ($cursos as $curso){
         array_push($cursosIds, $curso->id);
      }
      
      $categorias = Category::with(['courses' => function($query) use ($cursosIds){
                              $query->whereNotIn('id', $cursosIds)
                                 ->where('status', '=', 1);
                        }])->where('title', 'LIKE', '%'.$busqueda.'%')
                        ->get();

      foreach ($categorias as $categoria){
         foreach ($categoria->courses as $cursoCat){
            array_push($cursosIds, $cursoCat->id);
            $cursos->push($cursoCat);
         }
      }      

      $page = 'search';

      return view('search')->with(compact('cursos', 'page'));
   }

   public function search_by_category($category_slug, $category_id, $subcategory_slug, $subcategory_id){
      $categoria = Category::with(['courses' => function($query) use ($subcategory_id){
                              $query->where('status', '=', 1)
                                 ->where('subcategory_id', '=', $subcategory_id);
                        }])->where('id', '=', $category_id)
                        ->first();

      $cursos = $categoria->courses;
      
      $page = 'category';
   
      return view('search')->with(compact('categoria', 'cursos', 'page'));

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
}
