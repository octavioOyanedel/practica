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
        $cuotas = $prestamo->cuotas;
        $fecha = $prestamo->fecha;
        $dia_pago = 25;
        $year_inicio = 0;
        $mes_inicio = 0;
        $fecha_cuota = '';
        $montoConInteres = ((2 / 100) * $prestamo->monto) + $prestamo->monto;
        $montoCouta = $montoConInteres / $prestamo->cuotas;

        //obtener año, mes y dia
        $year = substr($fecha,0,-6);
        $mes = substr($fecha,5,-3);
        $dia = substr($fecha,8);

        //mes de inicio
        if($dia < 15){
            $mes_inicio = $mes + 0; //casteo a entero
        }else{
            //inicio mes siguiente
            $mes_inicio = $mes + 1;
            if($mes_inicio == 13){
                $mes_inicio = 1;
            }      
        }

        $year_inicio = $year;
        $mes_pago = $mes_inicio;
        $year_pago = $year_inicio + 0; //casteo a entreo

        //loop cuotas
        for($i = 0; $i < $cuotas; $i++){
            if($mes_pago > 12){
                $mes_pago = 1;
                $year_pago++; 
            }
            if($mes_pago < 10){
                $mes_pago = '0'.$mes_pago;
            }      
            $fecha_cuota = (string)$year_pago.'-'.$mes_pago.'-'.$dia_pago;
            $cuota = new Cuota;
            $cuota->fecha_pago_cuota = $fecha_cuota;
            $cuota->numero_cuota = $i + 1;
            $cuota->monto_cuota = $montoCouta;
            $cuota->estado_id = 2;
            $cuota->prestamo_id = $prestamo->id;
            $cuota->save();
            $mes_pago++;       
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
