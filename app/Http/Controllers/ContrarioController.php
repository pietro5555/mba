<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Crypt;
use DB; 
use Auth; 
use Session;
use Carbon\Carbon; 
// llamada a los modelos
use App\Models\Rol; 
use App\Models\User; 
use App\Models\Wallet;
use App\Models\Monedas;
use App\Models\Settings; 
use App\Models\Contenido; 
use App\Models\Commission;
use App\Models\SettingsEstructura; 
use App\Models\Pagocarrito;
// controlador
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\WalletControler;


class ContrarioController extends Controller
{
    
    /**
     * Función que devuelve los patrocinados de un determinado usuario
     * 
     * @param int $id - id del usuario 
     * @return array
     */
    private function posicion($user_id){
        $tmp = User::select('*')->where('ID', $user_id)->get()->toArray();
		return $tmp;
    }
    
    
    /**
     * Función que devuelve los referidos de un determinado usuario
     * 
     * @param int $user_id - id del usuario
     * @return array - listado de los referidos del usuario
     */
	
	public function referido($user_id){
        $referidos = User::select('*')->where('ID', $user_id)->get()->toArray();
		return $referidos;
	}    
	
	
	/**
     * Obtienen a todo los usuarios referidos de un usuario determinado
     *
     * @param array $arregloUser - arreglo de usuarios sucio
     * @param integer $niveles - indica el nivel recorrido se empieza de 1
     * @param integer $para - nivel a para el recorrido
     * @param array $allUser - arreglo de usuario limpio
     * @param string $tipoestructura - si es arbo o matriz
     * @return array
     */
	public function getRefered($arregloUser, $niveles, $para, $allUser, $tipoestructura)
    {
        if ($niveles <= $para) {
            $llaves =  array_keys($arregloUser);
            $finFor = end($llaves);
            $cont = 0;
            $tmparry = [];
            foreach ($arregloUser as $user) {
                $allUser [] = [
                    'ID' => $user['ID'],
                    'email' => $user['user_email'],
                    'nombre' => $user['display_name'],
                    'status' => $user['status'],
                    'avatar' => $user['avatar'],
                    'nivel' => $niveles,
                    'fecha' => $user['created_at'],
                    'rol' => $user['rol_id'],
                    'wallet' => $user['wallet_amount'],
                    'tipouser' => $user['tipouser'],
                    'referred' => $user['referred_id'],
                    'lado' => $user['ladomatriz'],
                ];
                if ($tipoestructura == 'arbol') {
                    if (!empty($this->referido($user['referred_id']))) {
                        $tmparry [] = $this->referido($user['referred_id']);
                    }
                }else{
                    if (!empty($this->posicion($user['position_id']))) {
                        $tmparry [] = $this->posicion($user['position_id']);
                    }
                }
                if ($finFor == $cont) {
                    if (!empty($tmparry)) {
                        $tmp2 = $tmparry[0];
                        for($i = 1; $i < count($tmparry); $i++){
                            $tmp2 = array_merge($tmp2,$tmparry[$i]);
                        }
                        $this->getRefered($tmp2, ($niveles+1), $para, $allUser, $tipoestructura);
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
     * Devuelve el tipo de estructura con que se esta trabajando en el sistema
     * 
     * @return string
     */
    public function obtenerEstructura()
    {
        $settingEstructura = SettingsEstructura::find(1);
        $estructura = "";
        if ($settingEstructura->tipoestructura == 'arbol') {
            $estructura = "arbol";
        } elseif ($settingEstructura->tipoestructura == 'matriz') {
            $estructura = "matriz";
        }else{
            if ($settingEstructura->estructuraprincipal == 1) {
                if ($settingEstructura->usuarioprincipal == 1) {
                    $estructura = "arbol";
                } else {
                    $estructura = "matriz";
                }
            } else {
                if ($settingEstructura->usuarioprincipal == 1) {
                    $estructura = "arbol";
                } else {
                    $estructura = "matriz";
                }
            }
        }
        return  $estructura;
    }
    
    
    
    //genera la lista de referidos al reverso de abajo hacia arriba hasta el infinito para bono de inicio
    public function generarArregloRevertido($iduser)
    {
        
        $user = User::find($iduser);
        $settingEstructura = SettingsEstructura::find(1);
        $GLOBALS['allUsers'] = [];
        if ($this->obtenerEstructura() == 'arbol') {
            $referidosDirectos = $this->referido($user->referred_id);
            $this->getRefered($referidosDirectos, 1, $settingEstructura->cantnivel, [], 'arbol');
        } else {
            $referidosDirectos = $this->posicion($user->position_id);
            $this->getRefered($referidosDirectos, 1, $settingEstructura->cantnivel, [], 'matriz');
        }

        return $GLOBALS['allUsers'];
    }
    
}