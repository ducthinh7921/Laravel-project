<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class brand extends Model
{
    protected $table = "brand";
    
    public function product(){
    	return $this->hasMany('App\product','brand_id','id');
    }
}
