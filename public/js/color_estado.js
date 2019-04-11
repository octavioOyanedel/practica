$(window).on('load',function(){
	var i;
	var elementos = $('.estado-prestamo');
	for (i = 0; i < elementos.length; i++) {
		if(elementos[i].textContent.localeCompare('Pagada') == 0){
			elementos[i].classList.remove('no-pagada');
			elementos[i].classList.add('pagada');
		}else{
			elementos[i].classList.remove('pagada');
			elementos[i].classList.add('no-pagada');
		}		
	} 
});	