$(window).on('load',function(){
	$('.enlace-nuevo').click(function(){
		var nuevo = '';
		var nombre = enlace($(this));
		configurarVentana(nombre);
		$('#guardar_nuevo_registro').click(function(){
			nuevo = convertirArticulos(obtenerNuevoValor());
			if(nuevo != ''){
				guardarNuevoRegistro(nombre, nuevo);
			}
		});

	});

	function enlace(elemento){
		return elemento.text();
	}

	function guardarNuevoRegistro(nombre, nuevo){
		var ruta = obtenerRuta(nombre);
		$.ajaxSetup({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
		});
		if(nombre.localeCompare('Nueva Área') === 0){
			var id = $('#sede_nueva_area option:selected').val();
			$.ajax({
				method: 'POST',
				dataType: 'json',
				url: ruta,
				data: {id: id, valor: nuevo},
				success: function(respuesta){
					obtenerUltimoRegistroAlmacenado(nombre);
					cerrarModal();
				},
				error: function(respuesta){
					errorModal(respuesta);
				}
			});
		}else{
			$.ajax({
				method: 'POST',
				dataType: 'json',
				url: ruta,
				data: {valor: nuevo},
				success: function(respuesta){
					obtenerUltimoRegistroAlmacenado(nombre);
					cerrarModal();
				},
				error: function(respuesta){
					errorModal(respuesta);
				}
			});
		}
	}

	function cerrarModal(){
		$('.nuevo-valor').val('');
		$('.modal').modal('hide');
	}

	function errorModal(respuesta){
		$('.errores-modal').empty();
		$('.errores-modal').append(respuesta.responseJSON.errors.valor[0]);
	}

	function obtenerUltimoRegistroAlmacenado(nombre){
		var ruta = obtenerRutaNuevoOption(nombre);
		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: ruta,
			success: function(respuesta){
				cargarNuevoOption(nombre, respuesta)
			},
			error: function(respuesta){
			}
		});
	}

	function cargarNuevoOption(nombre, respuesta){
		switch(nombre){
			case 'Nueva Sede':
				$('#sede').append('<option value='+respuesta["id"]+' selected>'+respuesta["nombre"]+'</option');
			break;
			case 'Nueva Área':
				$('#area').append('<option value='+respuesta["id"]+' selected>'+respuesta["nombre"]+'</option');
			break;
			case 'Nuevo Cargo':
				$('#cargo').append('<option value='+respuesta["id"]+' selected>'+respuesta["nombre"]+'</option');
			break;
			default:
		}
	}

	function obtenerRutaNuevoOption(nombre){
		switch(nombre){
			case 'Nueva Sede':
				return '/obtenerUltimaSede';
			break;
			case 'Nueva Área':
				return '/obtenerUltimaArea';
			break;
			case 'Nuevo Cargo':
				return '/obtenerUltimoCargo';
			break;
			default:
		}
	}

	function obtenerRuta(nombre){
		switch(nombre){
			case 'Nueva Sede':
				return '/sedes';
			break;
			case 'Nueva Área':
				return '/areas';
			break;
			case 'Nuevo Cargo':
				return '/cargos';
			break;
			default:
		}
	}

	function configurarVentana(nombre){
		$('.modal-title').empty().append(nombre);
		$('.form-modal').remove();
		$('.etiqueta-form').remove();
		switch(nombre){
			case 'Nueva Sede':
				$('.modal-body').append('<label class="etiqueta-form" for="nueva_sede">Sede * <small class="errores-modal" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<input type="text" class="form-control form-control-sm form-modal nuevo-valor" name="nueva_sede" id="nueva_sede" value="" required/>');
			break;
			case 'Nueva Área':
				$('.modal-body').append('<label class="etiqueta-form" for="sede_nueva_area">Sede * </label>');
				$('.modal-body').append('<select id="sede_nueva_area" class="form-control form-control-sm form-modal" name="sede_nueva_area" required><option selected="true" value="">Seleccione Sede</option></select>');
				$('.modal-body').append('<label class="etiqueta-form separar-label" for="nueva_area">Nueva Área * <small class="errores-modal" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<input type="text" class="form-control form-control-sm form-modal nuevo-valor" name="nueva_area" id="nueva_area" value=""/>');
				cargarSelectSedes();
			break;
			case 'Nuevo Cargo':
				$('.modal-body').append('<label class="etiqueta-form" for="nueva_area">Nuevo Cargo * <small class="errores-modal" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<input type="text" class="form-control form-control-sm form-modal nuevo-valor" name="nueva_area" id="nueva_area" value=""/>');
			break;
			default:
		}
	}

	function cargarSelectSedes(){
		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: '/cargarSedes',
			success: function(respuesta){
				respuesta.forEach(e => {
					$('#sede_nueva_area').append('<option value='+e.id+'>'+e.nombre+'</option>');
				});
			},
			error: function(respuesta){
				alert('Error de respuesta Ajax: carga selects dinámicos');
			}
		});
	}

	function obtenerNuevoValor(){
		return $('.nuevo-valor').val().trim();
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

});