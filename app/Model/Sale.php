<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
        'unid',
        'date',
        'amount',
        'active',
        'business_id',
        'trans_id',
        'details',
        'type',

    ];

    public function transaction(){
        return $this->hasOne(Transaction::class, 'unid', 'trans_id');
    }
}
