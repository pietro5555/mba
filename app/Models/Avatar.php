<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{

protected $table = "avatares";


    protected $fillable=[
    	'avatar','activo_mujer','activo_hombre','inactivo_mujer','inactivo_hombre'
    ];

}