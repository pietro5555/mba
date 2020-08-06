<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingsRol extends Model
{
    protected $table = "setttingsroles";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'rangos', 'compras', 'comisiones', 'niveles', 'referidos', 
         'referidosact', 'bonos', 'referidosd', 'grupal', 'valorpuntos',
         'referidosInd', 'rolnecesario', 'reseteomensual',
    ];

    public function users(){
        return $this->hasMany('App\User');
    }
}