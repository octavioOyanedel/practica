<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestamo;
use App\Cuota;
use App\Renta;
use Carbon\Carbon;
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
        $dia = date('j');
        $mes = date('n');
        $year = date('Y');
        if($dia > 15){
            $mes = $mes + 1;
            if($mes >= 13){
                $mes = 1;
            }
        }
        for($i = 1; $i <= $prestamo->cuotas; $i++){
            if($mes > 12){
                $mes = 1;
                $year = $year + 1;
            }
            $cuota = new Cuota;
            $cuota->fecha_pago_cuota = $year.'-'.$mes.'-25';
            $cuota->numero_cuota = $i;
            $cuota->monto_cuota = $montoCouta;
            $cuota->estado_id = 2;
            $cuota->prestamo_id = $prestamo->id;
            //validar mes para incremento de año
            $cuota->save();
            $mes++;
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
    public function update($id)
    {
        $cuotas = Cuota::where('prestamo_id','=',$id)->get();
        foreach ($cuotas as $cuota){
            $cuota->estado_id = 1;
            $cuota->update();
        }
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

    public function pagoAutomaticoCuotas(){
        $cuotas = Cuota::obtenerCoutasParaPagar();
        foreach ($cuotas as $cuota) {
            $cuota->estado_id = 1;
            $cuota->update();
        }
    }

    public function obtenerCuotasDePrestamo($id){
       return Cuota::obtenerCuotasDePrestamo($id);
    }
}
