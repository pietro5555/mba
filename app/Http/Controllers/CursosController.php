<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use Illuminate\Support\Str as Str;
use App\Models\Course;
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
         
        

         return view('cursos.cursos')->with(compact('username','cursosDestacados', 'cursosNuevos', 'idStart', 'idEnd', 'previous', 'next'));

    }

    public function show_one_course()
    {
        return view('cursos.show_one_course');
    }
    public function leccion()
    {
        return view('cursos.leccion');
    }

    /** Contar el número de Likes de un curso**/
    public function course_likes()
    {
        $course_id = $request['course_id'];
        $user = Auth::user();
        $like = Course::find($course_id);
        $like->likes = $like->likes+1;
        $like->save();   
    }



    public function show_one_course()
    {
        return view('cursos.show_one_course');
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
