<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    protected $table = "product";
    
    public function brand(){
    	return $this->belongsTo('App\brand','brand_id','id');
    }
    public function category(){
    	return $this->belongsTo('App\category','category_id','id');
    }
    public function strap(){
    	return $this->belongsTo('App\strap','strap_id','id');
    }

    public function order_details () {
        return $this->hasMany('App\order_details','product_id','id');
    }
    public function comments () {
        return $this->hasMany('App\comments','product_id','id');
    }



  

   
}
