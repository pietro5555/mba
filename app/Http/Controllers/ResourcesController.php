<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
use App\Models\Lesson; use App\Models\SupportMaterial; use App\Models\Course;
use DB;

class ResourcesController extends Controller{
    /**
    * Admin / Cursos / Listado de Cursos / Lecciones / Recursos Adicionales
    */
   /* public function index($leccion){
     
        $leccion = Lesson::where('id', '=', $leccion)
                    ->with('course')
                    ->first();

        // TITLE
        view()->share('title', 'Archivos de la Lección '.$leccion->title);

        return view('admin.courses.resources')->with(compact('leccion'));
    }*/

    /**
    * Admin / Cursos / Listado de Cursos / Recursos Adicionales
    */
    public function index($course){
     
        $course = Course::where('id', '=', $course)
                    ->with('materials')
                    ->first();

        // TITLE
        view()->share('title', 'Archivos del curso  '.$course->title);

        return view('admin.courses.resources')->with(compact('course'));
    }

    /**
    * Admin / Cursos / Listado de Cursos / Lecciones / Agregar Recurso Adicional
    */
    public function store(Request $request){
       // dd($request->course_id, $request->lesson_id);
        $recurso = new SupportMaterial($request->all());
       
        if ($recurso->type == 'Archivo'){
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/uploads/courses/lessons/materials', $name);
                $recurso->material = $name;
            }
        }else{
            $recurso->material = $request->url;
        }
        
        if ($request->hasFile('image')){
            $file2 = $request->file('image');
            $name2 = $file2->getClientOriginalName();
            $file2->move(public_path().'/uploads/courses/lessons/materials/images', $name2);
            $recurso->image = $name2;
        }
        $recurso->save();

        return redirect('admin/courses/lessons/resources/'.$request->course_id)->with('msj-exitoso', 'El material ha sido creado con éxito.');
    }

    /**
    * Admin / Cursos / Listado de Cursos / Lecciones / Editar Recurso 
    */
    public function edit($id){
        $material = SupportMaterial::find($id);

        return view('admin.courses.editResource')->with(compact('material'));
    }

    /**
    * Admin / Cursos / Listado de Cursos / Lecciones / Editar Recurso / Guardar Cambios
    */
    public function update(Request $request){
        $recurso = SupportMaterial::find($request->resource_id);
        $recurso->fill($request->all());
        if ($recurso->type == 'Archivo'){
            if ($request->hasFile('file')){
                $file = $request->file('file');
                $name = $file->getClientOriginalName();
                $file->move(public_path().'/uploads/courses/lessons/materials', $name);
                $recurso->material = $name;
            }
        }else{
            $recurso->material = $request->url;
        }
        
        if ($request->hasFile('image')){
            $file2 = $request->file('image');
            $name2 = $file2->getClientOriginalName();
            $file2->move(public_path().'/uploads/courses/lessons/materials/images', $name2);
            $recurso->image = $name2;
        }
        $recurso->save();

        return redirect('admin/courses/lessons/resources/'.$request->course_id)->with('msj-exitoso', 'El material ha sido actualizado con éxito.');
    }

     /**
    * Admin / Cursos / Listado de Cursos / Lecciones / Eliminar Recurso
    */
    public function delete($id, $course_id){
        $recurso = SupportMaterial::find($id);
        $recurso->delete();

        return redirect('admin/courses/lessons/resources/'.$course_id)->with('msj-exitoso', 'El material ha sido eliminado con éxito.');
    }
}

