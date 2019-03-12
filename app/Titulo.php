<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titulo extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function estudio(){
        return $this->belongsTo('App\Estudio');
    }
}
