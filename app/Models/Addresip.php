<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addresip extends Model
{

protected $table = "addres_ip";


    protected $fillable=[
    	'ip','padre'
    ];

}