@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
@if($prestamo != null)
		<table id="tabla_datos_socio" class="table table-striped table-bordered">
			<thead>
				<tr><th class="cabecera" colspan="2">Datos Socio</th></tr>
			</thead>
			<tbody>
				<tr>
					<td class="cabecera-prestamo">Socio</td>
					<td class="">{{ $prestamo->socio_id}}</td>
				</tr>
				<tr>
					<td>Número de Prestamo</td>
					<td class="">{{ $prestamo->numero_prestamo}}</td>
				</tr>
				<tr>
					<td>Monto Prestamo</td>
					<td class="monto">{{ $prestamo->monto}}</td>
				</tr>
				<tr>
					<td>Cuotas</td>
					<td class="">{{ $prestamo->cuotas}}</td>
				</tr>
				<tr>
					<td>Fecha de Solicitud del Prestamo</td>
					<td class="">{{ $prestamo->fecha}}</td>
				</tr>
			</tbody>
		</table>
		<table id="tabla_datos_laborales" class="table table-striped table-bordered">
			<thead>
				<tr><th class="cabecera" colspan="4">Cuotas Prestamo</th></tr>
				<tr>
					<th class="centrar-td">Cuotas</th>
					<th class="centrar-td">Fecha de Pago Cuota</th>
					<th class="centrar-td">Monto de Cuota</th>
					<th class="centrar-td">Estado de Cuota</th>
				</tr>
			</thead>
			<tbody>
				@php
					$total = 0;
				@endphp
				@foreach($cuotas as $cuota)
					@php
						$total = $total + $cuota->monto_cuota;
					@endphp
					<tr>
						<td class="centrar-td">{{ $cuota->numero_cuota.'/'.$prestamo->cuotas}}</td>
						<td class="centrar-td">{{ $cuota->fecha_pago_cuota }}</td>
						<td class="centrar-td">{{ $cuota->monto_cuota}}</td>
						<td class="centrar-td estado-prestamo">{{ $cuota->estado_id}}</td>
					</tr>
				@endforeach
					<tr>
						<td class="label-total" colspan="2">Total:</td>
						<td class="monto-total">{{ $total }}</td>
						<td></td>
					</tr>
			</tbody>
		</table>
	@else
	    <div class="alert alert-warning alert-dismissible fade show" role="alert">
	        <strong>No existen registros que mostrar.</strong>
	    </div>
	@endif
        @if(Auth::user()->clase_id == 1)
		  <button type="button" id="btn-prestamo" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_prestamo">Saldar Prestamo</button>
        @endif
    </div>
    @include('modals.modal_prestamo')
</div>

@endsection