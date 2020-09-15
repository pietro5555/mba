<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = "settingpermiso";
    
    protected $fillable = [
        'iduser', 'nameuser', 'nuevo_registro', 'red_usuario', 'vision_usuario', 'billetera', 'pago', 'informes',
        'tickets', 'buzon', 'ranking', 'historial_actividades', 'email_marketing', 'administrar_redes', 'soporte', 
        'ajuste', 'herramienta','calendario','correos','prospeccion','puntos','binario','usuario','tienda','transacciones','usuarios','red','cursos','eventos','entradas'
    ];
}

