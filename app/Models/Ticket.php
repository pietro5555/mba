<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

 protected $fillable=[
    	'titulo','comentario','tipo','user_id','admin','status','archivo', 'fecha', 'soporte',
    ];

 	public function user(){
    	return $this->belongsTo('App\Models\User');
    }

    public function support()
    {
    	return $this->hasOne('App\Models\Support');
    }

}
