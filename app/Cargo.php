<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable = [
        'nombre',
    ];

    static public function obtenerCargo($id){
        return Cargo::find($id);
    }

    public function socio(){
        return $this->belongsTo('Sind1\Socio');
    }

}
