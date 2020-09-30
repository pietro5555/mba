<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $table = 'memberships';

    protected $fillable = ['name', 'image', 'price','descuento', 'ganancia'];

    public function users(){
        return $this->hasMany('App\Models\User');
    }

    public function shopping_carts(){
        return $this->hasMany('App\Models\ShoppingCart');
    }
}
