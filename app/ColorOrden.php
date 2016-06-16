<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

class ColorOrden extends SleepingOwlModel
{
    protected $table = "ordenes_colores";

    protected $fillable = ["codigo",'ordenes'];

    
}
