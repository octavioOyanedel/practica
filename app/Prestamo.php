<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $fillable = [
        'fecha', 'numero_prestamo', 'cheque', 'monto', 'cuotas', 'socio_id', 'renta_id', 'estado_id',
    ];

    static public function estaPagadoPrestamo(){

    }

    static public function obtenerPrestamo($id){
        return Prestamo::find($id);
    }

    static public function obtenerTodosLosPrestamos(){
        return Prestamo::orderBy('created_at', 'desc')->get();
    }

    static public function obtenerPrestamosPendientes(){
        return Prestamo::where('estado_id','=',2)->orderBy('created_at', 'desc')->get();
    }

    static public function obtenerUltimoNumeroPrestamo(){
        return Prestamo::orderBy('created_at', 'desc')->first();
    }

    public function socio(){
        return $this->belongsTo('App\Socio');
    }

    public function renta(){
        return $this->hasOne('App\Renta');
    }

    public function estado(){
        return $this->hasOne('App\Estado');
    }

    static public function existePrestamo($id){
        $prestamos = Prestamo::where([
        	['socio_id','=',$id],
        	['estado_id','=',2],
        ]);
        if($prestamos->count() > 0){
            return 1;
        }else{
            return 0;
        }
    }

}