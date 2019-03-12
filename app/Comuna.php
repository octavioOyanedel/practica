<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comuna extends Model
{
    protected $fillable = [
        'nombre', 'urbe_id',
    ];

    public function socio()
    {
        return $this->belongsTo('App\Socio');
    }
}
