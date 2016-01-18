<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemStats extends Model
{
    protected $fillable = ["visitas","ventas"];

    public function visitado(){
    	$this->visitas += 1;
    	$this->save();
    }

    public function vendido(){
    	$this->ventas += 1;
    	$this->save();
    }

}
