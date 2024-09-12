<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    use HasFactory;

    protected $table = 'buses';

    protected $primaryKey  = 'bus_id';

    protected $fillable = [
        'bus_name',
        'bus_reg_no',
        'bus_contact_no',
        'bus_no_seats',
        'status',
    ];
}
