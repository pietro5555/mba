<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Redesociales extends Model
{

protected $table = "redes_sociales";


    protected $fillable=[
    	'link','tipo','imagen','color'
    ];

}