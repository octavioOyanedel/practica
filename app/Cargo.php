<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function socio()
    {
        return $this->belongsTo('Sind1\Socio');
    }

}
