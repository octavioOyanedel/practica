$(document).ready( function () {
    $('#tabla_incorporacion').DataTable({
        "language": {
            "info":             "_TOTAL_ prestamo/s encontrado/s",
            "search":           "",
            "paginate": {
                "next":         "Siguiente",
                "previous":     "Anterior",
            },
            "lengthMenu":       '<select class="form-control form-control-sm">'+
                            '<option value="5">5</option>'+
                            '<option value="10">10</option>'+
                            '<option value="50">50</option>'+
                            '<option value="100">100</option>'+
                            '<option value="-1">Todos</option>'+
                            '</select>',
            "loadingRecords":   "Cargando...",
            "processing":       "Procesando...",
            "emptyTable":       "No existen registros.",
            "zeroRecords":      "No existen coincidencias.",
            "infoEmpty":        "", //datos izquierda
            "infoFiltered":     "", //datos derecha
        }
    });
    $('#tabla_incorporacion_length').before('<label class="label-data-table">Mostrar:</label>');
    $( "#tabla_incorporacion_filter label input" ).attr('placeholder','Buscar');
});