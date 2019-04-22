$(window).on('load',function(){
    cargarSelectSedes();
    $('#guardar_nueva_area').click(function(){
        var id_sede = $('#sede_actual option:selected').val();
        var sede = $('#sede_actual option:selected').text();
        var nuevo = $('#nueva_area').val();
        if(nuevo != '' && id_sede != ''){
            guardarNuevoRegistro(id_sede, nuevo, sede);
        }
    });

    function guardarNuevoRegistro(id, nuevo, sede){
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
        $.ajax({
            method: 'POST',
            dataType: 'json',
            url: '/areas',
            data: {id: id, valor: nuevo},
            success: function(respuesta){
                obtenerUltimoRegistroAlmacenado(id, sede);
                cerrarModal();
            },
            error: function(respuesta){
                errorModal(respuesta);
            }
        });
    }

    function obtenerUltimoRegistroAlmacenado(id, sede){
        $.ajax({
            method: 'GET',
            dataType: 'json',
            url: '/obtenerUltimaArea',
            success: function(respuesta){
                $('#sede').append('<option value='+id+' selected>'+sede+'</option');
                $('#area').append('<option value='+respuesta["id"]+' selected>'+convertirArticulos(respuesta["nombre"])+'</option');
            },
            error: function(respuesta){
            }
        });
    }

    function cargarSelectSedes(){
        $.ajax({
            method: 'GET',
            dataType: 'json',
            url: '/cargarSedes',
            success: function(respuesta){
                respuesta.forEach(e => {
                    $('#sede_actual').append('<option value='+e.id+'>'+e.nombre+'</option>');
                });
            },
            error: function(respuesta){
                alert('Error de respuesta Ajax: carga selects dinámicos');
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