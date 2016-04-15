<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class ItemColor extends Model
{
    public function getPrecioAttribute(){
    	if(Auth::check()){
    		$lista = Auth::user()->lista;
    	} else {
    		$lista = config('lista_precio_publico');
    	}

    	$precio = \DB::select("select  format(precio,2) as precio from item_precios where lista = ? and codigo = ?",[$lista,substr($this->codigo,0,4)]);
    	//dd($lista);
    	return (count($precio) ==0)?'-':round($precio[0]->precio);
    }

    protected $appends = ['precio'];
}
