<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestamo;
use App\Cuota;
use App\Renta;
use App\Sind1\Sind1;

class CuotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Prestamo $prestamo)
    {
        //$interes = Renta::obtenerInteresPrestamos();
        $montoConInteres = ((2 / 100) * $prestamo->monto) + $prestamo->monto;
        $montoCouta = $montoConInteres / $prestamo->cuotas;
        for($i = 1; $i <= $prestamo->cuotas; $i++){
            $cuota = new Cuota;
            $cuota->fecha_pago_cuota = Sind1::obtenerFechaPrestamo($i, date('j'), date('n'), date('Y'));
            $cuota->numero_cuota = $i;
            $cuota->monto_cuota = $montoCouta;
            $cuota->estado_id = 2;
            $cuota->prestamo_id = $prestamo->id;
            $cuota->save();
        }
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
