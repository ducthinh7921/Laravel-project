<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = "orders";

    public function user(){
    	return $this->belongsTo('App\User','user_id','id');
    }

    public function shipping () {
        return $this->belongsTo('App\shipping','ship_id','id');
    }

    public function order_details(){
    	return $this->hasMany('App\order_details','order_id','id');
    }

    public function coupon() {
        return $this->belongsTo('App\coupon','coupon_id','id');
    }

    public function coupon_used () {
        return $this->hasOne('App\coupon_used','order_id','id');
    }
}
