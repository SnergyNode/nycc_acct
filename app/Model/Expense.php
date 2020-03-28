<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
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

    public function transaction(){
        return $this->hasOne(Transaction::class, 'unid', 'trans_id');
    }
}
