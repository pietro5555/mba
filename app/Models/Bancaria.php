<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bancaria extends Model
{

protected $table = "informacionbancaria";


    protected $fillable=[
    	'titulo','contenido'
    ];

}