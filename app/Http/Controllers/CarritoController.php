<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pedido;
use App\PedidoLinea;
use App\Item;
use App\ItemColor;
use App\ItemStats;


class CarritoController extends Controller
{
    public function add(){
        $data = \Input::all();
        if(!isset($data["precio"])){
            abort(404);
        }
        if(!isset($data["cantidad"])){
            abort(404);
        }
        if(!isset($data["codigo"])){
            abort(404);
        }
        if(!isset($data["descripcion"])){
            abort(404);
        }
        \Cart::add($data["codigo"], $data["descripcion"], $data["cantidad"], $data["precio"]);

        return view('header-cart');
    }
    public function addAll($codigo){
        
        $imagenes = glob(storage_path().'/app/prodimag/'.$codigo."-*");
        
        $hay_imagen = function($color) {
            return file_exists(storage_path()."/app/prodimag/".$color["codigo"]."-C.jpg");
        };
        $colores = array_filter(ItemColor::where('codigo','like',$codigo."-%")->get()->toArray(),$hay_imagen);
        
        foreach($colores as $color){
            \Cart::add($color["codigo"], $color["descripcion"], 1, $color["precio"]*3);
        }
        
        
        return view('header-cart');
    }
    public function remove($id){
        \Cart::remove($id);
        return response()->json(['total'=>\Cart::total(),'count'=>\Cart::count()]);
    }

    public function update($rowId,$cant){
        \Cart::update($rowId,$cant);
        $item_row = \Cart::get($rowId);
        return response()->json(['total'=>\Cart::total(),'count'=>\Cart::count(),'item_subtotal'=>$item_row->subtotal]);
    }

    public function HeaderCart(){
        return view('header-cart');
    }

    public function confirmarPedido(){
        try {
            if(\Cart::count() == 0){
                return view('revisar-pedido-vacio');
            }
            
            $user = \Auth::user();
            $pedido = Pedido::create(['user_id'=>$user->id,'total'=>\Cart::total()]);
            $rows = \Cart::content();
            foreach ($rows as $row){
                PedidoLinea::create(['pedido_id'=>$pedido->id,'codigo'=>$row->id,'descripcion'=>$row->name,'precio'=>$row->price,'cantidad'=>$row->qty,'subtotal'=>$row->subtotal]);
            }
            \Cart::destroy();
            return view('confirmar-pedido',['pedido'=>$pedido]);
        } catch(\Exception $e){
            return $e->message;
        }
    }

}
