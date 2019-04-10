@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
    	@if($existencias != 0)
        	<div class="">
				<table id="tabla_socios" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Nombres</th>
							<th class="centrar-td">Rut</th>
							<th class="centrar-td">Celular</th>
							<th class="centrar-td">Correo</th>
							<th>Cargo</th>
							<th class="centrar-td">Anexo</th>
						</tr>
					</thead>
					<tbody>
						@foreach($socios as $soc)
							<tr>
								<td><a href="{{ route('socios.show',['id'=>$soc->id]) }}">{{ $soc->nombres}} {{ $soc->apellidos}}</a></td>
								<td class="centrar-td">{{ $soc->rut }}</td>
								<td class="centrar-td">{{ $soc->celular }}</td>
								<td class="centrar-td">{{ $soc->correo }}</td>
								<td>{{ $soc->cargo_id }}</td>
								<td class="centrar-td">{{ $soc->anexo }}</td>
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