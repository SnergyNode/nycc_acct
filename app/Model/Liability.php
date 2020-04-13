<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Liability extends Model
{
    protected $fillable = [
        'unid',
        'name',
        'date',
        'amount',
        'active',
        'business_id',
        'trans_id',
        'details',
    ];
}
