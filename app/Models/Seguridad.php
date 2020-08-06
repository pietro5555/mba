<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seguridad extends Model
{

protected $table = "seguridad";


    protected $fillable=[
    	'titulo','contenido','concepto','tipo','status'
    ];

}