<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    /**
    * Admin / Cursos / Gestionar Etiquetas
    */
    public function index(){
        // TITLE
        view()->share('title', 'Listado de Etiquetas');

        $etiquetas = Tag::withCount('courses')
                        ->orderBy('tag', 'ASC')
                        ->get();

        return view('admin.courses.tags')->with(compact('etiquetas'));
    }

    public function store(Request $request){
        $etiqueta = new Tag($request->all());
        $etiqueta->save();

        return redirect('admin/courses/tags')->with('msj-exitoso', 'La etiqueta se ha creado con éxito.');
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
    * Admin / Cursos / Gestionar Etiquetas / Editar Etiqueta
    */
    public function edit($id){
        $etiqueta = Tag::find($id);

        return response()->json(
            $etiqueta
        );
    }

    /**
    * Admin / Cursos / Gestionar Etiquetas / Editar Etiqueta / Guardar Cambios
    */
    public function update(Request $request){
        $etiqueta = Tag::find($request->tag_id);
        $etiqueta->fill($request->all());
        $etiqueta->save();

        return redirect('admin/courses/tags')->with('msj-exitoso', 'La etiqueta se ha modificado con éxito.');
    }

    public function delete($id){
        $etiqueta = Tag::find($id);
        $etiqueta->delete();

        return redirect('admin/courses/tags')->with('msj-exitoso', 'La etiqueta '.$etiqueta->tag.' ha sido eliminada con éxito.');
    }
}
