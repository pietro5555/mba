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
        'type',
        'url_streaming',
        'url_video',
        'user_id',
        'description',
        'date_end',
        'status'
    ];

    // 0=desactivado, 1=activo,  2=programado  3=iniciado, 4=finalizado

    public static function findID($id)
    {
        $mentor = DB::table('wp98_users')
        ->select('ID', 'user_email')
        ->where('ID', '=', $id)
        ->orderBy('user_email', 'ASC')
        ->get();

        return $mentor[0]->user_email;
    }

}
