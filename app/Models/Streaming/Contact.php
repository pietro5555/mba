<?php

namespace App\Models\Streaming;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model{

	protected $connection = 'streaming';

	protected $table = "contacts";

    protected $fillable = ['uuid', 'name', 'email', 'user_id'];

}