<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
// llamado de modelo
use App\Models\Rol;
use App\Models\User;
use App\Models\Settings;
use App\Models\SettingsEstructura;
use App\Models\SettingsRol;
use App\Models\Permiso;

// llamado de Controlladores
use App\Http\Controllers\IndexController;

class PermisosController extends Controller
{


	public function permiso($id){

        $permisos = Permiso::where('iduser', '=', $id)->get();
         return json_encode($permisos);
    }


    public function savepermiso(Request $datos){

  	$funciones = new IndexController;

    if (!empty($datos)) {
      if (!(empty($datos->id))) {
        Permiso::where('id', $datos->id)->update([
          'nuevo_registro' => ($datos->nuevo_registro == null) ? 0 : 1,
          'red_usuario' => ($datos->red_usuario == null) ? 0 : 1,
          'vision_usuario' => ($datos->vision_usuario == null) ? 0 : 1,
          'billetera' => ($datos->billetera == null) ? 0 : 1,
          'pago' => ($datos->pago == null) ? 0 : 1,
          'informes' => ($datos->informes == null) ? 0 : 1,
          'tickets' => ($datos->tickets == null) ? 0 : 1,
          'buzon' => 0,
          'ranking' => ($datos->ranking == null) ? 0 : 1,
          'historial_actividades' => ($datos->historial_actividades == null) ? 0 : 1,
          'soporte' => ($datos->soporte == null) ? 0 : 1,
          'ajuste' => ($datos->ajuste == null) ? 0 : 1,
          'herramienta' => ($datos->herramienta == null) ? 0 : 1,
          'calendario' => ($datos->calendario == null) ? 0 : 1,
          'correos' => ($datos->correos == null) ? 0 : 1,
          'prospeccion' => ($datos->prospeccion == null) ? 0 : 1,
          'puntos' => ($datos->puntos == null) ? 0 : 1,
          'binario' => ($datos->binario == null) ? 0 : 1,
          'usuario' => ($datos->usuario == null) ? 0 : 1,
          'tienda' => ($datos->tienda == null) ? 0 : 1,
          'transacciones' => ($datos->transacciones == null) ? 0 : 1,
          'usuarios' => ($datos->usuarios == null) ? 0 : 1,
          'red' => ($datos->red == null) ? 0 : 1,
          'cursos' => ($datos->cursos == null) ? 0 : 1,
          'eventos' => ($datos->eventos == null) ? 0 : 1,
          'entradas' => ($datos->entradas == null) ? 0 : 1,
          'email_marketing' => ($datos->email_marketing == null) ? 0 : 1,
          'administrar_redes' => ($datos->administrar_redes == null) ? 0 : 1,
          'historialcomision' => ($datos->historialcomision == null) ? 0 : 1,
        ]);
      } else {
        Permiso::create([
          'iduser' => $datos->iduser,
          'nameuser' => $datos->nameuser,
          'nuevo_registro' => ($datos->nuevo_registro == null) ? 0 : 1,
          'red_usuario' => ($datos->red_usuario == null) ? 0 : 1,
          'vision_usuario' => ($datos->vision_usuario == null) ? 0 : 1,
          'billetera' => ($datos->billetera == null) ? 0 : 1,
          'pago' => ($datos->pago == null) ? 0 : 1,
          'informes' => ($datos->informes == null) ? 0 : 1,
          'tickets' => ($datos->tickets == null) ? 0 : 1,
          'buzon' => 0,
          'ranking' => ($datos->ranking == null) ? 0 : 1,
          'historial_actividades' => ($datos->historial_actividades == null) ? 0 : 1,
          'soporte' => ($datos->soporte == null) ? 0 : 1,
          'ajuste' => ($datos->ajuste == null) ? 0 : 1,
          'herramienta' => ($datos->herramienta == null) ? 0 : 1,
          'calendario' => ($datos->calendario == null) ? 0 : 1,
          'correos' => ($datos->correos == null) ? 0 : 1,
          'prospeccion' => ($datos->prospeccion == null) ? 0 : 1,
          'puntos' => ($datos->puntos == null) ? 0 : 1,
          'binario' => ($datos->binario == null) ? 0 : 1,
          'usuario' => ($datos->usuario == null) ? 0 : 1,
          'tienda' => ($datos->tienda == null) ? 0 : 1,
          'transacciones' => ($datos->transacciones == null) ? 0 : 1,
          'usuarios' => ($datos->usuarios == null) ? 0 : 1,
          'red' => ($datos->red == null) ? 0 : 1,
          'cursos' => ($datos->cursos == null) ? 0 : 1,
          'eventos' => ($datos->eventos == null) ? 0 : 1,
          'entradas' => ($datos->entradas == null) ? 0 : 1,
          'email_marketing' => ($datos->email_marketing == null) ? 0 : 1,
          'administrar_redes' => ($datos->administrar_redes == null) ? 0 : 1,
          'historialcomision' => ($datos->historialcomision == null) ? 0 : 1,
        ]);
      }

       $funciones->msjSistema('Permisos al Usuario '.$datos->nameuser.' Actualizados', 'info');
        return redirect()->back();
    } else {
      return redirect()->back();
    }
    
  }



  public function  PermisosAdmin($idAdmin){

    // asignar los permisos totales al admin

        $user = User::find($idAdmin);
        Permiso::create([
            'iduser' => $idAdmin,
            'nameuser' => $user->display_name,
            'nuevo_registro' => 1,
            'red_usuario' => 1,
            'vision_usuario' => 1,
            'billetera' => 1,
            'pago' => 1,
            'informes' => 1,
            'tickets' => 1,
            'buzon' => 1,
            'ranking' => 1,
            'historial_actividades' => 1,
            'email_marketing' => 1,
            'administrar_redes' => 1,
            'soporte' => 1,
            'ajuste' => 1,
            'herramienta' => 1,
            'calendario' => 1,
            'correos' => 1,
            'prospeccion' => 1,
            'puntos' => 1,
            'binario' => 1,
            'usuario' => 1,
            'tienda' => 1,
            'transacciones' => 1,
            'usuarios' => 1,
            'red' => 1,
            'cursos' => 1,
            'eventos' => 1,
            'entradas' => 1,
            'historialcomision' => 1,
        ]);
    }

}
