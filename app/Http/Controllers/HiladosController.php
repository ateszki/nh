<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Item;
use App\ItemColor;
use App\ItemStats;
use App\ColorOrden;
use App\Accesorio;
use Storage;
use DB;

use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class HiladosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //DB::enableQueryLog();
        $qs = \Input::all();

        $temporada = (isset($qs["temporada"]) && $qs["temporada"] != '')?$qs["temporada"]:config('app.temporada');
        switch(substr($temporada,0,3)){
                    case 'OTO':
                        $temp='OI';
                        break;
                    case 'PRI':
                        $temp='PV';
                        break;
                    default:
                        $temp='OI';
                }
        $tipo = (isset($qs["tipo"]) && $qs["tipo"] != '')?$qs["tipo"]:'';
        
        $hilados_query = DB::table('items')
        ->select('items.codigo','items.descripcion','items.imagen','items.imagenes','stats.ventas','stats.visitas','precios.precio')
        ->where('items.temporada','=',$temp)
        ->where('precios.lista','=',config('app.lista_precio_publico'))
        ->where('items.tipo','like','HILADOS%')
        ->where('items.subtipo','like','%'.$tipo.'%')
        ->where('items.imagenes','=',true)
        ->where(function($query){
            $query->where('items.stockcero','=',true)->orWhere(function($query1){
                $query1->where('items.stockcero','=',false)->whereIn('items.codigo',function($query2){
                    $query2->select(DB::raw('left(item_stocks.codigo,4)'))->from('item_stocks')->where('item_stocks.stock','>',0);
                });
            });
        })
        ->join('item_stats as stats', DB::raw('trim(items.codigo)'), '=', 'stats.codigo', 'left outer')
        ->join('item_precios as precios', DB::raw('trim(items.codigo)'), '=', DB::raw('trim(precios.codigo)'), 'left outer');
        $orderBy = $request->input('orderby');
        if ($orderBy == ''){
            $hilados_query->orderBy('items.descripcion');
        } elseif($orderBy == 'descripcion'){
            $hilados_query->orderBy('items.descripcion');
        } else {
            $hilados_query->orderBy("stats.".$orderBy,'DESC');
        }

        $hilados = $hilados_query->paginate('25');
        $hilados->setPath(url("hilados"));
        //print_r(DB::getQueryLog());
        //die();

        $mas_visitados = ItemStats::orderBy('visitas','desc')->take(5)->get();

        $mas_vendidos = [];
        $query = DB::table('pedido_lineas')->select(DB::raw("left(codigo,4) as codigo,sum(cantidad) as ventas"))->groupBy(DB::raw('left(codigo,4)'))->orderBy(DB::raw("count(*) "),'desc')->take(5)->get();
        foreach ($query as $pl) {
            $it = Item::where("codigo","=",$pl->codigo)->first();
            if(!empty($it)){
                $mas_vendidos[] = $it;
            }
        }
        
        return view('hilados', ['hilados' => $hilados,'orderby'=>$orderBy,'temporada'=>$temporada,'tipo'=>$tipo,"mas_visitados"=>$mas_visitados,'mas_vendidos'=>$mas_vendidos]);
    }

    
    public function show($codigo)
    {
        $hilado = Item::where('codigo','=',$codigo)->firstOrFail();

        
        $itemStats = ItemStats::firstOrCreate(['codigo' => trim($hilado->codigo)]);
        $itemStats->codigo = trim($hilado->codigo);
        $itemStats->visitado();
        
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
        
       $mas_visitados = ItemStats::orderBy('visitas','desc')->take(5)->get();

        $mas_vendidos = [];
        $query = DB::table('pedido_lineas')->select(DB::raw("left(codigo,4) as codigo,sum(cantidad) as ventas"))->groupBy(DB::raw('left(codigo,4)'))->orderBy(DB::raw("count(*) "),'desc')->take(5)->get();
        foreach ($query as $pl) {
            $it = Item::where("codigo","=",$pl->codigo)->first();
            if(!empty($it)){
                $mas_vendidos[] = $it;
            }   
            
        }
        switch($hilado->temporada){
                    case 'OI':
                        $temporada='OTOÑO / INVIERNO';
                        break;
                    case 'PRI':
                        $temporada='PRIMAVERA / VERANO';
                        break;
                    default:
                        $temporada='OTOÑO / INVIERNO';
                }
        
        return view('colores', ['hilado' => $hilado,'colores' => $colores,"temporada"=>$temporada, "tipo"=>$hilado->subtipo,"mas_visitados"=>$mas_visitados,'mas_vendidos'=>$mas_vendidos]);
    }

    public function imagen($codigo,$tamanio){
        if(!in_array($tamanio, ["C","D","G"])){
            abort(404);
        }
        $path = 'prodimag/'.$codigo."-".$tamanio.".jpg";
        if (Storage::exists($path)){
            $mime = 'image/jpeg'; 
            $content = Storage::get($path);

            if($content == NULL){
                abort(404);
            }

            return response($content)->header('Content-Type', $mime)->header('Content-Disposition', 'inline;filename='.$codigo."-".$tamanio.".jpg");
        } else {
            abort(404);
        }
    }

    public function accesorios(Request $request)
    {
        //DB::enableQueryLog();
        $qs = \Input::all();

        $cat = (isset($qs["cat"]) && $qs["cat"] != '')?$qs["cat"]:config('app.accesorioscat');
        $tipo = (isset($qs["tipo"]) && $qs["tipo"] != '')?$qs["tipo"]:'';
        
        $accesorios = Accesorio::where('categoria','like','%'.$cat.'%')->where('tipo','like','%'.$tipo.'%')->paginate('25');

        //print_r(DB::getQueryLog());
        //die();

        $mas_visitados = ItemStats::orderBy('visitas','desc')->take(5)->get();

        $mas_vendidos = [];
        $query = DB::table('pedido_lineas')->select(DB::raw("left(codigo,4) as codigo,sum(cantidad) as ventas"))->groupBy(DB::raw('left(codigo,4)'))->orderBy(DB::raw("count(*) "),'desc')->take(5)->get();
        foreach ($query as $pl) {
            $it = Item::where("codigo","=",$pl->codigo)->first();
            if(!empty($it)){
                $mas_vendidos[] = $it;    
            }
        }
        
        return view('accesorios', ['accesorios' => $accesorios,'cat'=>$cat,'tipo'=>$tipo,"mas_visitados"=>$mas_visitados,'mas_vendidos'=>$mas_vendidos]);
    }
    
}
