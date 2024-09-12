<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusRoute extends Model
{
    use HasFactory;

    protected $table = 'bus_routes';

    protected $primaryKey  = 'route_id';

    protected $fillable = [
        'bus_id',
        'start_time',
        'end_time',
    ];
}
