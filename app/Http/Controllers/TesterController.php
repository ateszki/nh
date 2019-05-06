<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;
use App\Item;
use App\ItemStock;

class TesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function testerForm()
    {
    	return view('testerform');
    }

    public function tester(Request $request){
    	$codigo = $request->get('codigo');

    	$item = Item::where('codigo','=',$codigo)->first();

    	$mensajes = [];
    	$errores = [];

    	if(empty($item)){
    		$errores[] = "El item ".$codigo." no está cargado en la base de datos";
    		$item = new Item();
    		$item->codigo = $codigo;
    	} else {
    		$mensajes[] = "El item ".$codigo." ".$item->descripcion_limpia."está cargado en la base de datos"; 
    	}

    	$stockcero = $item->stockcero ? "SI":"NO";
    	$mensajes[] = "El item ".$stockcero." premite stock en cero";

    	$colores = $item->colores();

    	if(count($colores) == 0){
    		$errores[] = "No se encontraron archivos de imágenes para los colores";
    	} else {
    		$mensajes[] = "Se encontraron los siguientes archivos de colores: ";
    		foreach($colores as $color){
    			$stock = ItemStock::where('codigo','=',$color["codigo"])->first();
    			$cant = (empty($stock)) ? 0 : $stock->stock;
    			$mensajes[] = "Color: ".substr($color["codigo"],-4)." - Stock: ".$cant;
    		}
    	}

    	$mensajes[] = "El precio disponible al publico es ".$item->precio;

    	
    	

    	return view("tester",["mensajes"=>$mensajes,"errores"=>$errores]);


    }
}
