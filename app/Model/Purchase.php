<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'umid',
        'date',
        'amount',
        'active',
        'business_id',
        'trans_id',
        'details',
    ];

    public function transaction(){
        return $this->hasOne(Transaction::class, 'unid', 'trans_id');
    }
}
