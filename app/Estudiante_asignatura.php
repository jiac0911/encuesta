<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante_asignatura extends Model {
	public $timestamps = false;
	protected $table = 'estudiante_has_asignatura';
	protected $fillable = ['idestudiante', 'idasignatura', 'cantidad'];
}
