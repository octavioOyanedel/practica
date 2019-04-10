<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = [
        'nombre',
    ];

    static public function obtenerEstado($id){
    	return Estado::where('id','=',$id)->first();
    }

    public function prestamo(){
        return $this->belongsTo('App\Prestamo');
    }
}
