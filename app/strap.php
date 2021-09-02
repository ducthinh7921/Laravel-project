<?php

namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class strap extends Model
{
    protected $table = "strap";

    public function product(){
    	return $this->hasMany('App\product','strap_id','id');
    }
    
}
