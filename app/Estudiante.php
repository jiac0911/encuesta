<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model {
	public $timestamps = false;
	protected $primaryKey = 'idestudiante';
	protected $table = 'estudiante';
	protected $fillable = ['nombre', 'fecha_nacimiento', 'telefono', 'celular', 'correo', 'direccion', 'vive', 'idgrupo', 'idprograma', 'idbeca', 'idtutor'];
}
