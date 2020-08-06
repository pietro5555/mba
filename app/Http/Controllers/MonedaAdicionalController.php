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
// modelo
use App\Models\User; 
use App\Models\Monedadicional; 
use App\Models\Settings;
use App\Models\Monedas;

// llamado a los controlladores
use App\Http\Controllers\IndexController;

class MonedaAdicionalController extends Controller
{
    
    public function savemonedasadicional(Request $datos){
        
        $funciones = new IndexController;
        $monedaAdicional = Monedadicional::find(1);
        
        $detallado = $this->unirmoneda($datos);
        
       
        if (!empty($monedaAdicional)) {
          Monedadicional::where('id', 1)->update([
            'configuracion' => (!empty($detallado)) ? $detallado : '',
         ]);
                 
        }else{
         Monedadicional::create([
          'configuracion' => (!empty($detallado)) ? $detallado : '',
          ]);
        }
        
         $funciones->msjSistema('Nuevas Monedas Agregadas', 'success');
         return redirect()->back();
    }
    
    
    public function unirmoneda($datos){
        
        $stringJson = [];
        
        for ($i=1; $i < ($datos->niveles + 1); $i++) {
            
                
                array_push($stringJson, [
                     'cont' => $i.Carbon::now()->format('His').$i+1,
                     'nombre' => $datos['nombre'.$i],
                     'moneda' => $datos['moneda'.$i],
                     'simbolo' => $datos['simbolo'.$i],
                     'posicion' => $datos['posicion'.$i],
                 ]);
                 
           
        }
        
        return json_encode($stringJson);
    }
    
    
    /*
    * Editar Monedas por el nombre de la moneda
    */
    public function modificarmoneda(Request $datos){
        
        $funciones = new IndexController;
        $monedaAdicional = Monedadicional::find(1);
        
        if (!empty($monedaAdicional)) {
         $monedaAdicional->configuracion = json_decode($monedaAdicional->configuracion);
        }else{
            
            $concepto = 'Debe Configurarlos las monedas de manera masiva para luego editarlos individualmente';
             $funciones->msjSistema($concepto, 'success');
            return redirect()->back();
        }
        
        $stringJson = [];
        foreach($monedaAdicional->configuracion as $moneda){
            if($datos->identificador == $moneda->cont){
                
                array_push($stringJson, [
                    'cont' => $moneda->cont,
                    'nombre' => ($datos->nombre != null) ? $datos->nombre : $moneda->nombre,
                    'moneda' => ($datos->moneda != null) ? $datos->moneda : $moneda->moneda,
                    'simbolo' => ($datos->simbolo != null) ? $datos->simbolo : $moneda->simbolo,
                    'posicion' => ($datos->posicion != null) ? $datos->posicion : $moneda->posicion,
                 ]); 
                 
            }else{
                
                array_push($stringJson, [
                    'cont' => $moneda->cont,
                    'nombre' => $moneda->nombre,
                    'moneda' => $moneda->moneda,
                    'simbolo' => $moneda->simbolo,
                    'posicion' => $moneda->posicion,
                 ]);
                
            }
        }
        
                 $detallado = json_encode($stringJson);
        
                Monedadicional::where('id', '1')->update([
	            'configuracion' => (!empty($detallado)) ? $detallado : '',
	            ]);
	            
	       $concepto = 'Actualizado con extito';
           $funciones->msjSistema($concepto, 'success');
            return redirect()->back();     
    }
    
    
    /*
    * Eliminar Monedas
    */
    public function deleteMonedadicional(Request $datos){
        
        $monedaAdicional = Monedadicional::find(1);
         $funciones = new IndexController;
         
         if (!empty($monedaAdicional)) {
         $monedaAdicional->configuracion = json_decode($monedaAdicional->configuracion);
        }else{
            
            $concepto = 'Debe Configurarlos las monedas de manera masiva para luego eliminarlos individualmente';
             $funciones->msjSistema($concepto, 'success');
            return redirect()->back();
        }
        
        $stringJson = [];
        foreach($monedaAdicional->configuracion as $moneda){
            if($datos->identificador != $moneda->cont){
                
                array_push($stringJson, [
                    'cont' => $moneda->cont,
                    'nombre' => $moneda->nombre,
                    'moneda' => $moneda->moneda,
                    'simbolo' => $moneda->simbolo,
                    'posicion' => $moneda->posicion,
                 ]);
            }
        }
        
        $detallado = json_encode($stringJson);
        
         Monedadicional::where('id', '1')->update([
	            'configuracion' => (!empty($detallado)) ? $detallado : '',
	            ]);
            
             $concepto = 'Actualizado con extito';
             $funciones->msjSistema($concepto, 'success');
            return redirect()->back();
    }
    
    
    
    public function calcularValorMonedas($monto, $tipo){
        
        $total_puntos =''; $cont=0;
         $monedaAdicional = Monedadicional::find(1);
        if (!empty($monedaAdicional)) {    
         $monedaAdicional->configuracion = json_decode($monedaAdicional->configuracion);
         
         foreach($monedaAdicional->configuracion as $moneda){
             $cont++;
          if($tipo == 0){    
            if($moneda->posicion == 1){
             $total_puntos .= $moneda->nombre.' '.$moneda->simbolo.' '.($monto * $moneda->moneda).' ';
               }else{
              $total_puntos .= $moneda->nombre.' '.($monto * $moneda->moneda).' '.$moneda->simbolo.' ';    
               }
             }else{
                 if($tipo == $cont){
                if($moneda->posicion == 1){
             $total_puntos .= $moneda->nombre.' '.$moneda->simbolo.' '. number_format($monto * $moneda->moneda, 2 , "." , ",") . "\n";
               }else{
              $total_puntos .= $moneda->nombre.' '.number_format($monto * $moneda->moneda, 2 , "." , ",") . "\n".' '.$moneda->simbolo;    
                   } 
                 }
             }
           }
        }
        
        return $total_puntos;
    }
}