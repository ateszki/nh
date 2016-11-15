<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Auth;

class Item extends Model
{
    public function getPrecioAttribute(){
    	if(Auth::check()){
    		$lista = Auth::user()->lista;
    	} else {
    		$lista = config('lista_precio_publico');
    	}

    	$precio = \DB::select("select  format(precio,2) as precio from item_precios where lista = ? and codigo = ?",[$lista,$this->codigo]);
    	//dd($lista);
    	return (count($precio) ==0)?'-':round($precio[0]->precio);
    }

    
    public function getDescripcionLimpiaAttribute(){
        return preg_replace('/\*[a-zA-Z0-9 ]*/','',$this->descripcion);
    }

    protected $appends = ['precio','descripcion_limpia'];
}
