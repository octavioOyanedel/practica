<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestamo;
use App\Socio;
use App\Renta;
use App\Http\Requests\RutPrestamoRequest;

class PrestamoController extends Controller
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
        $prestamos = Prestamo::all();
        return view('sind1.prestamos.index', compact('socios','existencias','varones','damas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $socios = Socio::obtenerSocios();
        $varones = Socio::where('genero','Varón')->count();
        $damas = Socio::where('genero','Dama')->count();
        return view('sind1.prestamos.create', compact('varones','damas','socios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prestamo = new Prestamo;
        $prestamo->fecha = date('Y-m-d');
        $prestamo->numero_prestamo = $request->numero_prestamo;
        $prestamo->cheque = $request->cheque;
        $prestamo->monto = $request->monto;
        $prestamo->cuotas = $request->cuotas;
        $prestamo->socio_id = $request->id;
        $prestamo->renta_id = 1;
        $prestamo->estado_id = 2;
        $prestamo->save();
        return redirect()->route('prestamos.index')->with('solicitar_prestamo', '');
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

    public function validarPrestamo(RutPrestamoRequest $request){
        if($request->ajax()){
            $socio = Socio::where('rut','=',$request->rut)->get();
            return response()->json($socio);
        }
    }

    public function buscarIdEnPrestamos(Request $request)
    {
        if($request->ajax()){
            return Prestamo::existePrestamo($request->id);
        }
    }

    public function buscarUltimoNumeroPrestamo()
    {
        $numero = Prestamo::obtenerUltimoNumeroPrestamo();
        if($numero->count() > 0){
            return response()->json($numero->numero_prestamo+1);
        }else{
            return response()->json(1);
        }
    }
}
