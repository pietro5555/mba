<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{

 protected $fillable=[
    	'tickets_id','user_id','comentario','archivo'
    ];

 public function user(){
    	return $this->belongsTo('App\User');
    }

}