<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

 protected $fillable=[
    	'titulo','comentario','tipo','user_id','admin','status','archivo'
    ];

 public function user(){
    	return $this->belongsTo('App\User');
    }

}