<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteCityPrice extends Model
{
    use HasFactory;

    protected $table = 'route_city_prices';

    protected $primaryKey  = 'route_city_prices_id';

    protected $fillable = [
        'route_id',
        'city_id',
        'price',
    ];
}
