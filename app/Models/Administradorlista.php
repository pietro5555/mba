<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administradorlista extends Model
{

protected $table = "administradorlista";


    protected $fillable=[
    	'nombre','tipo'
    ];

}