<?php

namespace App;
use \Auth;

use Illuminate\Database\Eloquent\Model;

class Malla extends Model
{
    public function getPrecioAttribute(){
    	if(Auth::check()){
    		$lista = Auth::user()->lista;
    	} else {
    		$lista = config('lista_precio_publico');
    	}

    	$precio = \DB::select("select  format(precio,2) as precio from item_precios where lista = ? and codigo = ?",[$lista,$this->coditm]);
    	//dd($lista);
    	return (count($precio) ==0)?'-':round($precio[0]->precio);
    }

    public function getColoresAttribute(){
    	$colores = \DB::select("select distinct codcolor, color from mallas where coditm = ?",[$this->coditm]);
    	return json_encode($colores);
    }
    
	public function getTallesAttribute(){
    	$talles = \DB::select("select distinct codtalle, codtalle as talle from mallas where coditm = ?",[$this->coditm]);
    	return json_encode($talles);
    }
    
    protected $appends = ['precio','colores','talles'];
}