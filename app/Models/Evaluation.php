<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $table = 'evaluations';

    protected $fillable = ['course_id', 'title', 'description'];

    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

    public function questions(){
    	return $this->hasMany('App\Models\Question');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User', 'evaluations_users', 'evaluation_id', 'user_id')
            ->withPivot('score', 'date');
    }
}
