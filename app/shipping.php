<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shipping extends Model
{
    protected $table = "shipping";
    
    public function user(){
    	return $this->belongsTo('App\User','user_id','id');
    }

    public function orders () {
        return $this->hasOne('App\orders','ship_id','id');
    }
}
