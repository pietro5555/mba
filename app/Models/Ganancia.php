<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ganancia extends Model
{

protected $table = "ganancias";

 protected $fillable=[
    	'configuracion','tipo','nota'
    ];

}