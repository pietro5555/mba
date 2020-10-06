<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\User;
use App\Models\Events;


class NoteController extends Controller
{

	public function index()
	{
		$notes= Note::all();

		//$mentor_username= strtoupper(auth()->user()->user_nicename);


		return view('live.live', compact ('notes'));

	}
    public function store(Request $request){
        $event_id= $request->event_id;
    	$note_save = Note::create([
    	'title' => $request->title,
    	'content' => $request->content,
    	'user_id' => auth()->user()->ID//Retorna el ID del usuario logueado
    	]);
       // return dd ($note_save);
    	return redirect()->route('show.event', $event_id);

    }
}
