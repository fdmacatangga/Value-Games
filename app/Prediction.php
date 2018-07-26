<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    //
    public $timestamps = false;

    public function match(){
    	return $this->belongsTo('App\Matches','match_id');
    }

    public function user(){
    	return $this->belongsTo('App\User');	
    }
}
