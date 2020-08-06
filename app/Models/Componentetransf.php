<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Componentetransf extends Model
{

protected $table = "componentestransf";


    protected $fillable=[
    	'comisiontransf','tipotransferencia','valor_conversion'
    ];

}