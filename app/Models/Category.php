<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['title', 'slug'];

    public function subcategories(){
        return $this->hasMany('App\Models\Subcategory');
    }

    public function courses(){
        return $this->hasMany('App\Models\Course');
    }
}
