<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clients';

    protected $primaryKey  = 'clnt_id';

    protected $fillable = [
            'clnt_name',
            'clnt_nic',
            'clnt_contact_no_def',
            'clnt_contact_no_sec',
            'user_id',
    ];
}
