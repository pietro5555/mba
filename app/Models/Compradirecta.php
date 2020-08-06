<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compradirecta extends Model
{

protected $table = "compradirectas";


    protected $fillable=[
    	'iduser','idcompra','status','precio','referido_correo'
    ];

}