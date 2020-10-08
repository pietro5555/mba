<?php

namespace App\Models\Streaming;

use Illuminate\Database\Eloquent\Model;

class User extends Model{

	protected $connection = 'streaming';

	protected $table = "users";

    protected $fillable = ['uuid', 'name', 'email', 'username', 'email_verified_at', 'password', 'status'];

}