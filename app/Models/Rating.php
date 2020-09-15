<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model{
    protected $table = 'ratings';

    protected $fillable = ['user_id', 'course_id', 'comment', 'points', 'date'];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'ID');
    }

    public function course(){
        return $this->belongsTo('App\Models\Course');
    }
}
