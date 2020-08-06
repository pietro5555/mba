<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administradorgastos extends Model
{

protected $table = "administradorgastos";


    protected $fillable=[
    	'nombre','descripcion','tipo','date','cantidad'
    ];

}