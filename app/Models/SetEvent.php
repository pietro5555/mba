<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class SetEvent extends Model
{
    protected $table = 'event_content';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'title', 'type', 'url', 'event_id'
    ];

    //métodos
    public function pregunta()
    {
        return $this->hasOne('App\Models\SurveyOptions', 'content_event_id');
    }

}
