<?php

namespace App\Models\Streaming;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model{

	protected $connection = 'streaming';

	protected $table = "meeting_invitees";

    protected $fillable = ['uuid', 'meeting_id', 'contact_id'];

}