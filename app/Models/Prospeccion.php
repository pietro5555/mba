<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prospeccion extends Model
{

protected $table = "prospeccion";


    protected $fillable=[
    	'iduser','persona_natural','firstname','lastname','direccion','ciudad','estado','local',
    	'zip','pais','telefono','website','vap','referred_id','position_id','ladomatriz',
    	'status','tipo','comentario','observaciones','perfil','user_email','envioCorreo'
    ];
    
}