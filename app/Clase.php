<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model {
	protected $fillable = [
		'nombre',
	];

	static public function obtenerClase($id) {
		return Clase::where('id', '=', $id)->first();
	}

	static public function obtenerClases() {
		return Clase::orderBy('nombre', 'asc')->get();
	}

	public function user() {
		return $this->belongsTo('Sind1\User');
	}
}
