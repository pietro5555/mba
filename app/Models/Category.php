<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['uuid', 'title', 'slug', 'icon', 'cover', 'cover_name'];

    public function course(){
        return $this->hasOne('App\Models\Course');
    }

    public function events(){
    	return $this->hasMany('App\Models\Events');
    }
}
