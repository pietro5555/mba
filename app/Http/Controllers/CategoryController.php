<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
use App\Models\Category; use App\Models\Subcategory;
use DB;

class CategoryController extends Controller{
    
    /**
     * Admin / Cursos / Listado de Categorías
     */
    public function index(){
       // TITLE
        view()->share('title', 'Listado de Categorías');

        $categorias = Category::withCount('courses')
                        ->orderBy('title', 'ASC')
                        ->get();

        return view('admin.courses.categories')->with(compact('categorias'));
    }

    /**
     * Admin / Cursos / Gestionar Categorías / Agregar Categoría
     */
    public function add_category(Request $request){
        $categoria = new Category($request->all());
        $categoria->slug = Str::slug($categoria->title);
        $categoria->save();
        if ($request->hasFile('cover')){
            $file = $request->file('cover');
            $name = $categoria->id.".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/images/categories/covers', $name);
            $categoria->cover = $name;
            $categoria->cover_name = $file->getClientOriginalName();
        }
        $categoria->save();
        return redirect('admin/courses/categories')->with('msj-exitoso', 'La categoría '.$categoria->title.' ha sido agregada con éxito.');
    }

    /**
     * Admin / Cursos / Gestionar Categorías / Editar Categoría
     */
    public function edit_category($categoria){
        $categoria = Category::find($categoria);
        
        return response()->json(
            $categoria
        );
    }

     /**
     * Admin / Cursos / Gestionar Categorías / Actualizar Categoría
     */
    public function update_category(Request $request){
        $categoria = Category::find($request->category_id);
        $categoria->fill($request->all());
        $categoria->slug = Str::slug($categoria->title);
        $categoria->save();
         if ($request->hasFile('cover')){
            $file = $request->file('cover');
            $name = $categoria->id.".".$file->getClientOriginalExtension();
            $file->move(public_path().'/uploads/images/categories/covers', $name);
            $categoria->cover = $name;
            $categoria->cover_name = $file->getClientOriginalName();
        }
        $categoria->save();
        return redirect('admin/courses/categories')->with('msj-exitoso', 'La categoría '.$categoria->title.' ha sido modificada con éxito.');
    }

     /**
     * Admin / Cursos / Gestionar Categorías / Eliminar Categoría
     */
    public function delete_category($categoria){
        $categoria = Category::find($categoria);
        $categoria->delete();

        return redirect('admin/courses/categories')->with('msj-exitoso', 'La categoría '.$categoria->title.' ha sido eliminada con éxito.');
    }

    /**
     * Admin / Cursos / Gestionar Categorías / Listado de Subcategorías de una Categoría
     */
    public function subcategories(){
        // TITLE
        view()->share('title', 'Subcategorías');

        $subcategorias = Subcategory::withCount('courses')
                            ->orderBy('title', 'ASC')
                            ->get();
        
        return view('admin.courses.subcategories')->with(compact('subcategorias'));
    }

    /**
     * Admin / Cursos / Gestionar Categorías / Agregar Subcategoría
     */
    public function add_subcategory(Request $request){
        $subcategoria = new Subcategory($request->all());
        $subcategoria->slug = Str::slug($subcategoria->title);
        $subcategoria->save();

        return redirect('admin/courses/subcategories')->with('msj-exitoso', 'La subcategoría '.$subcategoria->title.' ha sido agregada con éxito.');
    }

    /**
     * Admin / Cursos / Gestionar Categorías / Editar SubCategoría
     */
    public function edit_subcategory($id){
        $subcategoria = Subcategory::find($id);
        
        return response()->json(
            $subcategoria
        );
    }

     /**
     * Admin / Cursos / Gestionar Categorías / Actualizar Subcategoría
     */
    public function update_subcategory(Request $request){
        $subcategoria = Subcategory::find($request->subcategory_id);
        $subcategoria->fill($request->all());
        $subcategoria->slug = Str::slug($subcategoria->title);
        $subcategoria->save();
        
        return redirect('admin/courses/subcategories')->with('msj-exitoso', 'La subcategoría '.$subcategoria->title.' ha sido modificada con éxito.');
    }


     /**
     * Admin / Cursos / Gestionar Categorías / Eliminar Subcategoría
     */
    public function delete_subcategory($id){
        $subcategoria = Subcategory::find($id);
        $subcategoria->delete();

        return redirect('admin/courses/subcategories')->with('msj-exitoso', 'La subcategoría '.$subcategoria->title.' ha sido eliminada con éxito.');
    }
}
