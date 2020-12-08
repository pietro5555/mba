<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $table = 'shopping_cart';

    protected $fillable = ['user_id', 'course_id', 'membership_id', 'period', 'date', 'offer_id'];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'ID');
    }

    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

    public function membership(){
        return $this->belongsTo('App\Models\Membership');
    }
}
