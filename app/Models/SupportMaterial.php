<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportMaterial extends Model
{
    protected $table = 'support_material';

    protected $fillable = ['course_id', 'title', 'type', 'material', 'image'];

    public function course(){
        return $this->belongsTo('App\Models\Course');
    }
}
