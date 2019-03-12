<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function estudio(){
        return $this->belongsTo('Sind1\Estudio');
    }
}
