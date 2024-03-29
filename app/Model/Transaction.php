<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'unid',
        'business_id',
        'user_id',
        'date',
        'type',
        'type_id',
        'active',
    ];

    public function expense(){
        return $this->hasOne(Expense::class, 'unid', 'type_id');
    }

    public function purchase(){
        return $this->hasOne(Purchase::class, 'unid', 'type_id');
    }

    public function sale(){
        return $this->hasOne(Sale::class, 'unid', 'type_id');
    }

    public function value($key){
        $model = null;
        switch ($this->type){
            case 'sales':
                $model = Sale::class;
                break;
            case 'purchases':
                $model = Purchase::class;
                break;
            case 'expenses':
                $model = Expense::class;
                break;
            case 'asset':
                $model = Asset::class;
                break;
            case 'capital':
                $model = Capital::class;
                break;
            case 'liability':
                $model = Liability::class;
                break;
            default:
                $model = null;
                break;
        }

        if($model!=null){
            return $model::where('trans_id', $this->unid)->first()->$key;
        }else{
            return "";
        }
    }

    public function business(){
        return $this->hasOne(Business::class, 'unid', 'business_id');
    }

    public function model(){
        $model = null;
        switch ($this->type){
            case 'sales':
                $type = '';
                $model = Sale::class;
                break;
            case 'purchases':
                $type = '';
                $model = Purchase::class;
                break;
            case 'expenses':
                $type = '';
                $model = Expense::class;
                break;
            case 'asset':
                $type = '';
                $model = Asset::class;
                break;
            case 'capital':
                $type = '';
                $model = Capital::class;
                break;
            case 'liability':
                $type = '';
                $model = Liability::class;
                break;
            default:
                $model = null;
                break;
        }

        return $model::where('');
    }



}
