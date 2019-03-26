<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $fillable = [
        'nombre',
    ];

    static public function obtenerTipos(){
    	return Tipo::select('id','nombre')->orderBy('nombre', 'asc')->get();
    }
}
