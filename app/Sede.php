<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $fillable = [
        'nombre',
    ];

    static public function obtenerUltimaSede(){
        $sede = Sede::orderBy('created_at', 'desc')->first();
        return $sede;
    }

    static public function obtenerSede($id){
        return Sede::find($id);
    }

    static public function obtenerSedes(){
    	return Sede::orderBy('nombre', 'asc')->get();
    }

    public function socio(){
        return $this->belongsTo('App\Socio');
    }
}
