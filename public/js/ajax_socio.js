$(window).on('load',function(){
	$.ajax({
		method: 'GET',
		dataType: 'json',
		url: '/buscarUltimoNumeroSocio',
		success: function(respuesta){
			$('#numero_socio').val(respuesta);
		},
		error: function(respuesta){
		}
	});
});