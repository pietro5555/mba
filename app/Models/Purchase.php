<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchases';

    protected $fillable = ['user_id', 'amount', 'payment_method', 'payment_id', 'date', 'status'];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'ID');
    }

    public function details(){
    	return $this->hasMany('App\Models\PurchaseDetail');
    }
}
