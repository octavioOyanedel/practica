<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bancario extends Model
{
    protected $fillable = [
        'numero_cuenta', 'descripcion', 'banco_id', 'cuenta_id',
    ];
}
