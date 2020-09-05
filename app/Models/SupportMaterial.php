<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportMaterial extends Model
{
    protected $table = 'support_material';

    protected $fillable = ['lesson_id', 'title', 'type', 'material'];

    public function lesson(){
        return $this->belongsTo('App\Models\Lesson');
    }
}
