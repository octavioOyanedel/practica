$(window).on('load',function(){

	var label = '';
	var id;
	var ruta;

	$('.select-ajax').change(function(){
		elemento = $(this);
		label = obtenerLabel(elemento);
		id = obtenerId(label);
		ruta = obtenerRuta(label);
		//console.log('ruta: '+ruta+' id: '+id+' label: '+label);
		cargarSelectSecundario(ruta, id, label);
	});

	function cargarSelectSecundario(ruta, id, label){
		console.log('ajax');
		$.ajax({
			method: 'GET',
			dataType: 'json',
			url: ruta+id,
			success: function(respuesta){
				console.log(respuesta);
				prepararSelect(label);
				respuesta.forEach(e => {
					cargarSelect(e, label);
				});
			},
			error: function(respuesta){
				//console.log(respuesta);
				//alert('Error de respuesta Ajax: carga selects dinámicos');
			}
		});
	}

	function prepararSelect(label){
		switch(label){
			case 'Ciudad':
				$('#comuna').empty();
				$('#comuna').append('<option selected="true">Seleccione Comuna</option>');			
			break;
			case 'Sede':
				$('#area').empty();
				$('#area').append('<option selected="true">Seleccione Área</option>');	
			break;						
			default:	
		}		
	}

	function cargarSelect(e, label){
		switch(label){
			case 'Ciudad':
				$('#comuna').append('<option value='+e.id+'>'+e.nombre+'</option>');			
			break;
			case 'Sede':
				$('#area').append('<option value='+e.id+'>'+e.nombre+'</option>');	
			break;						
			default:	
		}		
	}	

	function obtenerId(label){
		switch(label){
			case 'Ciudad':
				return $('#ciudad option:selected').val();				
			break;
			case 'Sede':
				return $('#sede option:selected').val();
			break;						
			default:	
		}
	}

	function obtenerRuta(label){
		switch(label){
			case 'Ciudad':
				return 'comunas/';				
			break;
			case 'Sede':
				return 'areas/';	
			break;						
			default:	
		}
	}

	function obtenerLabel(elemento){
		return elemento.siblings().eq(0).text();
	}

});