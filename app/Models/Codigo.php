<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Codigo extends Model
{

protected $table = "chat_codigo";


    protected $fillable=[
    	'usuario_id','codigo','status'
    ];

}