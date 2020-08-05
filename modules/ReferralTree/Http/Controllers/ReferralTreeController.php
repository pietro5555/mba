<?php

namespace Modules\ReferralTree\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Auth;
// llamado de los modelos
use App\Models\Rol;
use App\Models\User;
use App\Models\Settings; 
use App\Models\SettingsEstructura;
use App\Models\Avatar;
use App\Models\SettingsPunto; 

use App\Http\Controllers\IndexController;
use App\Http\Controllers\SettingController;

class ReferralTreeController extends Controller
{
    function __construct()
    {
        // TITLE
        view()->share('title', 'Árbol de referidos');
    }

    /**
     * Muestra el Inicio de Arbol 
     * 
     * 
     */
    public function index(){
       // DO MENU
        view()->share('do', collect(['name' => 'inicio', 'text' => 'Inicio']));
        //
        
        $avatares = Avatar::find(1);
        $settingPuntos = SettingsPunto::find(1);
        
        if (empty($avatares)) {
        $funciones->msjSistema('Debe Agregar Avatares a su lista', 'warning');
        return redirect()->back();
        }
        
        $settingEstructura = SettingsEstructura::find(1);
        $cantnivel = 5; //$settingEstructura->cantnivel; ahora es hasta nivel 5
        $principal = 'SI';
        $GLOBALS['cliente'] = (!empty(request()->user)) ? request()->user : 'Normal';
        
        if($GLOBALS['cliente'] == 'Normal'){
            view()->share('title', 'Árbol de referidos');
        }else{
            view()->share('title', 'Árbol de clientes');
        }
        
        if ($settingEstructura->tipoestructura == 'arbol') {
            $datos = $this->arbol(Auth::user()->ID, $cantnivel);
            $referidoBase = $datos['referidoBase'];
            $referidosAll = $datos['referidosAll'];
            $width = $this->scrollresponsive($referidosAll, $cantnivel);
            return view('referraltree::arbol')->with(compact('referidoBase', 'referidosAll', 'principal','settingPuntos','width'));
        } elseif ($settingEstructura->tipoestructura == 'matriz') {
            $datos = $this->matriz(Auth::user()->ID, $cantnivel);
            $referidoBase = $datos['referidoBase'];
            $referidosAll = $datos['referidosAll'];
            $width = $this->scrollresponsive($referidosAll, $cantnivel);
            return view('referraltree::matriz')->with(compact('referidoBase', 'referidosAll', 'principal','settingPuntos','width'));
        }else{
            if ($settingEstructura->estructuraprincipal == 1) {
                if ($settingEstructura->usuarioprincipal == 1) {
                    $datos = $this->arbol(Auth::user()->ID, $cantnivel);
                    $referidoBase = $datos['referidoBase'];
                    $referidosAll = $datos['referidosAll'];
                    $width = $this->scrollresponsive($referidosAll, $cantnivel);
                    return view('referraltree::arbol')->with(compact('referidoBase', 'referidosAll', 'principal','settingPuntos','width'));
                } else {
                    $datos = $this->matriz(Auth::user()->ID, $cantnivel);
                    $referidoBase = $datos['referidoBase'];
                    $referidosAll = $datos['referidosAll'];
                    $width = $this->scrollresponsive($referidosAll, $cantnivel);
                    return view('referraltree::matriz')->with(compact('referidoBase', 'referidosAll', 'principal','settingPuntos','width'));
                }
            } else {
                if ($settingEstructura->usuarioprincipal == 1) {
                    $datos = $this->arbol(Auth::user()->ID, $cantnivel);
                    $referidoBase = $datos['referidoBase'];
                    $referidosAll = $datos['referidosAll'];
                    $width = $this->scrollresponsive($referidosAll, $cantnivel);
                    return view('referraltree::arbol')->with(compact('referidoBase', 'referidosAll', 'principal','settingPuntos','width'));
                } else {
                    $datos = $this->matriz(Auth::user()->ID, $cantnivel);
                    $referidoBase = $datos['referidoBase'];
                    $referidosAll = $datos['referidosAll'];
                    $width = $this->scrollresponsive($referidosAll, $cantnivel);
                    return view('referraltree::matriz')->with(compact('referidoBase', 'referidosAll', 'principal','settingPuntos','width'));
                }
            }
        }
    }

    /**
     * Muesta la vista del cuando la estructura es arbol
     * 
     * @access private
     * @param int $id - id usuario, int $cantnivel - la cantidad de niveles de la estructura
     * @return array
     */
    private function arbol($id, $cantnivel)
    {
        $settingEstructura = SettingsEstructura::find(1);
            $GLOBALS['allUsers'] = [];
            $referidoBase = User::select('id', 'display_name', 'status', 'gender', 'rol_id', 'created_at', 'avatar','puntosPro','puntosRed')
                            ->where('id', '=', $id)
                            ->first();
                            
            $rol = Rol::find($referidoBase->rol_id);
            $nombre = '';
            if (!empty($rol)) {
                $nombre = $rol->name;
            }
            $referidoBase = [
                'ID' => $referidoBase->id,
                'nombre' => $referidoBase->display_name,
                'picture' => $this->imgArbol($referidoBase->status, $referidoBase->gender),
                'avatar' => $referidoBase->avatar,
                'rol' => $nombre,
                'personales' => $referidoBase->puntosPro,
                'red' => $referidoBase->puntosRed,
                'fechaingreso' => $referidoBase->created_at
            ];
            $directo = $this->getReferreds($id);
            $this->getReferredsAll($directo, 1, $cantnivel, [], 'arbol');
            
            if ($settingEstructura->tipoestructura == 'binaria') {
                $referidosAll = $GLOBALS['allUsers'];
            } else {
                $referidosAll = $this->ordenarArreglosMultiDimensiones($GLOBALS['allUsers'], 'ID', 'numero');
            }
            
            $datos = [
                'referidoBase' => $referidoBase,
                'referidosAll' => $referidosAll,
            ];
            return $datos;
    }

    /**
     * Muesta la vista del cuando la estructura es matriz
     * 
     * @access private
     * @param int $id - id usuario, int $cantnivel - la cantidad de niveles de la estructura
     * @return array
     */
    private function matriz($id, $cantnivel)
    {
        $settingEstructura = SettingsEstructura::find(1);
            $GLOBALS['allUsers'] = [];
            $referidoBase = User::select('id', 'display_name', 'status', 'gender', 'rol_id', 'created_at', 'avatar','puntosPro','puntosRed')
                            ->where('id', '=', $id)
                            ->first();
                            
            $rol = Rol::find($referidoBase->rol_id);
            $nombre = '';
            if (!empty($rol)) {
                $nombre = $rol->name;
            }
            $referidoBase = [
                'ID' => $referidoBase->id,
                'nombre' => $referidoBase->display_name,
                'picture' => $this->imgArbol($referidoBase->status, $referidoBase->gender),
                'avatar' => $referidoBase->avatar,
                'rol' => $nombre,
                'personales' => $referidoBase->puntosPro,
                'red' => $referidoBase->puntosRed,
                'fechaingreso' => $referidoBase->created_at
            ];
            $directo = $this->getSponsor($id);
            $this->getReferredsAll($directo, 1, $cantnivel, [], 'matriz');
            if ($settingEstructura->tipoestructura == 'binaria') {
                $referidosAll = $GLOBALS['allUsers'];
            } else {
                $referidosAll = $this->ordenarArreglosMultiDimensiones($GLOBALS['allUsers'], 'ID', 'numero');
            }
            $datos = [
                'referidoBase' => $referidoBase,
                'referidosAll' => $referidosAll,
            ];
            return $datos;
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
                return $a[$clave] - $b[$clave] ;
            }
            
        };
    }


    /**
     * Permite revisar las estructa de los demas usuarios
     * 
     * @access public
     * @param int $id - id del usuario a revisar
     */
    public function moretree($id){
        $GLOBALS['cliente'] = (!empty(request()->user)) ? request()->user : 'Normal';
        
        $settingPuntos = SettingsPunto::find(1);
        $settingEstructura = SettingsEstructura::find(1);
        $cantnivel = 5; //$settingEstructura->cantnivel; ahora es hasta nivel 5
        $principal = 'NO';
        if ($settingEstructura->tipoestructura == 'arbol') {
            $datos = $this->arbol($id, $cantnivel);
            $referidoBase = $datos['referidoBase'];
            $referidosAll = $datos['referidosAll'];
            $width = $this->scrollresponsive($referidosAll, $cantnivel);
            return view('referraltree::arbol')->with(compact('referidoBase', 'referidosAll', 'principal','settingPuntos','width'));
        } elseif ($settingEstructura->tipoestructura == 'matriz') {
            $datos = $this->matriz($id, $cantnivel);
            $referidoBase = $datos['referidoBase'];
            $referidosAll = $datos['referidosAll'];
            $width = $this->scrollresponsive($referidosAll, $cantnivel);
            return view('referraltree::matriz')->with(compact('referidoBase', 'referidosAll', 'principal','settingPuntos','width'));
        }else{
            if ($settingEstructura->estructuraprincipal == 1) {
                if ($settingEstructura->usuarioprincipal == 1) {
                    $datos = $this->arbol($id, $cantnivel);
                    $referidoBase = $datos['referidoBase'];
                    $referidosAll = $datos['referidosAll'];
                    $width = $this->scrollresponsive($referidosAll, $cantnivel);
                    return view('referraltree::arbol')->with(compact('referidoBase', 'referidosAll', 'principal','settingPuntos','width'));
                } else {
                    $datos = $this->matriz($id, $cantnivel);
                    $referidoBase = $datos['referidoBase'];
                    $referidosAll = $datos['referidosAll'];
                    $width = $this->scrollresponsive($referidosAll, $cantnivel);
                    return view('referraltree::matriz')->with(compact('referidoBase', 'referidosAll', 'principal','settingPuntos','width'));
                }
            } else {
                if ($settingEstructura->usuarioprincipal == 1) {
                    $datos = $this->arbol($id, $cantnivel);
                    $referidoBase = $datos['referidoBase'];
                    $referidosAll = $datos['referidosAll'];
                    $width = $this->scrollresponsive($referidosAll, $cantnivel);
                    return view('referraltree::arbol')->with(compact('referidoBase', 'referidosAll', 'principal','settingPuntos','width'));
                } else {
                    $datos = $this->matriz($id, $cantnivel);
                    $referidoBase = $datos['referidoBase'];
                    $referidosAll = $datos['referidosAll'];
                    $width = $this->scrollresponsive($referidosAll, $cantnivel);
                    return view('referraltree::matriz')->with(compact('referidoBase', 'referidosAll', 'principal','settingPuntos','width'));
                }
            }
        }
    }

    /**
     * Permite revisar las estructa de los demas usuarios
     * 
     * @access public
     * @param request $datos - informacion del fomulario
     */
    public function moretree2(Request $datos){
        $validate = $datos->validate([
            'id' => 'required|numeric'
        ]);
        if ($validate) {
            $id = $datos->id;
            $validacion = $this->miRed(Auth::user()->ID, $id);
             if($validacion){
                 
            $GLOBALS['cliente'] = (!empty(request()->user)) ? request()->user : 'Normal';
            $settingPuntos = SettingsPunto::find(1);
            $settingEstructura = SettingsEstructura::find(1);
            $cantnivel = 5; //$settingEstructura->cantnivel; ahora hasta nivel 5
            $principal = 'NO';
            if ($settingEstructura->tipoestructura == 'arbol') {
                $datos = $this->arbol($id, $cantnivel);
                $referidoBase = $datos['referidoBase'];
                $referidosAll = $datos['referidosAll'];
                $width = $this->scrollresponsive($referidosAll, $cantnivel);
                return view('referraltree::arbol')->with(compact('referidoBase', 'referidosAll', 'principal','settingPuntos','width'));
            } elseif ($settingEstructura->tipoestructura == 'matriz') {
                $datos = $this->matriz($id, $cantnivel);
                $referidoBase = $datos['referidoBase'];
                $referidosAll = $datos['referidosAll'];
                $width = $this->scrollresponsive($referidosAll, $cantnivel);
                return view('referraltree::matriz')->with(compact('referidoBase', 'referidosAll', 'principal','settingPuntos','width'));
            }else{
                if ($settingEstructura->estructuraprincipal == 1) {
                    if ($settingEstructura->usuarioprincipal == 1) {
                        $datos = $this->arbol($id, $cantnivel);
                        $referidoBase = $datos['referidoBase'];
                        $referidosAll = $datos['referidosAll'];
                        $width = $this->scrollresponsive($referidosAll, $cantnivel);
                        return view('referraltree::arbol')->with(compact('referidoBase', 'referidosAll', 'principal','settingPuntos','width'));
                    } else {
                        $datos = $this->matriz($id, $cantnivel);
                        $referidoBase = $datos['referidoBase'];
                        $referidosAll = $datos['referidosAll'];
                        $width = $this->scrollresponsive($referidosAll, $cantnivel);
                        return view('referraltree::matriz')->with(compact('referidoBase', 'referidosAll', 'principal','settingPuntos','width'));
                    }
                } else {
                    if ($settingEstructura->usuarioprincipal == 1) {
                        $datos = $this->arbol($id, $cantnivel);
                        $referidoBase = $datos['referidoBase'];
                        $referidosAll = $datos['referidosAll'];
                        $width = $this->scrollresponsive($referidosAll, $cantnivel);
                        $width = $this->scrollresponsive($referidosAll, $cantnivel);
                        return view('referraltree::arbol')->with(compact('referidoBase', 'referidosAll', 'principal','settingPuntos','width'));
                    } else {
                        $datos = $this->matriz($id, $cantnivel);
                        $referidoBase = $datos['referidoBase'];
                        $referidosAll = $datos['referidosAll'];
                        $width = $this->scrollresponsive($referidosAll, $cantnivel);
                        return view('referraltree::matriz')->with(compact('referidoBase', 'referidosAll', 'principal','settingPuntos','width'));
                    }
                }
            }
            
             }else{
                $funciones = new IndexController;
                $funciones->msjSistema('El id ingresado no pertenece a su red', 'danger');
            return redirect()->back();
            }
        }
    }
    
    
    
    
     /**
     * Permite revisar las estructa de los demas usuarios
     * 
     * @access public
     * @param request $datos - informacion del fomulario
     */
    public function genealogia($id, $tipo){
        
       
            $validacion = $this->miRed(Auth::user()->ID, $id);
             if($validacion){
                 
            $GLOBALS['cliente'] = $tipo;
            
            $settingEstructura = SettingsEstructura::find(1);
            $settingPuntos = SettingsPunto::find(1);
            $cantnivel = 5; //$settingEstructura->cantnivel; ahora hasta nivel 5
            $principal = 'NO';
            if ($settingEstructura->tipoestructura == 'arbol') {
                $datos = $this->arbol($id, $cantnivel);
                $referidoBase = $datos['referidoBase'];
                $referidosAll = $datos['referidosAll'];
                $width = $this->scrollresponsive($referidosAll, $cantnivel);
                return view('referraltree::arbol')->with(compact('referidoBase', 'referidosAll', 'principal','settingPuntos','width'));
            } elseif ($settingEstructura->tipoestructura == 'matriz') {
                $datos = $this->matriz($id, $cantnivel);
                $referidoBase = $datos['referidoBase'];
                $referidosAll = $datos['referidosAll'];
                $width = $this->scrollresponsive($referidosAll, $cantnivel);
                return view('referraltree::matriz')->with(compact('referidoBase', 'referidosAll', 'principal','settingPuntos','width'));
            }else{
                if ($settingEstructura->estructuraprincipal == 1) {
                    if ($settingEstructura->usuarioprincipal == 1) {
                        $datos = $this->arbol($id, $cantnivel);
                        $referidoBase = $datos['referidoBase'];
                        $referidosAll = $datos['referidosAll'];
                        $width = $this->scrollresponsive($referidosAll, $cantnivel);
                        return view('referraltree::arbol')->with(compact('referidoBase', 'referidosAll', 'principal','settingPuntos','width'));
                    } else {
                        $datos = $this->matriz($id, $cantnivel);
                        $referidoBase = $datos['referidoBase'];
                        $referidosAll = $datos['referidosAll'];
                        $width = $this->scrollresponsive($referidosAll, $cantnivel);
                        return view('referraltree::matriz')->with(compact('referidoBase', 'referidosAll', 'principal','settingPuntos','width'));
                    }
                } else {
                    if ($settingEstructura->usuarioprincipal == 1) {
                        $datos = $this->arbol($id, $cantnivel);
                        $referidoBase = $datos['referidoBase'];
                        $referidosAll = $datos['referidosAll'];
                        $width = $this->scrollresponsive($referidosAll, $cantnivel);
                        return view('referraltree::arbol')->with(compact('referidoBase', 'referidosAll', 'principal','settingPuntos','width'));
                    } else {
                        $datos = $this->matriz($id, $cantnivel);
                        $referidoBase = $datos['referidoBase'];
                        $referidosAll = $datos['referidosAll'];
                        $width = $this->scrollresponsive($referidosAll, $cantnivel);
                        return view('referraltree::matriz')->with(compact('referidoBase', 'referidosAll', 'principal','settingPuntos','width'));
                    }
                }
            }
            
             }else{
                $funciones = new IndexController;
                $funciones->msjSistema('El id ingresado no pertenece a su red', 'danger');
            return redirect()->back();
            }
    }

    /**
     * Función que devuelve los patrocinados de un determinado usuario
     * 
     * @access private
     * @param int $id - id del usuario 
     * @return array
     */
    private function getSponsor($user_id){
        $tmp = User::select('ID', 'user_email', 'status', 'display_name', 'gender', 'referred_id', 'sponsor_id',  'rol_id', 'created_at', 'avatar', 'position_id', 'tipouser','puntosPro','puntosRed')
        ->where([['position_id', '=', $user_id], ['tipouser', '=', $GLOBALS['cliente']]])->orderBy('ladomatriz', 'DESC')->get()->toArray();
		return $tmp;
    }
    
    /**
     * Función que devuelve los referidos de un determinado usuario
     * 
     * @access private
     * @param int $id - id del usuario 
     * @return array
     */
    private function getReferreds($user_id){
        $tmp = User::select('ID', 'user_email', 'status', 'display_name', 'gender', 'referred_id', 'sponsor_id', 'rol_id', 'created_at', 'avatar', 'position_id', 'tipouser','puntosPro','puntosRed')
        ->where([['position_id', '=', $user_id], ['tipouser', '=', $GLOBALS['cliente']]])->orderBy('ladomatriz', 'DESC')->get()->toArray();
		return $tmp;
    }
    
    /**
     * Obtienen a todo los usuarios referidos de un usuario determinado
     * 
     * @access private
     * @param array $arregloUser - listado de usuario, int $niveles - niveles a recorrer,
     * int $para - nivel a detenerse, array $allUser - todos los usuario referidos
     * @return array - listado de todos los usuario
     */
	private function getReferredsAll($arregloUser, $niveles, $para, $allUser, $tipoestructura)
    {
        $settingEstructura = SettingsEstructura::find(1);
        if ($niveles <= $para) {
            $llaves =  array_keys($arregloUser);
            $finFor = end($llaves);
            $cont = 0;
            $tmparry = [];
            $subreferido = 0;
            foreach ( $arregloUser as $user) {
                if ($tipoestructura == 'arbol') {
                    if (!empty($this->getReferreds($user['ID']))) {
                        $tmparry [] = $this->getReferreds($user['ID']);
                        $subreferido = 1;
                    }
                }else{
                    if (!empty($this->getSponsor($user['ID']))) {
                        $tmparry [] = $this->getSponsor($user['ID']);
                        $subreferido = 1;
                    }
                }
                $rol = Rol::find($user['rol_id']);
                $nombre = '';
                if (!empty($rol)) {
                    $nombre = $rol->name;
                }
                $allUser [] = $this->llenarArreglo($user, $niveles, $nombre, $subreferido);
                
                
                if ($finFor == $cont) {
                    if (!empty($tmparry)) {
                        $tmp2 = $tmparry[0];
                        for($i = 1; $i < count($tmparry); $i++){
                            $tmp2 = array_merge($tmp2,$tmparry[$i]);
                        }
                        $this->getReferredsAll($tmp2, ($niveles+1), $para, $allUser, $tipoestructura);
                    }else{
                        $GLOBALS['allUsers'] = $allUser;
                    }
                }else{
                    $cont++;
                }
          }
        }else{
            $GLOBALS['allUsers'] = $allUser;
        }
    }
    /**
     * Devuelva la informacion que va a en el arreglo
     * 
     * @access private
     * @param array $user - informacion del usuario, int $nivel - Nivel que esta el usuario, 
     *      string $rol - el rol del usuario, int $subreferido - si tiene subordinados
     * @return array
     */
    private function llenarArreglo($user, $nivel, $rol, $subreferido)
    {
        return [
            'ID' => $user['ID'],
            'nombre' => $user['display_name'],
            'picture' => $this->imgArbol($user['status'], $user['gender']),
            'avatar' => $user['avatar'],
            'subreferido' => $subreferido,
            'nivel' => $nivel,
            'idpadre' => $user['position_id'],
            'idpatrocinador' => $user['position_id'],
            'rol' => $rol,
            'personales' => $user['puntosPro'],
            'red' => $user['puntosRed'],
            'fechaingreso' => $user['created_at'],
        ];
    }
	
	 

  private function imgArbol($estado, $genero)
  {
      
      $avatares = Avatar::find(1);
      
    $picture = '';
    if ($estado == '1'){
        if ($genero == 'F'){
            $picture = $avatares->activo_mujer;
        }else{
            $picture = $avatares->activo_hombre;
        }
    }else{
        if ($genero == 'F'){
            $picture = $avatares->inactivo_mujer;
        }else{
            $picture = $avatares->inactivo_hombre;
        }
    }
    return $picture;
  }


  /**
   * Obtiene un ID de Posicionamiento Valido 
   *
   * @param integer $id - primer id a verificar
   * @param string $lado - lado de la matriz, solo para sistema binario
   * @return int
   */
  public function getPosition(int $id, $lado, $tipo)
  {
        $settingEstructura = SettingsEstructura::find(1);
        $resul = 0;
        if ($settingEstructura->tipoestructura != 'binaria') {
            // sistema normal
            $resul = 0;
            $cantPosiciones = User::where('position_id', $id)->where('tipouser',$tipo)->get()->count('ID');
            if ($settingEstructura->cantfilas > $cantPosiciones) {
                $resul = $id;
            }elseif($settingEstructura->cantfilas == 0 && $settingEstructura->tipoestructura == 'arbol'){
                $resul = $id;
            } else {
                $ids = $this->getIDs($id);
                $GLOBALS['idposicionamiento'] = 0;
                $this->verificarOtraPosition($ids, $settingEstructura->cantfilas, $tipo);
                    $resul = $GLOBALS['idposicionamiento'];
            }
        } else {
            // binario
            $ids = $this->getIDs2($id, $lado);
            if ($lado == 'I') {
                if (count($ids) == 0) {
                    $resul = $id;
                }else{
                    $this->verificarOtraPosition2($ids, $settingEstructura->cantfilas, $lado, $tipo);
                    $resul = $GLOBALS['idposicionamiento'];
                }
            }elseif($lado == 'D'){
                if (count($ids) == 0) {
                    $resul = $id;
                }else{
                    $this->verificarOtraPosition2($ids, $settingEstructura->cantfilas, $lado, $tipo);
                    $resul = $GLOBALS['idposicionamiento'];
                }
            }
        }
        return $resul;
    }

  /**
   * Buscar Alternativas al los ID Posicionamiento validos
   *
   * @param array $arregloID - arreglos de ID a Verificar
   * @param int $limitePosicion - Cantdad de posiciones disponibles
   */
  public function verificarOtraPosition($arregloID, $limitePosicion, $tipo)
  {
    $tmparry = [];
    $bandera = false;
    $llaves =  array_keys($arregloID);
    $finFor = end($llaves);
    $cont = 0;
    foreach ($arregloID as $item) {
        $cantPosiciones = User::where('position_id', $item['ID'])->where('tipouser',$tipo)->get()->count('ID');
        if ($limitePosicion > $cantPosiciones) {
            $GLOBALS['idposicionamiento'] = $item['ID'];
            break;
        } else {
            $tmparry [] = $this->getIDs($item['ID']);
            if ($finFor == $cont) {
                if (!empty($tmparry)) {
                    $tmp2 = $tmparry[0];
                    for($i = 1; $i < count($tmparry); $i++){
                        $tmp2 = array_merge($tmp2,$tmparry[$i]);
                    }
                    $this->verificarOtraPosition($tmp2, $limitePosicion, $tipo);
                }
            }else{
                $cont++;
            }
        }
    }
  }
  /**
   * Obtiene los id que seran verificados en el posicionamiento
   *
   * @param integer $id
   * @return array
   */
  public function getIDs(int $id)
  {
      return User::where('position_id', $id)->select('ID')->orderBy('ID')->get()->toArray();
  }

  /**
   * Buscar Alternativas al los ID Posicionamiento validos en binario
   *
   * @param array $arregloID - arreglos de ID a Verificar
   * @param int $limitePosicion - Cantdad de posiciones disponibles
   * @param string $lado - lado donde se insertara el referido
   */
  public function verificarOtraPosition2($arregloID, $limitePosicion, $lado, $tipo)
  {
    $tmparry = [];
    $bandera = false;
    $llaves =  array_keys($arregloID);
    $finFor = end($llaves);
    $cont = 0;
    foreach ($arregloID as $item) {
        $ids = $this->getIDs2($item['ID'], $lado);
        if ($lado == 'I') {
            if (count($ids) == 0) {
                $GLOBALS['idposicionamiento'] = $item['ID'];
                break;
            }else{
                $this->verificarOtraPosition2($ids, $limitePosicion, $lado, $tipo);
            }
        }elseif($lado == 'D'){
            if (count($ids) == 0) {
                $GLOBALS['idposicionamiento'] = $item['ID'];
                break;
            }else{
                $this->verificarOtraPosition2($ids, $limitePosicion, $lado, $tipo);
            }
        }
    }
  }
  /**
   * Obtiene los id que seran verificados en el posicionamiento
   *
   * @param integer $id
   * @param string $lado - lado donde se insertara el referido
   * @return array
   */
  public function getIDs2(int $id, string $lado)
  {
      return User::where([
         ['position_id', '=',$id],
         ['ladomatriz', '=', $lado]
      ])->select('ID')->orderBy('ID')->get()->toArray();
  }
  
  
  public function miRed($iduser, $id){
      
      $user = User::find($iduser);
      $valor = false;
      
      $index = new IndexController;
      $todousers = $index->generarArregloAdmin($iduser);
      
      foreach($todousers as $todo){
          if($todo['ID'] == $id){
              $valor = true;
          }
       }
      
      return $valor;
  }

   public function scrollresponsive($referidosAll, $niveles){
       
       $cont=0; $total =0; $celular =0; $pc =0;
       
       for($i=1;$i<=$niveles;$i++){
           foreach($referidosAll as $referidos){
               if($referidos['nivel'] == $i){
                   $cont++;
               }
           }
           
           if($cont > $total){
               $total = $cont;
               $celular = ($total * 45);
               $pc = ($total * 16);
           }
           $cont=0;
       }
       
       $width =[
           'celular' => ($celular == 0) ? 150 : $celular,
           'pc' => ($pc == 0) ? 95 : $pc,
         ];
       
       return $width;
   }

/**
   * Obtiene un ID de Posicionamiento Valido 
   *
   * @param integer $id - primer id a verificar
   * @param string $lado - lado donde se insertara el referido
   * @return int
   */
//   public function getPosition(int $id, string $lado)
//   {
//         $resul = [];
//         $settingEstructura = SettingsEstructura::find(1);
//         $ids = $this->getIDs($id, $lado);
//         $GLOBALS['idposicionamiento'] = 0;
//         $GLOBALS['ladoposicionamiento'] = '';
//         if ($lado == 'I') {
//             if (count($ids) == 0) {
//                 $resul = [
//                     'id' => $id,
//                     'lado' => $lado
//                 ];
//             }else{
//                 $this->verificarOtraPosition($ids, $settingEstructura->cantfilas);
//                 $resul = [
//                     'id' => $GLOBALS['idposicionamiento'],
//                     'lado' => $GLOBALS['ladoposicionamiento']
//                 ];
//             }
//         }elseif($lado == 'D'){
//             if (count($ids) == 0) {
//                 $resul = [
//                     'id' => $id,
//                     'lado' => $lado
//                 ];
//             }else{
//                 $this->verificarOtraPosition($ids, $settingEstructura->cantfilas);
//                 $resul = [
//                     'id' => $GLOBALS['idposicionamiento'],
//                     'lado' => $GLOBALS['ladoposicionamiento']
//                 ];
//             }
//         }
//         return $resul;     
//   }
}