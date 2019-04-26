@extends('layouts.app')

@section('content')
<div class="row">
	@if($prestamo != null)
    <div class="col-md-12 mx-auto">

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
					<td>Número de Préstamo</td>
					<td class="">{{ $prestamo->numero_prestamo}}</td>
				</tr>
				<tr>
					<td>Monto Préstamo</td>
					<td class="monto">{{ '$'.number_format($prestamo->monto, 0, '.', '.')}}</td>
				</tr>
				<tr>
					<td>Cuotas</td>
					<td class="">{{ $prestamo->cuotas}}</td>
				</tr>
				<tr>
					<td>Interés</td>
					<td class="monto">{{ '$'.number_format($prestamo->monto * 0.02, 0, '.', '.') }}</td>
				</tr>
				<tr>
					<td>Fecha de Solicitud del Préstamo</td>
					<td class="">{{ $prestamo->fecha}}</td>
				</tr>
			</tbody>
		</table>
		<table id="tabla_datos_laborales" class="table table-striped table-bordered">
			<thead>
				<tr><th class="cabecera" colspan="4">Cuotas Préstamo</th></tr>
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
						<td class="centrar-td">{{ '$'.number_format($cuota->monto_cuota , 0, '.', '.') }}</td>
						<td class="centrar-td estado-prestamo">{{ $cuota->estado_id}}</td>
					</tr>
				@endforeach
					<tr>
						<td class="label-total" colspan="2">Total:</td>
						<td class="monto-total">{{ '$'.number_format($total, 0, '.', '.') }}</td>
						<td></td>
					</tr>
			</tbody>
		</table>

        @if(Auth::user()->clase_id == 1)
            @if($prestamo->estado_id != 1)
                <button type="button" id="btn-prestamo" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_prestamo">Saldar Préstamo</button>
            @endif
        @endif
    </div>
    @include('modals.modal_prestamo')
	@else
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>No existen registros que mostrar.</strong>
    </div>
	@endif
</div>

@endsection