<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Capital extends Model
{
    protected $fillable = [
        'unid',
        'date',
        'amount',
        'active',
        'business_id',
        'trans_id',
        'details',
    ];
}
