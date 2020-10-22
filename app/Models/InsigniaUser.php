<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InsigniaUser extends Model
{
    //
    protected $table = "insignia_user";

    protected $fillable = [
        'user_id', 'course_id', 'insignia_id', 'status'
    ];
}
