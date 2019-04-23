$(window).on('load',function(){

    var ruta = window.location.pathname;
    $('.descargar-excel').click(function(e){

        e.preventDefault();
        var valoresTabla = $(".valores-td");
        var csv = "";
        var cabeceras = obtenerCabeceras(ruta);
        var saltoLinea =  "\n";
        var elementoDescarga = document.getElementById("descarga");
        var valores = [];
        csv = cabeceras.join(";")+saltoLinea;

        var recorrido = obtenerRecorrido(ruta, valoresTabla);
        console.log(recorrido);

        for (i = 0; i < recorrido; i++) {
            var arreglo = [];
            var inicio = i * obtenerFactorInicial(ruta);
            var fin = inicio + obtenerFactorFinal(ruta);

            for(var j = inicio; j <= fin; j++){
                arreglo.push(valoresTabla[j].textContent);
            }
            csv += arreglo.join(";")+saltoLinea;
        }

        elementoDescarga.href = 'data:text/csv;charset=utf-8,%EF%BB%BF' + encodeURI(csv);
        elementoDescarga.target = '_blank';
        elementoDescarga.download = obtenerNombreDeArchivo(ruta);
        elementoDescarga.click();
    });

    function obtenerNombreDeArchivo(ruta){
        switch(ruta){
            case '/socios':
                return 'lista_socios.csv';
            break;
            case '/estadisticasSocios':
                return 'lista_estadisticas.csv';
            break;
            case '/prestamos':
                return 'lista_prestamos.csv';
            break;
            case '/verEstadisticaCantidadPrestamos':
                return 'lista_prestamos_filtros.csv';
            break;
            case '/verEstadisticaIncorporacionSocios':
                return 'lista_incorporaciones_filtros.csv';
            break;
            default:
                return false;
        }
    }

    function obtenerFactorInicial(ruta){
        switch(ruta){
            case '/socios':
                return 10;
            break;
            case '/estadisticasSocios':
                return 10;
            break;
            case '/prestamos':
                return 8;
            break;
            case '/verEstadisticaCantidadPrestamos':
                return 7;
            break;
            case '/verEstadisticaIncorporacionSocios':
                return 10;
            break;
            default:
                return false;
        }
    }

//uno menos que inicial
    function obtenerFactorFinal(ruta){
        switch(ruta){
            case '/socios':
                return 9;
            break;
            case '/estadisticasSocios':
                return 9;
            break;
            case '/prestamos':
                return 7;
            break;
            case '/verEstadisticaCantidadPrestamos':
                return 6;
            break;
            case '/verEstadisticaIncorporacionSocios':
                return 9;
            break;
            default:
                return false;
        }
    }

    function obtenerCabeceras(ruta){
        switch(ruta){
            case '/socios':
                return ["Nombre", "Rut", "Género", "Comuna", "Celular", "Correo", "Sede", "Área", "Cargo", "Anexo"];
            break;
            case '/estadisticasSocios':
                return ["Nombre", "Rut", "Género", "Comuna", "Celular", "Correo", "Sede", "Área", "Cargo", "Anexo"];
            break;
            case '/prestamos':
                return  ["Número Prestamo", "Socio", "Fecha Solicitud", "Número de Cheque", "Monto", "Cuotas", "Interés", "Estado Prestamo"];
            break;
            case '/verEstadisticaCantidadPrestamos':
                return  ["Número Prestamo", "Socio", "Fecha Solicitud", "Número de Cheque", "Monto", "Cuotas", "Estado Prestamo"];
            break;
            case '/verEstadisticaIncorporacionSocios':
                return ["Nombre", "Rut", "Género", "Comuna", "Celular", "Correo", "Sede", "Área", "Cargo", "Anexo"];
            break;
            default:
                return false;
        }
    }

    function obtenerRecorrido(ruta, valoresTabla){
        switch(ruta){
            case '/socios':
                return Math.round(valoresTabla.length/10);
            break;
            case '/estadisticasSocios':
                return Math.round(valoresTabla.length/10);
            break;
            case '/prestamos':
                return Math.round(valoresTabla.length/8);
            break;
            case '/verEstadisticaCantidadPrestamos':
                return Math.round(valoresTabla.length/7);
            break;
            case '/verEstadisticaIncorporacionSocios':
                return Math.round(valoresTabla.length/10);
            break;
            default:
                return false;
        }
    }


});
