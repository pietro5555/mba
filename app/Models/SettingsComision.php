<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingsComision extends Model
{
    protected $table = 'settingcomision';

    protected $fillable = [
        'niveles', 'tipocomision', 'valorgeneral', 'valordetallado', 'tipopago', 
        'tipotransferencia', 'comisionretiro', 'bonoactivacion', 'primera_compra',
        'directos', 'tipobono'
    ];
}
