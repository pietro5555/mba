<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = "roles";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'referidos', 'refeact', 'referidosd', 
        'referidosInd', 'compras', 'grupal', 'comisiones', 'bonos', 
        'niveles', 'rolprevio', 'acepta_comision', 'rolnecesario', 'rolnecesariocant'
    ];

    public function users(){
        return $this->hasMany('App\Models\User');
    }
}

