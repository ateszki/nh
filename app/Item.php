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

    public function colores(){

        $hilado = $this;
        $codigo = trim($hilado->codigo);
        $imagenes = glob(storage_path().'/app/prodimag/'.$codigo."-*");
        
        
        $hay_imagen = function($color) {
            return file_exists(storage_path()."/app/prodimag/".$color["codigo"]."-C.jpg");
        };
        $colores_desordenado = array_filter(ItemColor::where('codigo','like',$codigo."-%")->get()->toArray(),$hay_imagen);
        
        $oc = ColorOrden::where('codigo','=',$codigo)->first();
        if($oc != false){
            $lista = $oc->ordenes;
            $ayLista = explode("\r\n",$lista);
            $colores = [];

            foreach($ayLista as $key){
                foreach ($colores_desordenado as $k => $color) {
                    if(substr($color["codigo"],-4)==$key){
                        array_push($colores,$color);
                        unset($colores_desordenado[$k]);
                        break;
                    }
                }
            }

            $colores = array_merge($colores,$colores_desordenado);
        
        } else {
            $colores = $colores_desordenado;
        }
        return $colores;
    }
}
