<?php

namespace App\Exports;

use DB;
// use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
// modelo
use App\Models\User;
use App\Models\Formulario;

class UsersExport implements FromArray, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        $formularios = Formulario::all()->sortBy('id');
        $heading = [
            'ID Usuario','Estatus', 'Correo'
        ];
        foreach ($formularios as $form) {
            array_push($heading, $form->label);
        }
        $heading [] = [
            'Fecha Registro'
        ];
       
        return $heading;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        $formularios = Formulario::select('label', 'nameinput')->orderBy('id')->get();
        $usuarios = User::all();
        $arrayUser = [];
        foreach ($usuarios as $user) {
            $status = 'Inactivo';
            if($user->status == 1){
                $status = 'Activo';
            }
            
            $infouser = [
                $user->ID,
                $status,
                $user->user_email,
            ];
            $segundaInfo = DB::table('user_campo')->where('ID', $user->ID)->get();
            foreach ($segundaInfo as $llave => $valor) {
                foreach ($formularios as $item) {
                    $z=$item->nameinput;
                
                if ($llave != 'ID') {
                    array_push($infouser, $valor);
                }else{
                   
                    array_push($infouser, $valor->$z);
                }
             }
            }
            array_push($infouser, $user->created_at);
            $arrayUser [] = $infouser;
        }
        // dd($arrayUser);
        
        return $arrayUser;
    }
}
