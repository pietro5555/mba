<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingsPunto extends Model
{
    protected $table = 'settingspuntos';

    protected $fillable = [
        'configuracion', 'valor','tipopuntos'
    ];
}