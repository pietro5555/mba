<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str as Str;
use App\Models\Course;
use App\Models\Category;
use App\Models\User;
use DB;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $username = strtoupper(auth()->user()->user_nicename);

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
        
        /*Cursos por categoria con el numero de cursos asociados*/
        $courses = Category::withCount('courses')
        ->take(9)
        ->get();

    /*Mentores que tengan cursos*/
    $mentores = DB::table('wp98_users')
    ->join('courses', 'courses.mentor_id', '=', 'wp98_users.id')
    ->join('categories', 'categories.id', '=', 'courses.category_id')
    ->select(array ('wp98_users.display_name as nombre', 'wp98_users.avatar as avatar', 'categories.title as categoria', 'courses.mentor_id as mentor_id'))
        ->get();

        
         return view('cursos.cursos')->with(compact('username','cursosDestacados', 'cursosNuevos', 'idStart', 'idEnd', 'previous', 'next', 'courses', 'mentores'));

    }

    /*MOSTRAR CURSOS POR CATEGORIA*/
    public function show_course_category($category_id){

    $courses = Course::where('category_id','=', $category_id)->get();
    $category_name = Category::where('categories.id', '=', $category_id)->first();
    
    /*Mentores con cursos*/
        $mentores = DB::table('wp98_users')
        ->join('courses', 'courses.mentor_id', '=', 'wp98_users.id')
        ->join('categories', 'categories.id', '=', 'courses.category_id')
        ->where('categories.id', '=', $category_id)
        ->select(array ('wp98_users.display_name as nombre','categories.title as categoria', 'courses.mentor_id as mentor_id','wp98_users.avatar as avatar'))
        ->take(12)
        ->get();

    /*Cursos nuevos correspondientes a una categoria*/

         $cursosNuevos = Course::where('status', '=', 1)
         ->where('category_id', '=', $category_id)
                           ->orderBy('id', 'DESC')
                           ->take(3)
                           ->get();

        
         $ultCurso = Course::select('id')
                        ->where('status', '=', 1)
                        ->where('category_id', '=', $category_id)
                        ->orderBy('id', 'DESC')
                        ->first();

         $primerCurso = Course::select('id')
                           ->where('status', '=', 1)
                           ->where('category_id', '=', $category_id)
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


       if($courses)
       {
        return view('cursos.cursos_categorias', compact('courses', 'category_name', 'mentores', 'cursosNuevos', 'idStart', 'idEnd', 'previous', 'next'));
       }
    }

    public function perfil_mentor($mentor_id){

        $mentor_info = User::where('wp98_users.id', '=', $mentor_id)
        ->select('wp98_users.display_name as nombre', 'wp98_users.profession as profession' ,'wp98_users.about as biography', 'wp98_users.avatar as avatar')
        ->first();

         $directos = User::where('referred_id', Auth::user()->ID)->count('ID');

         $courses= DB::table('wp98_users')
        ->join('courses', 'courses.mentor_id', '=', 'wp98_users.id')
        ->join('categories', 'categories.id', '=', 'courses.category_id')
        ->where('wp98_users.id', '=', $mentor_id)
        ->select(array ('wp98_users.display_name as nombre','categories.title as categoria', 'courses.title as course_title', 'wp98_users.about as about', 'courses.cover as cover', 'courses.slug as slug', 'courses.id as id'))
        ->get();

      // return dd($cursos);
        return view('cursos.perfil_mentor', compact('courses','mentor_info','directos'));
    }


    public function show_one_course()
    {
        return view('cursos.show_one_course');
    }
    public function leccion()
    {
        return view('cursos.leccion');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
