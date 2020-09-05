<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Crypt; 
use DB; 
use Auth; 
use Hash;
use Carbon\Carbon; 
// modelo
use App\Models\User; 


class LoginController extends Controller
{
    
    /*login del sistema*/
    public function login(){
        
        return view('login.login');
    }
    
}