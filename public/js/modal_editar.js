$(window).on('load',function(){

	var elemento;
	var tituloFila;
	var valorAnterior;

	$('.editar').click(function(){
		elemento = $(this);
		tituloFila = obtenerTituloDeTabla(elemento);
		valorAnterior = obtenerValorParaVista(tituloFila, elemento);
		poblarVentanaModal(tituloFila, valorAnterior);
	});

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


	function cargarSelect(tituloFila, valorAnterior){
		var ruta = obtenerRuta(tituloFila);
		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: ruta,
			success: function(respuesta){
				switch(tituloFila) {
					case 'Ciudad':
						$('#ciudad').empty();
						$('#ciudad').append('<option selected="true">Seleccione Ciudad</option>');
						respuesta.forEach(e => {
							if(e.nombre.localeCompare(valorAnterior) === 0){
								$('#ciudad').append('<option value='+e.id+' selected>'+e.nombre+'</option>');
							}else{
								$('#ciudad').append('<option value='+e.id+'>'+e.nombre+'</option>');
							}
						});
					break;
					case 'Sede':
						$('#sede').empty();
						$('#sede').append('<option selected="true">Seleccione Sede</option>');
						respuesta.forEach(e => {
							if(e.nombre.localeCompare(valorAnterior) === 0){
								$('#sede').append('<option value='+e.id+' selected>'+e.nombre+'</option>');
							}else{
								$('#sede').append('<option value='+e.id+'>'+e.nombre+'</option>');
							}
						});
					break;
					case 'Cargo':
						$('#cargo').empty();
						$('#cargo').append('<option selected="true">Seleccione Cargo</option>');
						respuesta.forEach(e => {
							if(e.nombre.localeCompare(valorAnterior) === 0){
								$('#cargo').append('<option value='+e.id+' selected>'+e.nombre+'</option>');
							}else{
								$('#cargo').append('<option value='+e.id+'>'+e.nombre+'</option>');
							}
						});
					break;
					default:
						//error
				}
			},
			error: function(respuesta){
				$('.valor-form').addClass('is-invalid');
			}
		});
	}

	function cargarSelectPorId(id, tituloFila, valorAnterior){
		ruta = obtenerRutaSelectSecundario(tituloFila);
		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: ruta,
			data: {id: id},
			success: function(respuesta){
				switch(tituloFila) {
					case 'Ciudad':
						$('#comuna').empty();
						$('#comuna').append('<option selected="true">Seleccione Comuna</option>');
						respuesta.forEach(e => {
							if(e.nombre.localeCompare(valorAnterior) === 0){
								$('#comuna').append('<option value='+e.id+' selected>'+e.nombre+'</option>');
							}else{
								$('#comuna').append('<option value='+e.id+'>'+e.nombre+'</option>');
							}

						});
					break;
					case 'Sede':
						$('#area').empty();
						$('#area').append('<option selected="true">Seleccione Área</option>');
						respuesta.forEach(e => {
							if(e.nombre.localeCompare(valorAnterior) === 0){
								$('#area').append('<option value='+e.id+' selected>'+e.nombre+'</option>');
							}else{
								$('#area').append('<option value='+e.id+'>'+e.nombre+'</option>');
							}
						});
					break;
					default:
						//error
				}
			},
			error: function(respuesta){
				$('.valor-form').addClass('is-invalid');
			}
		});
	}

	function obtenerRuta(tituloFila){
		var ruta;
		switch(tituloFila) {
			case 'Ciudad':
				ruta = '/cargarUrbes';
			break;
			case 'Sede':
				ruta = '/cargarSedes';
			break;
			case 'Cargo':
				ruta = '/cargarCargos';
			break;
			default:
				//error
		}
		return ruta;
	}

	function obtenerRutaSelectSecundario(tituloFila){
		var ruta;
		switch(tituloFila) {
			case 'Ciudad':
				ruta = '/cargarComunas';
			break;
			case 'Sede':
				ruta = '/cargarAreas';
			break;
			default:
				//error
		}
		return ruta;
	}

	function poblarVentanaModal(tituloFila, valorAnterior){
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
				$('.modal-body').append('<select id="genero" class="form-control form-control-sm valor-form form-editar" name="genero" required><option selected="true" value="">Seleccione Genero</option><option value="Varón">Varón</option><option value="Dama">Dama</option></select>');
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
			case 'Ciudad':
				$('.modal-body').append('<label for="ciudad">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<select id="ciudad" class="form-control form-control form-control-sm valor-form form-editar" name="ciudad" required><option selected="true" value="">Seleccione Ciudad</option></select>');
				$('.modal-body').append('<label class="separar-label" for="comuna">Comuna <small class="errores" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<select id="comuna" class="form-control form-control form-control-sm valor-form form-editar" name="comuna" required><option selected="true" value="">Seleccione Comuna</option></select>');
				$('.modal-body').append('<label class="separar-label" for="direccion">Dirección <small class="errores" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<input type="email" class="form-control form-control-sm valor-form form-editar" name="direccion" id="direccion" value="'+$('.td-direccion').text()+'"/>');
				cargarSelect(tituloFila, valorAnterior);
				$('#ciudad').change(function(){
					cargarSelectPorId($('#ciudad option:selected').val(), tituloFila, $('.td-comuna').text());
				});
				$('#comuna').empty();
				$('#comuna').append('<option">Seleccione Comuna</option>');
				$('#comuna').append('<option value='+$('#comuna_modelo').val()+' selected>'+$('.td-comuna').text()+'</option>');
			break;
			case 'Comuna':
				$('.modal-body').append('<label for="comuna">Comuna <small class="errores" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<select id="comuna" class="form-control form-control-sm valor-form form-editar" name="comuna" required><option selected="true" value="">Seleccione Comuna</option></select>');
				$('.modal-body').append('<label class="separar-label" for="direccion">Dirección <small class="errores" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<input type="email" class="form-control form-control-sm valor-form form-editar" name="direccion" id="direccion" value="'+$('.td-direccion').text()+'"/>');
				cargarSelectPorId($('#ciudad_modelo').val(), 'Ciudad', valorAnterior);
			break;
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
			case 'Sede':
				var idSede;
				$('.modal-body').append('<label for="sede">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<select id="sede" class="form-control form-control-sm valor-form form-editar" name="sede" required><option selected="true" value="">Seleccione Sede</option></select>');
				$('.modal-body').append('<label class="separar-label" for="area">Área <small class="errores" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<select id="area" class="form-control form-control-sm valor-form form-editar" name="area" required><option selected="true" value="">Seleccione Área</option></select>');
				cargarSelect(tituloFila, valorAnterior);
				$('#sede').change(function(){
					cargarSelectPorId($('#sede option:selected').val(), tituloFila, valorAnterior);
				});
			break;
			case 'Área':
				$('.modal-body').append('<label for="area">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<select id="area" class="form-control form-control-sm valor-form form-editar" name="area" required><option selected="true" value="">Seleccione Área</option></select>');
				cargarSelectPorId($('#sede_modelo').val(), 'Sede');
			break;
			case 'Cargo':
				$('.modal-body').append('<label for="cargo">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<select id="cargo" class="form-control form-control-sm valor-form form-editar" name="cargo" required><option selected="true" value="">Seleccione Cargo</option></select>');
				cargarSelect(tituloFila, valorAnterior);
			break;
			case 'Fecha Ingreso Sindicato':
				$('.modal-body').append('<label for="fecha_sind1">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<input type="date" class="form-control form-control-sm valor-form form-editar" name="fecha_sind1" id="fecha_sind1" value=""/>');
			break;
			case 'Número Socio':
				$('.modal-body').append('<label for="num_socio">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<input type="text" class="form-control form-control-sm valor-form form-editar" name="num_socio" id="num_socio" value="'+valorAnterior+'" maxlength="3"/>');
			break;
			default:
		}
	}

});