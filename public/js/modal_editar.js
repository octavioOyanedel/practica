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
				return elemento.parent().siblings().eq(1).text();
			break;
			default:
				return elemento.parent().siblings().eq(1).text();
		}
	}

	function poblarVentanaModal(tituloFila, valorAnterior){
		$('.modal-body').empty();
		$('.modal-title').empty().append('Editar '+tituloFila);
	}

});