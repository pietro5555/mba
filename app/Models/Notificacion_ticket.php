<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacion_ticket extends Model
{

 protected $fillable=[
    	'ticket','user_id','user','contenido','status'
    ];

 public function user(){
    	return $this->belongsTo('App\User');
    }

}