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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
