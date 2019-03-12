<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function estudio(){
        return $this->belongsTo('App\Estudio');
    }
}
