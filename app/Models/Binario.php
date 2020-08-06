<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Binario extends Model
{

protected $table = "binario";


    protected $fillable=[
    	'binario','pata','autobinario','inicio','puntos_inicio','tipo','auto','patrocinador'
    ];

}