<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonUser extends Model
{
    protected $table = 'lessons_users';
    protected $fillable = ['user_id','lesson_id', 'course_id','status'];

}
