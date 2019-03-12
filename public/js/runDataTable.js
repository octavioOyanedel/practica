$(document).ready( function () {
    $('#tabla_socios').DataTable({
        "language": {
            "info":             "_TOTAL_ socio/s encontrado/s",
            "search":           "Buscar",
            "paginate": {
                "next":         "Siguiente",
                "previous":     "Anterior",
            },
            "lengthMenu":       'Mostrar <select class="form-control form-control-sm">'+
                            '<option value="5">5</option>'+
                            '<option value="10">10</option>'+
                            '<option value="50">50</option>'+
                            '<option value="100">100</option>'+
                            '<option value="-1">Todos</option>'+
                            '</select> registros',
            "loadingRecords":   "Cargando...",
            "processing":       "Procesando...",
            "emptyTable":       "No existen registros.",
            "zeroRecords":      "No existen coincidencias.",
            "infoEmpty":        "", //datos izquierda
            "infoFiltered":     "", //datos derecha
        }
    });
});