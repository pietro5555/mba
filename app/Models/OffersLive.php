<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OffersLive extends Model
{
    //

    protected $table = "offers_live";

    protected $fillable = [
        'event_id', 'title', 'price', 'url_resource'
    ];
}
