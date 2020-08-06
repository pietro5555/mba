<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingActivacion extends Model
{
    protected $table = 'settingactivacion';

    protected $fillable = [
        'tipoactivacion', 'tiporecompra', 'requisitoactivacion', 'requisitorecompra', 'desativar_usuarios'
    ];
}