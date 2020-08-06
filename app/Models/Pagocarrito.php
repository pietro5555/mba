<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagocarrito extends Model
{

protected $table = "pagocarritos";


    protected $fillable=[
    	'name','iduser','idcompra','metodo','nombre'
    ];

}