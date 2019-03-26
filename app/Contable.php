<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contable extends Model
{
    protected $fillable = [
        'fecha', 'cheque', 'monto', 'banco_id', 'tipo_id', 'concepto_id', 'socio_id',
    ];
}
