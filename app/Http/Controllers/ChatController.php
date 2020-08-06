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

// llamado a los modelos
use App\Models\Rol;
use App\Models\User; 
use App\Models\Chat; 
use App\Models\Codigo; 
use App\Models\Push;
use App\Models\Wallet; 
use App\Models\Settings; 
use App\Models\SettingsEstructura;

// llamado a los controlladores
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ContrarioController;

class ChatController extends Controller
{
	
	/*
	*vista principal del chat privado
	*/
    public function chat()
    {
        	view()->share('title', 'Chat');
        	
        	$visualizar=0; $chats='';
        	$ruta = $this->ruta();
        	$listados = $this->listaprivada(Auth::user()->ID);
        	
        	$listas = $this->ordenarArreglosMultiDimensiones($listados, 'mensaje', 'numero');
        	
        	return view('chat.chat', compact('listas','visualizar','chats','ruta'));  
    }
    
    
    /*
	*lista de usuario aquien le puede escribir del chat privado
	* esta lista se agregan los usuarios desde abajo y luego los de arriba
	* dependiendo el usaurio segun la red
	*/
    public function listaprivada($iduser){
        $datos = [];
        
        $informacion = new IndexController;
        $contrario = new ContrarioController;
        
       $todos = $informacion->generarArregloUsuario($iduser);
       $contras = $contrario->generarArregloRevertido($iduser);
       foreach($todos as $todo){
           
           $mensajes =0;
           $mensajes = Chat::where([['origen', $todo['ID']], ['destino', $iduser], ['status', '=', 0]])
           ->count('ID');
           
           array_push($datos, [
            'ID' => $todo['ID'],
            'usuario' => $todo['nombre'],
            'avatar' => $todo['avatar'],
            'mensaje' => $mensajes,
          ]);
       }
       
       foreach($contras as $contra){
           
           $mensajes =0;
           $mensajes = Chat::where([['origen', $contra['ID']], ['destino', $iduser], ['status', '=', 0]])
           ->count('ID');
           
           array_push($datos, [
            'ID' => $contra['ID'],
            'usuario' => $contra['nombre'],
            'avatar' => $contra['avatar'],
            'mensaje' => $mensajes,
          ]);
       }
       
       return $datos;
    }
    
    
    /*
	*vista principal del chat privado cuando se selecciona a un usuario
	*/
    public function privado($id){
        
        view()->share('title', 'Chat Privado');
        	
        $ruta = $this->ruta();	
        $mensajeria = DB::table('chats')->where([['origen', $id], ['destino', Auth::user()->ID], ['status', '=', 0]])->get();
                    
            foreach($mensajeria as $mensajeri){
                DB::table('chats')->where('id', '=', $mensajeri->id)
                    ->update([
                    'status' => '1', 
                    ]);
            }
            
            $chats = DB::table('chats')->where([['origen', $id], ['destino', Auth::user()->ID]])->orWhere([['origen', Auth::user()->ID], ['destino', $id]])->orderBy('id','DESC')->get()->take(20);
                           
        	$visualizar=$id;
        	$listados = $this->listaprivada(Auth::user()->ID);
        	
        	$listas = $this->ordenarArreglosMultiDimensiones($listados, 'mensaje', 'numero');
        	
        	
        	return view('chat.chat', compact('listas','visualizar','chats','ruta')); 
        	
    }
    
    
    public function buscador(Request $request){
        
        $listas = [];
        $buscador = User::where("display_name",'like',$request->texto."%")->take(10)->get();
                    
                    foreach($buscador as $buscar){
                        
            $mensajes = Chat::where([['origen', $buscar->ID], ['destino', Auth::user()->ID], ['status', '=', 0]])
           ->count('ID');            
                        
                         array_push($listas, [
            'ID' => $buscar->ID,
            'usuario' => $buscar->display_name,
            'avatar' => $buscar->avatar,
            'mensaje' => $mensajes,
          ]);
                    }
       
       return view('nombres.paginas',compact('listas')); 
    }
    
    /*
	*guardar mensaje del chat privado
	*/
    public function guardarprivado(Request $request){
        
   $chat = new Chat();
   $chat->contenido = $request->mensaje;
   $chat->origen = Auth::user()->ID;
   $chat->destino = $request->destino;
   $chat->save();
   
   $pus = Push::where('titulo', 'Chat')->where('status', '0')->where('iduser', Auth::user()->ID)->first();
         if($pus == null){
         $push = new Push();
		 $push->titulo='Chat';
		 $push->body='Nuevos mensajes de un chat privado';
         $push->iduser = $request->destino;
         $push->save();
         }
   
   return redirect('admin/chat/privado/'.$request->destino);
   
    }
    
    //ruta para el buscador
    public function ruta(){
        
        
        $ruta = request()->root();
        
        return $ruta;
    }
    
    
    
    /*
	*vista principal del chat publico
	*/
	public function publico(){
	    
	    	view()->share('title', 'Chat Publico');
        	
        	$visualizar = ''; $listas=''; $chats=''; $mostrar = 0;
        	
        	if(Auth::user()->rol_id == 0){
        	  $mostrar = 1;
        	 $informacion = new IndexController;    
        
        	$almacen = $this->almacenarcodigo();
        	
        	$listas = $this->ordenarArreglosMultiDimensiones($almacen, 'mensaje', 'numero');
        	}else{
        	    $visualizar = Auth::user()->status;
        	    $chats = DB::table('chats')->where([['codigo', Auth::user()->status]])->orderBy('id','DESC')->get()->take(20);
        	    
        	  $mensajeria = DB::table('chat_codigo')->where([['codigo', Auth::user()->status], ['status', '0'], ['usuario_id', Auth::user()->ID]])->get();
                    
            foreach($mensajeria as $mensajeri){
                DB::table('chat_codigo')->where('id', '=', $mensajeri->id)
                    ->update([
                    'status' => '1', 
                    ]);
                }
        	}
        	
        	
        	
        	return view('chat.publico', compact('listas','visualizar','mostrar','chats'));
	}
	
	
	public function almacenarcodigo(){
	    
	     $datos = [];
	     
	     for($i=0;$i<=1;$i++){
           if($i == 1){
           
           $mensajes =0;
           $mensajes = Codigo::where([['codigo', $i], ['status', '=', 0], ['usuario_id', '1']])
           ->count('ID');
          
           array_push($datos, [
            'nombre' => 'Chat Activos',
            'codigo' => 1,
            'mensaje' => $mensajes,
          ]);
          }else{
              
              
              $mensajes =0;
           $mensajes = Codigo::where([['codigo', $i], ['status', '=', 0], ['usuario_id', '1']])
           ->count('ID');
          
           array_push($datos, [
            'nombre' => 'Chat Inactivos',
            'codigo' => 0,
            'mensaje' => $mensajes,
          ]);
          }
       }
       
       return $datos;
	}
	
	
	public function publicoadmin($id){
        
        view()->share('title', 'Chat Publico');
        
        $informacion = new IndexController;   
        	
        $mensajeria = DB::table('chat_codigo')->where([['codigo', $id], ['status', '0'], ['usuario_id', Auth::user()->ID]])->get();
                    
            foreach($mensajeria as $mensajeri){
                DB::table('chat_codigo')->where('id', '=', $mensajeri->id)
                    ->update([
                    'status' => '1', 
                    ]);
            }
            
            $chats = DB::table('chats')->where('codigo', $id)->orderBy('id','DESC')->get()->take(20);
                           
        	$visualizar=$id;
        	$mostrar = 1;
        	
        	$almacen = $this->almacenarcodigo();
        	
        	$listas = $this->ordenarArreglosMultiDimensiones($almacen, 'mensaje', 'numero');
        	
        	
        	return view('chat.publico', compact('listas','visualizar','mostrar','chats')); 
        	
    }
    
    
    /*
	*guardar mensaje del chat publico
	*/
    public function guardarpublico(Request $request){
        
        $usuarios = User::where('status',$request->destino)->where('ID', '!=', Auth::user()->ID)->get();
        
        //se guarda a cada usuario que tiene ese codigo
        //para avisarle que se comento
        foreach($usuarios as $usuario){
        
        $cod = new Codigo();
        $cod->usuario_id = $usuario->ID;    
        $cod->status = 0;
        $cod->codigo = $request->destino;
        $cod->save();
        
        $pus = Push::where('titulo', 'Chat_Publico')->where('status', '0')->where('iduser', Auth::user()->ID)->first();
         if($pus == null){
         $push = new Push();
		 $push->titulo='Chat Publico';
		 $push->body='Nuevos mensajes del chat publico';
         $push->iduser = $usuario->ID;
         $push->save();
         }
        
        }
        
   $chat = new Chat();
   $chat->contenido = $request->mensaje;
   $chat->origen = Auth::user()->ID;
   $chat->codigo = $request->destino;
   $chat->save();
   
   if(Auth::user()->rol_id != 0){
        $codi = new Codigo();
        $codi->usuario_id = 1;    
        $codi->status = 0;
        $codi->codigo = $request->destino;
        $codi->save();
   }
   
   return redirect()->back();
   
    }
    
       /**
     * Permite ordenar el arreglo primario con las claves de los arreglos segundarios
     * 
     * @access public
     * @param array $arreglo - el arreglo que se va a ordenar, string $clave - con que se hara la comparecion de ordenamiento,
     * stridn $forma - es si es cadena o numero
     * @return array
     */
    public function ordenarArreglosMultiDimensiones($arreglo, $clave, $forma)
    {
        usort($arreglo, $this->build_sorter($clave, $forma));
        return $arreglo;
        
    }
 
    /**
     * compara las clave del arreglo
     * 
     * @access private
     * @param string $clave - llave o clave del arreglo segundario a comparar
     * @return string
     */
    private function build_sorter($clave, $forma) {
        return function ($a, $b) use ($clave, $forma) {
            if ($forma == 'cadena') {
                return strnatcmp($a[$clave], $b[$clave]);
            } else {
                return $b[$clave] - $a[$clave] ;
            }
            
        };
    }

}