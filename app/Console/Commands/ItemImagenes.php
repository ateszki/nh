<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Item;

class ItemImagenes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'items:imagenes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Verifica que haya imágenes para el item y actualiza la propiedad.';

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
        $items = Item::all();

        foreach ($items as $item) {
            $imgs = glob(storage_path('app')."/prodimag/".trim($item->codigo)."*-G*");
            $item->imagenes = count($imgs)>0?true:false;
            
            $imagenes = array_filter($imgs,function($i)  {
                return !in_array(substr($i,-9,3), ['800','804','805','290']);
            });
            if(count($imagenes)>0){
                $imagenes = array_values($imagenes);
            }

            $item->imagen = count($imagenes)>0?substr($imagenes[rand(0,count($imagenes)-1)],-15,9):NULL;
            $item->save();
        }
    } 
}
