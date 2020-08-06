<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Costo extends Model
{

protected $table = "costo";


    protected $fillable=[
    	'iduser','localidad','idlocalidad','provincia','costo'
    ];

}