$(window).on('load',function(){
	var nombre;
	var rut;
	var idSocio;
	$('#solicitar_prestamo').click(function(e){
		e.preventDefault();
		$('#formulario_prestamo').empty();
		$('#mensaje_prestamo').empty();
		if($('#rut').val() != ''){
			rut = $('#rut').val();
			$.ajax({
				method: 'GET',
				dataType: 'json',
				url: '/validarPrestamo',
				data: {rut: rut},
				success: function(respuestaValidarPrestamo){
					$('.errores').empty();
					idSocio = respuestaValidarPrestamo[0].id;
					nombre = respuestaValidarPrestamo[0].nombres+' '+respuestaValidarPrestamo[0].apellidos;
						$.ajax({
							method: 'GET',
							dataType: 'json',
							url: '/buscarIdEnPrestamos',
							data: {id: idSocio},
							success: function(respuestaBuscarIdEnPrestamos){
								if(respuestaBuscarIdEnPrestamos === 0){
									cargarFormularioPrestamo(nombre, idSocio);
								}else{
									alertaPrestamoRechazado(nombre);
								}
							},
							error: function(respuestaBuscarIdEnPrestamos){
							}
						});
				},
				error: function(respuestaValidarPrestamo){
					$('.errores').empty();
					$('.errores').append(respuestaValidarPrestamo.responseJSON.errors.rut[0]);
				}
			});
		}

	});

	function cargarFormularioPrestamo(nombre, idSocio){
		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: '/buscarUltimoNumeroPrestamo',
			success: function(respuesta){
				alertaPrestamoAprobado(nombre);
				$('#formulario_prestamo').append('<label for="numero_prestamo">Número Préstamo *</label>');
				$('#formulario_prestamo').append('<input type="text" class="form-control form-control-sm valor-form form-editar" name="numero_prestamo" id="numero_prestamo" value="'+respuesta+'" maxlength="8" required />');
				$('#formulario_prestamo').append('<label for="cheque" class="separar-label">Cheque *</label>');
				$('#formulario_prestamo').append('<input type="text" class="form-control form-control-sm valor-form form-editar" name="cheque" id="cheque" value="" maxlength="8" required />');
				$('#formulario_prestamo').append('<label for="monto" class="separar-label">Monto *</label>');
				$('#formulario_prestamo').append('<input type="text" class="form-control form-control-sm valor-form form-editar" name="monto" id="monto" value="" maxlength="7" required />');
				$('#formulario_prestamo').append('<label for="cuotas" class="separar-label">Cuotas *</label>');
				$('#formulario_prestamo').append('<select id="cuotas" class="form-control form-control-sm valor-form form-editar" name="cuotas" required><option selected="true" value="">Seleccione Cuotas</option></select>');
				cargarCuotas();
				$('#formulario_prestamo').append('<input type="hidden" name="id" value="'+idSocio+'"/>');
				$('#formulario_prestamo').append('<button id="registrar_prestamo" type="submit" class="btn btn-primary btn-sm separar-boton">Registrar</button>');
			},
			error: function(respuesta){
			}
		});
	}

	function cargarCuotas(){
		for(var i = 1; i <= 24; i++){
			$('#cuotas').append('<option value="'+i+'">'+i+'</option>');
		}
	}

	function alertaPrestamoAprobado(nombre){
		$('#mensaje_prestamo').append('<div id="alerta-prestamo" class="alert alert-success alert-dismissible fade show" role="alert">'+nombre+'<strong class="icono-alerta"> no posee prestamos pendientes.</strong></div>');
	}

	function alertaPrestamoRechazado(nombre){
		$('#mensaje_prestamo').append('<div id="alerta-prestamo" class="alert alert-danger alert-dismissible fade show" role="alert">'+nombre+'<strong class="icono-alerta"> posee un prestamo pendiente.</strong></div>');
	}
});