<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation; use App\Models\Course; use App\Models\Question;
use DB;

class EvaluationController extends Controller{

    /**
    * Admin / Cursos / Evaluación / Guardar Evaluación
    */
    public function store(Request $request){
        $evaluacion = new Evaluation($request->all());
        $evaluacion->save();

        return redirect('admin/courses/evaluation/show/'.$request->course_id)->with('msj-exitoso', 'La evaluación ha sido creada con éxito.');
    }

    /**
    * Admin / Cursos / Evaluación de un Curso
    */
    public function show($course_id){
         // TITLE
        view()->share('title', 'Evaluación del Curso');

        $curso = Course::where('id', '=', $course_id)
                    ->with('evaluation', 'evaluation.questions')
                    ->first();
        
        return view('admin.courses.evaluation')->with(compact('curso'));
    }

    /**
    * Admin / Cursos / Evaluación / Editar Evaluación / Guardar Cambios
    */
    public function update(Request $request){
        $evaluacion = Evaluation::find($request->evaluation_id);
        $evaluacion->fill($request->all());
        $evaluacion->save();

        return redirect('admin/courses/evaluation/show/'.$evaluacion->course_id)->with('msj-exitoso', 'Los datos de la evaluación han sido actualizados con éxito.');
    }

    /**
    * Admin / Cursos / Evaluación / Agregar Pregunta
    */
    public function add_question(Request $request){
        $cantPreguntas = DB::table('questions')
                            ->where('evaluation_id', '=', $request->evaluation_id)
                            ->count();

        $pregunta = new Question($request->all());
        $pregunta->order = $cantPreguntas+1;
        $pregunta->save();

        return redirect('admin/courses/evaluation/show/'.$request->course_id)->with('msj-exitoso', 'La evaluación ha sido creada con éxito.');
    }

    /**
    * Admin / Cursos / Evaluación / Editar Pregunta
    */
    public function edit_question($id){
        $pregunta = Question::find($id);
        
        return response()->json(
            $pregunta
        );
    }

     /**
    * Admin / Cursos / Evaluación / Guardar Cambios Pregunta
    */
    public function update_question(Request $request){
        $pregunta = Question::find($request->question_id);
        $pregunta->fill($request->all());
        $pregunta->save();
        
        return redirect('admin/courses/evaluation/show/'.$pregunta->evaluation->course_id)->with('msj-exitoso', 'Los datos de la pregunta han sido actualizados con éxito.');
    }

     /**
    * Admin / Cursos / Evaluación / Eliminar Pregunta
    */
    public function delete_question($id){
        $pregunta = Question::find($id);
        $pregunta->delete();
        
        return redirect('admin/courses/evaluation/show/'.$pregunta->evaluation->course_id)->with('msj-exitoso', 'La  pregunta ha sido eliminada con éxito.');
    }
}
