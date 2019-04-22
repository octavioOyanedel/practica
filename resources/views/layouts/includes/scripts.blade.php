{{-- general --}}
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/cerrar_alert.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/modal_nueva_sede.js') }}"></script>
<script src="{{ asset('js/modal_nuevo_cargo.js') }}"></script>
<script src="{{ asset('js/modal_nueva_area.js') }}"></script>
{{-- nav --}}
<script src="{{ asset('js/nav.js') }}"></script>
<script src="{{ asset('js/ajax_selects.js') }}"></script>
<script src="{{ asset('js/color_estado.js') }}"></script>
@php
	$id = '';
    $idUsuario = '';
@endphp
@if(isset($socio))
	@php
		$id = $socio->id;
	@endphp
@endif
@if(isset($usuario))
    @php
        $idUsuario = $usuario->id;
    @endphp
@endif
@switch(request()->path())
    @case('socios')
		{{-- datatable --}}
	    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
	    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
	    <script src="{{ asset('js/runDataTableSocios.js') }}"></script>
        <script src="{{ asset('js/ajax_pago_prestamo.js') }}"></script>
        <script src="{{ asset('js/descargar_tabla.js') }}"></script>
    @break
    @case('socios/create')
        <script src="{{ asset('js/ajax_socio.js') }}"></script>
    @break
    @case('socios/'.$id)
		<script src="{{ asset('js/modal_editar.js') }}"></script>
		<script src="{{ asset('js/modal_eliminar.js') }}"></script>
    @break
    @case('prestamos')
        {{-- datatable --}}
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('js/runDataTablePrestamos.js') }}"></script>
        <script src="{{ asset('js/descargar_tabla.js') }}"></script>
    @break
    @case('prestamos/create')
        <script src="{{ asset('js/ajax_prestamo.js') }}"></script>
    @break
    @case('estadisticasSocios')
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('js/runDataTableEstadisticaSocios.js') }}"></script>
        <script src="{{ asset('js/descargar_tabla.js') }}"></script>
    @break
    @case('verEstadisticaCantidadPrestamos')
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('js/runDataTableGraficoPrestamo.js') }}"></script>
        <script src="{{ asset('js/descargar_tabla.js') }}"></script>
    @break
    @case('verEstadisticaIncorporacionSocios')
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('js/runDataTableGraficoIncorporacion.js') }}"></script>
        <script src="{{ asset('js/descargar_tabla.js') }}"></script>
    @break
    @case('usuarios/'.$idUsuario)
        <script src="{{ asset('js/modal_editar_usuario.js') }}"></script>
    @break
    @default
@endswitch