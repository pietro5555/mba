<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pop extends Model
{

protected $table = "pop";


    protected $fillable=[
    	'titulo','contenido','activado'
    ];

}