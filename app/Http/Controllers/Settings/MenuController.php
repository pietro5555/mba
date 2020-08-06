<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
// modelo
use App\Models\Menus;
use Auth; use DB; use Carbon\Carbon; use Mail;
// controlador
use App\Http\Controllers\IndexController;

class MenuController extends Controller
{
    
    public function menu(){
        
        view()->share('title', 'Editar Menu');
        
        $data = Menus::find(1);
        $date = Menus::find(2);
        
        $activos = [
            'inicio' => json_decode($data->inicio),
            'actualizar' => json_decode($data->actualizar),
            'registro' =>  json_decode($data->registro),
            'registro_cliente' => json_decode($data->registro_cliente),
            'red' => json_decode($data->red_usuario),
            'transacciones' => json_decode($data->transacciones),
            'billetera' => json_decode($data->billetera),
            'calendario' =>  json_decode($data->calendario),
            'informes' => json_decode($data->informes),
            'prospeccion' => json_decode($data->prospeccion),
            'correos' => json_decode($data->correos),
            'tickets' => json_decode($data->tickets),
            'ranking' =>  json_decode($data->ranking),
            'tienda' => json_decode($data->tienda),
            'herramientas' => json_decode($data->herramientas),
        ];
        
        
        $inactivos = [
            'inicio' => json_decode($date->inicio),
            'actualizar' => json_decode($date->actualizar),
            'registro' =>  json_decode($date->registro),
            'registro_cliente' => json_decode($date->registro_cliente),
            'red' => json_decode($date->red_usuario),
            'transacciones' => json_decode($date->transacciones),
            'billetera' => json_decode($date->billetera),
            'calendario' =>  json_decode($date->calendario),
            'informes' => json_decode($date->informes),
            'prospeccion' => json_decode($date->prospeccion),
            'correos' => json_decode($date->correos),
            'tickets' => json_decode($date->tickets),
            'ranking' =>  json_decode($date->ranking),
            'tienda' => json_decode($date->tienda),
            'herramientas' => json_decode($date->herramientas),
        ];
        
        return view('setting.menu.menu')->with(compact('activos','inactivos'));
    }
    
    
    public function menucambio(Request $datos){
        
        $inicio = [
			'activo' => ($datos->inicio == null) ? 0 : 1,
		];
		
		$actualizar = [
			'activo' => ($datos->actualizar == null) ? 0 : 1,
		];
		
		$registro = [
			'activo' => ($datos->registro == null) ? 0 : 1,
		];
		
		$registro_cliente = [
			'activo' => ($datos->registro_cliente == null) ? 0 : 1,
		];
		
		$calendario = [
			'activo' => ($datos->calendario == null) ? 0 : 1,
		];
		
		$prospeccion = [
			'activo' => ($datos->prospeccion == null) ? 0 : 1,
		];
		
		$correo = [
			'activo' => ($datos->correo == null) ? 0 : 1,
		];
		
		$ranking = [
			'activo' => ($datos->ranking == null) ? 0 : 1,
		];
		
		$red = [
			'activo' => ($datos->red_usuario == null) ? 0 : 1,
			'usuario' => ($datos->arbol == null) ? 0 : 1,
			'cliente' => ($datos->arbol_cliente == null) ? 0 : 1,
			'directos' => ($datos->directos == null) ? 0 : 1,
			'red' => ($datos->red == null) ? 0 : 1,
		];
		
		$transacciones = [
			'activo' => ($datos->tran == null) ? 0 : 1,
			'personales' => ($datos->personales == null) ? 0 : 1,
			'red' => ($datos->red_tran == null) ? 0 : 1,
			'directos' => ($datos->cliente == null) ? 0 : 1,
			'link' => ($datos->link == null) ? 0 : 1,
		];
		
		$billetera = [
			'activo' => ($datos->bille == null) ? 0 : 1,
			'billetera' => ($datos->billetera == null) ? 0 : 1,
			'transferencia' => ($datos->transferencia == null) ? 0 : 1,
			'corte' => ($datos->corte == null) ? 0 : 1,
			'canje' => ($datos->canje == null) ? 0 : 1,
		];
		
		$info = [
			'activo' => ($datos->info == null) ? 0 : 1,
			'activacion' => ($datos->activo == null) ? 0 : 1,
			'comisiones' => ($datos->comisiones == null) ? 0 : 1,
			'liquidacion' => ($datos->liquidacion == null) ? 0 : 1,
			'repor_comisiones' => ($datos->repor_comision == null) ? 0 : 1,
			'afiliados' => ($datos->afiliados == null) ? 0 : 1,
		];
		
		$tickets = [
			'activo' => ($datos->ticket == null) ? 0 : 1,
			'mios' => ($datos->mios == null) ? 0 : 1,
			'generar' => ($datos->generar == null) ? 0 : 1,
		];
		
		$tienda = [
			'activo' => ($datos->tienda == null) ? 0 : 1,
			'productos' => ($datos->productos == null) ? 0 : 1,
			'bancaria' => ($datos->bancaria == null) ? 0 : 1,
			'pagos' => ($datos->pagos == null) ? 0 : 1,
			'lista_pagos' => ($datos->lista_pagos == null) ? 0 : 1,
			'paypal' => ($datos->paypal == null) ? 0 : 1,
			'paga_paypal' => ($datos->paga_paypal == null) ? 0 : 1,
		];
		
		$herramienta = [
			'activo' => ($datos->herramienta == null) ? 0 : 1,
			'documentos' => ($datos->documentos == null) ? 0 : 1,
			'articulos' => ($datos->articulos == null) ? 0 : 1,
			'notas' => ($datos->notas == null) ? 0 : 1,
			'activacion_correos' => ($datos->activacion_correos == null) ? 0 : 1,
		];
		
		
		if($datos->tipos == 'activos'){
		    
		  DB::table('menu')
           ->where('id', '=', 1)
           ->update([
            'inicio' => json_encode($inicio), 
            'actualizar' => json_encode($actualizar), 
            'registro' => json_encode($registro),
            'registro_cliente' => json_encode($registro_cliente),
            'red_usuario' => json_encode($red),
            'transacciones' => json_encode($transacciones), 
            'billetera' => json_encode($billetera), 
            'calendario' => json_encode($calendario),
            'informes' => json_encode($info),
            'prospeccion' => json_encode($prospeccion),
            'correos' => json_encode($correo),
            'tickets' => json_encode($tickets),
            'ranking' => json_encode($ranking),
            'tienda' => json_encode($tienda),
            'herramientas' => json_encode($herramienta),
                    ]);  
		}else{
		    
		    DB::table('menu')
           ->where('id', '=', 2)
           ->update([
            'inicio' => json_encode($inicio), 
            'actualizar' => json_encode($actualizar), 
            'registro' => json_encode($registro),
            'registro_cliente' => json_encode($registro_cliente),
            'red_usuario' => json_encode($red),
            'transacciones' => json_encode($transacciones), 
            'billetera' => json_encode($billetera), 
            'calendario' => json_encode($calendario),
            'informes' => json_encode($info),
            'prospeccion' => json_encode($prospeccion),
            'correos' => json_encode($correo),
            'tickets' => json_encode($tickets),
            'ranking' => json_encode($ranking),
            'tienda' => json_encode($tienda),
            'herramientas' => json_encode($herramienta),
                    ]); 
		}
		
		$funciones = new IndexController;
		$funciones->msjSistema('Nueva configuracion realizada con exito', 'success');
		return redirect()->back();
    }
    
}