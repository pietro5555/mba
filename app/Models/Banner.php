<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    protected $table = 'banners';

    protected $fillable = ['title', 'page', 'image', 'url', 'status'];
}
