<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    protected $fillable = [
        'nombre', 'urbe_id',
    ];

    static public function obtenerComunas($id){
    	return Comuna::where('urbe_id','=',$id)->orderBy('nombre')->get();
    }

    public function socio()
    {
        return $this->belongsTo('App\Socio');
    }
}
