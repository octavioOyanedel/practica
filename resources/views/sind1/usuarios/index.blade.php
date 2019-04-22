@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
    	@if($existencias != 0)
        	<div class="">
				<table id="tabla_usuarios" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Nombre</th>
							<th class="centrar-td">Correo</th>
							<th class="centrar-td">Tipo</th>
						</tr>
					</thead>
					<tbody>
						@foreach($usuarios as $usuario)
							<tr>
								<td class="valores-td"><a href="{{ route('usuarios.show',['id'=>$usuario->id]) }}">{{ $usuario->name}}</a></td>
								<td class="valores-td centrar-td">{{ $usuario->email }}</td>
								<td class="valores-td centrar-td">{{ $usuario->clase_id }}</td>
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