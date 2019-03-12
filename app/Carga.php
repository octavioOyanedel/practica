<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carga extends Model
{
    protected $fillable = [
        'nombre', 'fecha', 'socio_id', 'parentesco_id',
    ];
}
