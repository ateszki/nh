<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class ColorOrden extends Model
{
    protected $table = "ordenes_colores";

    protected $fillable = ["codigo",'ordenes'];

    
}
