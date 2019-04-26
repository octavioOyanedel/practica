<?php

namespace App\Http\Controllers;

use App\Cuota;
use App\Http\Requests\PrestamoRequest;
use App\Http\Requests\RutPrestamoRequest;
use App\Prestamo;
use App\Sind1\Sind1;
use App\Socio;
use Illuminate\Http\Request;

class PrestamoController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function __construct() {
		$this->middleware('administrador')->only('create');
	}

	public function index() {
		$socios = Socio::all();
		$varones = Socio::where('genero', 'Varón')->count();
		$damas = Socio::where('genero', 'Dama')->count();
		$prestamos = Prestamo::obtenerTodosLosPrestamos();
		$existencias_prestamos = $prestamos->count();
		Sind1::formatearColeccionParaMostrar($prestamos);
		return view('sind1.prestamos.index', compact('prestamos', 'existencias_prestamos', 'varones', 'damas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$socios = Socio::obtenerSocios();
		$varones = Socio::where('genero', 'Varón')->count();
		$damas = Socio::where('genero', 'Dama')->count();
		return view('sind1.prestamos.create', compact('varones', 'damas', 'socios'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(PrestamoRequest $request) {
		$prestamo = new Prestamo;
		$prestamo->fecha = $request->fecha_prestamo;
		$prestamo->numero_prestamo = $request->numero_prestamo;
		$prestamo->cheque = $request->cheque;
		$prestamo->monto = $request->monto;
		$prestamo->cuotas = $request->cuotas;
		$prestamo->socio_id = $request->id;
		$prestamo->renta_id = 1;
		$prestamo->estado_id = 2;
		$prestamo->save();
		app('App\Http\Controllers\CuotaController')->store($prestamo);
		return redirect()->route('prestamos.index')->with('solicitar_prestamo', '');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$socios = Socio::all();
		$varones = Socio::where('genero', 'Varón')->count();
		$damas = Socio::where('genero', 'Dama')->count();
		$existencias = $socios->count();
		$prestamo = Prestamo::obtenerPrestamo($id);
		$cuotas = Cuota::obtenerCuotasDePrestamo($id);
		Sind1::formatearColeccionParaMostrar($cuotas);
		Sind1::formatearPrestamoParaMostrar($prestamo);
		return view('sind1.prestamos.show', compact('cuotas', 'prestamo', 'existencias', 'varones', 'damas'));
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
		$prestamo = Prestamo::find($id);
		$prestamo->estado_id = 1;
		$prestamo->update();
		app('App\Http\Controllers\CuotaController')->update($id);
		return redirect()->route('prestamos.index')->with('prestamo_saldado', '');
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

	public function validarPrestamo(RutPrestamoRequest $request) {
		if ($request->ajax()) {
			$socio = Socio::where('rut', '=', $request->rut)->get();
			return response()->json($socio);
		}
	}

	public function buscarIdEnPrestamos(Request $request) {
		if ($request->ajax()) {
			return Prestamo::existePrestamo($request->id);
		}
	}

	public function buscarUltimoNumeroPrestamo() {
		$prestamo = Prestamo::obtenerUltimoNumeroPrestamo();
		if ($prestamo != null) {
			return response()->json($prestamo->numero_prestamo + 1);
		} else {
			return response()->json(1);
		}
	}
	public function comprobarEstadoPrestamo() {
		$prestamos = Prestamo::where('estado_id', 2)->get();
		foreach ($prestamos as $prestamo) {
			$cuotas = app('App\Http\Controllers\CuotaController')->obtenerCuotasDePrestamo($prestamo->id);
			if (Sind1::contarCuotasPagadas($cuotas) == $prestamo->cuotas) {
				$prestamo->estado_id = 1;
				$prestamo->update();
			}
		}
	}
}
