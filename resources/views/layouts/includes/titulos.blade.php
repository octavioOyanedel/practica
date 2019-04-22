@php
	$idSocio = 0;
    $idPrestamo = 0;
    $idUsuario = 0;
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
@if(isset($usuario))
    @php
        $idUsuario = $usuario->id;
    @endphp
@endif
@switch(request()->path())
    @case('socios')Buscar Socio @break
    @case('socios/create')Incorporar Socio @break
    @case('socios/'.$idSocio)Datos Socio @break
    @case('prestamos')Buscar Préstamo @break
    @case('prestamos/create')Solicitar Préstamo @break
    @case('prestamos/'.$idPrestamo)Información Préstamo @break
    @case('estadisticasSocios')Estadisticas Socios @break
    @case('estadisticaCantidadPrestamos')Generar Estadística Cantidad de Prestamos @break
    @case('estadisticaMontoPrestamos')Generar Estadística Monto de Prestamos @break
    @case('estadisticaIncorporacionSocios')Generar Estadística Incorporación de Socios @break
    @case('verEstadisticaCantidadPrestamos')Estadística Cantidad de Prestamos @break
    @case('verEstadisticaIncorporacionSocios')Estadística Cantidad de Incorporaciones @break
    @case('usuarios')Buscar Usuarios @break
    @case('usuarios/'.$idUsuario)Datos Usuario @break
    @case('usuarios/create')Registrar Usuario @break
    @default
    No hay título para esta vista
@endswitch