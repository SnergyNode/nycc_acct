<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cash extends Model
{
    protected $fillable = [
        'unid',
        'date',
        'amount',
        'type',
        'business_id',
        'trans_id',
        'model_id',
    ];
}
