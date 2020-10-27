<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
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
    	$note_save = Note::create([
        	'title' => $request->title,
        	'content' => $request->content,
        	'user_id' => Auth::user()->ID
    	]);

        return redirect()->route('show.event', $event_id);
    }
}
