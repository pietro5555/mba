<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Puntosbono extends Model
{
    protected $table = "puntosbonos";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'iduser','usuario','concepto', 'puntos', 'tipo','lado','balance'
    ];
    
}