<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseUser extends Model
{
    use SoftDeletes;

    protected $table = 'courses_users';
    protected $dates = ['deleted_at'];
    protected $fillable = ['course_id','user_id' ,'progress', 'start_date','finish_date', 'certificate', 'favorite'];


}
