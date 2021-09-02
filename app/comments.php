<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    protected $table = "comments";


    
    public function user(){
    	return $this->belongsTo('App\User','user_id','id');
    }
    public function product(){
    	return $this->belongsTo('App\product','product_id','id');
    }
}
