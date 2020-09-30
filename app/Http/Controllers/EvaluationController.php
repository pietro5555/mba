<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation; use App\Models\Course; use App\Models\Question;
use DB; use Auth; use PDF;

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

    /**
    * Cliente / Cursos / Presentar Evaluación de un Curso
    */
    public function take($course_slug, $course_id){
       $evaluacion = Evaluation::where('course_id', '=', $course_id)
                        ->with(['questions' => function($query){
                            $query->orderBy('order', 'ASC');
                        }])->withCount('questions')
                        ->orderBy('id', 'DESC')
                        ->first();
       
       return view('cursos.takeEvaluation')->with(compact('evaluacion'));
   }

   /**
    * Cliente / Cursos / Enviar Evaluación de un Curso
    */
    public function submit(Request $request){
        $puntajePregunta = (100 / $request->questions_quantity);
        $puntaje = 0;

        $id = DB::table('evaluations_users')
                ->insertGetId(['user_id' => Auth::user()->ID,
                                'evaluation_id' => $request->evaluation_id,
                                'score' => 0,
                                'date' => date('Y-m-d')]);

        for ($i=1; $i <= $request->questions_quantity; $i++) { 
            $pregunta = "question-".$i;
            $respuesta = "answer-".$i;
            $seleccion = "selection-".$i;

            DB::table('evaluations_users_answers')
                ->insert(['evaluation_user_id' => $id,
                          'question_id' => $request->$pregunta,
                          'selected_answer' => $request->$seleccion]);

            if ($request->$seleccion == $request->$respuesta){
                $puntaje = $puntaje + $puntajePregunta;
            }
        }

        DB::table('evaluations_users')
            ->where('id', '=', $id)
            ->update(['score' => number_format($puntaje, 2)]);

        $datosEvaluacion = Evaluation::where('id', '=', $request->evaluation_id)
                            ->with('course')
                            ->first();
    
        $datosPrimeraLeccion = DB::table('lessons')
                                ->where('course_id', '=', $datosEvaluacion->course_id)
                                ->orderBy('id', 'DESC')
                                ->first();
        if ($puntaje >= 50){
            DB::table('courses_users')
                ->where('user_id', '=', Auth::user()->ID)
                ->where('course_id', '=', $datosEvaluacion->course_id)
                ->update(['finish_date' => date('Y-m-d'), 'certificate' => 1, 'progress' => 100, 'updated_at' => date('Y-m-d H:i:s')]);

            //$this->generate_certificate($datosEvaluacion->course_id);
            
            return redirect('courses/lesson/'.$datosPrimeraLeccion->slug.'/'.$datosPrimeraLeccion->id.'/'.$datosPrimeraLeccion->course_id)->with('msj-exitoso', '¡Felicidades! Has aprobado la evaluación con '.number_format($puntaje).'%');
        }else{
            return redirect('courses/lesson/'.$datosPrimeraLeccion->slug.'/'.$datosPrimeraLeccion->id.'/'.$datosPrimeraLeccion->course_id)->with('msj-erroneo', '¡Lo sentimos! Has reprobado la evaluación con '.number_format($puntaje).'%');
        }
    }

    //**** Genera el PDF del certificado y lo almacena para mostrarlo posteriormente ***//
    public function get_certificate($curso_id){
        $datosCurso = Course::where('id', '=', $curso_id)
                        ->first();
        
        $datosProgreso = DB::table('courses_users')
                            ->where('user_id', '=', Auth::user()->ID)
                            ->where('course_id', '=', $curso_id)
                            ->first();

        $alumno = Auth::user()->display_name;
        $curso = $datosCurso->title;
        $dia = date('d', strtotime($datosProgreso->finish_date));
        switch (date('m', strtotime($datosProgreso->finish_date))) {
            case '01':
                $mes = 'Enero';
            break;
            case '02':
                $mes = 'Febrero';
            break;
            case '03':
                $mes = 'Marzo';
            break;
            case '04':
                $mes = 'Abril';
            break;
            case '05':
                $mes = 'Mayo';
            break;
            case '06':
                $mes = 'Junio';
            break;
            case '07':
                $mes = 'Julio';
            break;
            case '08':
                $mes = 'Agosto';
            break;
            case '09':
                $mes = 'Septiembre';
            break;
            case '10':
                $mes = 'Octubre';
            break;
            case '11':
                $mes = 'Noviembre';
            break;
            case '12':
                $mes = 'Diciembre';
            break;
        }
        $ano = date('Y', strtotime($datosProgreso->finish_date));

        //$pdf = \App::make('dompdf.wrapper');
        $pdf = PDF::loadView('certificado.tipo1', compact('curso', 'alumno', 'dia', 'mes', 'ano'));//->setPaper('a4', 'landscape');
        /*$output = $pdf->output();
        $path = public_path()."/certificates/courses/".Auth::user()->ID."-".$curso_id.".pdf"; 
        file_put_contents($path, $output);*/
        return $pdf->download('certificate.pdf');
    }
}
