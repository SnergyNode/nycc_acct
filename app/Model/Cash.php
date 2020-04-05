<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    protected $fillable = [
        'unid',
        'date',
        'amount',
        'business_id',
        'trans_id',
    ];
}