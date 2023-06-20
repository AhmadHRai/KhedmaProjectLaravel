<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
// use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    // use HasApiTokensns , Notifiable;

    protected $fillable = [
        'name', 'email', 'password','remember_token' , 'role' ,'status'
    ];

    public function ads()
    {
        return $this->hasMany('App\Ads');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

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
}
