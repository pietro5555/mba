<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultaCrypto extends Model
{

protected $table = "consultacrypto";


    protected $fillable=[
    	'idcompra','idconsulta','status'
    ];

}