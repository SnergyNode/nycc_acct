<?php

namespace App\Model;

use App\User;
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
        'current',
    ];

    public function operation(){
        return $this->hasOne(Operation::class, 'code_name', 'operation_code');
    }

    public function typeof(){
        switch ($this->type){
            case 'sole_proprietorship':
                return 'Sole Proprietorship';
                break;
        }
    }

    public function sales(){
        return $this->hasMany(Sale::class, 'business_id', 'unid');
    }

    public function user(){
        return $this->hasOne(User::class, 'unid', 'user_id');
    }
}
