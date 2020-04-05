<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Admin extends Authenticatable
{
    use Notifiable;
    //
    protected $fillable = [
        'unid',
        'first_name',
        'last_name',
        'username',
        'email',
        'phone',
        'reset_exp',
        'reset_token',
        'password',
        'who',
        'active',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function names(){
        return $this->first_name . " " . $this->last_name;
    }
}
