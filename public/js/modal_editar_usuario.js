$(window).on('load',function(){

	var id = 0;
	var tituloFila = '';
	var valorAnterior = '';
	var nuevoValor = ''
	var elemento = null;

	$('.editar').click(function(){
		id = $('#id_usuario').val();
		elemento = $(this);
		tituloFila = obtenerTituloDeTabla(elemento);
		valorAnterior = obtenerValorParaVista(elemento);
		poblarVentanaModal(tituloFila, valorAnterior);
		$('#editar_registro').click(function(){
			if(tituloFila === 'Contraseña'){;
				var nueva = $('#nueva_contrasena').val();
				var confirmar = $('#confirmar_contrasena').val();
				if(nueva != '' && confirmar != ''){
					peticionAjaxContraseña(id, nueva, confirmar);
				}else{
					if(nueva == ''){
						$('.error-nueva').empty();
						$('.error-nueva').append(' campo obligatorio.');
					}else{
						$('.error-nueva').empty();
					}

					if(confirmar == ''){
						$('.error-confirmar').empty();
						$('.error-confirmar').append(' campo obligatorio.');
					}else{
						$('.error-confirmar').empty();
					}
				}

			}else{
				nuevoValor = obtenerNuevoValor();
				if(nuevoValor != ''){
					peticionAjax(tituloFila, nuevoValor, id);
				}else{
					$('.errores').empty();
					$('.errores').append('campo obligatorio.');
				}
			}
		});
	});

	function peticionAjaxContraseña(id, nueva, confirmar){
		$.ajaxSetup({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
		});
		$.ajax({
			method: 'POST',
			dataType: 'json',
			url: 'editar_contrasena',
			data: {id: id, nueva: nueva, confirmar: confirmar},
			success: function(respuesta){
				$('.modal').modal('hide');
			},
			error: function(respuesta){
				$('.errores').empty();
				$('.error-nueva').append(' deben ser campos válidos e idénticos.');					
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

	function obtenerTituloDeTabla(elemento){
		return elemento.parent().siblings().eq(0).text();
	}

	function poblarVentanaModal(tituloFila, valorAnterior){
		$('.cuerpo-modal').empty();
		$('.titulo-modal').empty().append('Editar '+tituloFila);
		switch(tituloFila) {
			case 'Nombre':
				$('.cuerpo-modal').append('<label for="nombre">'+tituloFila+' * <small class="errores" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<input type="text" class="form-control form-control-sm valor-form form-editar" name="nombre" id="nombre" value="'+valorAnterior+'"/>');
			break;
			case 'Correo':
				$('.cuerpo-modal').append('<label for="correo">'+tituloFila+' * <small class="errores" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<input type="email" class="form-control form-control-sm valor-form form-editar" name="correo" id="correo" value="'+valorAnterior+'"/>');
			break;
			case 'Contraseña':
				$('.cuerpo-modal').append('<div class="alert alert-info" role="alert">Contraseña sólo permite letras y números entre 6 y 10 caracteres.</div>');
				$('.cuerpo-modal').append('<label class="separar-label" for="nueva_contrasena">Nueva '+tituloFila+' * <small class="errores error-nueva" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<input type="password" class="form-control form-control-sm valor-form form-editar" name="nueva_contrasena" id="nueva_contrasena" value="" maxlength="10"/>');
				$('.cuerpo-modal').append('<label class="separar-label" for="confirmar_contrasena">Confirmar '+tituloFila+' * <small class="errores error-confirmar" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<input type="password" class="form-control form-control-sm valor-form form-editar" name="confirmar_contrasena" id="confirmar_contrasena" value="" maxlength="10"/>');
			break;
			case 'Tipo':
				$('.cuerpo-modal').append('<label for="tipo_usuario">Tipo Usuario * <small class="errores" class="form-text text-muted"></small></label>');
				$('.cuerpo-modal').append('<select id="tipo_usuario" class="form-control form-control-sm valor-form form-editar" name="tipo_usuario" required><option value="">Seleccione Tipo</option></select>');
				if(valorAnterior == 1){
					$('#tipo_usuario').append('<option value="1" selected="true">Administrador</option>');
					$('#tipo_usuario').append('<option value="2">Invitado</option>');
				}else{
					$('#tipo_usuario').append('<option value="1">Administrador</option>');
					$('#tipo_usuario').append('<option value="2" selected="true">Invitado</option>');
				}
			break;
			default:
		}
	}

	function modificarVista(tituloFila, nuevoValor){
		switch(tituloFila){
			case 'Nombre':
				$('.td-nombre').empty();
				$('.td-nombre').text(ucWords(nuevoValor));
			break;
			case 'Correo':
				$('.td-correo').empty();
				$('.td-correo').text(nuevoValor);
			break;
			case 'Tipo':
				$('.td-tipo').empty();

				$('.td-tipo').text($('#tipo_usuario option:selected').text());
			break;
			default:
		}
	}

	function obtenerValorParaVista(elemento){
		switch(tituloFila){
			case 'Tipo':
				return $('#id_tipo').val();
			break;
			default:
				return elemento.parent().siblings().eq(1).text();
		}
	}

	function obtenerRuta(tituloFila){
		switch(tituloFila){
			case 'Nombre':
				return 'editar_nombre';
			break;
			case 'Correo':
				return 'editar_correo';
			break;
			case 'Tipo':
				return 'editar_tipo';
			break;
			default:
		}
	}

	function obtenerNuevoValor(){
		return $('.valor-form').val().trim();
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
});