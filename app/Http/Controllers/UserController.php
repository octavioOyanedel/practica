<?php

namespace App\Http\Controllers;

use App\Clase;
use App\Sind1\Sind1;
use App\Socio;
use App\User;
use App\Http\Requests\UsuarioRequest;
use App\Http\Requests\NombresRequest;
use App\Http\Requests\CorreoRequest;
use App\Http\Requests\ContrasenaRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller {
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
		$usuarios = User::obtenerUsuarios();
		Sind1::formatearColeccionParaMostrar($usuarios);
		return view('sind1.usuarios.index', compact('usuarios', 'socios', 'existencias', 'varones', 'damas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$clases = Clase::obtenerClases();
		$socios = Socio::obtenerSocios();
		$varones = Socio::where('genero', 'Varón')->count();
		$damas = Socio::where('genero', 'Dama')->count();
		return view('sind1.usuarios.create', compact('varones', 'damas', 'clases'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(UsuarioRequest $request) {
        $usuario = new User;
        $usuario->name = Sind1::formatoNombres($request->input('nombre_usuario'));
        $usuario->email = $request->input('correo');
        $usuario->password =  Hash::make($request->input('contrasena'));
        $usuario->clase_id = $request->input('clase');
        //Sind1::formatoSocioRequest($request);
        $usuario->save();
		return redirect()->route('usuarios.index')->with('registrar_usuario', '');
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
		$usuario = User::find($id);
		$id_tipo = $usuario->clase_id;
		$id_usuario = $usuario->id;
		Sind1::formatearUsuarioParaMostrar($usuario);
		return view('sind1.usuarios.show', compact('id_usuario','id_tipo','usuario', 'varones', 'damas'));
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
		User::destroy($id);
		return redirect()->route('usuarios.index')->with('desvincular_usuario', '');
	}

	public function editarNombre(NombresRequest $request) {
		if ($request->ajax()) {
			$usuario = User::find($request->id);
			Sind1::formatoNombresRequest($request);
			$usuario->name = $request->input('valor');
			$usuario->update();
			return response()->json($request->input('valor'));
		}
	}

	public function editarCorreo(CorreoRequest $request) {
		if ($request->ajax()) {
			$usuario = User::find($request->id);
			Sind1::formatoCorreoRequest($request);
			$usuario->email = $request->input('valor');
			$usuario->update();
			return response()->json($request->input('valor'));
		}
	}

	public function editarContrasena(ContrasenaRequest $request) {
        if ($request->ajax()) {
            $usuario = User::find($request->id);
            $usuario->password = Hash::make($request->input('confirmar'));
            $usuario->update();
            return response()->json($request->input('confirmar'));
        }
	}

	public function editarTipo(Request $request) {
		if ($request->ajax()) {
			$usuario = User::find($request->id);
			$usuario->clase_id = $request->input('valor');
			$usuario->update();
			return response()->json($request->input('valor'));
		}
	}
}
