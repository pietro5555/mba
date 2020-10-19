<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Insignia;
use App\Models\Membership;
use Illuminate\Http\Request;

class InsigniaController extends Controller
{

    public function __construct()
    {
        view()->share('title', 'Gestionar Insignias');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insignias = Insignia::all();
        $membresias = Membership::all();
        $courses = Course::all()->where('status', 1);
        return view('admin.courses.insignia.index', compact('insignias', 'membresias', 'courses'));
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
        $validate = $request->validate([
            'course_id' => ['required'],
            'nivel_id' => ['required'],
            'img_insignia' => ['required', 'file', 'mimes:png,jpeg']
        ]);

        if ($validate) {
            $curso = Course::find($request->course_id);
            $membresia = Membership::find($request->nivel_id);
            $request->toArray();
            $request['course_name'] = $curso->title;
            $request['nivel_name'] = $membresia->name;
            
            if ($request->file('img_insignia')) {
                $file = $request->file('img_insignia');
                $name_file = 'insignia_'.time().'.'.$file->getClientOriginalExtension();
                $path = public_path() .'/assets/img/insignias';
                $file->move($path,$name_file);
                $request['insignia'] = "/assets/img/insignias/".$name_file;
            }
            Insignia::create($request->all());

            return redirect()->back()->with('msj-exitoso', 'Insignia Agregada con exito');
        }
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
        $insignia = Insignia::find($id);
        $insignia->insignia = asset($insignia->insignia);

        return json_encode($insignia);
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
        $validate = $request->validate([
            'course_id' => ['required'],
            'nivel_id' => ['required'],
        ]);

        if ($request->file('img_insignia')) {
            $validate = $request->validate([
                'img_insignia' => ['required', 'file', 'mimes:png,jpeg']
            ]);
        }

        if ($validate) {
            $curso = Course::find($request->course_id);
            $membresia = Membership::find($request->nivel_id);
            $request->toArray();
            $insignia = Insignia::find($id);
            $insignia->course_id = $curso->id;
            $insignia->course_name = $curso->title;
            $insignia->nivel_id = $membresia->id;
            $insignia->nivel_name = $membresia->name;
            
            if ($request->file('img_insignia')) {
                $file = $request->file('img_insignia');
                $name_file = 'insignia_'.time().'.'.$file->getClientOriginalExtension();
                $path = public_path() .'/assets/img/insignias';
                $file->move($path,$name_file);
                $insignia->insignia = "/assets/img/insignias/".$name_file;
            }

            $insignia->save();
            

            return redirect()->back()->with('msj-exitoso', 'Insignia Actualizada con exito');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Insignia::find($id)->delete();

        return redirect()->back()->with('msj-exitoso', 'Insignia Borrada con exito');
    }
}
