<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    protected $fillable = [
        'nombre',
    ];


    static public function obtenerConceptos(){
    	return Concepto::select('id','nombre')->orderBy('nombre', 'asc')->get();
    }

    public function detalle(){
        return $this->hasOne('App\Detalle');
    }
}
