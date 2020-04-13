<?php

namespace App;

use App\Model\Business;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unid',
        'first_name',
        'last_name',
        'email',
        'phone',
        'reset_exp',
        'reset_token',
        'activation_token',
        'password',
        'who',
        'setup',
        'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
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

    public function businessIndex(){
        return Business::where('user_id',$this->unid)->select(['id'])->get()->count();
    }

    public function business(){
        return $this->hasMany(Business::class, 'user_id', 'unid');
    }
}
