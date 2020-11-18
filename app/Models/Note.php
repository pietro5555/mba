<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
	protected $table = 'notes';

    protected $fillable = ['title', 'content', 'user_id', 'streaming_id'];

    public function streaming()
    {
        return $this->belongsTo('App\Models\Events');
    }
}
