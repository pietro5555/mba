<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Auth;


//Modelos
use App\Models\SetEvent;
use App\Models\Events;
use App\Models\Note;
use App\Models\Survey;
use App\Models\EventResources;

class SetEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                $guardadas =   EventResources::where('event_id', $event_id)->get();
                    foreach ($guardadas as $guardada) {

                        if( $guardada->resources_id == 6){
                            $encontrada = true;
                        }
                        else{
                            $encontrada = false;
                        }
                    }
                    if(!$encontrada){
                            $dataPresentation = new EventResources;
                            $dataPresentation->resources_id = 6;
                            $dataPresentation->event_id = $event_id;
                            $dataPresentation->status = 1;
                            $dataPresentation->save();
                    }

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
                        $guardadas =   EventResources::where('event_id', $event_id)->get();
                        foreach ($guardadas as $guardada) {

                            if( $guardada->resources_id == 7){
                                $encontrada = true;
                            }
                            else{
                                $encontrada = false;
                            }
                        }
                        if(!$encontrada){
                                $dataPresentation = new EventResources;
                                $dataPresentation->resources_id = 7;
                                $dataPresentation->event_id = $event_id;
                                $dataPresentation->status = 1;
                                $dataPresentation->save();
                        }


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
                    $guardadas =   EventResources::where('event_id', $event_id)->get();
                    foreach ($guardadas as $guardada) {

                        if( $guardada->resources_id == 5){
                            $encontrada = true;
                        }
                        else{
                            $encontrada = false;
                        }
                    }
                    if(!$encontrada){
                            $dataPresentation = new EventResources;
                            $dataPresentation->resources_id = 5;
                            $dataPresentation->event_id = $event_id;
                            $dataPresentation->status = 1;
                            $dataPresentation->save();
                    }

                }else{
                    return redirect()->back()->with('msj-erroneo', 'Hubo un Problema al subir el recurso');
                }
                break;


                // survey_options
                case 'survey':
                    /*HABILITAR UNA ENCUESTA PARA EL MENU */
                    $guardadas =   EventResources::where('event_id', $event_id)->get();
                    foreach ($guardadas as $guardada) {

                        if( $guardada->resources_id == 4){
                            $encontrada = true;
                        }
                        else{
                            $encontrada = false;
                            return redirect()->back()->with('msj-erroneo', 'Ya cuenta con una encuesta guardada');
                        }
                    }

                    if($encontrada != true){
                        $dataE = SetEvent::create([
                            'title' => $request->input('title') ? $request->input('title') : 'null',
                            'type' => 'survey',
                            'event_id' => $event_id
                        ]);
                            $dataSurvey = new EventResources;
                            $dataSurvey->resources_id = 4;
                            $dataSurvey->event_id = $event_id;
                            $dataSurvey->status = 1;
                            $dataSurvey->save();

                            $question =  $request->q1;
                            $responses = explode(',', $request->input('questions'));
                            $question_save = new Survey;
                            $question_save->question =  $question;
                            $question_save->content_event_id = $dataE->id;
                            $question_save->save();
                            foreach ($responses as $response) {
                                DB::table('survey_options_response')->insert([
                                    'response' => $response,
                                    'survey_options_id' => $question_save->id,
                                    'user_id' => Auth::user()->ID
                                ]);
                            }
                    }


                  //  return dd ($responses, $question, $question_save, $question_save->id);
                   /* foreach ($questions as $question) {
                        DB::table('survey_options')->insert([
                            'question' => $question,
                            'content_event_id' => $dataE->id
                        ]);
                    }*/

                    break;
                    case 'offers':
                    break;
                    // CREATE TABLE `survey_options` ( `id` INT NOT NULL AUTO_INCREMENT ,  `question` TEXT NOT NULL ,  `content_event_id` INT NOT NULL ,  `created_at` TIMESTAMP NULL ,  `updated_at` TIMESTAMP NULL ,    PRIMARY KEY  (`id`)) ENGINE = InnoDB;



        }
        /*$event = Events::find($event_id);
        $notes = Note::all();*/

        return redirect()->route('show.event', $event_id)->with('msj-exitoso', 'El Recurso ha sido creado con éxito.');
        //return redirect('live.live', compact ('event', 'notes'))->with('msj-exitoso', 'El Recurso ha sido creado con éxito.');

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
