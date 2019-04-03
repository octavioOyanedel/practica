<?php

namespace App\Sind1;
use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Urbe;
use App\Comuna;
use App\Sede;
use App\Area;
use App\Cargo;
use App\Http\Requests\SocioRequest;
use App\Http\Requests\NombresRequest;
use App\Http\Requests\ApellidosRequest;
use App\Http\Requests\RutRequest;
use App\Http\Requests\CorreoRequest;
use App\Http\Requests\DireccionRequest;
use App\Http\Requests\CiudadRequest;
use App\Http\Requests\ComunaRequest;

class Sind1
{
	static public function obtenerFechaPrestamo($indice, $dia, $mes, $year){
		$mesPago = 0;
		if($dia <= 15){
			$mesPago = $mes + ($indice-1);
		}else{

		}

		return $year.'-'.$mesPago.'-25';
	}

    static public function formatoNombresRequest(NombresRequest $request)
    {
    	$request['valor'] = Sind1::formatoNombres($request->valor);
    }

    static public function formatoApellidosRequest(ApellidosRequest $request)
    {
    	$request['valor'] = Sind1::formatoNombres($request->valor);
    }

    static public function formatoRutRequest(RutRequest $request)
    {
    	$request['valor'] = strtolower($request->valor);
    }

    static public function formatoCorreoRequest(CorreoRequest $request)
    {
        $request['valor'] = strtolower($request->valor);
    }

    static public function formatoDireccionRequest(DireccionRequest $request)
    {
    	$request['valor'] = ucfirst($request->valor);
    }

    static public function formatoCiudadRequest(CiudadRequest $request)
    {
    	$request['direccion'] = ucfirst($request->direccion);
    }

    static public function formatoComunaRequest(ComunaRequest $request)
    {
    	$request['direccion'] = ucfirst($request->direccion);
    }

    static public function formatearColeccionParaMostrar(Collection $coleccion){
    	foreach ($coleccion as $objeto){
    		if($objeto['rut'] != null){
    			$objeto['rut'] = Sind1::formatoRut($objeto['rut']);
    		}
    		if($objeto['fecha_nacimiento'] != null){
    			$objeto['fecha_nacimiento'] = date("d-m-Y", strtotime($objeto['fecha_nacimiento']));
    		}
    		if($objeto['fecha_pucv'] != null){
    			$objeto['fecha_pucv'] = date("d-m-Y", strtotime($objeto['fecha_pucv']));
    		}
    		if($objeto['fecha_sind1'] != null){
    			$objeto['fecha_sind1'] = date("d-m-Y", strtotime($objeto['fecha_sind1']));
    		}
      		if($objeto['urbe_id'] != null){
    			$objeto['urbe_id'] = Urbe::obtenerUrbe($objeto['urbe_id'])->nombre;
    		}
      		if($objeto['comuna_id'] != null){
    			$objeto['comuna_id'] = Comuna::obtenerComuna($objeto['comuna_id'])->nombre;
    		}
    		if($objeto['sede_id'] != null){
    			$objeto['sede_id'] = Sede::obtenerSede($objeto['sede_id'])->nombre;
    		}
     		if($objeto['area_id'] != null){
    			$objeto['area_id'] = Area::obtenerArea($objeto['area_id'])->nombre;
    		}
      		if($objeto['cargo_id'] != null){
    			$objeto['cargo_id'] = Cargo::obtenerCargo($objeto['cargo_id'])->nombre;
    		}
    	}
    }

    static public function formatearObjetoParaMostrar(Object $socio)
    {
		if($socio['rut'] != null){
			$socio['rut'] = Sind1::formatoRut($socio['rut']);
		}
		if($socio['fecha_nacimiento'] != null){
			$socio['fecha_nacimiento'] = date("d-m-Y", strtotime($socio['fecha_nacimiento']));
		}
		if($socio['fecha_pucv'] != null){
			$socio['fecha_pucv'] = date("d-m-Y", strtotime($socio['fecha_pucv']));
		}
		if($socio['fecha_sind1'] != null){
			$socio['fecha_sind1'] = date("d-m-Y", strtotime($socio['fecha_sind1']));
		}
		if($socio['sede_id'] != null){
			$socio['sede_id'] = Sede::obtenerSede($socio['sede_id'])->nombre;
		}
 		if($socio['area_id'] != null){
			$socio['area_id'] = Area::obtenerArea($socio['area_id'])->nombre;
		}
  		if($socio['urbe_id'] != null){
			$socio['urbe_id'] = Urbe::obtenerUrbe($socio['urbe_id'])->nombre;
		}
  		if($socio['comuna_id'] != null){
			$socio['comuna_id'] = Comuna::obtenerComuna($socio['comuna_id'])->nombre;
		}
  		if($socio['cargo_id'] != null){
			$socio['cargo_id'] = Cargo::obtenerCargo($socio['cargo_id'])->nombre;
		}
    }

    static public function formatoSocioRequest(SocioRequest $request)
    {
    	//campos obligatorios
    	$request['nombres'] = Sind1::formatoNombres($request->nombres);
    	$request['apellidos'] = Sind1::formatoNombres($request->apellidos);
    	$request['rut'] = strtolower($request->rut);
    	//campos nullable
    	if($request['correo'] != null){
			$request['correo'] = strtolower($request->correo);
    	}
    	if($request['direccion'] != null){
			$request['direccion'] = ucfirst($request->direccion);
		}
    }

    static public function formatoContableRequest(ContableRequest $request)
    {
    	//campos obligatorios
    	$request['nombres'] = Sind1::formatoNombres($request->nombres);
    	$request['apellidos'] = Sind1::formatoNombres($request->apellidos);
    	$request['rut'] = strtolower($request->rut);
    	//campos nullable
    	if($request['correo'] != null){
			$request['correo'] = strtolower($request->correo);
    	}
    	if($request['direccion'] != null){
			$request['direccion'] = ucfirst($request->direccion);
		}
    }

    static public function formatoNombres($cadena)
    {
	    $nombreFormateado = strtolower($cadena);
	    $nombreFormateado = ucwords($nombreFormateado);
	    $nombreFormateado = str_replace(" De ", " de ", $nombreFormateado);
	    $nombreFormateado = str_replace(" Del ", " del ", $nombreFormateado);
	    $nombreFormateado = str_replace(" La ", " la ", $nombreFormateado);
	    $nombreFormateado = str_replace(" Las ", " las ", $nombreFormateado);
	    $nombreFormateado = str_replace(" Lo ", " lo ", $nombreFormateado);
	    $nombreFormateado = str_replace(" Los ", " los ", $nombreFormateado);
	    return $nombreFormateado;
    }

    static public function formatoRut($rut){
	    $largo = strlen($rut);
	    $largoFinal = 0;
	    $arrayRutFormato = array();
	    $rutFinal = "";
	    //obtener largo total para poblar nuevo array
	    if($largo == 9){
	        //si largo es 9 nuevo largo sera de 11 0-11 = 12
	        $largoFinal = 12;
	    }else{
	        //si largo es 9 nuevo largo sera de 10 0-10 = 11
	        $largoFinal = 11;
	    }
	    //formato inicial de array
	    for($i = 0; $i < $largoFinal; $i++){
	        if($i == $largoFinal -2){
	            array_push($arrayRutFormato, "-");
	        }else{
	            array_push($arrayRutFormato, ".");
	        }
	    }
	    //convertir rut en array
	    $arrayRut = str_split($rut);
	    //recorrer array para construir nuevo array
	    for($i = 0; $i < $largoFinal; $i++){
	        if($largo == 9){
	            if($i >= 0 && $i <= 1){
	                $arrayRutFormato[$i] = $arrayRut[$i];
	            }
	            if($i >= 3 && $i <= 5){
	                $arrayRutFormato[$i] = $arrayRut[$i-1];
	            }
	            if($i >= 7 && $i <= 9){
	                $arrayRutFormato[$i] = $arrayRut[$i-2];
	            }
	            if($i == 11){
	                $arrayRutFormato[$i] = $arrayRut[$i-3];
	            }
	        }else{
	             if($i == 0){
	                $arrayRutFormato[$i] = $arrayRut[$i];
	            }
	            if($i >= 2 && $i <= 4){
	                $arrayRutFormato[$i] = $arrayRut[$i-1];
	            }
	            if($i >= 6 && $i <= 8){
	                $arrayRutFormato[$i] = $arrayRut[$i-2];
	            }
	            if($i == 10){
	                $arrayRutFormato[$i] = $arrayRut[$i-3];
	            }
	        }
	    }
	    //convertir array en string
	    $rutFinal = implode("",$arrayRutFormato);
	    return $rutFinal;
    }

	static public function formatoFecha($fecha){
		$bloque = explode('-',$fecha);
    	$nuevaFecha = $bloque[2].'-'.$bloque[1].'-'.$bloque[0];
    	return $nuevaFecha;
	}
}