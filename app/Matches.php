<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    //
    public function getTeam1(){
    	return $this->belongsTo('App\Teams','team1');
    }
    public function getTeam2(){
    	return $this->belongsTo('App\Teams','team2');
    }
    
}
 