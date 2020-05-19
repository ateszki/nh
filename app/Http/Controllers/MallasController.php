<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Item;
use App\ItemColor;
use App\ItemStats;
use App\Malla;
use Storage;
use DB;
use Auth;

use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class MallasController extends Controller
{

    public $mas_vendidos;
    public $mas_visitados;

    public function __construct(){
        
        $mas_visitados = ItemStats::orderBy('visitas','desc')->take(5)->get();

        $mas_vendidos = [];
        $query = DB::table('pedido_lineas')->select(DB::raw("left(codigo,4) as codigo,sum(cantidad) as ventas"))->groupBy(DB::raw('left(codigo,4)'))->orderBy(DB::raw("count(*) "),'desc')->take(5)->get();
        foreach ($query as $pl) {
            $it = Item::where("codigo","=",$pl->codigo)->first();
            if(!empty($it)){
                $mas_vendidos[] = $it;
            }
        }

        $this->mas_visitados = $mas_visitados;
        $this->mas_vendidos = $mas_vendidos;

    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //DB::enableQueryLog();
        $qs = \Input::all();

        if(Auth::check()){
            $lista = Auth::user()->lista;
        } else {
            $lista = config('app.lista_precio_publico');
        }
        
        
        $orderBy = $request->input('orderby');
        if ($orderBy == ''){
            $orderBy = 'mallas.nombre';
        } elseif($orderBy == 'nombre'){
            $orderBy = 'mallas.nombre';
        } else {
            $orderBy = "mallas.nombre";
        }

        /*
        $mallas_query = DB::table('mallas')->select('mallas.coditm','mallas.nombre','precios.precio')->distinct()
        ->join('item_precios as precios', DB::raw('trim(mallas.coditm)'), '=', DB::raw('trim(precios.codigo)'), 'left outer')
        ->where('precios.lista','=',$lista)
        ;
        $mallas = $mallas_query->orderBy($orderBy)->paginate('25');
        */
        $mallas = Malla::orderBy($orderBy)->distinct()->select('coditm','nombre')->paginate(25);

        $mallas->setPath(url("mallas"));
        //print_r(DB::getQueryLog());
        //die();

        
        
        return view('trajes-de-banio', ['mallas' => $mallas,'lista'=>$lista,'orderby'=>$orderBy,"mas_visitados"=>$this->mas_visitados,'mas_vendidos'=>$this->mas_vendidos]);
    }

    public function catalogo(){
       return redirect('https://www.nubehilados.com/', 302, []);
       
        $joven = glob(public_path().'/images/trajes-de-banio/joven/*.jpg');
        $seniora = glob(public_path().'/images/trajes-de-banio/seniora/*.jpg');
        
        return view('trajes-de-banio-catalogo',["mas_visitados"=>$this->mas_visitados,'mas_vendidos'=>$this->mas_vendidos,"joven"=>$joven,"seniora"=>$seniora]);
    }
   
    
}
