<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'nombre', 'sede_id',
    ];

    static public function obtenerArea($id){
        return Area::find($id);
    }

    public function socio(){
        return $this->belongsTo('Sind1\Socio');
    }

}
