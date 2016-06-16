<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

class Accesorio extends SleepingOwlModel
{
    protected $table = "accesorios";

    protected $fillable = ["codigo","categoria", "tipo", "nombre", "descripcion"];

}
