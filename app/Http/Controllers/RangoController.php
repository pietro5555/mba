<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Mail;
use Auth; 
use DB; 
use Date; 
use Carbon\Carbon; 
// modelos
use App\Models\Rol; 
use App\Models\User; 
use App\Models\Settings;
use App\Models\Commission; 
use App\Models\SettingsRol; 
use App\Models\SettingsEstructura;
// controladores
use App\Http\Controllers\ComisionesController;
use App\Http\Controllers\IndexControllers;
use Modules\ReferralTree\Http\Controllers\ReferralTreeController;

class RangoController extends Controller
{
    /**
     * Verifica toda las condiciones para subir de rango al usuario
     * 
     * @param integer $iduser - id del usuario a verificar su rango
     */
    public function ValidarRango($iduser)
    {
        $user = User::find($iduser);
        $settingsRol = SettingsRol::find(1);
        $rol_actual = $user->rol_id;
        $rol_new = $user->rol_id + 1;
        $rol = Rol::find($rol_new);
        $cantrol = Rol::all()->count('ID') - 1;

        $cantrequisito = 0;
        $cantaprobado = 0;

        if($cantrol > $rol_new){ 
            // verificacion por referidos
            if ($settingsRol->referidos == 1) {
                $cantrequisito++;
                if ($this->verificarReferidos($iduser, $rol->referidos, false, false, false)) {
                    $cantaprobado++;
                }
            }

            // verificacion por referidos directos
            if ($settingsRol->referidosd == 1) {
                $cantrequisito++;
                if ($this->verificarReferidos($iduser, $rol->referidosd, false, true, false)) {
                    $cantaprobado++;
                }
            }

            // verificacion por referidos Indirectos
            if ($settingsRol->referidosInd == 1) {
                $cantrequisito++;
                if ($this->verificarReferidos($iduser, $rol->referidosd, false, false, true)) {
                    $cantaprobado++;
                }
            }

            // verificacion por referidos activos
            if ($settingsRol->referidosact == 1) {
                $cantrequisito++;
                if ($this->verificarReferidos($iduser, $rol->refeact, true, false, false)) {
                    $cantaprobado++;
                }
            }

            // verificacion por roles necesario
            if ($settingsRol->rolnecesario == 1) {
                $cantrequisito++;
                if ($this->verificacionRolNecesario($iduser, $rol->rolnecesario, $rol->rolnecesariocant)) {
                    $cantaprobado++;
                }
            }

            // verificacion por compras personal (puntos)
            if ($settingsRol->compras == 1) {
                $cantrequisito++;
                if ($this->verificacionCompraPersonal($iduser, $rol->compras)) {
                    $cantaprobado++;
                }
            }

            // verificacion por compras grupales (puntos)
            if ($settingsRol->grupal == 1) {
                $cantrequisito++;
                if ($this->validarGrupal($iduser, $rol->grupal)) {
                    $cantaprobado++;
                }
            }

            // verificacion por comisiones
            if ($settingsRol->comisiones == 1) {
                $cantrequisito++;
                if ($this->verificacionComisiones($iduser, $rol->comisiones)) {
                    $cantaprobado++;
                }
            }

            if ($rol_actual == $rol->rolprevio) {
                if ($cantrequisito == $cantaprobado) {
                    $this->ActualizarRango($iduser, $rol_new);
                }
            }
        }
    }    

    /**
     * Sube de Rango al Usuario
     * 
     * @access private
     * @param integer $iduser - id usuario
     * @param integer $rol_new - el rango a subir
     */
    private function ActualizarRango($iduser, $rol_new)
    {
        $usuario = User::find($iduser);
        $usuario->rol_id = $rol_new;
        $usuario->save();
        $settingsRol = SettingsRol::find(1);
        $rol = Rol::find($rol_new);
        if ($settingsRol->bonos == 1) {
            if ($rol->bonos > 0) {
                $comision = new ComisionesController;
                $concepto = "Bono por Subir al Rango ".$rol->name;
                $comision->guardarComision($iduser, 10, $rol->bonos, Auth::user()->user_email, 0, $concepto, 'bono');
            }
        }
        // $settings = Settings::first();
        // $rol = Rol::find($rol_new);
        // $rangowp = 'a:1:{s:'.$valors.':"'.strtolower($rol->name).'";b:1;}';
        // DB::table($settings->prefijo_wp.'usermeta')
        // 		->where('user_id', '=', $iduser)
        // 		->where('meta_key', '=', $settings->prefijo_wp.'capabilities')
        // 		->update(['meta_value' => $rangowp]);
    }
    /**
     * Verifica la condicion de referidos 
     * 
     * Revisa si la condicion de referidos o referidos activos son validas
     * 
     * @param integer $iduser - id usuario
     * @param integer $requisito - requisitos necesario 
     * @param boolean $activo - si esta activa solo sumara la los usuarios activos
     * @param boolean $directos - si esta activa solo sumara la los usuarios directos
     * @param boolean $indirectos - si esta activa solo sumara la los usuarios indirectos
     * @return boolean
     */
    private function verificarReferidos($iduser, $requisito, $activo, $directos, $indirectos)
    {
        $funciones = new IndexController;
        $todoUsuarios = $funciones->generarArregloUsuario($iduser);
        $cantReferidosActivos = 0;
        $cantReferidosDirectos = 0;
        $cantReferidosIndirectos = 0;
        $cantReferidos = 0;
        $resul = false;
        foreach($todoUsuarios as $user){
            $cantReferidos++;
            // directos
            if ($directos) {
                if ($user['nivel'] == 1){
                    $cantReferidosDirectos++;
                }
            }
            // activos
            if ($activo) {
                if ($user['status'] == 1){
                    $cantReferidosActivos++;
                }
            }
            // indirectos
            if ($directos) {
                if ($user['nivel'] == 1){
                    $cantReferidosIndirectos++;
                }
            }
        }
        // devolver directos
        if ($directos) {
            if ($cantReferidosDirectos >= $requisito){
                $resul = true;
            }
        }
        // devolver indirectos
        if ($indirectos) {
            if ($cantReferidosIndirectos >= $requisito){
                $resul = true;
            }
        }
        // devolver directos
        if ($activo) {
            if ($cantReferidosActivos >= $requisito) {
                $resul = true;
            }
        }else{
            if ($cantReferidos >= $requisito) {
                $resul = true;
            }
        }
        return $resul;
    }

    /**
     * Verificacion de la cantidad de roles
     * 
     * Permite verificar la cantidad de usuarios que poseen o tiene un rol determinado en mi red, 
     *  para poder subir de rango 
     *
     * @param integer $iduser - id del usuario a verificar
     * @param integer $rolnecesario - el rol a verificar
     * @param integer $cantnecesario - la cantidad de roles necesario para la validacion
     * @return boolean
     */
    public function verificacionRolNecesario($iduser, $rolnecesario, $cantnecesario) : boolean
    {
        $funciones = new IndexController;
        $todoUsuarios = $funciones->generarArregloUsuario($iduser);
        $cantReferidos = 0;
        $resul = false;
        foreach($todoUsuarios as $user){
            if ($user['rol'] == $rolnecesario){
                $cantReferidos++;
            }
        }
        if ($cantnecesario >= $cantReferidos) {
            $resul = true;
        }
        return $resul;
    }

    /**
     * Permite Verificar las compras personales del usuario
     * 
     * @param int $iduser - id usuario, 
     * @param float $montoRequisito - el monto a superar o igualar
     * @return boolean
     */
    private function verificacionCompraPersonal($iduser, $montoRequisito)
    {
        $funcionesComision = new ComisionesController;
        $totalCompras = $funcionesComision->getShopping($iduser);
        $comprastotalesuser = 0;
        foreach ($totalCompras as $compra) {
            //Se obtienen los datos de cada compra
            $datosCompra = $funcionesComision->getShoppingDetails($compra->post_id);

            //Se verifica que la compra sea del mes que se está pagando
            $fechaCompra = new Carbon($datosCompra->post_date);
            $mesCompra = $fechaCompra->format('m');
            $fechaActual = Carbon::now();
            $mesActual = $fechaActual->format('m');
            if ($mesCompra == $mesActual && $datosCompra->post_status == 'wc-completed') {
                $comprastotalesuser = ($comprastotalesuser + (int) $funcionesComision->getShoppingTotal($compra->post_id));
            }
        }
        
        if ($comprastotalesuser >= $montoRequisito) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Valida que las compras grupales cumplan el requisito
     * 
     * @access private
     * @param int $iduser - id del usuario a buscar
     * @param float $montoRequisito - monto necesario para la validacion
     * @return boolean
     */
    private function validarGrupal($iduser, $montoRequisito)
    {
        $resul = false;
        $funciones = new IndexController;
        $todoUsuarios = $funciones->generarArregloUsuario($iduser);
        $totalgrupa = $this->verificacionCompraGrupal($iduser);
        foreach ($todoUsuarios as $user) {
            $totalgrupa =  ($totalgrupa + (int) $this->verificacionCompraGrupal($user['ID']));
        }
        if ($totalgrupa >= $montoRequisito) {
            $resul = true;
        }
        return $resul;
    }

    /**
     * Permite Obtener las compras de las red,  del usuario
     * 
     * @access private
     * @param int $iduser - id usuario
     * @return float
     */
    private function verificacionCompraGrupal($iduser)
    {
        $funcionesComision = new ComisionesController;
        $totalCompras = $funcionesComision->getShopping($iduser);
        $comprastotalesuser = 0;
        foreach ($totalCompras as $compra) {
            //Se obtienen los datos de cada compra
            $datosCompra = $funcionesComision->getShoppingDetails($compra->post_id);

            //Se verifica que la compra sea del mes que se está pagando
            $fechaCompra = new Carbon($datosCompra->post_date);
            $mesCompra = $fechaCompra->format('m');
            $fechaActual = Carbon::now();
            $mesActual = $fechaActual->format('m');
            if ($mesCompra == $mesActual && $datosCompra->post_status == 'wc-completed') {
                $comprastotalesuser = ($comprastotalesuser + (int) $funcionesComision->getShoppingTotal($compra->post_id));
            }        
        }
        return $comprastotalesuser; 
    }

    /**
     * Permite Verificar las comisiones del usuario
     * 
     * @param int $iduser - id usuario
     * @param float $montoRequisito - el monto a superar o igualar
     * @return boolean
     */
    private function verificacionComisiones($iduser, $montoRequisito)
    {
        $resul = false;
        $montoObtenido = Commission::where('user_id', $iduser)->sum('total');
        if ($montoObtenido >= $montoRequisito) {
            $resul = true;
        }
        return $resul;
    }

}
