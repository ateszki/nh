<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoLinea extends Model
{
    protected $fillable = ['pedido_id','codigo','descripcion','precio','cantidad','subtotal'];

    public function pedido(){
    	return $this->belongsTo('App\Pedido');
    }

    public function item(){
    	return Item::where('codigo','=',$this->codigo)->first();
    }
}
