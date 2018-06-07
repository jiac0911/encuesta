<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transporte extends Model {
	public $timestamps = false;
	protected $primaryKey = 'idtransporte';
	protected $table = 'transporte';
	protected $fillable = ['nombre'];

	public function estudiantes() {
		return $this->belongsToMany('App\Estudiante', 'estudiante_has_transporte', 'idestudiante', 'idtransporte');
	}
}
