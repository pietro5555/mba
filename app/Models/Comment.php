<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	protected $table = 'comments';

    protected $fillable = ['comment', 'lesson_id',  'user_id' ,'date'];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }


    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'ID');
    }
}
