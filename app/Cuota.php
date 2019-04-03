<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    protected $fillable = [
        'fecha_pago_cuota', 'numero_cuota', 'monto_cuota', 'estado_id', 'prestamo_id',
    ];

    public function estado(){
        return $this->hasOne('App\Estado');
    }

    public function prestamo(){
        return $this->belongsTo('App\Prestamo');
    }
}
