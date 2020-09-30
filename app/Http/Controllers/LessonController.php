<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Comment;
use DB;
use Auth;
use Carbon\Carbon;
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

        return redirect('admin/courses/lessons/show/'.$leccion->id)->with('msj-exitoso', 'La lección ha sido creada con éxito.');
    }

      /**
    * Admin / Cursos / Temario / Ver Video de Lección
    */
    public function show($id){
        // TITLE
        view()->share('title', 'Video de Lección');

        $leccion = Lesson::find($id);

        return view('admin.courses.showLesson')->with(compact('leccion'));
    }
    
    public function load_video_duration($id, $duration){
        $duracion = number_format($duration, 2);
        $leccion = DB::table('lessons')
                        ->where('id', '=', $id)
                        ->update(['duration' => $duracion]);

        return response()->json(
            true
        );
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
        $videoUpdate = 0;
        if ($request->url != $leccion->url){
            $videoUpdate = 1;
        }
        $leccion->fill($request->all());
        $leccion->slug = Str::slug($leccion->title);
        $leccion->save();

        if ($videoUpdate == 0){
            return redirect('admin/courses/lessons/'.$leccion->course_id)->with('msj-exitoso', 'La lección ha sido actualizada con éxito.');
        }else{
            return redirect('admin/courses/lessons/show/'.$leccion->id)->with('msj-exitoso', 'El video de la lección ha sido actualido con éxito.');
        }
         
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

      /**
    * Courses / Leccion
    */

    public function lesson($lesson_slug, $lesson_id, $course_id)
    {
        $lesson = Lesson::where('id', $lesson_id)->get()->first();
        $all_lessons = Lesson::where('course_id', '=',  $course_id)->get();

        $all_comments = Comment::where('lesson_id', $lesson_id)->get();
        return view('cursos.leccion', compact('lesson', 'all_lessons','all_comments'));
    }
    /*AGREGAR COMENTARIOS*/
    public function lesson_comments(Request $request){

        $lesson_comments = new Comment;
        $lesson_comments->comment =$request->comment;
        $lesson_comments->lesson_id =$request->lesson_id; 
        $lesson_comments->user_id =Auth::user()->ID;
        $lesson_comments->date = Carbon::now()->format('Y-m-d');
        $lesson_comments->save();


         return redirect('courses/lesson/'.$request->lesson_slug.'/'.$request->lesson_id.'/'.$request->course_id);

    }
}

