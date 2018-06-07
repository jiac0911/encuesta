<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante_transporte extends Model {
	public $timestamps = false;
	protected $table = 'estudiante_has_transporte';
	protected $fillable = ['idestudiante', 'idtransporte'];
}
