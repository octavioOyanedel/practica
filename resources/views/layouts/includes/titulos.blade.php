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
    @case('socios')<span class="icono-nav">@svg('iconos/todos')</span> Buscar Socio @break
    @case('socios/create')<span class="icono-nav">@svg('iconos/todos')</span> Incorporar Socio @break
    @case('socios/'.$idSocio)<span class="icono-nav">@svg('iconos/todos')</span> Datos Socio @break
    @case('prestamos')<span class="icono-nav">@svg('iconos/prestamo')</span> Buscar Préstamo @break
    @case('prestamos/create')<span class="icono-nav">@svg('iconos/prestamo')</span> Solicitar Préstamo @break
    @case('prestamos/'.$idPrestamo)<span class="icono-nav">@svg('iconos/prestamo')</span> Información Préstamo @break
    @case('estadisticasSocios')<span class="icono-nav">@svg('iconos/grafico')</span> Estadisticas Socios @break
    @case('estadisticaCantidadPrestamos')<span class="icono-nav">@svg('iconos/grafico')</span> Generar Estadística Cantidad de Prestamos @break
    @case('estadisticaMontoPrestamos')<span class="icono-nav">@svg('iconos/grafico')</span> Generar Estadística Monto de Prestamos @break
    @case('estadisticaIncorporacionSocios')<span class="icono-nav">@svg('iconos/grafico')</span> Generar Estadística Incorporación de Socios @break
    @case('verEstadisticaCantidadPrestamos')<span class="icono-nav">@svg('iconos/grafico')</span> Estadística Cantidad de Prestamos @break
    @case('verEstadisticaIncorporacionSocios')<span class="icono-nav">@svg('iconos/grafico')</span> Estadística Cantidad de Incorporaciones @break
    @case('usuarios')<span class="icono-nav">@svg('iconos/configuracion')</span> Buscar Usuarios @break
    @case('usuarios/'.$idUsuario)<span class="icono-nav">@svg('iconos/configuracion')</span> Datos Usuario @break
    @case('usuarios/create')<span class="icono-nav">@svg('iconos/configuracion')</span> Registrar Usuario @break
    @default
    No hay título para esta vista
@endswitch