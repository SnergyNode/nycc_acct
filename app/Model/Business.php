<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [
        'name',
        'info',
        'type',
        'user_id',
        'operation_code',
        'unid',
        'active',
    ];
}
