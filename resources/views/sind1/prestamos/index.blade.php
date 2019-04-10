@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
    	@if($existencias != 0)
        	<div class="">
				<table id="tabla_prestamos" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th class="centrar-td"># Prestamo</th>
							<th>Socio</th>
							<th class="centrar-td">Fecha Solicitud</th>
							<th class="centrar-td">Número de Cheque</th>
							<th class="centrar-td">Monto</th>
							<th class="centrar-td">Cuotas</th>
							<th class="centrar-td">Estado Prestamo</th>
						</tr>
					</thead>
					<tbody>
						@foreach($prestamos as $prestamo)
							<tr>
								<td class="centrar-td"><a href="{{ route('prestamos.show',['id'=>$prestamo->id]) }}">{{ $prestamo->numero_prestamo}}</a></td>
								<td>{{ $prestamo->socio_id}}</td>
								<td class="centrar-td">{{ $prestamo->fecha }}</td>
								<td class="centrar-td">{{ $prestamo->cheque}}</td>
								<td class="centrar-td">{{ $prestamo->monto}}</td>
								<td class="centrar-td">{{ $prestamo->cuotas}}</td>
								<td class="centrar-td">{{ $prestamo->estado_id}}</td>
							</tr>
						@endforeach
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