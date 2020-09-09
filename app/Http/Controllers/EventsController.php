<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

// modelos
use App\Models\Course;
use App\Models\Events;


class EventsController extends Controller
{

    function __construct()
	{
        // ALTER TABLE `menu` ADD `eventos` TEXT NULL DEFAULT NULL AFTER `herramientas`;
        // TITLE
		view()->share('title', 'Eventos');
		
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Events::orderBy('id', 'DESC')->get();

        $mentores = DB::table('wp98_users')
                        ->select('ID', 'user_email')
                        ->where('rol_id', '=', 2)
                        ->orderBy('user_email', 'ASC')
                        ->get();

        $mentor = DB::table('wp98_users')
                    ->select('ID', 'user_email')
                    ->where('ID', '=', 7)
                    ->orderBy('user_email', 'ASC')
                    ->get();


        return view('admin.events.index')->with(compact('events', 'mentores'));
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

        // se crea el enevents
        $data = Events::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => '1',
            'user_id' => $request->input('mentor_id')
        ]);

        return redirect('admin/events')->with('msj-exitoso', 'El evento '.$data->title.' ha sido creado con éxito.');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Events::find($id);
        $mentores = DB::table('wp98_users')
                        ->select('ID', 'user_email')
                        ->where('rol_id', '=', 2)
                        ->orderBy('user_email', 'ASC')
                        ->get();
        return view('admin.events.editEvent')->with(compact('event', 'mentores'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $event = Events::find($request->input('event_id'));
        $event->title       =$request->input('title');
        $event->description =$request->input('description');
        $event->user_id     =$request->input('mentor_id');
        $event->save();

        return redirect('admin/events')->with('msj-exitoso', 'El evento '.$event->title.' ha sido modificado con éxito.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
    * Admin / Cursos / Listado de Cursos / Eliminar Curso (Lógico)
    */
    public function change_status($id, $status){
        $event = Events::find($id);
        $event->status = $status;
        $event->save();

        if ($status == 0){
            return redirect('admin/events')->with('msj-exitoso', 'El evento '.$event->title.' ha sido deshabilitado con éxito.');
        }else{
            return redirect('admin/events')->with('msj-exitoso', 'El evento '.$event->title.' ha sido habilitado con éxito.');
        }
    }
}
