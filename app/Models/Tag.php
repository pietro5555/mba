<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $fillable = ['tag'];

    public function courses(){
        return $this->belongsToMany('App\Models\Course', 'courses_tags', 'tag_id', 'course_id');
    }
}
