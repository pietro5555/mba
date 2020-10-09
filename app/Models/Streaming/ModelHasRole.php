<?php

namespace App\Models\Streaming;

use Illuminate\Database\Eloquent\Model;

class ModelHasRole extends Model{

	protected $connection = 'streaming';

	protected $table = "model_has_roles";

	public $timestamps = false;

    protected $fillable = ['role_id', 'model_type', 'model_id'];

}