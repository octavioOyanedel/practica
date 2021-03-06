<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'nombre', 'sede_id',
    ];

    static public function obtenerUltimaArea(){
        return Area::orderBy('created_at', 'desc')->first();
    }

    static public function obtenerArea($id){
        return Area::find($id);
    }

    static public function obtenerTodasLasAreas(){
        return Area::orderBy('nombre')->get();
    }

    static public function obtenerAreas($id){
    	return Area::select('id','nombre')->where('sede_id','=',$id)->orderBy('nombre')->get();
    }

    public function socio(){
        return $this->belongsTo('Sind1\Socio');
    }

}
