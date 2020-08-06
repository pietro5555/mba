<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Crypt;
use App\Models\Settings; use App\Models\Sidebar; use App\Models\MenuAction; use App\Models\User; use App\Models\Rol; use App\Models\Notification;
use Auth; use DB; use Carbon\Carbon; use Input; use Image; use App\Models\SettingsEstructura;use App\Models\Archivo;use App\Models\Contenido;
use App\Models\Sesion;

use Brotzka\DotenvEditor\DotenvEditor;
use Brotzka\DotenvEditor\Exceptions\DotEnvException;
use App\Http\Controllers\RangoController;

class ActividadController extends Controller
{
	function __construct()
	{
        // TITLE
		view()->share('title', 'Historial Actividad');
	    Carbon::setLocale('es');
	}
	
	/**
	 * Lleva a la vista de actividades
	 *
	 * @return void
	 */
	public function actividad()
	{ 
	    $sesion = Sesion::orderBy('id','ASC')->paginate(10);
	    $settings = Settings::first();
	    $sql="SELECT c.*, wu.display_name FROM sesions c, ".$settings->prefijo_wp."users wu WHERE c.user_id=wu.ID order By  c.fecha ASC ";
        $sesion =DB::select($sql);
        return view('actividad.actividad', compact('sesion')); 
	}
	

}