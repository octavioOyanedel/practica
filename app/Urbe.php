<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urbe extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function socio(){
        return $this->belongsTo('App\Socio');
    }
}
