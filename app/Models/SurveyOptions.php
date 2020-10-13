<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyOptions extends Model
{
    protected $table = 'survey_options';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question', 'content_event_id'
    ];


    public function responses(){
        return $this->hasMany('App\Models\SurveyResponse');
    }
}
