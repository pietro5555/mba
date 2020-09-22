<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Events extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'events';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'date',
        'image',
        'type',
        'url_streaming',
        'url_video',
        'user_id',
        'id_courses',
        'description',
        'date_end',
        'status'
    ];

    
    public function users(){
        return $this->belongsToMany('App\Models\User', 'events_users', 'event_id', 'user_id')->withPivot('date', 'time', 'favorite')->withTimestamps();
    }

    public function getResource(){
        return $this->EventResources()->with('resources')->get();
    }

    // 0=desactivado, 1=activo,  2=programado  3=iniciado, 4=finalizado

    public function getEmailMentorAttribute(){
        return $this->mentor->user_email;
    }

    public static function findID($id)
    {
        $mentor = DB::table('wp98_users')
        ->select('ID', 'user_email')
        ->where('ID', '=', $id)
        ->orderBy('user_email', 'ASC')
        ->get();

        return $mentor[0]->user_email;
    }

    public function EventResources(){
        return $this->hasMany('App\Models\EventResources', 'event_id', 'id');
    }

    public function mentor()
       {
          return $this->belongsTo('App\Models\User', 'user_id');
       }

    //Relacion Evento que pertenece a un curso
    public function curso()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }

}
