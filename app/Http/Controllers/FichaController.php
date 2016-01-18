<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Ficha;
use Storage;

class FichaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fichas = Ficha::paginate(12);
        return view('fichas', ['fichas' => $fichas]);
    }

   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function getPdf($id){
        $ficha = Ficha::findOrFail($id);
        $mime = "application/pdf";
        if (Storage::has('fichas/'.$ficha->id.".pdf")){
            $content = Storage::get('fichas/'.$ficha->id.".pdf");
            return response($content)->header('Content-Type', $mime);
        }else{
            abort(404);
        }

                 
    }

    public function getImagen($id){
        $ficha = Ficha::findOrFail($id);
        $mimetype = array( 
                'gif'=>'image/gif', 
                'png'=>'image/png', 
                'jpg'=>'image/jpeg', 
                ); 
        $content = NULL;
        $mime = NULL;
        foreach ($mimetype as $ext=>$type){
            if (Storage::has('fichas/'.$ficha->id.".".$ext)){
                $content = Storage::get('fichas/'.$ficha->id.".".$ext);
                $mime = $type;
                break;
            }
        }
        if($content == NULL){
            abort(404);
        }

        return response($content)->header('Content-Type', $mime)->header('Content-Disposition', 'attachment')->header('filename', $ficha->numero.'.pdf');         
    }

}
