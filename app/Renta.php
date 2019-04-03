<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renta extends Model
{
    protected $fillable = [
        'interes', 'aspecto',
    ];

    static public function obtenerInteresPrestamos(){
    	return Renta::where('aspecto','=','Interés de Préstamo')->get();
    }

    public function prestamo(){
        return $this->belongsTo('App\Prestamo');
    }
}
