@php
	$idSocio = 0;
    $idPrestamo = 0;
@endphp
@if(isset($socio))
	@php
		$idSocio = $socio->id;
	@endphp
@endif
@if(isset($prestamo))
    @php
        $idPrestamo = $prestamo->id;
    @endphp
@endif
@switch(request()->path())
    @case('socios')Buscar Socio @break
    @case('socios/create')Incorporar Socio @break
    @case('socios/'.$idSocio)Datos Socio @break
    @case('prestamos')Buscar Prestamo @break
    @case('prestamos/create')Solicitar Prestamo @break
    @case('prestamos/'.$idPrestamo)Información Prestamo @break
    @case('estadisticasSocios')Estadisticas Socios @break
    @case('estadisticaCantidadPrestamos')Generar Estadística Cantidad de Prestamos @break
    @case('estadisticaMontoPrestamos')Generar Estadística Monto de Prestamos @break
    @case('estadisticaIncorporacionSocios')Generar Estadística Incorporación de Socios @break
    @default
    No hay título para esta vista
@endswitch