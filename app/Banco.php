<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function bancario(){
        return $this->belongsTo('Sind1\Bancario');
    }

}
