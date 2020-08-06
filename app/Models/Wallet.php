<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table = "walletlog";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'iduser', 'idcomision', 'usuario', 'descripcion', 'debito', 'credito', 'balance', 'descuento', 'tipotransacion',
         'monedaAdicional'
    ];
    public function user(){
        return $this->belongsTo('App\User');
    }
}