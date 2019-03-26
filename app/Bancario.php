<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bancario extends Model
{
    protected $fillable = [
        'numero_cuenta', 'banco_id', 'cuenta_id',
    ];

    static public function obtenerBancarios(){
    	return Bancario::select('id','numero_cuenta','banco_id','cuenta_id')->orderBy('numero_cuenta', 'asc')->get();
    }
}
