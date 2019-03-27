<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sind1\Sind1;
use App\Socio;
use App\Tipo;
use App\Bancario;
use App\Concepto;
use App\Contable;

class ContableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $socios = Socio::obtenerSocios();
        $conceptos = Concepto::obtenerConceptos();
        $bancarios = Bancario::obtenerBancarios();
        $tipos = Tipo::obtenerTipos();
        $varones = Socio::where('genero','Varón')->count();
        $damas = Socio::where('genero','Dama')->count();
        return view('sind1.contables.create', compact('varones','damas','tipos','bancarios','conceptos','socios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Sind1::formatoContableRequest($request);
        Contable::create($request->all());
        return redirect()->route('contables.create')->with('incorporar_contable', '');
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
