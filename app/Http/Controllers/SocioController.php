<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sind1\Sind1;
use App\Socio;
use App\Urbe;
use App\Comuna;
use App\Sede;
use App\Area;
use App\Cargo;
use App\Http\Requests\SocioRequest;
use App\Http\Requests\NombresRequest;
use App\Http\Requests\ApellidosRequest;
use App\Http\Requests\RutRequest;
use App\Http\Requests\CelularRequest;
use App\Http\Requests\FijoRequest;
use App\Http\Requests\CorreoRequest;
use App\Http\Requests\DireccionRequest;
use App\Http\Requests\AnexoRequest;
use App\Http\Requests\NumeroSocioRequest;
use App\Http\Requests\CiudadRequest;
use App\Http\Requests\ComunaRequest;
use App\Http\Requests\SedeRequest;

class SocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socios = Socio::all();
        $varones = Socio::where('genero','Varón')->count();
        $damas = Socio::where('genero','Dama')->count();
        $existencias = $socios->count();
        Sind1::formatearColeccionParaMostrar($socios);
        return view('sind1.socios.index', compact('socios','existencias','varones','damas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $urbes = Urbe::all();
        $cargos = Cargo::all();
        $sedes = Sede::obtenerSedes();
        $areas = Area::obtenerTodasLasAreas();
        $comunas = Comuna::obtenerTodasLasComunas();
        $varones = Socio::where('genero','Varón')->count();
        $damas = Socio::where('genero','Dama')->count();
        return view('sind1.socios.create', compact('varones','damas','urbes','cargos','sedes','comunas','areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SocioRequest $request)
    {
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
    public function show($id)
    {
        $socios = Socio::all();
        $varones = Socio::where('genero','Varón')->count();
        $damas = Socio::where('genero','Dama')->count();
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
        Sind1::formatearObjetoParaMostrar($socio);
        return view('sind1.socios.show', compact('socio','existencias','varones','damas','rut','fechaNacimento','fechaPucv','fechaSind1','ciudad','comuna','sede','area','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NombresRequest $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Socio::destroy($id);
        return redirect()->route('socios.index')->with('desvincular_socio', '');
    }

    public function editarNombres(NombresRequest $request)
    {
        if($request->ajax()){
            $socio = Socio::find($request->id);
            Sind1::formatoNombresRequest($request);
            $socio->nombres = $request->input('valor');
            $socio->update();
            return response()->json($request->input('valor'));
        }
    }

    public function editarApellidos(ApellidosRequest $request)
    {
        if($request->ajax()){
            $socio = Socio::find($request->id);
            Sind1::formatoApellidosRequest($request);
            $socio->apellidos = $request->input('valor');
            $socio->update();
            return response()->json($request->input('valor'));
        }
    }

    public function editarRut(RutRequest $request)
    {
        if($request->ajax()){
            $socio = Socio::find($request->id);
            Sind1::formatoRutRequest($request);
            $socio->rut = $request->input('valor');
            $socio->update();
            return response()->json($request->input('valor'));
        }
    }

    public function editarGenero(Request $request)
    {
        if($request->ajax()){
            $socio = Socio::find($request->id);
            $socio->genero = $request->input('valor');
            $socio->update();
            return response()->json($request->input('valor'));
        }
    }

    public function editarFechaNacimiento(Request $request)
    {
        if($request->ajax()){
            $socio = Socio::find($request->id);
            $socio->fecha_nacimiento = $request->input('valor');
            $socio->update();
            return response()->json($request->input('valor'));
        }
    }

    public function editarCelular(CelularRequest $request)
    {
        if($request->ajax()){
            $socio = Socio::find($request->id);
            $socio->celular = $request->input('valor');
            $socio->update();
            return response()->json($request->input('valor'));
        }
    }

    public function editarFijo(FijoRequest $request)
    {
        if($request->ajax()){
            $socio = Socio::find($request->id);
            $socio->fijo = $request->input('valor');
            $socio->update();
            return response()->json($request->input('valor'));
        }
    }

    public function editarCorreo(CorreoRequest $request)
    {
        if($request->ajax()){
            $socio = Socio::find($request->id);
            Sind1::formatoCorreoRequest($request);
            $socio->correo = $request->input('valor');
            $socio->update();
            return response()->json($request->input('valor'));
        }
    }

    public function editarDireccion(DireccionRequest $request)
    {
        if($request->ajax()){
            $socio = Socio::find($request->id);
            Sind1::formatoDireccionRequest($request);
            $socio->direccion = $request->input('valor');
            $socio->update();
            return response()->json($request->input('valor'));
        }
    }

    public function editarFechaIngresoPucv(Request $request)
    {
        if($request->ajax()){
            $socio = Socio::find($request->id);
            $socio->fecha_pucv = $request->input('valor');
            $socio->update();
            return response()->json($request->input('valor'));
        }
    }

    public function editarAnexo(AnexoRequest $request)
    {
        if($request->ajax()){
            $socio = Socio::find($request->id);
            $socio->anexo = $request->input('valor');
            $socio->update();
            return response()->json($request->input('valor'));
        }
    }

    public function editarFechaIngresoSind1(Request $request)
    {
        if($request->ajax()){
            $socio = Socio::find($request->id);
            $socio->fecha_sind1 = $request->input('valor');
            $socio->update();
            return response()->json($request->input('valor'));
        }
    }

    public function editarNumeroSocio(NumeroSocioRequest $request)
    {
        if($request->ajax()){
            $socio = Socio::find($request->id);
            $socio->numero_socio = $request->input('valor');
            $socio->update();
            return response()->json($request->input('valor'));
        }
    }

    public function editarCiudad(CiudadRequest $request)
    {
        if($request->ajax()){
            $socio = Socio::find($request->id);
            Sind1::formatoCiudadRequest($request);
            $socio->urbe_id = $request->input('ciudad');
            $socio->comuna_id = $request->input('comuna');
            $socio->direccion = $request->input('direccion');
            $socio->update();
            return response()->json($request->input('valor'));
        }
    }

    public function editarComuna(ComunaRequest $request)
    {
        if($request->ajax()){
            $socio = Socio::find($request->id);
            Sind1::formatoComunaRequest($request);
            $socio->comuna_id = $request->input('comuna');
            $socio->direccion = $request->input('direccion');
            $socio->update();
            return response()->json($request->input('valor'));
        }
    }

    public function editarSede(Request $request)
    {
        if($request->ajax()){
            $socio = Socio::find($request->id);
            $socio->sede_id = $request->input('sede');
            $socio->area_id = $request->input('area');
            $socio->update();
            return response()->json($request->input('valor'));
        }
    }
}
