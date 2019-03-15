<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $fillable = [
        'nombre', 'sede_id',
    ];

    static public function obtenerAreas($id){
    	return Area::where('sede_id','=',$id)->orderBy('nombre')->get();
    }

    public function socio(){
        return $this->belongsTo('Sind1\Socio');
    }

}
