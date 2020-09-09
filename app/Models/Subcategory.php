<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $table = 'subcategories';

    protected $fillable = ['title', 'slug'];

    public function courses(){
    	return $this->hasMany('App\Models\Course');
    }
}
