<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Linkpago extends Model
{

protected $table = "linkpagos";

 protected $fillable=[
    	'titulo','archivo','iduser'
    ];

}