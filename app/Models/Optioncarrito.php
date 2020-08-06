<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Optioncarrito extends Model
{

protected $table = "optioncarritos";


    protected $fillable=[
    	'nombre','medio_pago','activo','link'
    ];

}