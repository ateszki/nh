<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

class Pedido extends SleepingOwlModel
{
    protected $fillable = ['user_id','total'];

    public function lineas(){
    	return $this->hasMany('App\PedidoLinea');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }

    public static function getList()
    {
        return static::lists('total', 'id')->toArray();
    }
}
