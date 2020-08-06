<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Componentestransferencias extends Model
{

protected $table = "componentestransferencias";


    protected $fillable=[
    	'iduser','usuario','descripcion','debito','credito','balance','tipotransacion','descuento'
    ];

}