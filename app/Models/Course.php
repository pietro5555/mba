<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $table = 'courses';
    protected $dates = ['deleted_at'];
    protected $fillable = ['mentor_id', 'title', 'slug', 'category_id', 'subcategory_id', 'description', 'cover', 'cover_name', 'thumbnail_cover', 'featured', 'featured_cover', 'featured_cover_name', 'featured_at', 'status', 'likes', 'shares', 'views', 'duration', 'price', 'deleted_at'];


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

    public function evaluation(){
        return $this->hasOne('App\Models\Evaluation');
    }

    public function ratings(){
        return $this->hasMany('App\Models\Rating');
    }

    public function shopping_carts(){
        return $this->hasMany('App\Models\ShoppingCart');
    }

    //Relación con los estudiantes que poseen el curso
    public function users(){
        return $this->belongsToMany('App\Models\User', 'courses_users', 'course_id', 'user_id')->withPivot('progress', 'start_date', 'finish_date', 'certificate', 'favorite', 'language')->withTimestamps();
    }

    //Relacion Eventos que tiene un curso
    public function eventos(){
        return $this->hasMany('App\Models\Events');

    }
}
