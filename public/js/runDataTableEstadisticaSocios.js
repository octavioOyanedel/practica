$(document).ready( function () {
    $('#tabla_socios').DataTable({
        "language": {
            "info":             "_TOTAL_ socio/s encontrado/s",
            "search":           "",
            "paginate": {
                "next":         "Siguiente",
                "previous":     "Anterior",
            },
            "lengthMenu":       '<select class="form-control form-control-sm">'+
                                    '<option value="10">10</option>'+
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
    $('#tabla_socios_length').before('<label class="label-data-table">Mostrar:</label>');
    $( "#tabla_socios_filter label input" ).attr('placeholder','Buscar');
});