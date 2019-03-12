<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{
    protected $fillable = [
        'nombre', 'concepto_id',
    ];

    public function concepto(){
        return $this->belongsTo('App\Concepto');
    }
}