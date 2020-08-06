<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Noregistrado extends Model
{

protected $table = "noregistrados";

 protected $fillable=[
    	'iduser','ip','correo'
    ];

}