<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model {
	public $timestamps = false;
	protected $primaryKey = 'idasignatura';
	protected $table = 'asignatura';
	protected $fillable = ['idasignatura', 'nombre', 'nivel'];
	public function estudiantes() {
		return $this->belongsToMany('App\Estudiante', 'estudiante_has_asignatura', 'idasignatura', 'idestudiante');
	}
}
