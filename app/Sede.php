<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $fillable = [
        'nombre',
    ];

    static public function obtenerSede($id){
        return Sede::find($id);
    }

    public function socio(){
        return $this->belongsTo('App\Socio');
    }
}
