<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coupon_used extends Model
{
    protected $table = "coupon_used";
    
    public function coupon(){
    	return $this->belongsTo('App\coupon','coupon_id','id');
    }

    public function user(){
    	return $this->belongsTo('App\User','user_id','id');
    }

    public function orders(){
    	return $this->belongsTo('App\orders','order_id','id');
    }
}
