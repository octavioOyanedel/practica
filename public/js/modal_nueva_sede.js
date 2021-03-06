$(window).on('load',function(){
    $('.enlace-nuevo').click(function(){
        document.getElementById("form_nueva_area").reset();
    });
    $('#guardar_nueva_sede').click(function(){
        var nuevo = $('#nueva_sede').val();
        if(nuevo != ''){
            guardarNuevoRegistro(nuevo);
        }
    });

    function guardarNuevoRegistro(nuevo){
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: '/sedes',
            data: {valor: nuevo},
            success: function(respuesta){
                obtenerUltimoRegistroAlmacenado();
                cerrarModal();
            },
            error: function(respuesta){
                errorModal(respuesta);
            }
        });
    }

    function obtenerUltimoRegistroAlmacenado(){
        $.ajax({
            method: 'GET',
            dataType: 'json',
            url: '/obtenerUltimaSede',
            success: function(respuesta){
                $('#sede').append('<option value='+respuesta["id"]+' selected>'+convertirArticulos(respuesta["nombre"])+'</option');
            },
            error: function(respuesta){
            }
        });
    }

    function cerrarModal(){
        $('.nuevo-valor').val('');
        $('.modal').modal('hide');
    }

    function errorModal(respuesta){
        $('.errores-modal').empty();
        $('.errores-modal').append(respuesta.responseJSON.errors.valor[0]);
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
});