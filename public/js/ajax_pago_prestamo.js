$(window).on('load',function(){
	$.ajax({
		method: 'GET',
		dataType: 'json',
		url: '/pagoAutomaticoCuota',
		success: function(respuesta){
			console.log(respuesta);
		},
		error: function(respuesta){
			console.log(respuesta);
		}
	});
});