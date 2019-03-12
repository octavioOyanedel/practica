<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function socio(){
        return $this->belongsTo('App\Socio');
    }
}
