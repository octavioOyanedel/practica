<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    protected $fillable = [
        'nombre', 'urbe_id',
    ];

    static public function obtenerComuna($id){
        return Comuna::find($id);
    }

    static public function obtenerComunas($id){
    	return Comuna::select('id','nombre')->where('urbe_id','=',$id)->orderBy('nombre')->get();
    }

    static public function obtenerTodasLasComunas(){
        return Comuna::orderBy('nombre')->get();
    }

    public function socio()
    {
        return $this->belongsTo('App\Socio');
    }
}
