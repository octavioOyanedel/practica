<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Socio extends Model {
	protected $fillable = [
		'nombres', 'apellidos', 'rut', 'genero', 'fecha_nacimiento', 'celular', 'fijo', 'correo', 'direccion', 'fecha_pucv', 'anexo', 'numero_socio', 'fecha_sind1', 'sede_id', 'area_id', 'cargo_id', 'urbe_id', 'comuna_id',
	];

	static public function obtenerSocios() {
		return Socio::orderBy('nombres', 'asc')->get();
	}

	static public function obtenerSocio($id) {
		return Socio::find($id);
	}

	static public function obtenerUltimoNumeroSocio() {
		return Socio::orderBy('created_at', 'desc')->first();
	}

	static public function obtenerIncorporacionesPorFechas($fechaIni, $fechaFin) {
		return Socio::whereBetween('fecha_sind1', array($fechaIni, $fechaFin))->orderBy('created_at', 'ASC')->get();
	}

	static public function obtenerCantidadHombres($incorporaciones) {
		$cont = 0;
		foreach ($incorporaciones as $inc) {
			if ($inc->genero == 'Varón') {
				$cont++;
			}
		}
		return $cont;
	}

	static public function obtenerCantidadMujeres($incorporaciones) {
		$cont = 0;
		foreach ($incorporaciones as $inc) {
			if ($inc->genero == 'Dama') {
				$cont++;
			}
		}
		return $cont;
	}

	public function sede() {
		return $this->hasOne('App\Sede');
	}

	public function area() {
		return $this->hasOne('App\Area');
	}

	public function puesto() {
		return $this->hasOne('App\Cargo');
	}

	public function urbe() {
		return $this->hasOne('App\Urbe');
	}

	public function comuna() {
		return $this->hasOne('App\Comuna');
	}

	public function contable() {
		return $this->hasOne('App\Contable');
	}

	public function prestamo() {
		return $this->hasOne('App\Socio');
	}
}
