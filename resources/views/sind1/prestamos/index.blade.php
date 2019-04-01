@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
    	@if($existencias != 0)
        	<div class="">
				<table id="tabla_prestamos" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th># Prestamo</th>
							<th>Nombre</th>
							<th>Fecha</th>
							<th>Cheque</th>
							<th>Monto</th>
							<th>Cuotas</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
		@else
	    <div class="tamano-texto alert alert-warning alert-dismissible fade show" role="alert">
	        <strong>No existen registros que mostrar.</strong>
	    </div>
    	@endif
    </div>
</div>
	@include('modals.modal_nuevo')
@endsection