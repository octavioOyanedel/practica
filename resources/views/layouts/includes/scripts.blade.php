{{-- general --}}
<script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/cerrar_alert.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/modal_nuevo.js') }}"></script>
{{-- nav --}}
<script src="{{ asset('js/nav.js') }}"></script>
<script src="{{ asset('js/ajax_selects.js') }}"></script>
@php
	$id = '';
@endphp
@if(isset($socio))
	@php
		$id = $socio->id;
	@endphp
@endif
@switch(request()->path())
    @case('socios')
		{{-- datatable --}}
	    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
	    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
	    <script src="{{ asset('js/runDataTable.js') }}"></script>
    @break
    @case('socios/create')

    @break
    @case('socios/'.$id)
		<script src="{{ asset('js/modal_editar.js') }}"></script>
		<script src="{{ asset('js/modal_eliminar.js') }}"></script>
    @break
    @case('prestamos')

    @break
    @case('prestamos/create')

    @break

    @default
@endswitch