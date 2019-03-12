<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
    protected $fillable = [
        'socio_id', 'categoria_id', 'carrera_id', 'titulo_id', 'establecimiento_id',
    ];

    public function categoria(){
        return $this->hasOne('App\Categoria');
    }

    public function carrera(){
        return $this->hasOne('App\Carrera');
    }

    public function titulo(){
        return $this->hasOne('App\Titulo');
    }

    public function establecimiento(){
        return $this->hasOne('App\Establecimiento');
    }
}
