<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    protected $table = 'purchase_details';

    protected $fillable = ['purchase_id', 'course_id', 'membership_id', 'amount'];

    public function purchase(){
        return $this->belongsTo('App\Models\Purchase');
    }
}
