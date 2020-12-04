<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
     protected $table = 'supports';

    protected $fillable = ['response', 'ticket_id', 'user_id', 'status'];

    public function ticket()
    {
    	return $this->belongsTo('App\Models\Ticket');
    }
}
