@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
    	@if($existencias != 0)
        	<div class="">
				<table id="tabla_prestamos" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th class="centrar-td"># Préstamo</th>
							<th>Socio</th>
							<th class="centrar-td">Fecha Solicitud</th>
							<th class="centrar-td">Número de Cheque</th>
							<th class="centrar-td">Monto</th>
							<th class="centrar-td">Cuotas</th>
							<th class="centrar-td">Interés</th>
							<th class="centrar-td">Estado Préstamo</th>
						</tr>
					</thead>
					<tbody>
						@foreach($prestamos as $prestamo)
							<tr>
								<td class="valores-td centrar-td"><a href="{{ route('prestamos.show',['id'=>$prestamo->id]) }}">{{ $prestamo->numero_prestamo}}</a></td>
								<td class="valores-td">{{ $prestamo->socio_id}}</td>
								<td class="valores-td centrar-td">{{ $prestamo->fecha }}</td>
								<td class="valores-td centrar-td">{{ $prestamo->cheque }}</td>
								<td class="valores-td centrar-td">{{ $prestamo->monto }}</td>
								<td class="valores-td centrar-td">{{ $prestamo->cuotas }}</td>
								<td class="valores-td centrar-td">{{ $prestamo->monto * 0.02 }}</td>
								<td class="valores-td centrar-td estado-prestamo">{{ $prestamo->estado_id}}</td>
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

@endsection