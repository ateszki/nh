<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use SleepingOwl\Models\SleepingOwlModel;

class Pedido extends SleepingOwlModel
{
    use SoftDeletes;
    protected $fillable = ['user_id','total'];
    protected $dates = ['deleted_at'];

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
