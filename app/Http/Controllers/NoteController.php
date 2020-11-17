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
            	'user_id' => Auth::user()->ID
        	]);
    
            $notes = Note::where('user_id', '=', Auth::user()->ID)->orderBy('id', 'DESC')->get();
    
            return view('live.components.sections.notesSection')->with(compact('notes'));
        }else{
           return response()->json(false); 
        }
    
    }
}
