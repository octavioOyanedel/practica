<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function user(){
        return $this->belongsTo('Sind1\User');
    }
}
