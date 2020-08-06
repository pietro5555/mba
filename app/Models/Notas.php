<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notas extends Model
{

protected $table = "notas";


    protected $fillable=[
    	'iduser','titulo','contenido','fin','inicio'
    ];

}