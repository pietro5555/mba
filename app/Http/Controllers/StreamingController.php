<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str as Str;
use GuzzleHttp\Client;
use App\Models\Streaming\User;
use Auth;

class StreamingController extends Controller{

    public function verify_user($email){
        $userStreaming = User::where('email', '=', $email)
                            ->select('id')
                            ->first();

        return $userStreaming;
    }

    public function store_user(){ 
        $usuario = new User();
        $usuario->uuid = Str::uuid();
        $usuario->name = Auth::user()->display_name;
        $usuario->email = Auth::user()->user_email;
        $usuario->username = Auth::user()->user_email;
        $usuario->password = Auth::user()->password;
        $usuario->status = 'activated';
        $usuario->save();

        dd("listo");
    }
}
