<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    protected $fillable = [
        'nombres', 'apellidos', 'rut', 'genero', 'fecha_nacimiento', 'celular', 'fijo', 'correo', 'direccion', 'fecha_pucv', 'anexo', 'numero_socio', 'fecha_sind1', 'sede_id', 'area_id', 'cargo_id', 'urbe_id', 'comuna_id',
    ];

    static public function obtenerSocios(){
        return Socio::orderBy('nombres', 'asc')->get();
    }

    static public function obtenerSocio($id){
        return Socio::find($id);
    }

    static public function obtenerUltimoNumeroSocio(){
        return Socio::orderBy('created_at', 'desc')->first();
    }

    public function sede(){
        return $this->hasOne('App\Sede');
    }

    public function area(){
        return $this->hasOne('App\Area');
    }

    public function puesto(){
        return $this->hasOne('App\Cargo');
    }

    public function urbe(){
        return $this->hasOne('App\Urbe');
    }

    public function comuna(){
        return $this->hasOne('App\Comuna');
    }

    public function contable(){
        return $this->hasOne('App\Contable');
    }

    public function prestamo(){
        return $this->hasOne('App\Socio');
    }
}
