<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calendario extends Model
{

protected $table = "calendarios";


    protected $fillable=[
    	'iduser','titulo','contenido','color','inicio','vence','lugar','tipo','especifico', 'event_id'
    ];

}