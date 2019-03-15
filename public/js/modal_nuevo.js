$(window).on('load',function(){
	$('.enlace-nuevo').click(function(){
		configurarVentana(enlace($(this)));
	});

	function enlace(elemento){
		return elemento.text();
	}

	function configurarVentana(nombre){
		$('.modal-title').empty().append(nombre);
		switch(nombre){
			case 'Nueva sede':
				$('.modal-body').append('<label for="">Sede * <small class="errores" class="form-text text-muted"></small></label>');
				$('.modal-body').append('<input type="text" class="form-control form-control-sm valor-form" name="nueva_sede" id="nueva_sede" value=""/>');
			break;
			case 'Nueva área':

			break;
			case 'Nuevo cargo':

			break;
			default:
		}		
	}
});