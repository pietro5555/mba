<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    protected $table = 'survey_options_response';
    protected $fillable = ['response', 'survey_options_id', 'user_id', 'selected'];

    public function question()
    {
        return $this->belongsTo('App\Models\SurveyOptions', 'survey_options_id', 'id');
    }

    public function user()
    {
        return $this->hasMany('App\Models\User', 'user_id');
    }


}
