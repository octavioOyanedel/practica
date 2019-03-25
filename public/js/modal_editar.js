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
			switch(tituloFila){
				case 'Ciudad':
					var ciudad_id = obtenerNuevoValor('Ciudad_id');
					var comuna_id = obtenerNuevoValor('Comuna_id');
					var ciudad_texto = obtenerNuevoValor('Ciudad_texto');
					var comuna_texto = obtenerNuevoValor('Comuna_texto');
					var direccion = obtenerNuevoValor('Ciudad_Direccion');
					if(ciudad_id === 'Seleccione Ciudad' || comuna_id === 'Seleccione Comuna'){
						peticionAjaxCiudad(tituloFila, '', '', '', '', direccion, id);
					}else{
						peticionAjaxCiudad(tituloFila, ciudad_id, comuna_id, ciudad_texto, comuna_texto, direccion, id);
					}
				break;
				case 'Comuna':
					var comuna_id = obtenerNuevoValor('Comuna_id');
					var comuna_texto = obtenerNuevoValor('Comuna_texto');
					var direccion = obtenerNuevoValor('Ciudad_Direccion');
					if(comuna_id === 'Seleccione Comuna'){
						peticionAjaxComuna(tituloFila, '', '', direccion, id);
					}else{
						peticionAjaxComuna(tituloFila, comuna_id, comuna_texto, direccion, id);
					}
				break;
				case 'Sede':
					var sede_id = obtenerNuevoValor('Sede_id');
					var sede_texto = obtenerNuevoValor('Sede_texto');
					var area_id = obtenerNuevoValor('Area_id');
					var area_texto = obtenerNuevoValor('Area_texto');
					if(sede_id === 'Seleccione Sede' || area_id === 'Seleccione Área'){
						peticionAjaxSede(tituloFila, '', '', '', '', id);
					}else{
						peticionAjaxSede(tituloFila, sede_id, sede_texto, area_id, area_texto, id);
					}
				break;
				case 'Área':
					var area_id = obtenerNuevoValor('Area_id');
					var area_texto = obtenerNuevoValor('Area_texto');
					if(area_id === 'Seleccione Área'){
						peticionAjaxArea(tituloFila, '', '', id);
					}else{
						peticionAjaxArea(tituloFila, area_id, area_texto, id);
					}
				break;
				case 'Cargo':
					var cargo_id = obtenerNuevoValor('Cargo_id');
					var cargo_texto = obtenerNuevoValor('Cargo_texto');
					if(cargo_id === 'Seleccione Cargo'){
						peticionAjaxCargo(tituloFila, '', '', id);
					}else{
						peticionAjaxCargo(tituloFila, cargo_id, cargo_texto, id);
					}
				break;
				default:
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
			}
		});
	});

	function peticionAjaxCargo(tituloFila, cargo_id, cargo_texto, id){
		var ruta = obtenerRuta(tituloFila);
		$.ajaxSetup({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
		});
		$.ajax({
			method: 'POST',
			dataType: 'json',
			url: ruta,
			data: {id: id, cargo: cargo_id},
			success: function(respuesta){
				modificarVistaCargo(cargo_id, cargo_texto);
				$('.modal').modal('hide');
			},
			error: function(respuesta){
				$('.errores').empty();
				$('.errores').append(respuesta.responseJSON.errors.valor[0]);
			}
		});
	}

	function peticionAjaxArea(tituloFila, area_id, area_texto, id){
		var ruta = obtenerRuta(tituloFila);
		$.ajaxSetup({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
		});
		$.ajax({
			method: 'POST',
			dataType: 'json',
			url: ruta,
			data: {id: id, area: area_id},
			success: function(respuesta){
				modificarVistaArea(area_id, area_texto);
				$('.modal').modal('hide');
			},
			error: function(respuesta){
				$('.errores').empty();
				$('.errores').append(respuesta.responseJSON.errors.valor[0]);
			}
		});
	}

	function peticionAjaxSede(tituloFila, sede_id, sede_texto, area_id, area_texto, id){
		var ruta = obtenerRuta(tituloFila);
		$.ajaxSetup({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
		});
		$.ajax({
			method: 'POST',
			dataType: 'json',
			url: ruta,
			data: {id: id, sede: sede_id, area: area_id},
			success: function(respuesta){
				modificarVistaSede(sede_id, sede_texto, area_id, area_texto);
				$('.modal').modal('hide');
			},
			error: function(respuesta){
				$('.errores').empty();
				$('.errores').append(respuesta.responseJSON.errors.valor[0]);
			}
		});
	}

	function peticionAjaxComuna(tituloFila, comuna_id, comuna_texto, direccion, id){
		var ruta = obtenerRuta(tituloFila);
		$.ajaxSetup({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
		});
		$.ajax({
			method: 'POST',
			dataType: 'json',
			url: ruta,
			data: {id: id, comuna: comuna_id, direccion:direccion},
			success: function(respuesta){
				modificarVistaComuna(comuna_id, comuna_texto, direccion);
				$('.modal').modal('hide');
			},
			error: function(respuesta){
				$('.errores').empty();
				$('.errores').append(respuesta.responseJSON.errors.valor[0]);
			}
		});
	}

	function peticionAjaxCiudad(tituloFila, ciudad_id, comuna_id, ciudad_texto, comuna_texto, direccion, id){
		var ruta = obtenerRuta(tituloFila);
		$.ajaxSetup({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
		});
		$.ajax({
			method: 'POST',
			dataType: 'json',
			url: ruta,
			data: {id: id, ciudad: ciudad_id, comuna: comuna_id, direccion:direccion},
			success: function(respuesta){
				modificarVistaCiudad(ciudad_id, comuna_id, ciudad_texto, comuna_texto, direccion);
				$('.modal').modal('hide');
			},
			error: function(respuesta){
				$('.errores').empty();
				$('.errores').append(respuesta.responseJSON.errors.valor[0]);
			}
		});
	}

	function peticionAjax(tituloFila, nuevoValor, id){
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
			case 'Ciudad_id':
				return $('#ciudad option:selected').val();
			break;
			case 'Ciudad_texto':
				return $('#ciudad option:selected').text();
			break;
			case 'Comuna_id':
				return $('#comuna option:selected').val();
			break;
			case 'Comuna_texto':
				return $('#comuna option:selected').text();
			break;
			case 'Ciudad_Direccion':
				return $('#direccion').val();
			break;
			case 'Sede_id':
				return $('#sede option:selected').val();
			break;
			case 'Sede_texto':
				return $('#sede option:selected').text();
			break;
			case 'Area_id':
				return $('#area option:selected').val();
			break;
			case 'Area_texto':
				return $('#area option:selected').text();
			break;
			case 'Cargo_id':
				return $('#cargo option:selected').val();
			break;
			case 'Cargo_texto':
				return $('#cargo option:selected').text();
			break;
			case 'Género':
				return $('#genero option:selected').val();
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
			case 'Género':
				return 'editar_genero';
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
			//selects
			case 'Ciudad':
				return 'editar_ciudad';
			break;
			case 'Comuna':
				return 'editar_comuna';
			break;
			case 'Sede':
				return 'editar_sede';
			break;
			case 'Área':
				return 'editar_area';
			break;
			case 'Cargo':
				return 'editar_cargo';
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
			case 'Género':
				$('.td-genero').empty();
				$('.td-genero').text(nuevoValor);
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
				$('.td-direccion').text(ucFirst(nuevoValor));
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

	function modificarVistaCiudad(ciudad_id, comuna_id, ciudad_texto, comuna_texto, direccion){
		$('.td-ciudad').empty();
		$('.td-ciudad').text(ciudad_texto);
		$('.td-comuna').empty();
		$('.td-comuna').text(comuna_texto);
		$('.td-direccion').empty();
		$('.td-direccion').text(ucFirst(direccion));
		//valores ocultos
		$('#ciudad_modelo').empty();
		$('#ciudad_modelo').val(ciudad_id);
		$('#comuna_modelo').empty();
		$('#comuna_modelo').val(comuna_id);
	}

	function modificarVistaComuna(comuna_id, comuna_texto, direccion){
		$('.td-comuna').empty();
		$('.td-comuna').text(comuna_texto);
		$('.td-direccion').empty();
		$('.td-direccion').text(ucFirst(direccion));
		//valores ocultos
		$('#comuna_modelo').empty();
		$('#comuna_modelo').val(comuna_id);
	}

	function modificarVistaSede(sede_id, sede_texto, area_id, area_texto){
		$('.td-sede').empty();
		$('.td-sede').text(sede_texto);
		$('.td-area').empty();
		$('.td-area').text(area_texto);
		//valores ocultos
		$('#sede_modelo').empty();
		$('#sede_modelo').val(sede_id);
		$('#area_modelo').empty();
		$('#area_modelo').val(area_id);
	}

	function modificarVistaArea(area_id, area_texto){
		$('.td-area').empty();
		$('.td-area').text(area_texto);
		//valores ocultos
		$('#area_modelo').empty();
		$('#area_modelo').val(area_id);
	}

	function modificarVistaCargo(cargo_id, cargo_texto){
		$('.td-cargo').empty();
		$('.td-cargo').text(cargo_texto);
		//valores ocultos
		$('#cargo_modelo').empty();
		$('#cargo_modelo').val(cargo_id);
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
		$('.cuerpo-modal').empty();
		$('.titulo-modal').empty().append('Editar '+tituloFila);
		switch(tituloFila) {
			case 'Nombres':
				$('.cuerpo-modal').append('<label for="nombres">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<input type="email" class="form-control form-control-sm valor-form form-editar" name="nombres" id="nombres" value="'+valorAnterior+'"/>');
			break;
			case 'Apellidos':
				$('.cuerpo-modal').append('<label for="apellidos">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<input type="email" class="form-control form-control-sm valor-form form-editar" name="apellidos" id="apellidos" value="'+valorAnterior+'"/>');
			break;
			case 'Rut':
				$('.cuerpo-modal').append('<label for="rut">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<input type="email" class="form-control form-control-sm valor-form form-editar" name="rut" id="rut" value="'+valorAnterior+'" maxlength="9"/>');
			break;
			case 'Género':
				$('.cuerpo-modal').append('<label for="genero">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<select id="genero" class="form-control form-control-sm valor-form form-editar" name="genero" required></select>');
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
				$('.cuerpo-modal').append('<label for="fecha_nac">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<input type="date" class="form-control form-control-sm valor-form form-editar" name="fecha_nac" id="fecha_nac" value="'+valorAnterior+'"/>');
			break;
			case 'Celular':
				$('.cuerpo-modal').append('<label for="celular">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<input type="text" class="form-control form-control-sm valor-form form-editar" name="celular" id="celular" value="'+valorAnterior+'" maxlength="9"/>');
			break;
			case 'Teléfono Fijo':
				$('.cuerpo-modal').append('<label for="fijo">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<input type="text" class="form-control form-control-sm valor-form form-editar" name="fijo" id="fijo" value="'+valorAnterior+'" maxlength="7"/>');
			break;
			case 'Correo':
				$('.cuerpo-modal').append('<label for="correo">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<input type="email" class="form-control form-control-sm valor-form form-editar" name="correo" id="correo" value="'+valorAnterior+'"/>');
			break;
			case 'Dirección':
				$('.cuerpo-modal').append('<label for="direccion">Dirección <small class="errores" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<input type="email" class="form-control form-control-sm valor-form form-editar" name="direccion" id="direccion" value="'+valorAnterior+'"/>');
			break;
			case 'Fecha Ingreso PUCV':
				$('.cuerpo-modal').append('<label for="fecha_pucv">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<input type="date" class="form-control form-control-sm valor-form form-editar" name="fecha_pucv" id="fecha_pucv" value="'+valorAnterior+'"/>');
			break;
			case 'Anexo':
				$('.cuerpo-modal').append('<label for="anexo">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<input type="text" class="form-control form-control-sm valor-form form-editar" name="anexo" id="anexo" value="'+valorAnterior+'" maxlength="4"/>');
			break;
			case 'Fecha Ingreso Sindicato':
				$('.cuerpo-modal').append('<label for="fecha_sind1">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<input type="date" class="form-control form-control-sm valor-form form-editar" name="fecha_sind1" id="fecha_sind1" value="'+valorAnterior+'"/>');
			break;
			case 'Número Socio':
				$('.cuerpo-modal').append('<label for="num_socio">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<input type="text" class="form-control form-control-sm valor-form form-editar" name="num_socio" id="num_socio" value="'+valorAnterior+'" maxlength="3"/>');
			break;
			//selects
			case 'Ciudad':
				$('.cuerpo-modal').append('<label for="ciudad">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<select id="ciudad" class="form-control form-control-sm valor-form form-editar" name="ciudad" required><option selected="true" value="">Seleccione Ciudad</option></select>');
				$('.cuerpo-modal').append('<label class="separar-label" for="comuna">Comuna <small class="errores" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<select id="comuna" class="form-control form-control-sm valor-form form-editar" name="comuna" required><option selected="true" value="">Seleccione Comuna</option></select>');
					if(existeValor('ciudad') != ''){
						cargarSelectNoVacio('/cargarUrbes', existeValor('ciudad'));
						cargarSelectNoVacioPorId($('#ciudad_modelo').val(), '/cargarComunas', existeValor('comuna'));
					}else{
						cargarSelect('/cargarUrbes');
					}
				$('.cuerpo-modal').append('<label class="separar-label" for="direccion">Dirección <small class="errores" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<input type="text" class="form-control form-control-sm valor-form form-editar" name="direccion" id="direccion" value="'+$('.td-direccion').text()+'"/>');
				$('#ciudad').change(function(){
					cargarSelectPorId($('#ciudad option:selected').val(), '/cargarComunas');
				});
			break;
			case 'Comuna':
				$('.cuerpo-modal').append('<label for="comuna">Comuna <small class="errores" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<select id="comuna" class="form-control form-control-sm valor-form form-editar" name="comuna" required><option selected="true" value="">Seleccione Comuna</option></select>');
				cargarSelectNoVacioPorId($('#ciudad_modelo').val(), '/cargarComunas', existeValor('comuna'));
				$('.cuerpo-modal').append('<label class="separar-label" for="direccion">Dirección <small class="errores" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<input type="text" class="form-control form-control-sm valor-form form-editar" name="direccion" id="direccion" value="'+$('.td-direccion').text()+'"/>');
			break;
			case 'Sede':
				$('.cuerpo-modal').append('<label for="sede">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<select id="sede" class="form-control form-control-sm valor-form form-editar" name="sede" required><option selected="true" value="">Seleccione Sede</option></select>');
				$('.cuerpo-modal').append('<label class="separar-label" for="area">Área <small class="errores" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<select id="area" class="form-control form-control-sm valor-form form-editar" name="area" required><option selected="true" value="">Seleccione Área</option></select>');
					if(existeValor('sede') != ''){
						cargarSelectNoVacio('/cargarSedes', existeValor('sede'));
						cargarSelectNoVacioPorId($('#sede_modelo').val(), '/cargarAreas', existeValor('area'));
					}else{
						cargarSelect('/cargarSedes');
					}
					$('#sede').change(function(){
						cargarSelectPorId($('#sede option:selected').val(), '/cargarAreas');
					});
			break;
			case 'Área':
				$('.cuerpo-modal').append('<label for="area">Área <small class="errores" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<select id="area" class="form-control form-control-sm valor-form form-editar" name="area" required><option selected="true" value="">Seleccione Área</option></select>');
				cargarSelectNoVacioPorId($('#sede_modelo').val(), '/cargarAreas', existeValor('area'));
			break;
			case 'Cargo':
				$('.cuerpo-modal').append('<label for="cargo">'+tituloFila+' <small class="errores" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<select id="cargo" class="form-control form-control-sm valor-form form-editar" name="cargo" required><option selected="true" value="">Seleccione Cargo</option></select>');
					if(existeValor('cargo') != ''){
						cargarSelectNoVacio('/cargarCargos', existeValor('cargo'));
					}else{
						cargarSelect('/cargarCargos');
					}
			break;
			default:
		}
	}

	function cargarSelect(ruta){
		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: ruta,
			success: function(respuesta){
				switch(ruta) {
					case '/cargarUrbes':
						$('#ciudad').empty();
						$('#ciudad').append('<option selected="true">Seleccione Ciudad</option>');
						respuesta.forEach(e => {
							$('#ciudad').append('<option value='+e.id+'>'+e.nombre+'</option>');
						});
					break;
					case '/cargarSedes':
						$('#sede').empty();
						$('#sede').append('<option selected="true">Seleccione Sede</option>');
						respuesta.forEach(e => {
							$('#sede').append('<option value='+e.id+'>'+e.nombre+'</option>');
						});
					break;
					case '/cargarCargos':
						$('#cargo').empty();
						$('#cargo').append('<option selected="true">Seleccione Cargo</option>');
						respuesta.forEach(e => {
							$('#cargo').append('<option value='+e.id+'>'+e.nombre+'</option>');
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

	function cargarSelectPorId(id, ruta){
		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: ruta,
			data: {id: id},
			success: function(respuesta){
				switch(ruta) {
					case '/cargarComunas':
						$('#comuna').empty();
						$('#comuna').append('<option selected="true">Seleccione Comuna</option>');
						respuesta.forEach(e => {
							$('#comuna').append('<option value='+e.id+'>'+e.nombre+'</option>');
						});
					break;
					case '/cargarAreas':
						$('#area').empty();
						$('#area').append('<option selected="true">Seleccione Área</option>');
						respuesta.forEach(e => {
							$('#area').append('<option value='+e.id+'>'+e.nombre+'</option>');
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

	function cargarSelectNoVacio(ruta, valor){
		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: ruta,
			success: function(respuesta){
				switch(ruta) {
					case '/cargarUrbes':
						$('#ciudad').empty();
						$('#ciudad').append('<option selected="true">Seleccione Ciudad</option>');
						respuesta.forEach(e => {
							if(valor === e.nombre){
								$('#ciudad').append('<option value='+e.id+' selected>'+e.nombre+'</option>');
							}else{
								$('#ciudad').append('<option value='+e.id+'>'+e.nombre+'</option>');
							}
						});
					break;
					case '/cargarSedes':
						$('#sede').empty();
						$('#sede').append('<option selected="true">Seleccione Sede</option>');
						respuesta.forEach(e => {
							if(valor === e.nombre){
								$('#sede').append('<option value='+e.id+' selected>'+e.nombre+'</option>');
							}else{
								$('#sede').append('<option value='+e.id+'>'+e.nombre+'</option>');
							}
						});
					break;
					case '/cargarCargos':
						$('#cargo').empty();
						$('#cargo').append('<option selected="true">Seleccione Cargo</option>');
						respuesta.forEach(e => {
							if(valor === e.nombre){
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

	function cargarSelectNoVacioPorId(id, ruta, valor){
		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: ruta,
			data: {id: id},
			success: function(respuesta){
				switch(ruta) {
					case '/cargarComunas':
						$('#comuna').empty();
						$('#comuna').append('<option selected="true">Seleccione Comuna</option>');
						respuesta.forEach(e => {
							if(valor === e.nombre){
								$('#comuna').append('<option value='+e.id+' selected>'+e.nombre+'</option>');
							}else{
								$('#comuna').append('<option value='+e.id+'>'+e.nombre+'</option>');
							}
						});
					break;
					case '/cargarAreas':
						$('#area').empty();
						$('#area').append('<option selected="true">Seleccione Área</option>');
						respuesta.forEach(e => {
							if(valor === e.nombre){
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

	function existeValor(campo){
		switch(campo){
			case 'ciudad':
				return $('.td-ciudad').text();
			break;
			case 'comuna':
				return $('.td-comuna').text();
			break;
			case 'sede':
				return $('.td-sede').text();
			break;
			case 'area':
				return $('.td-area').text();
			break;
			case 'cargo':
				return $('.td-cargo').text();
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