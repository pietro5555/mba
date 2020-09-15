<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
use App\Models\Course; use App\Models\Lesson;
use DB;

class LessonController extends Controller{
    /**
    * Admin / Cursos / Listado de Cursos / Temario de un Curso
    */
    public function index($id){
        // TITLE
        view()->share('title', 'Lecciones del Curso');

        $curso = Course::where('id', '=', $id)
                    ->with('lessons', 'lessons.materials')
                    ->first();

        return view('admin.courses.lessons')->with(compact('curso'));
    }

    /**
    * Admin / Cursos / TEmario de Curso / Agregar Lección
    */
    public function store(Request $request){
        $leccion = new Lesson($request->all());
        $leccion->slug = Str::slug($leccion->title);
        $leccion->save();

        return redirect('admin/courses/lessons/'.$request->course_id)->with('msj-exitoso', 'La lección ha sido creada con éxito.');
    }

     /**
    * Admin / Cursos / Temario / Editar Lección
    */
    public function edit($id){
        $leccion = Lesson::find($id);

        return view('admin.courses.editLesson')->with(compact('leccion'));
    }

     /**
    * Admin / Cursos / Temario / Editar Lección / Guardar Cambios
    */
    public function update(Request $request){
        $leccion = Lesson::find($request->lesson_id);
        $leccion->fill($request->all());
        $leccion->slug = Str::slug($leccion->title);
        $leccion->save();

         return redirect('admin/courses/lessons/'.$leccion->course_id)->with('msj-exitoso', 'La lección ha sido creada con éxito.');
    }

     /**
    * Admin / Cursos / Temario / Eliminar Lección
    */
    public function delete($id){
        $leccion = Lesson::find($id);

        DB::table('support_material')
            ->where('lesson_id', '=', $id)
            ->delete();
        
        $leccion->delete();

        return redirect('admin/courses/lessons/'.$leccion->course_id)->with('msj-exitoso', 'La lección ha sido eliminada con éxito.');
    }
}

