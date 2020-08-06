<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Crypt;
use Auth; 
use DB;
use Carbon\Carbon;
// modelo
use App\Models\Rol; 
use App\Models\User; 
use App\Models\Pagos;
use App\Models\Settings; 
use App\Models\Commission;
use App\Models\Notification;
use App\Models\SettingsEstructura;

// controladores
use App\Http\Controllers\ActualizarController;
use App\Http\Controllers\IndexController;


class GestionController extends Controller
{
	function __construct()
	{
    }
    
    /**
     * Lleva a la vista para buscar a los usuarios
     *
     * @param Request $request
     * @return view
     */
    public function buscar(Request $request){
        // TITLE
      view()->share('title', 'Buscar Usuario');
      return view('gestion.buscar');
    }

    /**
     * Lleva a la vista con la informacion solicitado
     *
     * @param Request $request
     * @return view
     */
    public function vista(Request $request){
        
        $validatedData = $request->validate([
        'user_email' => 'required'
       ]);

 $funciones = new IndexController;
 
if(Auth::user()->rol_id == 0){
            $user = User::where('ID',$request->user_email)->first();
            
          if($user == null){
              $user = User::where('user_email',$request->user_email)->first();
          }
          
          if($user == null){
              $concepto ="Los datos ingresados no coinciden con nuestros registros";
               $funciones->msjSistema($concepto, 'success');
            return redirect()->back();
          }
            
}else{
    
    $informacion = new IndexController;
    $usuarios = $informacion->generarArregloUsuario(Auth::user()->ID);
   $user = null;
    
    foreach($usuarios as $usuario){
        if($usuario['ID'] ==  $request->user_email){
            $user = User::where('ID',$request->user_email)->first();
        }elseif($usuario['email'] ==  $request->user_email){
            $user = User::where('user_email',$request->user_email)->first();
        }
    }
    
     if($user == null){       
            $concepto ="Los datos ingresados no pertenecen a ningun usuario en su red";
               $funciones->msjSistema($concepto, 'success');
               return redirect('admin/gestion/buscar');
           
     }
        
}    
            
            view()->share('title', 'Resumen de la busqueda');
            return view('gestion.vista')->with('usuario',$user);
        
    }
	
	//perfil de usuario
		public function verusuario($id)
    {
        $yo =  Crypt::decrypt($id);
        $actualizar = new ActualizarController;
        $data = $actualizar->infoUsuario($yo);
        view()->share('title', 'Perfil del usuario '.$data['principal']->display_name);

        
        return view('usuario.userEdit')->with(compact('data','yo'));
    }
	
	public function gestionperfiles()
    {
        return view('gestion.gestionperfiles');
    }
    
    	public function gestion(Request $reques)
    {
        $settings = Settings::first();
          $buscar = DB::table($settings->prefijo_wp.'users')
                        ->where('user_nicename', '=', $request->user_nicename)
                        ->first();
                           
                            
            if($buscar == null){
        return redirect('admin/gestion/gestionperfiles')->with('msj2', 'El nombre Ingresado no se a encontrado');
            }
                
             if($buscar != null){   
                 $settings = Settings::first();
                  $buscar = DB::table($settings->prefijo_wp.'users')
                    ->where('user_nicename', '=', $request->user_nicename)
                    ->get();  
       
            }
             return view('gestion.encontrado')->with(compact('buscar'));
    }
    
    	public function encontrado()
    {
        return view('gestion.encontrado');
    }
    
    //ingresos de dicho usuario
    public function ingresos($id)
    {
        
        view()->share('title', 'Vista de Ingresos');
        $yo =  Crypt::decrypt($id);
 
 
  $comision = DB::table('commissions')
                            ->where('user_id', '=', $yo)
                            ->get();
 
        return view('gestion.ingresos-valor')->with(compact('comision','yo'));
    }
    
    public function ingresos_valor()
    {
       
         return view('gestion.ingresos-valor');
    }
    
    //referidos de dicho usuario
    public function referidos($id)
    {
        
        view()->share('title', 'Vista de Referidos');
        $yo =  Crypt::decrypt($id);
    
    $informacion = new IndexController;
    $referidos = $informacion->generarArregloUsuario($yo);
 
        return view('gestion.directos')->with(compact('referidos','yo'));
    }
    
    public function directos()
    {
       
         return view('gestion.directos');
    }
    
    //billetera de dicho usuario
    public function wallet($id)
    {
        
        view()->share('title', 'Vista de la Billetera');
        $yo =  Crypt::decrypt($id);
 
 
  $billetera = DB::table('walletlog')
                            ->where('iduser', '=', $yo)
                            ->get();
                            
 
        return view('gestion.billetera')->with(compact('billetera','yo'));
    }
    
    public function billetera()
    {
       
         return view('gestion.billetera');
    }
    
    //pagos de dicho usuario
    public function pago($id)
    {
        
        view()->share('title', 'Vista de Liberados');
        $yo =  Crypt::decrypt($id);
 
 
  $pago = DB::table('pagos')
                            ->where('iduser', '=', $yo)
                            ->where('estado', '=', 1)
                            ->get();
                            
 
        return view('gestion.liberado')->with(compact('pago','yo'));
    }
    
    public function liberado()
    {
       
         return view('gestion.liberado');
    }
    
    //ingresos detallados
     public function ingresos_detallado()
    {
        	view()->share('title', 'Ingresos Detallados');
       $comision = DB::table('commissions')
                            ->where('user_id', '=', Auth::user()->ID)
                            ->where('total', '!=', 0)
                            ->get();
 
        return view('gestion.ingresos-detallados')->with(compact('comision'));
         
    }
}