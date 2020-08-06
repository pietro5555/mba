<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Punto extends Model
{
    protected $table = "puntos";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'iduser','idcompra','usuario', 'concepto', 'puntos','cantidad'
    ];
    
    
    public function user(){
        return $this->belongsTo('App\User');
    }
}