<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $fillable =[
        'name',
        'code_name',
        'info',
    ];
}
