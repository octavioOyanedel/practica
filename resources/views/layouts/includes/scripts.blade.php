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
	    <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
	    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
	    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
	    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
	    <script src="{{ asset('js/runDataTable.js') }}"></script>
	    <script src="{{ asset('js/nav.js') }}"></script>
    @break
    @case('socios/create')
	    <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
	    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
	    <script src="{{ asset('js/cerrar_alert.js') }}"></script>
	    <script src="{{ asset('js/popper.min.js') }}"></script>
	    <script src="{{ asset('js/ajax_selects.js') }}"></script>
	    <script src="{{ asset('js/modal_nuevo.js') }}"></script>
	    <script src="{{ asset('js/nav.js') }}"></script>

    @break
    @case('socios/'.$id)
	    <script src="{{ asset('js/jquery-3.3.1.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/popper.min.js') }}"></script>
		<script src="{{ asset('js/modal_editar.js') }}"></script>
		<script src="{{ asset('js/nav.js') }}"></script>
    @break
    @default
@endswitch