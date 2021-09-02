<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
    protected $table = "order_details";

    public function orders () {
        return $this->belongsTo('App\orders','order_id','id');
    }

    public function product () {
        return $this->belongsTo('App\product','product_id','id');
    }
    
   
}
