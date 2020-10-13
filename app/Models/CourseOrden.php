<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseOrden extends Model
{
    protected $table = 'courses_orden';

    protected $fillable = [
        'user_id', 'total', 'detalles', 'idtransacion_stripe',
        'idtransacion_coinpayment', 'status', 'type_product'
    ];
}
