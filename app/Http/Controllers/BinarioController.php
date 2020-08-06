<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Auth; use DB;
use Carbon\Carbon;
// modelo
use App\Models\User;
use App\Models\Rol;
use App\Models\Binario;
use App\Models\Bonoinicio;
use App\Models\Semiautobinario;
use App\Models\Settings;
use App\Models\SettingsEstructura;
use App\Models\SettingsComision;
// controladores
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ComisionesController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ActivacionController;
use App\Http\Controllers\PuntosController;

class BinarioController extends Controller
{
    
     /**
     * pagamos binario todos los dias a partir de las 12:00 PM
     * 
     * @access public
     * @return view
     */
    public function BonoBinario(){
        
        $binario = Binario::find(1);
              if(!empty($binario->pata)){
        if($binario->pata == 'corta'){ 
              $this->patacorta();
        }else{
            $this->patalarga();
        }
              }
        
    }
    
    /**
     * se paga el binario por la pata mas corta 
     * todos los dias a partir de las 12:00 PM
     * 
     * @access public
     * @return view
     */
    public function patacorta(){
        
        $binario = Binario::find(1);
              if(!empty($binario->binario)){
        
        $comision = new ComisionesController;
        $wallet = new WalletController;
        $pun = new PuntosController;
        
        $fecha = Carbon::now();
        $fechactual = Carbon::now();
        $fechactual = date('Y-m-d', strtotime($fechactual));
        $string =  $fecha->format('g:i A');
        
        $settings = Settings::first();
       
        if($string >= '12:00 PM'){
           
           $usuarios = User::orderBy('ID','ASC')->where('rol_id','!=','0')->get();
           foreach($usuarios as $usuario){
               if($usuario->binario < $fechactual){
                    
                $user = User::find($usuario->ID);
               $user->binario = $fechactual;
               
               
               $izquierda =0; $derecha =0; $total =0;
             
           $concepto ='Bono binario del usuario '.$usuario->display_name;
              
           if($usuario->debiDer < $usuario->debiIzq){
               if($usuario->debiDer > 0){
                 $total = ($usuario->debiDer * $binario->binario); 
                 if($binario->autobinario == 1){
           $comision->guardarComision($usuario->ID, 15, $total, $usuario->user_email, 0, $concepto, 'bono');
           
           $pun->debitarPuntos($usuario->ID, 'D', $user->debiDer);
           $user->debiDer = 0;
           $user->save();
                 }else{
                     $this->semi_automatico($usuario->ID, 15, $total, $usuario->user_email, 'D');
                     $pun->debitarPuntos($usuario->ID, 'D', $user->debiDer);
                     $user->debiDer = 0;
                     $user->save();
                 }
               }
           }elseif($usuario->debiIzq < $usuario->debiDer){
               if($usuario->debiIzq > 0){
                   $total = ($usuario->debiIzq * $binario->binario);
                   if($binario->autobinario == 1){
           $comision->guardarComision($usuario->ID, 15, $total, $usuario->user_email, 0, $concepto, 'bono');
           
           $pun->debitarPuntos($usuario->ID, 'I', $user->debiIzq);
           $user->debiIzq = 0;
           $user->save();
                 }else{
                     $this->semi_automatico($usuario->ID, 15, $total, $usuario->user_email, 'I');
                     $pun->debitarPuntos($usuario->ID, 'I', $user->debiIzq);
                     $user->debiIzq = 0;
                     $user->save();
                    }
                 }
               }
             }
           }
          }
           
        }
    }
    
    
     /**
     * se paga el binario por la pata mas larga 
     * todos los dias a partir de las 12:00 PM
     * 
     * @access public
     * @return view
     */
    public function patalarga(){
     
     $binario = Binario::find(1);
              if(!empty($binario->binario)){
                  
         $comision = new ComisionesController;
         $wallet = new WalletController;
         $pun = new PuntosController;
        
        $fecha = Carbon::now();
        $fechactual = Carbon::now();
        $fechactual = date('Y-m-d', strtotime($fechactual));
        $string =  $fecha->format('g:i A');
        
        $settings = Settings::first();
       
        if($string >= '12:00 PM'){
           
           $usuarios = User::orderBy('ID','ASC')->where('rol_id','!=','0')->get();
           foreach($usuarios as $usuario){
               if($usuario->binario > $fechactual){
                    
                $user = User::find($usuario->ID);
               $user->binario = $fechactual;
               
               
               $izquierda =0; $derecha =0; $total =0;
             
           $concepto ='Bono binario del usuario '.$usuario->display_name;
              
           if($usuario->debiDer < $usuario->debiIzq){
               if($usuario->debiDer > 0){
                 $total = ($usuario->debiDer * $binario->binario); 
                 if($binario->autobinario == 1){
           $comision->guardarComision($usuario->ID, 15, $total, $usuario->user_email, 0, $concepto, 'bono');
           
           $pun->debitarPuntos($usuario->ID, 'D', $user->debiDer);
           $user->debiDer = 0;
           $user->save();
                 }else{
                     $this->semi_automatico($usuario->ID, 15, $total, $usuario->user_email, 'D');
                     $pun->debitarPuntos($usuario->ID, 'D', $user->debiDer);
                     $user->debiDer = 0;
                     $user->save();
                 }
               }
           }elseif($usuario->debiIzq > $usuario->debiDer){
               if($usuario->debiIzq > 0){
                   $total = ($usuario->debiIzq * $binario->binario);
                   if($binario->autobinario == 1){
           $comision->guardarComision($usuario->ID, 15, $total, $usuario->user_email, 0, $concepto, 'bono');
           
           $pun->debitarPuntos($usuario->ID, 'I', $user->debiIzq);
           $user->debiIzq = 0;
           $user->save();
                 }else{
                     $this->semi_automatico($usuario->ID, 15, $total, $usuario->user_email, 'I');
                     $pun->debitarPuntos($usuario->ID, 'I', $user->debiIzq);
                     $user->debiIzq = 0;
                     $user->save();
                    }
                 }
               }
             }
           }
          }
           
        }
        
    }
    
    
    
    //se guarda el bono binario si es semi automatico
    public function semi_automatico($iduser, $numero, $total, $email, $lado){
        
        $user = User::find($iduser);
        $binario = new Semiautobinario();
  		$binario->iduser = $iduser;
  		$binario->usuario = $user->display_name;
  		$binario->idcomision = $numero;
  		$binario->correo = $email;
        $binario->total = $total;
        $binario->status = 0;
        $binario->lado = $lado;
        $binario->save();
    }
    
    
    //lista de bono binario
     public function ver(){
        // TITLE
		view()->share('title', 'Lista de Bono Binario');
	
         $binarios = Semiautobinario::all();
         
          return view('binario.verbinario')->with(compact('binarios'));
     }
     
     //aceptamos el bono binario
     public function aceptar($id){
         
         $binario = Semiautobinario::find($id);
         $binario->status = 1;
         $binario->save();
         
         $concepto= 'Bono Binario del usuario '.$binario->usuario;
         
         $comision = new ComisionesController;
         $admin = new AdminController;
         $comision->guardarComision($binario->iduser, $binario->idcomision, $binario->total, $binario->correo, 0, $concepto, 'bono');
         
         
         $funciones = new IndexController;
         $funciones->msjSistema('Aceptado con exito', 'success');
            return redirect('admin/binario/verbinario');
     }
     
     
     public function cancelar($id){
         $binario = Semiautobinario::find($id);
         $binario->status = 2;
         $binario->save();
         
        $funciones = new IndexController;
         $funciones->msjSistema('Cancelado con exito', 'success');
            return redirect('admin/binario/verbinario');
     }
     
     //aceptar todos los bonos binarios sin aprobar
     public function aceptar_todo(){
         $binario = Semiautobinario::where('status', '0')->get();
         
         foreach($binario as $binari){
             
             $status = Semiautobinario::find($binari->id);
             $status->status = 1;
             $status->save();
             
             $concepto= 'Bono Binario del usuario '.$binari->usuario;
         
         $comision = new ComisionesController;
         $admin = new AdminController;
         $comision->guardarComision($binari->iduser, $binari->idcomision, $binari->total, $binari->correo, 0, $concepto, 'bono');
         
         }
         
         $funciones = new IndexController;
         $funciones->msjSistema('Aprobados con exito', 'success');
            return redirect('admin/binario/verbinario');
     }
     
     
     //filtros por fecha de bono binario
     public function filtro_fechas(Request $request){
         
         view()->share('title', 'Lista de Bono Binario');
         
         $binarios = Semiautobinario::whereDate("created_at",">=",$request->fecha1)
             ->whereDate("created_at","<=",$request->fecha2)
             ->get(); 
            
         return view('binario.verbinario')->with(compact('binarios'));
     }
     
     
     //filtro por nombre del bono binario
     public function usuario(Request $request){
         
          view()->share('title', 'Lista de Bono Binario');
         
         $binarios = Semiautobinario::where('usuario', $request->nombre)
             ->get(); 
            
         return view('binario.verbinario')->with(compact('binarios'));
     }
     
     
     
     
     //empieza bono de inicio
       //lista de bono inicio
     public function verinicio(){
        // TITLE
		view()->share('title', 'Lista de Bono de Inicio');
	
         $inicio = Bonoinicio::all();
         
          return view('binario.verinicio')->with(compact('inicio'));
     }
     
     //aceptamos el bono inicio
     public function aceptar_inicio($id){
         
         $binario = Binario::find(1);
         $inicio = Bonoinicio::find($id);
         $inicio->status = 1;
         $inicio->save();
         
         $user = User::find($inicio->iduser);
         
         $concepto= 'Bono de Inicio del usuario '.$inicio->usuario;
         
         $comision = new ComisionesController;
         $comision->guardarComision($inicio->iduser, $inicio->idcomision, $inicio->total, $inicio->correo, 0, $concepto, 'bono');
         
         
         $this->asignar_puntos($user->ID, $user->ladomatriz, $binario->puntos_inicio);
         
         $funciones = new IndexController;
         $funciones->msjSistema('Aceptado con exito', 'success');
            return redirect('admin/binario/verinicio');
     }
     
     
     public function cancelar_inicio($id){
         $inicio = Bonoinicio::find($id);
         $inicio->status = 2;
         $inicio->save();
         
        $funciones = new IndexController;
         $funciones->msjSistema('Cancelado con exito', 'success');
            return redirect('admin/binario/verinicio');
     }
     
     //aceptar todos los bonos de inicio sin aprobar
     public function aceptar_todo_inicio(){
         
         $inicio = Bonoinicio::where('status', '0')->get();
         $binario = Binario::find(1);
         
         foreach($inicio as $ini){

             $bin = Bonoinicio::find($ini->id);
             $bin->status = 1;
             $bin->save();
             
             $user = User::find($ini->iduser);
             
             $concepto= 'Bono de Inicio del usuario '.$ini->usuario;
             
         
         $comision = new ComisionesController;
         $comision->guardarComision($ini->iduser, $ini->idcomision, $ini->total, $ini->correo, 0, $concepto, 'bono');
         
         $this->asignar_puntos($user->ID, $user->ladomatriz, $binario->puntos_inicio);
           
         }
         
         $funciones = new IndexController;
         $funciones->msjSistema('Aprobados con exito', 'success');
            return redirect('admin/binario/verinicio');
     }
     
     
     //pagar puntos a la red del bono de inicio
     public function asignar_puntos($iduser, $ladomatriz, $bono_puntos){
         
         $origen = User::find($iduser);
         $pun = new PuntosController;
         $index = new indexController;
         $cont =0; $ultimo = null; $cont2 =0; 
         
            $usuarios = $index->generarArregloReversa($iduser);
         
         foreach($usuarios as $usuario){
             
              $user = User::find($usuario['ID']);
              
              $cont++;
              
              if($cont >= 1){
                  $lado = $ladomatriz;
                  if($ultimo != null){
                      $lado = $ultimo;
                  }
              }
             
               
               
                $concepto='Bono de inicio del usuario '.$origen->display_name.' lado al cual se asignaron '.$lado;
             
             if($bono_puntos > 0){
            $puntos = [
                'iduser' => $user->ID,
                'usuario' => $user->display_name,
                'concepto' => $concepto,
                'puntos' => $bono_puntos,
                'lado' => $lado,
                ];
            $pun->puntosAlmacen($puntos);
            $pun->ladoDI($puntos);
           
          

            }
            
           
             $ultimo = $user->ladomatriz;
            
         }
     }
     
     
     
     //filtros por fecha de bono de inicio
     public function filtro_fechas_inicio(Request $request){
         
         view()->share('title', 'Lista de Bono de Inicio');
         
         $inicio = Bonoinicio::whereDate("created_at",">=",$request->fecha1)
             ->whereDate("created_at","<=",$request->fecha2)
             ->get(); 
            
         return view('binario.verinicio')->with(compact('inicio'));
     }
     
     
     //filtro por nombre del bono de inicio
     public function usuario_inicio(Request $request){
         
          view()->share('title', 'Lista de Bono de Inicio');
         
         $inicio = Bonoinicio::where('usuario', $request->nombre)
             ->get(); 
            
         return view('binario.verinicio')->with(compact('inicio'));
     }
     
     
     
     
     
     public function confi(){
         
         view()->share('title', 'Configuracion Binario');
         
            $binario = Binario::find(1);
              
             return view('binario.configuracion',compact('binario'));
        
     }
     
     public function save(Request $request){
         
         $binario = Binario::find(1);
         $settingEstructura = SettingsEstructura::find(1);
         if ($settingEstructura->tipoestructura == 'binaria') {
         
         if(!empty($binario)){
             
             Binario::where('id', '1')->update([
				'binario' => ($request->binario / 100),
				'pata' => $request->pata,
				'autobinario' => $request->automatico,
			]);
         }else{
             Binario::create([
				'binario' => ($request->binario / 100),
				'pata' => $request->pata,
				'autobinario' => $request->automatico,
			]);
            }
            
             $funciones = new IndexController;
             $funciones->msjSistema('Habilitado con exito', 'success');
            return redirect()->back();
         }else{
             
             $funciones = new IndexController;
         $funciones->msjSistema('para habilitar esta opcion la estructura debe ser binario', 'warning');
            return redirect()->back();
         }
     }
     
     
     public function save_iniciado(Request $request){
         
          $binario = Binario::find(1);
         $settingEstructura = SettingsEstructura::find(1);
         if ($settingEstructura->tipoestructura == 'binaria') {
         
         $valores = $this->porcentajes($request);
        
         if(!empty($binario)){
           Binario::where('id', '1')->update([
				'inicio' => $valores,
				'tipo' => $request->tipo,
				'auto' => $request->automatico,
				'puntos_inicio' => $request->puntos,
			]);
         }else{
             Binario::create([
				'inicio' => $valores,
				'tipo' => $request->tipo,
				'auto' => $request->automatico,
				'puntos_inicio' => $request->puntos,
			]);
          }
          
           $funciones = new IndexController;
             $funciones->msjSistema('Habilitado con exito', 'success');
            return redirect()->back();
           
         }else{
             
             $funciones = new IndexController;
         $funciones->msjSistema('para habilitar esta opcion la estructura debe ser binario', 'warning');
            return redirect()->back();
         }
     }
     
     public function porcentajes($datos){
         $valores='';
         if($datos['tipo'] == 'porcentaje'){
             $valores= ($datos['inicio'] / 100);
         }else{
             $valores= ($datos['inicio']);
         }
         
         return $valores;
     }
     
     
     public function save_patrocinador(Request $request){
         $binario = Binario::find(1);
         $settingEstructura = SettingsEstructura::find(1);
         if ($settingEstructura->tipoestructura == 'binaria') {
        
         if(!empty($binario)){
           Binario::where('id', '1')->update([
				'patrocinador' => $request->patrocinador,
			]);
         }else{
             Binario::create([
				'patrocinador' => $request->patrocinador,
			]);
          }
          
           $funciones = new IndexController;
             $funciones->msjSistema('Habilitado con exito', 'success');
            return redirect()->back();
           
         }else{
             
             $funciones = new IndexController;
         $funciones->msjSistema('para habilitar esta opcion la estructura debe ser binario', 'warning');
            return redirect()->back();
         }
     }
     
     
     
     //bono de inicio solo para binario
    public function bono_inicio($iduser, $concepto){
        
        $activacion = new ActivacionController;
        $user = User::find($iduser);
        $binario = Binario::find(1);
        
              if(!empty($binario->inicio)){
                  if($binario->tipo != 'porcentaje'){
        
        $this->automatisacion($iduser, $binario->inicio, $user->ladomatriz, $concepto);
        
              }else{
                  
        $totalPrecioProducto = $activacion->primeraCompra($iduser);
        
        if($totalPrecioProducto > 0){
        $total = ($totalPrecioProducto * $binario->inicio);
       
        $this->automatisacion($iduser, $total, $user->ladomatriz, $concepto);
             }
           }
        }
    }
    
    
    public function automatisacion($iduser, $inicio, $lado, $concepto){
        
        $binario = Binario::find(1);
        $user = User::find($iduser);
        
        if($binario->auto == 'semi'){
            
            if($inicio > 0){
            $pago = [
                'iduser' => $iduser,
                'usuario' => $user->display_name,
                'concepto' => $concepto,
                'puntos' => $inicio,
                'lado' => $lado,
                ];
                
            $puntos = new PuntosController;    
            $puntos->puntosAlmacen($pago);
            $puntos->ladoDI($pago);
            
        $bonoinicio = new Bonoinicio();
  		$bonoinicio->iduser = $iduser;
  		$bonoinicio->usuario = $user->display_name;
  		$bonoinicio->idcomision = 15;
        $bonoinicio->total = $inicio;
        $bonoinicio->correo = $user->user_email;
  		$bonoinicio->status = 0;
        $bonoinicio->save();
            
            }
            
        }else{
         
         $funcionescomisiones = new ComisionesController;
         $funcionescomisiones->guardarComision($iduser, 15, $inicio, $email, 0, $concepto, 'bono');
         
         $this->pagar_puntos($iduser, $binario->puntos_inicio, $lado);
            
            if($inicio > 0){
            $pago = [
                'iduser' => $iduser,
                'usuario' => $user->display_name,
                'concepto' => $concepto,
                'puntos' => $inicio,
                'lado' => $lado,
                ];
                
            $puntos = new PuntosController;    
            $puntos->puntosAlmacen($pago);
            $puntos->ladoDI($pago);
            }
        }
    }
    
    
    //verificamos que le bono de inicio tenga puntos a repartir desde abajo hacia arriba y dependiendo del lado se reparten los puntos
    public function pagar_puntos($iduser, $puntos_inicio, $lado){
        
         $origen = User::find($iduser);
         $pun = new PuntosController;
         $index = new indexController;
         
            $usuarios = $index->generarArregloReversa($iduser);
         
         foreach($usuarios as $usuario){
             $user = User::find($usuario['ID']);
             $concepto='Bono de inicio del usuario '.$origen->display_name;
             
             if($puntos_inicio > 0){
            $puntos = [
                'iduser' => $user->ID,
                'usuario' => $user->display_name,
                'concepto' => $concepto,
                'puntos' => $puntos_inicio,
                'lado' => $lado,
                ];
                
            $pun->puntosAlmacen($puntos);
            
            }
         }
        
    }
}