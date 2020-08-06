<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{

protected $table = "chats";


    protected $fillable=[
    	'contenido','origen','destino','codigo','status'
    ];

}