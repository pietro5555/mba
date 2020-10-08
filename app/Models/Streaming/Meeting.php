<?php

namespace App\Models\Streaming;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model{

	protected $connection = 'streaming';

	protected $table = "meetings";

    protected $fillable = ['uuid', 'type', 'title', 'agenda', 'description', 'start_date_time', 'preiod', 'category_id', 'user_id'];

}