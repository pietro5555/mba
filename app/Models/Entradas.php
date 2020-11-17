<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entradas extends Model
{

protected $table = "entradas";

 protected $fillable=[
    	'titulo','autor','descripcion','imagen_destacada', 'descripcion_completa', 'banner',
    ];

}
