<?php

namespace App\Http\Controllers;

use App\Area;
use App\Cargo;
use App\Comuna;
use App\Http\Requests\AnexoRequest;
use App\Http\Requests\ApellidosRequest;
use App\Http\Requests\CelularRequest;
use App\Http\Requests\CiudadRequest;
use App\Http\Requests\ComunaRequest;
use App\Http\Requests\CorreoRequest;
use App\Http\Requests\DireccionRequest;
use App\Http\Requests\FijoRequest;
use App\Http\Requests\NombresRequest;
use App\Http\Requests\NumeroSocioRequest;
use App\Http\Requests\RutRequest;
use App\Http\Requests\SocioRequest;
use App\Prestamo;
use App\Sede;
use App\Sind1\Sind1;
use App\Socio;
use App\Urbe;
use Illuminate\Http\Request;

class SocioController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function __construct() {
		$this->middleware('administrador')->only('create');
	}

	public function index() {
		$socios = Socio::obtenerSocios();
		$varones = Socio::where('genero', 'Varón')->count();
		$damas = Socio::where('genero', 'Dama')->count();
		$existencias = $socios->count();
		Sind1::formatearColeccionParaMostrar($socios);
		return view('sind1.socios.index', compact('socios', 'existencias', 'varones', 'damas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$urbes = Urbe::all();
		$cargos = Cargo::obtenerCargos();
		$sedes = Sede::obtenerSedes();
		$areas = Area::obtenerTodasLasAreas();
		$comunas = Comuna::obtenerTodasLasComunas();
		$varones = Socio::where('genero', 'Varón')->count();
		$damas = Socio::where('genero', 'Dama')->count();
		return view('sind1.socios.create', compact('varones', 'damas', 'urbes', 'cargos', 'sedes', 'comunas', 'areas'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(SocioRequest $request) {
		Sind1::formatoSocioRequest($request);
		Socio::create($request->all());
		return redirect()->route('socios.index')->with('incorporar_socio', '');
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
		$socio = Socio::find($id);
		$id = $socio->id;
		$rut = $socio->rut;
		$fechaNacimento = $socio->fecha_nacimiento;
		$fechaPucv = $socio->fecha_pucv;
		$fechaSind1 = $socio->fecha_sind1;
		$ciudad = $socio->urbe_id;
		$comuna = $socio->comuna_id;
		$sede = $socio->sede_id;
		$area = $socio->area_id;
		$cargo = $socio->cargo_id;
		Sind1::formatearSocioParaMostrar($socio);
		return view('sind1.socios.show', compact('socio', 'existencias', 'varones', 'damas', 'rut', 'fechaNacimento', 'fechaPucv', 'fechaSind1', 'ciudad', 'comuna', 'sede', 'area', 'cargo', 'id'));
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
	public function update(NombresRequest $request, $id) {

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		Socio::destroy($id);
		return redirect()->route('socios.index')->with('desvincular_socio', '');
	}

	public function editarNombres(NombresRequest $request) {
		if ($request->ajax()) {
			$socio = Socio::find($request->id);
			Sind1::formatoNombresRequest($request);
			$socio->nombres = $request->input('valor');
			$socio->update();
			return response()->json($request->input('valor'));
		}
	}

	public function editarApellidos(ApellidosRequest $request) {
		if ($request->ajax()) {
			$socio = Socio::find($request->id);
			Sind1::formatoApellidosRequest($request);
			$socio->apellidos = $request->input('valor');
			$socio->update();
			return response()->json($request->input('valor'));
		}
	}

	public function editarRut(RutRequest $request) {
		if ($request->ajax()) {
			$socio = Socio::find($request->id);
			Sind1::formatoRutRequest($request);
			$socio->rut = $request->input('valor');
			$socio->update();
			return response()->json($request->input('valor'));
		}
	}

	public function editarGenero(Request $request) {
		if ($request->ajax()) {
			$socio = Socio::find($request->id);
			$socio->genero = $request->input('valor');
			$socio->update();
			return response()->json($request->input('valor'));
		}
	}

	public function editarFechaNacimiento(Request $request) {
		if ($request->ajax()) {
			$socio = Socio::find($request->id);
			$socio->fecha_nacimiento = $request->input('valor');
			$socio->update();
			return response()->json($request->input('valor'));
		}
	}

	public function editarCelular(CelularRequest $request) {
		if ($request->ajax()) {
			$socio = Socio::find($request->id);
			$socio->celular = $request->input('valor');
			$socio->update();
			return response()->json($request->input('valor'));
		}
	}

	public function editarFijo(FijoRequest $request) {
		if ($request->ajax()) {
			$socio = Socio::find($request->id);
			$socio->fijo = $request->input('valor');
			$socio->update();
			return response()->json($request->input('valor'));
		}
	}

	public function editarCorreo(CorreoRequest $request) {
		if ($request->ajax()) {
			$socio = Socio::find($request->id);
			Sind1::formatoCorreoRequest($request);
			$socio->correo = $request->input('valor');
			$socio->update();
			return response()->json($request->input('valor'));
		}
	}

	public function editarDireccion(DireccionRequest $request) {
		if ($request->ajax()) {
			$socio = Socio::find($request->id);
			Sind1::formatoDireccionRequest($request);
			$socio->direccion = $request->input('valor');
			$socio->update();
			return response()->json($request->input('valor'));
		}
	}

	public function editarFechaIngresoPucv(Request $request) {
		if ($request->ajax()) {
			$socio = Socio::find($request->id);
			$socio->fecha_pucv = $request->input('valor');
			$socio->update();
			return response()->json($request->input('valor'));
		}
	}

	public function editarAnexo(AnexoRequest $request) {
		if ($request->ajax()) {
			$socio = Socio::find($request->id);
			$socio->anexo = $request->input('valor');
			$socio->update();
			return response()->json($request->input('valor'));
		}
	}

	public function editarFechaIngresoSind1(Request $request) {
		if ($request->ajax()) {
			$socio = Socio::find($request->id);
			$socio->fecha_sind1 = $request->input('valor');
			$socio->update();
			return response()->json($request->input('valor'));
		}
	}

	public function editarNumeroSocio(NumeroSocioRequest $request) {
		if ($request->ajax()) {
			$socio = Socio::find($request->id);
			$socio->numero_socio = $request->input('valor');
			$socio->update();
			return response()->json($request->input('valor'));
		}
	}

	public function editarCiudad(CiudadRequest $request) {
		if ($request->ajax()) {
			$socio = Socio::find($request->id);
			Sind1::formatoCiudadRequest($request);
			$socio->urbe_id = $request->input('ciudad');
			$socio->comuna_id = $request->input('comuna');
			$socio->direccion = $request->input('direccion');
			$socio->update();
			return response()->json($request->input('ciudad'));
		}
	}

	public function editarComuna(ComunaRequest $request) {
		if ($request->ajax()) {
			$socio = Socio::find($request->id);
			Sind1::formatoComunaRequest($request);
			$socio->comuna_id = $request->input('comuna');
			$socio->direccion = $request->input('direccion');
			$socio->update();
			return response()->json($request->input('comuna'));
		}
	}

	public function editarSede(Request $request) {
		if ($request->ajax()) {
			$socio = Socio::find($request->id);
			$socio->sede_id = $request->input('sede');
			$socio->area_id = $request->input('area');
			$socio->update();
			return response()->json($request->input('sede'));
		}
	}

	public function editarArea(Request $request) {
		if ($request->ajax()) {
			$socio = Socio::find($request->id);
			$socio->area_id = $request->input('area');
			$socio->update();
			return response()->json($request->input('area'));
		}
	}

	public function editarCargo(Request $request) {
		if ($request->ajax()) {
			$socio = Socio::find($request->id);
			$socio->cargo_id = $request->input('cargo');
			$socio->update();
			return response()->json($request->input('cargo'));
		}
	}

	public function buscarIdParaPrestamo(Request $request) {
		if ($request->ajax()) {
			$socio = Socio::where('rut', '=', $request->rut)->get();
			return response()->json($socio);
		}
	}

	public function buscarUltimoNumeroSocio() {
		$socio = Socio::obtenerUltimoNumeroSocio();
		if ($socio != null) {
			return response()->json($socio->numero_socio + 1);
		} else {
			return response()->json(1);
		}
	}

	public function estadisticasSocios() {
		$socios = Socio::obtenerSocios();
		$varones = Socio::where('genero', 'Varón')->count();
		$damas = Socio::where('genero', 'Dama')->count();
		$existencias = $socios->count();
		Sind1::formatearColeccionParaMostrar($socios);
		return view('sind1.estadisticas.estadisticas_socios', compact('socios', 'existencias', 'varones', 'damas'));
	}

	public function estadisticaCantidadPrestamos() {
		$socios = Socio::obtenerSocios();
		$varones = Socio::where('genero', 'Varón')->count();
		$damas = Socio::where('genero', 'Dama')->count();
		$existencias = $socios->count();
		return view('sind1.estadisticas.estadisticas_cantidades', compact('existencias', 'varones', 'damas'));
	}

	public function estadisticaIncorporacionSocios() {
		$socios = Socio::obtenerSocios();
		$varones = Socio::where('genero', 'Varón')->count();
		$damas = Socio::where('genero', 'Dama')->count();
		$existencias = $socios->count();
		return view('sind1.estadisticas.estadisticas_incorporaciones', compact('existencias', 'varones', 'damas'));
	}

	public function verEstadisticaCantidadPrestamos(Request $request) {
		$socios = Socio::obtenerSocios();
		$varones = Socio::where('genero', 'Varón')->count();
		$damas = Socio::where('genero', 'Dama')->count();
		$existencias = $socios->count();
		$fecha_ini = $request->fecha_ini;
		$fecha_fin = $request->fecha_fin;
		$fecha_ini_grafico = date("d-m-Y", strtotime($request->fecha_ini));
		$fecha_fin_grafico = date("d-m-Y", strtotime($request->fecha_fin));
		$prestamos = Prestamo::obtenerPrestamoPorFechas($fecha_ini, $fecha_fin);
		Sind1::formatearColeccionParaMostrar($prestamos);
		$existencias_prestamos = $prestamos->count();
		return view('sind1.estadisticas.ver_estadisticas_cantidades', compact('prestamos', 'existencias_prestamos', 'fecha_ini_grafico', 'fecha_fin_grafico', 'existencias', 'varones', 'damas'));
	}

	public function verEstadisticaIncorporacionSocios(Request $request) {
		$socios = Socio::obtenerSocios();
		$varones = Socio::where('genero', 'Varón')->count();
		$damas = Socio::where('genero', 'Dama')->count();
		$existencias = $socios->count();
		$fecha_ini = $request->fecha_ini;
		$fecha_fin = $request->fecha_fin;
		$fecha_ini_grafico = date("d-m-Y", strtotime($request->fecha_ini));
		$fecha_fin_grafico = date("d-m-Y", strtotime($request->fecha_fin));
		$incorporaciones = Socio::obtenerIncorporacionesPorFechas($fecha_ini, $fecha_fin);
		Sind1::formatearColeccionParaMostrar($incorporaciones);
		$existencias_socios = $incorporaciones->count();
		$cantidad_hombres = Socio::obtenerCantidadHombres($incorporaciones);
		$cantidad_mujeres = Socio::obtenerCantidadMujeres($incorporaciones);
		return view('sind1.estadisticas.ver_estadisticas_incorporaciones', compact('incorporaciones', 'existencias_socios', 'fecha_ini_grafico', 'fecha_fin_grafico', 'existencias', 'varones', 'damas', 'cantidad_hombres', 'cantidad_mujeres'));
	}
}
