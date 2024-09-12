<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    protected $primaryKey  = 'reservations_id';

    protected $casts = [
        'seats' => 'array'
    ];

    protected $fillable = [
        'status',
        'reservation_date',
        'clnt_id',
        'bus_id',
        'route_id',
        'city_first',
        'city_second',
        'seats_count',
        'price_per_one_seat',
        'price_total',
        'notice',
        'seats',
    ];
}
