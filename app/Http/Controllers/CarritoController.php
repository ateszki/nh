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
use Mail;


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

        //hasta que podamos vender nuevamente
        $data["precio"] = 0;
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
            //hasta que podamos vender nuevamente
            $color["precio"] = 0;
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

    public function confirmarPedido(Request $request){
        try {
            if(\Cart::count() == 0){
                return view('revisar-pedido-vacio');
            }
            
            //$user = \Auth::user();
            //$pedido = Pedido::create(['user_id'=>$user->id,'total'=>\Cart::total()]);
            $rows = \Cart::content();
            /*foreach ($rows as $row){
                PedidoLinea::create(['pedido_id'=>$pedido->id,'codigo'=>$row->id,'descripcion'=>$row->name,'precio'=>$row->price,'cantidad'=>$row->qty,'subtotal'=>$row->subtotal]);
            }*/
            $first_name = $request->get('first_name');

                if(!empty($first_name)){
                    abort(404);
                }
                $envio = Mail::send('email-pedido', ['rows' => $rows,'request' => $request->all()], function ($m) use ($request){
                    $m->from('info@nubehilados.com');
                    $m->replyTo($request->get('email'), $request->get('nombre'));

                    $m->to('valeria@nubehilados.com', 'Valeria')->cc('jonathan@nubehilados.com','Jonathan')->subject('Nuevo pedido desde la web');
                });

                $request->session()->flash('alert-success', 'Su mensaje fue enviado. ¡Muchas gracias!');
                \Cart::destroy();

                return view('confirmar-pedido');
            
            
            
            
        } catch(\Exception $e){
            $request->session()->flash('alert-danger', 'Ocurrió un error. Por favor intente nuevamente.');
            return view('revisar-pedido');
        
        }
    }

}
