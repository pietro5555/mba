<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insignia extends Model
{
    //
    protected $table = "insignia";

    protected $fillable = [
        'course_id', 'course_name', 'nivel_id', 'nivel_name', 'insignia'
    ];
}
