<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{

protected $table = "menu";


    protected $fillable=[
    	'inicio','actualizar','registro','registro_cliente','red_usuario','transacciones',
    	'billetera','calendario','informes','prospeccion','correos','tickets','ranking',
    	'tienda','herramientas'
    ];

}