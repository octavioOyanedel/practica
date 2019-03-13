<?php

namespace App\Sind1;
use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Sede;

//clase Collection para conjunto de registros
//clase Socio, Sede, etc. individual.
//atributo de objeto individual  Sede $var -> $var->nombre

class Sind1
{
    static public function funcionPrueba(Sede $var){
        var_dump('SEDE '.$var->nombre);
    }
}