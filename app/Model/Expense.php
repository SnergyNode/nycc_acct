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
        'category_id',
        'type',
        'other_title',
        'details',
    ];

    public function transaction(){
        return $this->hasOne(Transaction::class, 'unid', 'trans_id');
    }

    public function types(){
        $val = "";
        if($this->type === "paid"){
            $val = ucfirst($this->type);
        }

        if($this->type === "yet_to"){
            $val = "Yet to Pay";
        }

        if($this->type === "paid_ad"){
            $val = "Paid in Advance";
        }

        if($this->type === "other"){
            $val = ucfirst($this->other_title);
        }

        return $val;
    }
}
