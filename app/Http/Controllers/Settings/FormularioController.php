<?php

namespace App\Http\Controllers\Settings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use DB;
// modelo
use App\Models\Formulario;
use App\Models\OpcionesSelect;
use App\Models\Settings;

// controladores
use App\Http\Controllers\IndexController;

class FormularioController extends Controller
{
    function __construct()
	{
		View::share('title', 'Ajustes - Formulario');
	}
	/**
	 * Dirige a la vista de configuración de formularios
	 * 
	 * @return view
	 */
	public function indexFormulario(){
        $formulario = Formulario::all();
        return view('setting.formulario')->with(compact('formulario'));
     }
     
     /**
      * Guarda el nuevo campo para el formulario
      * 
      * @param request $datos - los datos del campo nuevo
      * @return view
      */
     public function saveForm(Request $datos){
        if(!empty($datos)){
            $valide = $datos->validate([
             'label' => 'required|string',
             'nameinput' => 'required|string|unique:formulario',
             ]);
            if($valide){
                $formulario = Formulario::create([
                 'label' => $datos->label,
                 'nameinput' => $datos->nameinput,
                 'estado' => 1,
                 'requerido' => (!empty($datos->requerido)) ? $datos->requerido : 0,
                 'unico' => (!empty($datos->unico)) ? $datos->unico : 0,
                 'input_edad' => (!empty($datos->edad)) ? $datos->edad : 0,
                 'tipo' => $datos->tipo_campo, 
                 'min'=> (!empty($datos->min)) ? $datos->min : 0,
                 'max'=> (!empty($datos->max)) ? $datos->max : 0,
                 'desactivable'=> $datos->desactivable,
                 'tip' => $datos->tip,
                ]);
                if($formulario && $datos->tipo_campo == 'select'){
                    $data = [
                        'idselect' => $formulario->id,
                        'opciones' => $datos->valores
                        ];
                    $this->addOptionSelect($data);
                }
                $this->addColumnTable($datos);
                $funciones = new IndexController;
                $funciones->msjSistema('El Campo '.$formulario->nameinput.' Fue Agregado con Exito', 'success');
                return redirect('admin/settings/formulario');
            }
        }else{
            return redirect('admin/settings/formulario');
        }
     }
     /**
      * Guarda los valores del campo select del formulario
      * 
      * @param array $opciones - los valores del campo mas el id al que pertenece
      */
     private function addOptionSelect($opciones){
         
        $valores = explode(',', $opciones['opciones']);
        for($i = 0; $i < count($valores); $i++){
            OpcionesSelect::create([
             'idselect' => $opciones['idselect'],
             'valor' => $valores[$i],
            ]);
        }
     }
     
     /**
      * Crea el nuevo campo en la tabla correspondiente
      * 
      * permite crear el campo nuevo en la tabla user_campo con los atributos correspondiente para ese campo
      * 
      * @param array $datos - los valores para crear el campo
      */
     private function addColumnTable($datos){
      $sql = 'ALTER TABLE user_campo ADD '.$datos->nameinput;
      switch($datos->tipo_campo){
          case 'number':
                 $sql = $sql.' float';
                 break;
          case 'date':
                 $sql = $sql.' date';
                 break;
          case 'datetime':
                 $sql = $sql.' timestamp';
                 break;
          default:
                 $sql = $sql.' varchar (250)';
                 break;
      }
      if ($datos->desactivable == 0){
          $sql = $sql.' not null';
      }
      DB::statement($sql);
     }
     
     /**
      * Actualiza el estado de un campo especifico
      * 
      * @param int $id - id del campo, int $estado - estado al que se va a actualizar
      * @return view
      */
     public function statusField($id, $estado){
        
         if (!empty($id)){
            Formulario::where('id', $id)->update(['estado' => $estado]);
            $formulario = Formulario::find($id);
            $funciones = new IndexController;
            $funciones->msjSistema('El Campo '.$formulario->nameinput.' Fue Actualizado con Exito', 'success');
            return redirect('admin/settings/formulario');
         }else{
            return redirect('admin/settings/formulario');
        }
     }
     /**
      * Busca la informacion un campo para ser modificada
      * 
      * @param int $id - id del campo a buscar
      * @return json
      */
     public function getForm($id)
     {
         $formulario = Formulario::find($id);
         return json_encode($formulario->toArray());
     }
 
     /**
      * Actualiza la informacion de los campos del formulario
      * 
      * @param request $datos - datos nuevos
      * @return view
      */
     public function updateForm(Request $datos)
     {
         if(!empty($datos)){
            $valide = $datos->validate([
            'label' => 'required|string',
            ]);
            if($valide){
                $formulario = Formulario::where('id', $datos->id)->update([
                    'label' => $datos->label,
                    'requerido' => (!empty($datos->requerido)) ? $datos->requerido : 0,
                    'unico' => (!empty($datos->unico)) ? $datos->unico : 0,
                    'input_edad' => (!empty($datos->edad)) ? $datos->edad : 0,
                    'min'=> (!empty($datos->min)) ? $datos->min : 0,
                    'max'=> (!empty($datos->max)) ? $datos->max : 0,
                    'tip' => $datos->tip,
                ]);
                if($formulario && $datos->tipo_campo == 'select'){ 
                    $data = [
                        'idselect' => $datos->id,
                        'opciones' => $datos->valores
                        ];
                    //$this->addOptionSelect($data);
                }
                $funciones = new IndexController;
                $funciones->msjSistema('El Campo '.$datos->label.' Fue Actualizado con Exito', 'success');
                 return redirect('admin/settings/formulario');
            }
         }
     }
 
     /**
      * Permite borrar un formulario creado
      *
      * @param integer $id - id del formulario a borrar;
      * @return void
      */
     public function deleteForm($id)
     {
         $formulario = Formulario::find($id);
         $sql = "ALTER TABLE user_campo DROP ".$formulario->nameinput;
         DB::statement($sql);
         $formulario->delete();
     }
 
     /**
      * Actualiza los terminos y condiciones del sistema
      * 
      * @access public
      * @param request $datos - El nuevo terminos y condiciones
      * @return view
      */
     public function terminos(Request $datos){
         if(!empty($datos->file('terminos'))){
             $archivo = $_FILES['terminos'];
             $rutadirectorio = public_path()."/assets";
             $rutaarchivo = public_path()."/assets/terminosycondiciones.pdf";
             if (!is_dir($rutadirectorio)) {
                 mkdir($rutadirectorio, 0700, true);
                 $movido = move_uploaded_file($archivo['tmp_name'], $rutaarchivo);
             } else {
                 unlink($rutaarchivo);
                 $movido = move_uploaded_file($archivo['tmp_name'], $rutaarchivo);
             }
             if($movido){
                $funciones = new IndexController;
                $funciones->msjSistema('Nuevos Terminos y Condiciones', 'success');
                return redirect('admin/settings/formulario');
             }
         }else{
             return redirect('admin/settings/formulario');
         }
     }
     //Fin Confi Formulario
     
     
     public function posicionamiento(){
         
         $settings = Settings::first();
	 DB::table('settings')
	            ->where('id', 1)
				->update(['posicionamiento' => ($settings->posicionamiento == 0) ? 1 : 0]);
         
        $funciones = new IndexController;
        $funciones->msjSistema('Actualizado con exito', 'success');
        return redirect()->back();                    
     }
}
