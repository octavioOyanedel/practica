<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urbe extends Model
{
    protected $fillable = [
        'nombre',
    ];

    static public function obtenerUrbe($id){
        return Urbe::find($id);
    }

    public function socio(){
        return $this->belongsTo('App\Socio');
    }
}
