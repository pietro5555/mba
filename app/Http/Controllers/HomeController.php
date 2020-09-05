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
use App\Models\Course; use App\Models\Category;

// llamando a los controladores
use App\Http\Controllers\IndexController;
use Modules\ReferralTree\Http\Controllers\ReferralTreeController;

class HomeController extends Controller{

   public function index(){
      //if (Auth::guest()){
         $cursosDestacados = Course::where('featured', '=', 1)
                                 ->where('status', '=', 1)
                                 ->orderBy('id', 'DESC')
                                 ->take(3)
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
         
         
         //linea de referidos Directos
         $refeDirec =0;
         if(Auth::user()){
         $refeDirec = User::where('referred_id', Auth::user()->ID)->count('ID');
         }

         return view('index')->with(compact('cursosDestacados', 'cursosNuevos', 'idStart', 'idEnd', 'previous', 'next', 'refeDirec'));
         
         /*
      }else{
         $cliente = SettingCliente::find(1);
         if ($cliente->permiso == 0 && Auth::user()->tipouser == 'Cliente') {
            return redirect('login')->with('msj3', 'Restringido el Acceso');
         } else {
            return redirect('/admin');
         }   
      }
      */

   }

   public function search($busqueda){
      $cursosIds = [];

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
    
    
    //vista de transmisiones
    public function transmisiones(){
        
        return view('transmision');
    }
    
    public function anotaciones(){
        
        return view('anotaciones');
    }
    
    
    public function timelive(){
        
        return view('timelive');
    }

   //  public function anotaciones(){
        
   //      return view('live.live');
   //  }


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
