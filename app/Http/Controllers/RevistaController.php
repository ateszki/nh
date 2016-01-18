<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Storage;

class RevistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function revistas()
    {
        $archivos = Storage::files('revistas');
        $tapas = array_filter($archivos,function($v,$k){
            return strpos($v,"tapa");
        }, ARRAY_FILTER_USE_BOTH);
        $revistas = [];

        foreach(array_reverse($tapas) as $tapa){
            $revistas[substr($tapa,-6,2)] = $tapa;
        }


        return view('revista', ['revistas' => $revistas]);
    }

   
    public function getPdf($numero){
        $mime = "application/pdf";
        if (Storage::has('revistas/Nube-'.$numero.".pdf")){
            $content = Storage::get('revistas/Nube-'.$numero.".pdf");
            return response($content)->header('Content-Type', $mime);
        }else{
            abort(404);
        }
    }

    public function getTapa($numero){
        $mime = "image/jpeg";
        if (Storage::has('revistas/tapa'.$numero.".jpg")){
            $content = Storage::get('revistas/tapa'.$numero.".jpg");
            return response($content)->header('Content-Type', $mime);
        }else{
            abort(404);
        }
    }
    public function getSumario($numero){
        $mime = "image/jpeg";
        if (Storage::has('revistas/sumario-'.$numero.".jpg")){
            $content = Storage::get('revistas/sumario-'.$numero.".jpg");
            return response($content)->header('Content-Type', $mime);
        }else{
            abort(404);
        }
    }
   
   

}
