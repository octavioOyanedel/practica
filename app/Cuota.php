<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    protected $fillable = [
        'fecha_pago_cuota', 'numero_cuota', 'monto_cuota', 'estado_id', 'prestamo_id',
    ];

    static public function obtenerCoutasParaPagar(){
        return Cuota::where('estado_id', 2)->get();
    }

    static public function obtenerCuotasDePrestamo($id){
    	return Cuota::where('prestamo_id','=',$id)->get();
    }

    public function estado(){
        return $this->hasOne('App\Estado');
    }

    public function prestamo(){
        return $this->belongsTo('App\Prestamo');
    }
}
