<?php

namespace App\Sind1;
use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Sede;

//clase Collection para conjunto de registros
//clase Socio, Sede, etc. individual.
//atributo de objeto individual  Sede $var -> $var->nombre

class Sind1
{
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
}