<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $fillable = [
        'nombre',
    ];

    static public function obtenerSedes(){
    	return Sede::orderBy('nombre', 'asc')->get();
    }

    public function socio(){
        return $this->belongsTo('App\Socio');
    }
}
