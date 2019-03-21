$(window).on('load',function(){

	var elemento;
	var tituloFila;
	var valorAnterior;
	var nuevoValor;

	$('.editar').click(function(){
		elemento = $(this);
		tituloFila = obtenerTituloDeTabla(elemento);
		valorAnterior = obtenerValorParaVista(tituloFila, elemento);
		poblarVentanaModal(tituloFila, valorAnterior);

		$('#editar_registro').click(function(){
			nuevoValor = obtenerNuevoValor(tituloFila);
			if(valorAnterior === nuevoValor){
				//mensaje
				console.log('no hay cambios');
			}else{
				if(esCampoObligatorio(tituloFila)){
					if(nuevoValor === ''){
						//mensaje
						console.log('obligatorio vacio');
					}else{
						//peticion
						console.log('ajax');
					}
				}
			}			
		});
	});

	function obtenerNuevoValor(tituloFila){
		switch(tituloFila){
			case 'Xxx':
				return 0;
			break;
			default:
				return $('.valor-form').val().trim();
		}		
	}

	function esCampoObligatorio(){
		switch(tituloFila){
			case 'Nombres':
				return true;
			break;
			default:
				return elemento.parent().siblings().eq(1).text();
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
				$('.modal-body').append('<input type="date" class="form-control form-control-sm valor-form form-editar" name="fecha_sind1" id="fecha_sind1" value=""/>');
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

});