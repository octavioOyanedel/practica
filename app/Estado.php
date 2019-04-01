<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function prestamo(){
        return $this->belongsTo('App\Prestamo');
    }
}
