<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Ficha extends Model
{
    protected $fillable = [
		'numero',
		'nombre',
		'data',
		'imagen',
		'extension',
	];
}
