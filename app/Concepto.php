<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concepto extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function detalle(){
        return $this->hasOne('App\Detalle');
    }
}
