<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = ['title', 'slug', 'category_id', 'subcategory_id', 'description', 'cover', 'cover_name', 'status'];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function subcategory(){
        return $this->belongsTo('App\Models\Subcategory');
    }
}
