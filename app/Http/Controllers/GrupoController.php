<?php

namespace App\Http\Controllers;

use App\Asignatura;
use App\Beca;
use App\Estudiante;
use App\Estudiante_asignatura;
use App\Estudiante_transporte;
use App\Grupo;
use App\Programa;
use App\Transporte;
use App\Tutor;
use Illuminate\Http\Request;

class GrupoController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		// $libros=Libro::orderBy('id','DESC');
		// // ->paginate(3);
		// return view('Libro.index',compact('libros'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function saveEstudiante(Request $request) {
		if (request('beca')) {
			Estudiante::create([
				'nombre' => request('nombre'),
				'fecha_nacimiento' => request('fechaN'),
				'telefono' => request('telefono'),
				'celular' => request('celular'),
				'correo' => request('correo'),
				'direccion' => request('direccion'),
				'vive' => request('vive'),
				'idgrupo' => request('grupo'),
				'idprograma' => request('programa'),
				'idbeca' => request('beca'),
				'idtutor' => request('tutor'),

			]);
		} else {
			Estudiante::create([
				'nombre' => request('nombre'),
				'fecha_nacimiento' => request('fechaN'),
				'telefono' => request('telefono'),
				'celular' => request('celular'),
				'correo' => request('correo'),
				'direccion' => request('direccion'),
				'vive' => request('vive'),
				'idgrupo' => request('grupo'),
				'idprograma' => request('programa'),
				'idbeca' => 1,
				'idtutor' => request('tutor'),

			]);
		}

		$e = Estudiante::all()->last();

		if (request('transportes') != null) {
			foreach (request('transportes') as $transporte) {

				Estudiante_transporte::create([
					'idtransporte' => $transporte,
					'idestudiante' => $e['idestudiante'],

				]);
			}
		}

		if (request('cantMat') != null) {
			$cantMat = request('cantMat');
			for ($i = 1; $i <= $cantMat; $i++) {

				$rep = request('rep' . $i);
				$cantRep = request('cantRep' . $i);
				Estudiante_asignatura::create([
					'idestudiante' => $e['idestudiante'],
					'idasignatura' => $rep,
					'cantidad' => $cantRep,
				]);

			}

		}
		// $x = Estudiante_transporte::all()
		// 	->join('transporte', 'estudiante_has_transporte.idtransporte', '=', 'transporte.idtransporte')
		// 	->groupBy('transporte.nombre')
		// 	->get();

		// var_dump($x);
		// dd(request()->all());
		return redirect('/stats');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {

	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}

	public function loadInfo() {
		$grupos = Grupo::all();
		$tutores = Tutor::all();
		$programas = Programa::all();
		$transportes = Transporte::all();
		$becas = Beca::all();
		$asignaturas = Asignatura::all();
		// ->paginate(3);
		return view('welcome', compact('grupos', 'tutores', 'programas', 'transportes', 'asignaturas', 'becas'));

	}

	public function stats() {
		$transportes = Transporte::all();
		$transportesC = [];
		$i = 0;
		foreach ($transportes as $estudiante) {
			$idTransporte = $transportes->idtransporte;
			$transportesC[$i] = Transporte::where('idtransporte', $id)
				->join('estudiante_has_transporte', 'estudiante_has_transporte.idestudiante', '=', 'transporte.idtransporte')
				->get(['transporte.nombre', 'count(transporte.idtransporte)']);
			$i = $i + 1;
		}
		dd($transportesC);
		// $grupos = Grupo::all();
		// $tutores = Tutor::all();
		// $programas = Programa::all();
		// $transportes = Transporte::all();
		// $becas = Beca::all();
		// $asignaturas = Asignatura::all();
		// // ->paginate(3);
		return view('estadisticas', compact('grupos', 'tutores', 'programas', 'transportes', 'asignaturas', 'becas'));

	}
}
