<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Canje extends Model
{

protected $table = "canjes";


    protected $fillable=[
    	'iduser','cantiddad','tipo','total','status'
    ];

}