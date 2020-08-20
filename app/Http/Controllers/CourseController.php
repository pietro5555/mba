<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
use App\Models\Course;
use DB;

class CourseController extends Controller{
    /**
     * Landing / Mostrar Cursos en la Sección de Cursos Nuevos
     */
    public function load_more_courses_new($ultimoId, $accion){
        if ($accion == 'next'){
            $cursosNuevos = Course::where('id', '<', $ultimoId)
                            ->where('status', '=', 1)
                            ->orderBy('id', 'DESC')
                            ->take(3)
                            ->get();
        }else{
            $cursosNuevos = Course::where('id', '>', $ultimoId)
                            ->where('status', '=', 1)
                            ->orderBy('id', 'DESC')
                            ->take(3)
                            ->get();
        }

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

        $cursos = Course::orderBy('id', 'DESC')->get();

        $categorias = DB::table('categories')
                        ->select('id', 'title')
                        ->orderBy('title', 'ASC')
                        ->get();

        return view('admin.courses.index')->with(compact('cursos', 'categorias'));
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

        return redirect('admin/courses')->with('msj-exitoso', 'El curso '.$curso->title.' ha sido creado con éxito.');
    }

    /**
    * Admin / Cursos / Listado de Cursos / Editar Curso
    */
    public function edit($id){
        $curso = Course::find($id);

        $categorias = DB::table('categories')
                        ->select('id', 'title')
                        ->orderBy('title', 'ASC')
                        ->get();

        $subcategorias = DB::table('subcategories')
                            ->select('id', 'title')
                            ->where('category_id', '=', $curso->category_id)
                            ->orderBy('title', 'ASC')
                            ->get();

        return view('admin.courses.editCourse')->with(compact('curso', 'categorias', 'subcategorias'));
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
}
