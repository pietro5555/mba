<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\User;
use App\Models\Events;
use App\Models\SetEvent;
use App\Models\OffersLive;
use App\Models\SurveyOptions;
use App\Models\SurveyResponse;
use Auth;


class NoteController extends Controller
{

	public function index()
	{
		$notes= Note::all();

		//$mentor_username= strtoupper(auth()->user()->user_nicename);


		return view('live.live', compact ('notes'));

	}
    public function store(Request $request){

        $check = Note::where('user_id', '=', Auth::user()->ID)
                    ->where('title', '=', $request->title)
                    ->first();

        if (is_null($check)){
            $note_save = Note::create([
            	'title' => $request->title,
            	'content' => $request->content,
                'user_id' => Auth::user()->ID,
                'streaming_id' => $request->event_id,
        	]);
            $notes = Note::where('user_id', '=', Auth::user()->ID)->where('streaming_id',$request->event_id)->orderBy('id', 'DESC')->get();

            return view('live.components.sections.notesSection')->with(compact('notes'));
        }else{
           return response()->json(false);
        }

    }

    public function update(Request $request){
        $check = Note::where('id', '<>', $request->note_id)
                    ->where('user_id', '=', Auth::user()->ID)
                    ->where('title', '=', $request->title)
                    ->first();

        if (is_null($check)){
            $nota = Note::find($request->note_id);
            $nota->fill($request->all());
            $nota->save();

            $notes = Note::where('user_id', '=', Auth::user()->ID)->orderBy('id', 'DESC')->get();

            return view('live.components.sections.notesSection')->with(compact('notes'));
        }else{
           return response()->json(false);
        }
    }

    public function delete($id){
        Note::destroy($id);

        $notes = Note::where('user_id', '=', Auth::user()->ID)->orderBy('id', 'DESC')->get();

        return view('live.components.sections.notesSection')->with(compact('notes'));
    }

    public function get_note_edit($id){
        $note = Note::find($id);
        return response()->json(
            $note
        );
    }

    public function edit_user_note(Request $request, $id){
        //dd($request->all());
            $data = Note::findOrFail($id);
            $data->title = $request->title;
            $data->content = $request->description;
            $data->save();
            $notes = Note::where('user_id', '=', Auth::user()->ID)->get();
            return back();
           // return view('usuario.userEdit')->with(compact('notes'));
    }

    public function delete_user_note($id){
        Note::destroy($id);

        $notes = Note::where('user_id', '=', Auth::user()->ID)->orderBy('id', 'DESC')->get();

        return view('usuario.formEdit.anotaciones')->with(compact('notes'));
    }
}
