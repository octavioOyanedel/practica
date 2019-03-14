@php
	$id = 0;
	$activo = '';
@endphp
@if(isset($socio))
	@php
		$id = $socio->id;
	@endphp
@endif
@if(request()->is('socios'))
	@php
		$activo = 'activo';
	@endphp
@endif

