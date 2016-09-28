<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;

class ItemsImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'items:import {--tipo= :items, stock, precios, todo}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importa items desde BAS.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if(!in_array($this->option('tipo'),['items', 'stock', 'precios', 'mallas', 'todo'])){
            $this->error("Las opciones de tipo deben ser: items, stock, precios, mallas o todo");
            return false;
        }
        //finalizo el proceso para que no corra hasta arreglar db
        //return true;
        $opt = $this->option('tipo');
        if($opt == 'precios' || $opt == 'todo'){
            //items precios
            \DB::table('item_precios')->truncate();

            $maplineas = function ($linea){
                $p = explode("\t",$linea);
                if(count($p)<3){
                    return NULL;
                }
                $p[1] = trim($p[1]);
                if(isset($p[3]) && trim($p[3])!=''){
                    $p[1] .= "-".trim($p[3]);
                }
                unset($p[3]);
                return $p;
            };

            $filtrolineas = function($linea){
                return (trim($linea[2]) != '');
            };

            $precios = \Storage::get('items/items_prec.txt');
            $precios = explode("\n",$precios);
            $precios1 = array_map($maplineas, $precios);
            $precios2 = array_filter($precios1,$filtrolineas);
            foreach ($precios2 as $precio){
                $q = "insert into item_precios (lista,codigo,precio) values (?,?,?)";
                \DB::statement($q,$precio);
            }    
        }
        if($opt == 'stock' || $opt == 'todo'){
            \DB::table('item_stocks')->truncate();

            $maplineasstock = function ($linea){
                $p = explode("\t",$linea);
                if(count($p)<2){
                    return '';
                }
                
                return $p;
            };
            $filtrolineasstock = function($linea){
                return (is_array($linea));
            };

            $stock = \Storage::get('items/items_stock.txt');
            $stock = explode("\n",$stock);
            $stock1 = array_map($maplineasstock, $stock);
            $stock2 = array_filter($stock1,$filtrolineasstock);

            die(storage_path().'items/items_stock.txt');
            /*foreach ($stock2 as $stk){
                $q = "insert into item_stocks (codigo,stock) values (?,?)";
                \DB::statement($q,$stk);
            } */   
        }
        if($opt == 'items' || $opt == 'todo'){
            \DB::table('item_colors')->truncate();

            $maplineascolor = function ($linea){
                $p = explode("\t",$linea);
                if(count($p)<2){
                    return '';
                }
                if(strpos($p[1],'D. ')){
                    $p[1] = substr($p[1],0,strpos($p[1],'D. '))." - ".substr($p[1],strpos($p[1],"-"+1));
                }
                
                return $p;
            };
            $filtrolineascolor = function($linea){
                return (is_array($linea));
            };

            $color = \Storage::get('items/items.txt');
            $color = explode("\n",$color);
            $color1 = array_map($maplineascolor, $color);
            $color2 = array_filter($color1,$filtrolineascolor);

            foreach ($color2 as $color){
                $q = "insert into item_colors (codigo,descripcion) values (?,?)";
                \DB::statement($q,$color);
            }    

            \DB::table('items')->truncate();

            $maplineasitem = function ($linea){
                $p = explode("\t",$linea);
                if(count($p)<2){
                    return '';
                }
                if(strpos($p[1],'D. ')){
                    $p[1] = substr($p[1],0,strpos($p[1],'D. '));
                }
                $p[6]=(substr($p[6],0,3)=='OTO')?"OTOÑO / INVIERNO":$p[6];
                unset($p[4]);


                
                
                return array_values($p);
            };
            $filtrolineasitem = function($linea){
                return (is_array($linea));
            };

            $items = \Storage::get('items/items_atrib.txt');
            $items = explode("\n",$items);
            $items1 = array_map($maplineasitem, $items);
            $items2 = array_filter($items1,$filtrolineasitem);
            //dd($items2);
            
            foreach ($items2 as $item){
                $q = "insert into items (codigo,descripcion,crochet,tricot,presentacion,temporada,tipo,subtipo,stockcero) values (?,?,?,?,?,?,?,?,?)";
                $item[8] = trim($item[8])=='NO'?false:true;
                \DB::statement($q,$item);
            }    
        }
        $opt = $this->option('tipo');
        if($opt == 'mallas' || $opt == 'todo'){
            //mallas
            \DB::table('mallas')->truncate();

            $maplineas = function ($linea){
                $p = explode("\t",$linea);
                if(count($p)<3){
                    return NULL;
                }
                $p[1] = trim($p[1]);
                return $p;
            };

            
            $mallas = \Storage::get('items/mallas.txt');
            $mallas = explode("\n",$mallas);
            $mallas1 = array_map($maplineas, $mallas);
            foreach ($mallas1 as $mallas){
                $q = "insert into mallas (coditm,coditmcompleto,codtalle,codcolor,nombre,color) values (?,?,?,?,?,?)";
                \DB::statement($q,$mallas);
            }    
        }
    }
}
