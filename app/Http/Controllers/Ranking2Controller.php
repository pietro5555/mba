<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Crypt;
use DB; 
use Auth; 
use Carbon\Carbon; 

// llamada de los modelos
use App\Models\Rol; 
use App\Models\User; 
use App\Models\Settings; 
use App\Models\Commission;
use App\Models\Notification;
use App\Models\SettingsEstructura;
// llamada de los controladores
use App\Http\Controllers\IndexController;


class Ranking2Controller extends Controller
{
   	function ranking()
	{
        // TITLE
		view()->share('title', 'Ranking');
		
		 $informacion = new IndexController;
		 
		 $rankingComisiones = $informacion->rankingComisiones2();
		 
		  return view('admin.ranking')->with(compact('rankingComisiones'));
	}

}
