@php
	$id = 0;
@endphp
@if(isset($socio))
	@php
		$id = $socio->id;
	@endphp
@endif
@switch(request()->path())
    @case('socios') Buscar Socio @break
    @case('socios/create') Incorporar Socio @break
    @case('socios/'.$id) Datos Socio @break
    @default
    No hay título para esta vista
@endswitch