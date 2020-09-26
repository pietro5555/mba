<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
use App\Models\Course; use App\Models\Category; use App\Models\User;
use DB; use Auth;

class CourseController extends Controller{
    /**
    * Landing / Mostrar Cursos en la Sección de Cursos Nuevos
    *Consulta Ajax para actualizar los cursos (Previous y Next)
    */
    public function load_more_courses_new($ultimoId, $accion){
        $idStart = 0;
        $idEnd = 0;
        $cont = 1;
        $previous = 1;
        $next = 1;

        if ($accion == 'next'){
            $cursosNuevos = Course::where('id', '<', $ultimoId)
                            ->where('status', '=', 1)
                            ->orderBy('id', 'DESC')
                            ->take(3)
                            ->get();
        }else{
            $cursosNuevos = Course::where('id', '>', $ultimoId)
                            ->where('status', '=', 1)
                            ->orderBy('id', 'ASC')
                            ->take(3)
                            ->get();

            $cursosNuevos = $cursosNuevos->sortByDesc('id');
        }

        foreach ($cursosNuevos as $curso){
            if ($cont == 1){
                $idStart = $curso->id;
            }
            $idEnd = $curso->id;
            $cont++;
        }

        $ultCurso = Course::select('id')
                        ->where('status', '=', 1)
                        ->orderBy('id', 'DESC')
                        ->first();

        $primerCurso = Course::select('id')
                           ->where('status', '=', 1)
                           ->orderBy('id', 'ASC')
                           ->first();

        if ($idStart == $ultCurso->id){
            $previous = 0;
        }
        if ($idEnd == $primerCurso->id){
            $next = 0;
        }

        return view('newCoursesSection')->with(compact('cursosNuevos', 'idStart', 'idEnd', 'previous', 'next'));
    }

    /**
     * Admin / Cursos / Listado de Cursos
     */
    public function index(){
        // TITLE
        view()->share('title', 'Listado de Cursos');


            $username = NULL;
            if (!Auth::guest()){
                $username = auth()->user()->display_name;
            }

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

        $cursos = Auth::user()->courses_buyed->take(4);
       // $vacio = isset($cursos);
       // return dd($cursos,$vacio);
        $cursosArray = [];

        $cursosMasComprados = DB::table('courses_users')
                                ->select(DB::raw('count(course_id) as purchases_count, course_id'))
                                ->groupBy('course_id')
                                ->orderBy('purchases_count', 'DESC')
                                ->get();

        $cursosRecomendados = collect();
        
        foreach ($cursosMasComprados as $cursoComprado){
            array_push($cursosArray, $cursoComprado->course_id);

            $curso = Course::where('id', '=', $cursoComprado->course_id)->first();

            $cursosRecomendados->push($curso);
        }

        $cursosMasVistos = Course::where('views', '>', 0)
                                ->whereNotIn('id', $cursosArray)
                                ->orderBy('views', 'DESC')
                                ->get(); 

        foreach ($cursosMasVistos as $cursoVisto){
            $cursosRecomendados->push($cursoVisto);
        }
        $total = count($cursosRecomendados);

            //ULTIMO CURSO VISTO POR EL USUARIO
            $last_course = DB::table('courses')
            ->join('courses_users', 'courses_users.course_id', '=', 'courses.id')
            ->where('courses_users.user_id', '=', Auth::user()->ID )
            ->orderBy('courses_users.updated_at', 'DESC')
            ->get()
            ->take(1);
            return view('cursos.cursos')->with(compact('username','cursosDestacados', 'cursosNuevos', 'idStart', 'idEnd', 'previous', 'next', 'courses', 'mentores', 'cursos', 'cursosRecomendados', 'total', 'last_course'));
    }

    public function record(){
        // TITLE
        view()->share('title', 'Listado de Cursos');


        $cursos = Course::withCount('lessons')
                    ->with('evaluation')
                    ->orderBy('id', 'DESC')->get();

        $mentores = DB::table('wp98_users')
                            ->select('ID', 'user_email')
                            ->where('rol_id', '=', 2)
                            ->orderBy('user_email', 'ASC')
                            ->get();

            $categorias = DB::table('categories')
                            ->select('id', 'title')
                            ->orderBy('id', 'ASC')
                            ->get();

            $subcategorias = DB::table('subcategories')
                                ->select('id', 'title')
                                ->orderBy('id', 'ASC')
                                ->get();

            $etiquetas = DB::table('tags')
                            ->select('id', 'tag')
                            ->orderBy('tag', 'ASC')
                            ->get();

            return view('admin.courses.index')->with(compact('cursos', 'mentores', 'categorias', 'subcategorias', 'etiquetas'));
    }

    /**
    * Landing / Cursos / Ver Curso
    */
    public function show($slug, $id){
        $curso = Course::where('id', '=', $id)
                    ->withCount(['lessons', 'ratings', 'users', 
                        'ratings as promedio' => function ($query){
                            $query->select(DB::raw('avg(points)'));
                        }
                    ])->first();
        
        $dur = 0;
        foreach ($curso->lessons as $leccion){
            $dur += $leccion->duration;
        } 
        $curso->duration = $dur;
        if ($dur > 0){
            $tiempo = explode(".", $dur);
            $segundos = $tiempo[0]*60 + $tiempo[1]; 
            $curso->hours = floor($segundos/ 3600);
            $curso->minutes = floor(($segundos - ($curso->hours * 3600)) / 60);
            $curso->seconds = $segundos - ($curso->hours * 3600) - ($curso->minutes * 60);
        }

        return view('cursos.show_one_course')->with(compact('curso'));
    }

     /**
    * Landing / Cursos / Cursos Recomendados
    */
    public function recommended(){
        $cursosArray = [];

        $cursosMasComprados = DB::table('courses_users')
                                ->select(DB::raw('count(course_id) as purchases_count, course_id'))
                                ->groupBy('course_id')
                                ->orderBy('purchases_count', 'DESC')
                                ->get();

        $cursosRecomendados = collect();
        foreach ($cursosMasComprados as $cursoComprado){
            array_push($cursosArray, $cursoComprado->course_id);

            $curso = Course::where('id', '=', $cursoComprado->course_id)->first();

            $cursosRecomendados->push($curso);
        }

        $cursosMasVistos = Course::where('views', '>', 0)
                                ->whereNotIn('id', $cursosArray)
                                ->orderBy('views', 'DESC')
                                ->get(); 

        foreach ($cursosMasVistos as $cursoVisto){
            $cursosRecomendados->push($cursoVisto);
        }

        dd($cursosRecomendados);
    }

    /**
    * Cliente / Cursos / Mis Cursos
    */
    public function my_courses(){
        $cursos = Auth::user()->courses_buyed->take(12);

        return view('cursos.all_courses', compact('cursos'));

    }

    /*CURSO FAVORITO*/
    public function course_favorite($course_id){

        $user_id = Auth::user()->ID;

        $favorite = DB::table('courses_users')
        ->where('course_id', '=',$course_id)
        ->where('user_id', '=', $user_id)
        ->update(['favorite' => 1]);
        
        return redirect()->action('CourseController@favorites');

    }

    /*EVENTOS Y CURSOS FAVORITOS DEL USUARIO*/
    public function favorites(){
        //Eventos favoritos de un usuario
        $eventos_favoritos = DB::table('events')
        ->join('events_users', 'events_users.event_id', '=', 'events.id')
        ->where('events_users.user_id', '=', Auth::user()->ID )
        ->where('events_users.favorite', '=',1 )
        ->get();

        //Cursos favoritos de un usuario

        $cursos_favoritos = Auth::user()->courses_buyed()->wherePivot('favorite', '=', 1)->get();
        //return $cursos_favoritos;
         return view('timelive.favorite', compact('eventos_favoritos', 'cursos_favoritos'));
    }

    /*ULTIMO CURSO VISTO POR EL USUARIO*/
    public function last_viewed_course(){


    }


    /**
    * Admin / Cursos / Listado de Cursos / Nuevo Curso
    */
    public function store(Request $request){
        $curso = new Course($request->all());
        $curso->slug = Str::slug($curso->title);
        $curso->save();

        if ($request->hasFile('cover')){
            $file = $request->file('cover');
            $name = $curso->id.".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/images/courses/covers', $name);
            $curso->cover = $name;
            $curso->cover_name = $file->getClientOriginalName();
        }
        
        $curso->save();

        if (!is_null($request->tags)){
            foreach ($request->tags as $tag){
                DB::table('courses_tags')->insert(
                    ['course_id' => $curso->id, 'tag_id' => $tag]
                );
            }
        }

        return redirect('admin/courses')->with('msj-exitoso', 'El curso '.$curso->title.' ha sido creado con éxito.');
    }

    /**
    * Admin / Cursos / Listado de Cursos / Editar Curso
    */
    public function edit($id){
        $curso = Course::find($id);

        $mentores = DB::table('wp98_users')
                        ->select('ID', 'user_email')
                        ->where('rol_id', '=', 2)
                        ->orderBy('user_email', 'ASC')
                        ->get();

        $categorias = DB::table('categories')
                        ->select('id', 'title')
                        ->orderBy('id', 'ASC')
                        ->get();

        $subcategorias = DB::table('subcategories')
                            ->select('id', 'title')
                            ->orderBy('id', 'ASC')
                            ->get();

        $etiquetas = DB::table('tags')
                        ->select('id', 'tag')
                        ->orderBy('tag', 'ASC')
                        ->get();

        $etiquetasActivas = [];
        foreach ($curso->tags as $etiq){
            array_push($etiquetasActivas, $etiq->id);
        }

        return view('admin.courses.editCourse')->with(compact('curso', 'mentores', 'categorias', 'subcategorias', 'etiquetas', 'etiquetasActivas'));
    }

    /**
    * Admin / Cursos / Listado de Cursos / Guardar Cambios de Curso
    */
    public function update(Request $request){
        $curso = Course::find($request->course_id);
        $curso->fill($request->all());
        $curso->slug = Str::slug($curso->title);

        if ($request->hasFile('cover')){
            $file = $request->file('cover');
            $name = $curso->id.".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/images/courses/covers', $name);
            $curso->cover = $name;
            $curso->cover_name = $file->getClientOriginalName();
        }

        $curso->save();

        DB::table('courses_tags')
            ->where('course_id', '=', $curso->id)
            ->delete();

        if (!is_null($request->tags)){
            foreach ($request->tags as $tag){
                DB::table('courses_tags')->insert(
                    ['course_id' => $curso->id, 'tag_id' => $tag]
                );
            }
        }

        return redirect('admin/courses')->with('msj-exitoso', 'El curso '.$curso->title.' ha sido modificado con éxito.');
    }

    /**
    * Admin / Cursos / Listado de Cursos / Eliminar Curso (Lógico)
    */
    public function change_status($id, $status){
        $curso = Course::find($id);
        $curso->status = $status;
        $curso->save();

        if ($status == 0){
            return redirect('admin/courses')->with('msj-exitoso', 'El curso '.$curso->title.' ha sido deshabilitado con éxito.');
        }else{
            return redirect('admin/courses')->with('msj-exitoso', 'El curso '.$curso->title.' ha sido habilitado con éxito.');
        }
    }

    /**
     * Admin / Cursos / Destacar Curso y cargar su imagen destacada
     */
    public function add_featured(Request $request){
        $curso = Course::find($request->course_id);

        if ($request->hasFile('featured_cover')){
            $file = $request->file('featured_cover');
            $name = $curso->id.".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/images/courses/featured_covers', $name);
            $curso->featured_cover = $name;
            $curso->featured_cover_name = $file->getClientOriginalName();
        }
        $curso->featured = 1;
        $curso->featured_at = date('Y-m-d');
        $curso->save();

        return redirect('admin/courses')->with('msj-exitoso', 'El curso ha sido destacado con éxito.');
    }

     /**
     * Admin / Cursos / Quitar Curso Destacado
     */
    public function quit_featured($id){
        $curso = Course::find($id);

        $imagen = public_path().'/uploads/images/courses/featured_covers/'.$curso->featured_cover;
        if (getimagesize($imagen)) {
            unlink($imagen);
        }
        $curso->featured_cover = NULL;
        $curso->featured_cover_name = NULL;
        $curso->featured = 0;
        $curso->featured_at = NULL;
        $curso->save();

        return redirect('admin/courses')->with('msj-exitoso', 'El curso ha sido quitado de destacados con éxito.');
    }
}

