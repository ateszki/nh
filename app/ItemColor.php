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

    	$precio = \DB::select("select  precio from item_precios where lista = ? and codigo = ?",[$lista,str_replace("-0", "-", $this->codigo)]);
    	//dd($lista);
    	return (count($precio) ==0)?'-':$precio[0]->precio;
    }

    protected $appends = ['precio'];
}
