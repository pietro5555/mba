<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{

protected $table = "anuncios";


    protected $fillable=[
    	'titulo','contenido','color','inicio','vencimiento'
    ];

}