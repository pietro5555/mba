<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Push extends Model
{

protected $table = "pushs";


    protected $fillable=[
    	'titulo','body','iduser','status'
    ];

}