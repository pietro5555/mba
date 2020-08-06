<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bonoinicio extends Model
{

protected $table = "bonoinicio";


    protected $fillable=[
    	'iduser','usuario','idcomision','total','correo','status'
    ];

}