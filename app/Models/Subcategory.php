<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'subcategories';

    protected $fillable = ['category_id', 'title', 'slug'];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }

    public function courses(){
    	return $this->hasMany('App\Models\Course');
    }
}
