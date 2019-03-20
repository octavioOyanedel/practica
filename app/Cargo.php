<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable = [
        'nombre',
    ];

    static public function obtenerUltimoCargo(){
        $cargo = Cargo::orderBy('created_at', 'desc')->first();
        return $cargo;
    }

    static public function obtenerCargo($id){
        return Cargo::find($id);
    }

    static public function obtenerCargos(){
        return Cargo::orderBy('nombre')->get();
    }

    public function socio(){
        return $this->belongsTo('Sind1\Socio');
    }

}
