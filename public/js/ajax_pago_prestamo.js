$(window).on('load',function(){
	$.ajax({
		method: 'GET',
		dataType: 'json',
		url: '/pagoAutomaticoCuotas',
		success: function(respuesta){
		},
		error: function(respuesta){
		}
	});
	$.ajax({
		method: 'GET',
		dataType: 'json',
		url: '/comprobarEstadoPrestamo',
		success: function(respuesta){
		},
		error: function(respuesta){
		}
	});

});