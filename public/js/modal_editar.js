$(window).on('load',function(){

	var elemento;
	var tituloFila;
	var valorAnterior;
	var nuevoValor;
	var id;

	$('.editar').click(function(){
		id = $('#id_modelo').val();
		elemento = $(this);
		tituloFila = obtenerTituloDeTabla(elemento);
		valorAnterior = obtenerValorParaVista(tituloFila, elemento);
		poblarVentanaModal(tituloFila, valorAnterior);

		$('#editar_registro').click(function(){
			nuevoValor = obtenerNuevoValor(tituloFila);
			if(esCampoObligatorio(tituloFila)){
				if(nuevoValor === ''){
					$('.errores').empty();
					$('.errores').append('campo obligatorio.');
				}else{
					peticionAjax(tituloFila, nuevoValor, id);
				}
			}else{
				peticionAjax(tituloFila, nuevoValor, id);
			}
		});
	});

	function peticionAjax(tituloFila, nuevoValor, id){
		console.log(nuevoValor);
		var ruta = obtenerRuta(tituloFila);
		$.ajaxSetup({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
		});
		$.ajax({
			method: 'POST',
			dataType: 'json',
			url: ruta,
			data: {id: id, valor: nuevoValor},
			success: function(respuesta){
				modificarVista(tituloFila, nuevoValor);
				$('.modal').modal('hide');
			},
			error: function(respuesta){
				$('.errores').empty();
				$('.errores').append(respuesta.responseJSON.errors.valor[0]);
			}
		});
	}

	function obtenerNuevoValor(tituloFila){
		switch(tituloFila){
			case 'Xxx':
				return 0;
			break;
			default:
				return $('.valor-form').val().trim();
		}
	}

	function obtenerRuta(tituloFila){
		switch(tituloFila){
			case 'Nombres':
				return 'editar_nombres';
			break;
			case 'Apellidos':
				return 'editar_apellidos';
			break;
			case 'Rut':
				return 'editar_rut';
			break;
			case 'Fecha Nacimiento':
				return 'editar_fecha_nacimiento';
			break;
			case 'Celular':
				return 'editar_celular';
			break;
			case 'Teléfono Fijo':
				return 'editar_fijo';
			break;
			case 'Correo':
				return 'editar_correo';
			break;
			case 'Dirección':
				return 'editar_direccion';
			break;
			case 'Fecha Ingreso PUCV':
				return 'editar_fecha_ingreso_pucv';
			break;
			case 'Anexo':
				return 'editar_anexo';
			break;
			case 'Fecha Ingreso Sindicato':
				return 'editar_fecha_ingreso_sind1';
			break;
			case 'Número Socio':
				return 'editar_numero_socio';
			break;
			default:
		}
	}

	function modificarVista(tituloFila, nuevoValor){
		switch(tituloFila){
			case 'Nombres':
				$('.td-nombres').empty();
				$('.td-nombres').text(ucWords(nuevoValor));
			break;
			case 'Apellidos':
				$('.td-apellidos').empty();
				$('.td-apellidos').text(ucWords(nuevoValor));
			break;
			case 'Rut':
				var largo;
				$('.td-rut').empty();
				largo = nuevoValor.length;
				if(largo == 8){
					$('.td-rut').text(formatoRutVista8(nuevoValor));
				}else{
					$('.td-rut').text(formatoRutVista9(nuevoValor));
				}
			break;
			case 'Fecha Nacimiento':
				$('.td-fecha-nacimiento').empty();
				$('.td-fecha-nacimiento').text(formatoFecha(nuevoValor));
			break;
			case 'Celular':
				$('.td-celular').empty();
				$('.td-celular').text(nuevoValor);
			break;
			case 'Teléfono Fijo':
				$('.td-fijo').empty();
				$('.td-fijo').text(nuevoValor);
			break;
			case 'Correo':
				$('.td-correo').empty();
				$('.td-correo').text(nuevoValor);
			break;
			case 'Dirección':
				$('.td-direccion').empty();
				$('.td-direccion').text(ucWords(nuevoValor));
			break;
			case 'Fecha Ingreso PUCV':
				$('.td-fecha-ingreso-pucv').empty();
				$('.td-fecha-ingreso-pucv').text(formatoFecha(nuevoValor));
			break;
			case 'Anexo':
				$('.td-anexo').empty();
				$('.td-anexo').text(nuevoValor);
			break;
			case 'Fecha Ingreso Sindicato':
				$('.td-fecha-ingreso-sind1').empty();
				$('.td-fecha-ingreso-sind1').text(formatoFecha(nuevoValor));
			break;
			case 'Número Socio':
				$('.td-numero-socio').empty();
				$('.td-numero-socio').text(nuevoValor);
			break;
			default:
		}
	}

	function esCampoObligatorio(){
		switch(tituloFila){
			case 'Nombres':
				return true;
			break;
			case 'Apellidos':
				return true;
			break;
			case 'Rut':
				return true;
			break;
			case 'Número Socio':
				return true;
			break;
			default:
				return false;
		}
	}

	function poblarVentanaModal(tituloFila, valorAnterior){
		var vacio;
		$('.modal-body').empty();
		$('.modal-title').empty().append('Editar '+tituloFila);
		switch(tituloFila) {
			case 'Nombres':
				$('.modal-body').append('<label for="nombres">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<input type="email" class="form-control form-control-sm valor-form form-editar" name="nombres" id="nombres" value="'+valorAnterior+'"/>');
			break;
			case 'Apellidos':
				$('.modal-body').append('<label for="apellidos">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<input type="email" class="form-control form-control-sm valor-form form-editar" name="apellidos" id="apellidos" value="'+valorAnterior+'"/>');
			break;
			case 'Rut':
				$('.modal-body').append('<label for="rut">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<input type="email" class="form-control form-control-sm valor-form form-editar" name="rut" id="rut" value="'+valorAnterior+'" maxlength="9"/>');
			break;
			case 'Género':
				$('.modal-body').append('<label for="genero">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<select id="genero" class="form-control form-control-sm valor-form form-editar" name="genero" required></select>');
				$('#genero').append('<option selected="true" value="">Seleccione Genero</option>');
					if(valorAnterior.localeCompare('Varón') === 0){
						$('#genero').append('<option selected value="Varón">Varón</option>');
						$('#genero').append('<option value="Dama">Dama</option>');
					}else{
						$('#genero').append('<option value="Varón">Varón</option>');
						$('#genero').append('<option selected value="Dama">Dama</option>');
					}
			break;
			case 'Fecha Nacimiento':
				$('.modal-body').append('<label for="fecha_nac">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<input type="date" class="form-control form-control-sm valor-form form-editar" name="fecha_nac" id="fecha_nac" value="'+valorAnterior+'"/>');
			break;
			case 'Celular':
				$('.modal-body').append('<label for="celular">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<input type="text" class="form-control form-control-sm valor-form form-editar" name="celular" id="celular" value="'+valorAnterior+'" maxlength="9"/>');
			break;
			case 'Teléfono Fijo':
				$('.modal-body').append('<label for="fijo">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<input type="text" class="form-control form-control-sm valor-form form-editar" name="fijo" id="fijo" value="'+valorAnterior+'" maxlength="7"/>');
			break;
			case 'Correo':
				$('.modal-body').append('<label for="correo">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<input type="email" class="form-control form-control-sm valor-form form-editar" name="correo" id="correo" value="'+valorAnterior+'"/>');
			break;
			//TODO ciudad comuna
			case 'Dirección':
				$('.modal-body').append('<label for="direccion">Dirección <small class="errores" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<input type="email" class="form-control form-control-sm valor-form form-editar" name="direccion" id="direccion" value="'+valorAnterior+'"/>');
			break;
			case 'Fecha Ingreso PUCV':
				$('.modal-body').append('<label for="fecha_pucv">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<input type="date" class="form-control form-control-sm valor-form form-editar" name="fecha_pucv" id="fecha_pucv" value="'+valorAnterior+'"/>');
			break;
			case 'Anexo':
				$('.modal-body').append('<label for="anexo">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<input type="text" class="form-control form-control-sm valor-form form-editar" name="anexo" id="anexo" value="'+valorAnterior+'" maxlength="4"/>');
			break;
			//TODO sede area cargo
			case 'Fecha Ingreso Sindicato':
				$('.modal-body').append('<label for="fecha_sind1">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<input type="date" class="form-control form-control-sm valor-form form-editar" name="fecha_sind1" id="fecha_sind1" value="'+valorAnterior+'"/>');
			break;
			case 'Número Socio':
				$('.modal-body').append('<label for="num_socio">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<input type="text" class="form-control form-control-sm valor-form form-editar" name="num_socio" id="num_socio" value="'+valorAnterior+'" maxlength="3"/>');
			break;
			default:
		}
	}

	function obtenerTituloDeTabla(elemento){
		return elemento.parent().siblings().eq(0).text();
	}

	function obtenerValorParaVista(tituloFila, elemento){
		switch(tituloFila){
			case 'Rut':
				return $('#rut_modelo').val();
			break;
			case 'Fecha Nacimiento':
				return $('#fechaNacimento_modelo').val();
			break;
			case 'Fecha Ingreso PUCV':
				return $('#fechaPucv_modelo').val();
			break;
			case 'Fecha Ingreso Sindicato':
				return $('#fechaSind1_modelo').val();
			break;
			default:
				return elemento.parent().siblings().eq(1).text();
		}
	}

	function ucWords(cadena){
		var arrayPalabras;
		var cadenaLista = "";
		var largo;
		arrayPalabras = cadena.split(" ");
		largo = arrayPalabras.length;
		for(i=0;i < largo ;i++){
			if(i != (largo-1)){
				cadenaLista = cadenaLista+ucFirst(arrayPalabras[i])+" ";
			}
			else{
				cadenaLista = cadenaLista+ucFirst(arrayPalabras[i]);
			}
		}
		return convertirArticulos(cadenaLista);
		}

	function ucFirst(cadena){
		return cadena.substr(0,1).toUpperCase()+cadena.substr(1,cadena.length).toLowerCase();
	}

	function convertirArticulos(cadena){
		return articulosDe(articulosDel(articulosLa(articulosLas(articulosLo(articulosLos(cadena))))));
	}

	function articulosDe(cadena){
		var nuevaCadena;
		nuevaCadena = cadena.replace(/ De /gi, ' de ');
		return nuevaCadena;
	}

	function articulosDel(cadena){
		var nuevaCadena;
		nuevaCadena = cadena.replace(/ Del /gi, ' del ');
		return nuevaCadena;
	}

	function articulosLa(cadena){
		var nuevaCadena;
		nuevaCadena = cadena.replace(/ La /gi, ' la ');
		return nuevaCadena;
	}

	function articulosLas(cadena){
		var nuevaCadena;
		nuevaCadena = cadena.replace(/ Las /gi, ' las ');
		return nuevaCadena;
	}

	function articulosLo(cadena){
		var nuevaCadena;
		nuevaCadena = cadena.replace(/ Lo /gi, ' lo ');
		return nuevaCadena;
	}

	function articulosLos(cadena){
		var nuevaCadena;
		nuevaCadena = cadena.replace(/ Los /gi, ' los ');
		return nuevaCadena;
	}

	function formatoRutVista8(rut){
		var vectorRutOriginal = rut.split('');
		var largoRutOriginal = vectorRutOriginal.length;
		var vectorRutFormato = [];
		for (var i = 0; i < largoRutOriginal+3; i++) {
			if(i == 0){
				vectorRutFormato.push(vectorRutOriginal[i]);
			}
			if(i == 1){
				vectorRutFormato.push('.');
			}
			if(i >= 2 && i <= 4){
				vectorRutFormato.push(vectorRutOriginal[i-1]);
			}
			if(i == 5){
				vectorRutFormato.push('.');
			}
			if(i >= 6 && i <= 8){
				vectorRutFormato.push(vectorRutOriginal[i-2]);
			}
			if(i == 9){
				vectorRutFormato.push('-');
			}
			if(i >= 10){
				vectorRutFormato.push(vectorRutOriginal[i-3]);
			}
		}
		return vectorRutFormato.join('');
	}

	function formatoRutVista9(rut){
		var vectorRutOriginal = rut.split('');
		var largoRutOriginal = vectorRutOriginal.length;
		var vectorRutFormato = [];
		for (var i = 0; i < largoRutOriginal+3; i++) {
			if(i >= 0 && i < 2){
				vectorRutFormato.push(vectorRutOriginal[i]);
			}
			if(i == 2){
				vectorRutFormato.push('.');
			}
			if(i >= 3 && i < 6){
				vectorRutFormato.push(vectorRutOriginal[i-1]);
			}
			if(i == 6){
				vectorRutFormato.push('.');
			}
			if(i >= 7 && i < 10){
				vectorRutFormato.push(vectorRutOriginal[i-2]);
			}
			if(i == 10){
				vectorRutFormato.push('-');
			}
			if(i >= 11){
				vectorRutFormato.push(vectorRutOriginal[i-3]);
			}
		}
		return vectorRutFormato.join('');
	}

	function formatoFecha(fecha){
		return fecha.replace(/^(\d{4})-(\d{2})-(\d{2})$/g,'$3-$2-$1');
	}
});