<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventResources extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'event_resources';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'resources_id',
        'event_id',
        'status'
    ];



     /**
     * consultar recursos por id eventos
     */
    public static function findResourcesEventId($event_id)
    {
        return self::where('event_id', '=', $event_id)->get();
    }

    public function resources(){
        return $this->belongsTo('App\Models\Resources', 'resources_id', 'id');
    }

    public function event(){
        return $this->belongsTo('App\Models\Events', 'event_id', 'id');
    }
}
