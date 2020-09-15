<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;


//Modelos
use App\Models\SetEvent; 


class SetEventController extends Controller
{

    /**
     * Habilitar / Inhabilitar recursos
     *
     * @return \Illuminate\Http\Response
     */
    public function changeStatusResources(Request $request)
    {

        $itemsMenu = DB::table('event_resources')
            ->where('event_id', $request->event_id)
            ->where('id', $request->resource_id)
            ->update(['status' => $request->status === 'true' ? '1' : '0']);


        return response()->json(['message' => 'Cambio realizado con éxito'], 201);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $event_id)
    {
        // dd($event_id, $request->all());
        // se crea el recurso para events
        switch ($request->input('type')) {
            case 'video':
                SetEvent::create([
                    'title' => $request->input('title') ? $request->input('title') : 'null',
                    'type' => 'video',
                    'url' => $request->input('url_video'),
                    'event_id' => $event_id
                ]);
                break;
            case 'file':

                    if ($request->file('file')) {
                        $file = $request->file('file');
                        $name_file = 'file_'.$event_id.'_'.time().'.'.$file->getClientOriginalExtension();
                        $path = public_path() .'/upload/events';
                        $file->move($path,$name_file);

                        SetEvent::create([
                            'title' => $request->input('title') ? $request->input('title') : 'null',
                            'type' => 'file',
                            'url' => $name_file,
                            'event_id' => $event_id
                        ]);
                    }else{
                        return redirect()->back()->with('msj-erroneo', 'Hubo un Problema al subir el recurso');
                    }
                break;

            case 'presentation':
                if ($request->file('presentation')) {
                    $file = $request->file('presentation');
                    $name_file = 'presentation_'.$event_id.'_'.time().'.'.$file->getClientOriginalExtension();
                    $path = public_path() .'/upload/events';
                    $file->move($path,$name_file);

                    SetEvent::create([
                        'title' => $request->input('title') ? $request->input('title') : 'null',
                        'type' => 'presentation',
                        'url' => $name_file,
                        'event_id' => $event_id
                    ]);
                }else{
                    return redirect()->back()->with('msj-erroneo', 'Hubo un Problema al subir el recurso');
                }
                break;


                // survey_options
                case 'survey':
                    $dataE = SetEvent::create([
                        'title' => $request->input('title') ? $request->input('title') : 'null',
                        'type' => 'survey',
                        'event_id' => $event_id
                    ]);

                    $questions = explode(',', $request->input('questions'));

                    foreach ($questions as $question) {
                        DB::table('survey_options')->insert([
                            'question' => $question,
                            'content_event_id' => $dataE->id
                        ]);
                    }

                    break;

                    // CREATE TABLE `survey_options` ( `id` INT NOT NULL AUTO_INCREMENT ,  `question` TEXT NOT NULL ,  `content_event_id` INT NOT NULL ,  `created_at` TIMESTAMP NULL ,  `updated_at` TIMESTAMP NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;



        }

        

        return redirect('/event/'.$event_id)->with('msj-exitoso', 'El Recurso ha sido creado con éxito.');

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
        //
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
}
