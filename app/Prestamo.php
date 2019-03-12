<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $fillable = [
        'fecha', 'numero_prestamo', 'cheque', 'total', 'total_interes', 'cuotas', 'socio_id', 'renta_id',
    ];
}
