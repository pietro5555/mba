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
    	
    	Note::create([
    	'title' => $request->title,
    	'content' => $request->content,
    	'user_id' => auth()->user()->ID//Retorna el ID del usuario logueado
    	]);
    	
    	return redirect()->route('anotaciones');
    	
    }
}
