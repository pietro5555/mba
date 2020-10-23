<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lessons';

    protected $fillable = ['course_id', 'title', 'english_title', 'slug', 'description', 'url', 'english_url', 'subcategory_id'];

    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

    public function materials(){
        return $this->hasMany('App\Models\SupportMaterial');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
