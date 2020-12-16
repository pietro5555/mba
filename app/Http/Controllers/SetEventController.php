<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Auth;


//Modelos
use App\Models\SetEvent;
use App\Models\Events;
use App\Models\Note;
use App\Models\SurveyOptions;
use App\Models\SurveyResponse;
use App\Models\EventResources;
use App\Models\OffersLive;
use App\Models\User;


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
    public function store(Request $request, $event_id = NULL)
    {
        // dd($event_id, $request->all());
        // se crea el recurso para events
        switch ($request->input('type')) {
            case 'video':
                SetEvent::create([
                    'title' => $request->input('title') ? $request->input('title') : 'null',
                    'type' => 'video',
                    'url' => $request->input('url_video'),
                    'event_id' => $request->event_id
                ]);
                $guardadas =   EventResources::where('event_id', $request->event_id)
                                    ->where('resources_id',6)
                                    ->get();
                        
                if($guardadas->isEmpty()){
                    $dataPresentation = new EventResources;
                    $dataPresentation->resources_id =6;
                    $dataPresentation->event_id = $request->event_id;
                    $dataPresentation->status = 1;
                    $dataPresentation->save();
                }
                
                event(new \App\Events\Notificacion('video', Auth::user()->ID));
                
                return response()->json(true);
                
                /*$resources_video = SetEvent::where('event_id', $request->event_id)
                                    ->where('type', 'video')
                                    ->first();
            
                return view('live.components.sections.videosSection')->with(compact('resources_video'));*/
            break;
            
            case 'file':
                if ($request->file('file')) {
                    $file = $request->file('file');
                    $name_file = 'file_'.$request->event_id.'_'.time().'.'.$file->getClientOriginalExtension();
                    $path = public_path() .'/upload/events';
                    $file->move($path,$name_file);
                    $title = $file->getClientOriginalName();
                    SetEvent::create([
                        'title' => $title,
                        'type' => 'file',
                        'url' => $name_file,
                        'event_id' => $request->event_id
                    ]);
                    $guardadas = EventResources::where('event_id', $request->event_id)
                                    ->where('resources_id',7)
                                    ->get();
                                    
                    if($guardadas->isEmpty()){
                        $dataPresentation = new EventResources;
                        $dataPresentation->resources_id = 7;
                        $dataPresentation->event_id = $request->event_id;
                        $dataPresentation->status = 1;
                        $dataPresentation->save();
                    }
                    
                    event(new \App\Events\Notificacion('file', Auth::user()->ID));

                    return response()->json(true);
                    
                    /*$files = SetEvent::where('event_id', $request->event_id)
                                ->where('type', 'file')
                                ->get();
                    $event_id = $request->event_id;
                    
                    return view('live.components.sections.filesSection')->with(compact('files', 'event_id'));*/
                }else{
                     return response()->json(false);   
                }
            break;

            case 'presentation':
                if ($request->file('presentation')) {
                    $file = $request->file('presentation');
                    $name_file = 'presentation_'.$request->event_id.'_'.time().'.'.$file->getClientOriginalExtension();
                    $path = public_path() .'/upload/events';
                    $file->move($path,$name_file);
                    $title = $file->getClientOriginalName();
                    SetEvent::create([
                        'title' => $title,
                        'type' => 'presentation',
                        'url' => $name_file,
                        'event_id' => $request->event_id
                    ]);
                    $guardadas =   EventResources::where('event_id', $request->event_id)
                                    ->where('resources_id',5)
                                    ->get();
                        
                    if($guardadas->isEmpty()){
                        $dataPresentation = new EventResources;
                        $dataPresentation->resources_id = 5;
                        $dataPresentation->event_id = $request->event_id;
                        $dataPresentation->status = 1;
                        $dataPresentation->save();
                    }
                    
                    event(new \App\Events\Notificacion('presentation', Auth::user()->ID));

                    return response()->json(true);
                    
                    /*$presentations = SetEvent::where('event_id', $request->event_id)
                                        ->where('type', 'presentation')
                                        ->get();
            
                    $event_id = $request->event_id;
                    
                    return view('live.components.sections.presentationsSection')->with(compact('presentations', 'event_id'));*/
                }else{
                    return response()->json(false);
                }
            break;

            // survey_options
            case 'survey':
                $guardadas =   EventResources::where('event_id', $request->event_id)
                                    ->where('resources_id',4)
                                    ->get();
                  if($guardadas->isEmpty()){
                       $dataSurvey = new EventResources;
                        $dataSurvey->resources_id = 4;
                        $dataSurvey->event_id = $request->event_id;
                        $dataSurvey->status = 1;
                        $dataSurvey->save();
    
                    }
                     $dataE = SetEvent::create([
                        'title' => $request->input('title') ? $request->input('title') : 'null',
                        'type' => 'survey',
                        'event_id' => $request->event_id
                    ]);
                    $question =  $request->q1;
                    $responses = explode(',', $request->input('questions'));
                    $question_save = new SurveyOptions;
                    $question_save->question =  $question;
                    $question_save->content_event_id = $dataE->id;
                    $question_save->save();
                    foreach ($responses as $response) {
                        DB::table('survey_options_response')->insert([
                            'response' => $response,
                            'survey_options_id' => $question_save->id,
                            'user_id' => Auth::user()->ID,
                            'selected' => 0,
                        ]);
                    }
                    
                     event(new \App\Events\Notificacion('survey', Auth::user()->ID));
                     
                    return response()->json(true);
            break;
                
            case 'offers':
                if ($request->file('resource')) {
                    $file = $request->file('resource');
                    $name_file = 'offer_'.$request->event_id.'_'.time().'.'.$file->getClientOriginalExtension();
                    $path = public_path() .'/upload/events';
                    $file->move($path,$name_file);

                    SetEvent::create([
                        'title' => $request->input('title') ? $request->input('title') : 'null',
                        'type' => 'oferta',
                        'url' => $name_file,
                        'event_id' => $request->event_id
                    ]);

                    OffersLive::create([
                        'title' => $request->input('title') ? $request->input('title') : 'null',
                        'price' => $request->input('price') ? $request->input('price') : 0,
                        'event_id' => $request->event_id,
                        'url_resource' => $name_file
                    ]);

                    $guardadas =   EventResources::where('event_id', $request->event_id)
                                        ->where('resources_id', '=', 8)
                                        ->get();
                    
                    if($guardadas->isEmpty()){
                        $dataPresentation = new EventResources;
                        $dataPresentation->resources_id = 8;
                        $dataPresentation->event_id = $request->event_id;
                        $dataPresentation->status = 1;
                        $dataPresentation->save();
                    }
                    
                     event(new \App\Events\Notificacion('offer', Auth::user()->ID));

                    return response()->json(true);
                    
                   /* $resources_offer = OffersLive::all()->where('event_id', $request->event_id);
            
                    return view('live.components.sections.offersSection')->with(compact('resources_offer'));*/
                }else{
                   return response()->json(false); 
                }
            break;
        }
    }
    
    public function refresh_menu($user_id, $event_id){
        $user = User::find($user_id);
        $event = Events::find($event_id);
        $menuResource = $event->getResource();
        
        return view('live.components.sections.menuSection')->with(compact('user', 'menuResource'));
        
    }
    
     public function refresh_video_section($event_id){
        $resources_video = SetEvent::where('event_id', $event_id)
                                ->where('type', 'video')
                                ->orderBy('id', 'DESC')
                                ->first();

        return view('live.components.sections.videosSection')->with(compact('resources_video'));
    }

    public function refresh_presentation_section($event_id){
        $presentations = SetEvent::where('event_id', $event_id)
                                        ->where('type', 'presentation')
                                        ->get();

        $event_id = $event_id;

        return view('live.components.sections.presentationsSection')->with(compact('presentations', 'event_id'));
    }

    public function refresh_file_section($event_id){
        $files = SetEvent::where('event_id', $event_id)
                                ->where('type', 'file')
                                ->get();

        $event_id = $event_id;

        return view('live.components.sections.filesSection')->with(compact('files', 'event_id'));
    }

    public function refresh_offer_section($event_id){
        $resources_offer = OffersLive::all()->where('event_id', $event_id);

        return view('live.components.sections.offersSection')->with(compact('resources_offer'));
    }

    public function refresh_survey_section($event_id){
        $resources_survey = SetEvent::where('event_id', $event_id)->where('type', 'survey')->with('pregunta')->get();
        
        $surveysCount = $resources_survey->count();
        $surveysUser = 0;
        if (Auth::user()->rol_id == 3){
            foreach ($resources_survey as $survey){
                $survey->user_response = SurveyResponse::where('user_id',Auth::user()->ID)->where('survey_options_id', $survey->pregunta->id)->first();
                if (!is_null($survey->user_response)){
                    $surveysUser++;
                }
            }
        }

        return view('live.components.sections.surveysSection')->with(compact('event_id', 'resources_survey', 'surveysCount', 'surveysUser'));
    }


    /**Save student response**/
    public function save_student_response(Request $request){
       foreach ( $request->row as $index => $id ) {
            $new_response = new SurveyResponse();
            $new_response->fill([
                'user_id' => Auth::user()->ID,
                'selected' => 1,
                'response' =>  $request->response[$index],
                'survey_options_id' =>  $request->survey_options_id[$index]
            ]);
            $new_response->save();
        }
        
        event(new \App\Events\Notificacion('survey', Auth::user()->ID));
        
        return response()->json(true);
    }


    /** Download file**/
    public function download_file($event_id, $file_id){
        $files = SetEvent::where('event_id', $event_id)
        ->where('id', $file_id)
        ->first();
        $path = public_path() .'/upload/events/';
        $file= $path.$files->url;
       // return dd($file);
       $headers = array(
           'Content-Type: aplication/pdf',
       );
       return response()->download($file, 'File.pdf', $headers);
    }

    /**Estadisticas de las respuestas**/
    public function survey_statistics(Request $request){
        $id = $request->get('id');
        $resources_survey = SetEvent::where('event_id', $id)->where('type', 'survey')->with('pregunta')->get();
        
        $preguntas = array();
        foreach($resources_survey as $encuesta){
            $array = array();
            $array['id'] = $encuesta->id;
            $array['question'] = $encuesta->pregunta->question;
            $opciones = SurveyResponse::where('survey_options_id', $encuesta->pregunta->id)->where('selected',0)->get();
            $array['options_count'] = $opciones->count();
            $cantOpciones = 0;
            $labels = array();
            $values = array();
            foreach ($opciones as $opcion){
                $cantOpciones++;
                $respuestas = SurveyResponse::where('survey_options_id', $encuesta->pregunta->id)->where('response', $opcion->response)->where('selected',1)->count();
                array_push($labels, $opcion->response);
                array_push($values, $respuestas);
            }
            $array['options'] = $labels;
            $array['responses'] = $values;
            array_push($preguntas, $array);
        }
        
        return response()->json($preguntas);
    }
     
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
    public function delete(Request $request){
        $recurso = SetEvent::find($request->resource_id);
        $recurso->delete();
        if ($request->resource_type == 'presentation'){
            $presentations = SetEvent::where('event_id', $recurso->event_id)
                                ->where('type', 'presentation')
                                ->get();
            
            if ($presentations->count() == 0){
                $opcionRecurso = EventResources::where('event_id', $recurso->event_id)
                                    ->where('resources_id',5)
                                    ->first();
                $opcionRecurso->delete();
            }
            
            event(new \App\Events\Notificacion('delete-presentation', Auth::user()->ID));
            
            return response()->json(true);
            
        }else if ($request->resource_type == 'file'){
            $files = SetEvent::where('event_id', $recurso->event_id)
                                ->where('type', 'file')
                                ->get();
            
            if ($files->count() == 0){
                $opcionRecurso = EventResources::where('event_id', $recurso->event_id)
                                    ->where('resources_id',7)
                                    ->first();
                $opcionRecurso->delete();
            }
            
            event(new \App\Events\Notificacion('delete-file', Auth::user()->ID));
            
            return response()->json(true);
        }
    }
}
