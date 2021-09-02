<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    protected $table = "coupon";
    
    public function coupon_used(){
    	return $this->hasMany('App\coupon_used','coupon_id','id');
    }

    public function orders() {
        return $this->hasMany('App\coupon','coupon_id','id');
    }
    
}
