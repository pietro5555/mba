<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{

 protected $fillable=[
    	'user_id','fecha','ip','actividad'
    ];

}
