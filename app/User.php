<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function shipping () {
        return $this->hasMany('App\shipping','user_id','id');

    }
    public function comments () {
        return $this->hasMany('App\comments','user_id','id');

    }

    public function orders () {
        return $this->hasMany('App\orders','user_id','id');

    }
  
    public function verifyUser () {
        return $this->hasOne('App\VerifyUser');
    }

    public function coupon_used () {
        return $this->hasMany('App\coupon_used','user_id','id');

    }
  
}
