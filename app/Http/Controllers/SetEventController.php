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

                $resources_video = SetEvent::where('event_id', $request->event_id)
                                    ->where('type', 'video')
                                    ->first();

                return view('live.components.sections.videosSection')->with(compact('resources_video'));
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

                    $files = SetEvent::where('event_id', $request->event_id)
                                ->where('type', 'file')
                                ->get();
                    $event_id = $request->event_id;

                    return view('live.components.sections.filesSection')->with(compact('files', 'event_id'));
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

                    $presentations = SetEvent::where('event_id', $request->event_id)
                                        ->where('type', 'presentation')
                                        ->get();

                    $event_id = $request->event_id;

                    return view('live.components.sections.presentationsSection')->with(compact('presentations', 'event_id'));
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

                    $resources_offer = OffersLive::all()->where('event_id', $request->event_id);

                    return view('live.components.sections.offersSection')->with(compact('resources_offer'));
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



    /**Save student response**/
    public function save_student_response(Request $request)
    {

        foreach ( $request->row as $index => $id ) {
            $encontrada = SurveyResponse::where('user_id',Auth::user()->ID)->where('response',$request->response[$index])->where('survey_options_id', $request->survey_options_id[$index])->where('selected', 1)->first();
            if(Empty($encontrada))
            {
                $new_response = new SurveyResponse();
                $new_response->fill([
                    'user_id' => Auth::user()->ID,
                    'selected' => 1,
                    'response' =>  $request->response[$index],
                    'survey_options_id' =>  $request->survey_options_id[$index]
                ]);
                $new_response->save();
            }
            else{

                return redirect()->route('show.event', $request->event_id)->with('msj-erroneo', 'Ya ha respondido estas preguntas');
            }

        }

            if (isset($request->subdomain)){
                return redirect("https://streaming.mybusinessacademypro.com/transmission/".$request->event_id."/".Auth::user()->ID)->with('msj-exitoso', 'Respuesta guardada con éxito.');
            }else{
                return redirect()->route('show.event', $request->event_id)->with('msj-exitoso', 'Respuesta guardada con éxito.');
            }

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /** Download file**/
    public function download_file($event_id, $file_id)
    {
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
     public function survey_statistics(Request $request)
     {
       $id = $request->get('id');
       $resources_survey = SetEvent::where('event_id', $id)->where('type', 'survey')->with('pregunta')->get();
      // return dd ($resources_survey);
      error_log($resources_survey);
       foreach($resources_survey  as $encuesta)
       {
         $respondidas = SurveyResponse::where('survey_options_id', $encuesta->id)->get();
         error_log($respondidas);
           // foreach($encuesta->pregunta->responses->where('survey_options_id', $encuesta->id)  as $respuesta)
           // {

              //$statistics = SurveyResponse::where('survey_options_id', $respuesta->id)->where('selected', 1)->get();
               // error_log($statistics);
            //}
           // return dd ($resources_survey);

            return response(json_encode($respondidas),200)->header('Content-type', 'text/plain');
       }
     }

     /**Estadisticas de las respuestas**/
     /*public function survey_statistics(Request $request)
     {
         $id = $request->get('id');

         //Find the question resources
         $resources_survey = SetEvent::where('event_id', $id)->where('type', 'survey')->with('pregunta')->get();

         $questions = [];
         foreach($resources_survey as $resource)
         {
                 //Find questions with its responses
                 $responses = SurveyOptions::where('id', $resource->pregunta->id)->with('responses')->first();
                 $questions[] = $responses->responses->where('selected',1)->first();

         }
         return response()->json(
                             $questions,
                             200,
                             [
                                 'Content-type' =>'text/plain'
                             ]
                             );
     }*/

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

            $event_id = $recurso->event_id;

            return view('live.components.sections.presentationsSection')->with(compact('presentations', 'event_id'));

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

            $event_id = $recurso->event_id;

            return view('live.components.sections.filesSection')->with(compact('files', 'event_id'));
        }
    }
}
