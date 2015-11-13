<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    public function usuario(){
    	return $this->belongsTo('App\User');
    }
}
