<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $fillable = [
        'fecha', 'numero_prestamo', 'cheque', 'monto', 'cuotas', 'socio_id', 'renta_id', 'estado_id',
    ];

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

    static public function obtenerUltimoNumeroPrestamo(){
    	return Prestamo::orderBy('created_at', 'desc')->first();
    }
}
