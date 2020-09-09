<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = ['mentor_id', 'title', 'slug', 'category_id', 'subcategory_id', 'description', 'cover', 'cover_name', 'featured', 'featured_cover', 'featured_cover_name', 'status', 'likes', 'shares', 'views'];

    public function mentor(){
        return $this->belongsTo('App\Models\User', 'mentor_id', 'ID');
    }

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function subcategory(){
        return $this->belongsTo('App\Models\Subcategory');
    }

    public function tags(){
        return $this->belongsToMany('App\Models\Tag', 'courses_tags', 'course_id', 'tag_id');
    }

    public function lessons(){
        return $this->hasMany('App\Models\Lesson');
    }
}
