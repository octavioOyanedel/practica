$(window).on('load',function(){
	var clic = 0; //estado inicial
	$('.boton-menu').click(function(e){
		e.preventDefault();
		if(clic == 0){
			//despliega
			clic = 1;
			$('.item-menu').css({'display' : 'block'});
		}else{
			clic = 0;
			$('.item-menu').css({'display' : 'none'});
		}
	});	

	$('.mostrar-sub-categoria').click(function(e){
		e.preventDefault();
		$(this).siblings().eq(0).slideToggle();
	});

	$(window).resize(function(){
		if($(document).width() > 885){
			$('.item-general').css({'display' : 'block'}); 
			$('.item-responsivo').css({'display' : 'none'});
		}else{
			$('.item-menu').css({'display' : 'none'});
		}
	});
});