<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = ['evaluation_id', 'order', 'question', 'answer_1', 'answer_2', 'answer_3', 'answer_4', 'correct_answer'];

    public function evaluation(){
        return $this->belongsTo('App\Models\Evaluation');
    }
}
