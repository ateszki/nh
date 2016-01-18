<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SleepingOwl\Models\SleepingOwlModel;

class Ficha extends SleepingOwlModel
{
    protected $fillable = [
		'numero',
		'nombre',
		'data',
		'imagen',
		'extension',
	];
}
