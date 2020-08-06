<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semiautobinario extends Model
{
    protected $table = "semiautobinario";
   
    protected $fillable = [
         'usuario','iduser','idcomision', 'total', 'correo','status','lado'
    ];
}