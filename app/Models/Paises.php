<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{

protected $table = "paises";


    protected $fillable=[
    	'nombre','idface', 'abbreviation', 'event', 'operation', 'quantity'
    ];

    public function events(){
        return $this->belongsToMany('App\Models\Event', 'event_countries', 'country_id', 'event_id')->withPivot('date', 'time');
    }

}