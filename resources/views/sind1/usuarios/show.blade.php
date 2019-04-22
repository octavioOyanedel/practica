@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12 mx-auto">
	@if($usuario != null)
		<table id="tabla_datos_usuarios" class="table table-striped table-bordered">
			<thead>
				<tr>
                    <th class="cabecera">Datos Usuario</th>
                    <th></th>
                    @if(Auth::user()->clase_id == 1)
                        <th class="actualizar"></th>
                    @endif
                </tr>
			</thead>
			<tbody>
				<tr>
					<td>Nombre</td>
					<td class="td-nombre">{{ $usuario->name}}</td>
                    @if(Auth::user()->clase_id == 1)
					   <td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar_usuario">@svg('iconos/editar')</a></td>
                    @endif
				</tr>
				<tr>
					<td>Correo</td>
					<td class="td-correo">{{ $usuario->email}}</td>
                    @if(Auth::user()->clase_id == 1)
					   <td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar_usuario">@svg('iconos/editar')</a></td>
                    @endif
				</tr>
				<tr>
					<td>Contraseña</td>
					<td>********</td>
                    @if(Auth::user()->clase_id == 1)
					   <td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar_usuario">@svg('iconos/editar')</a></td>
                    @endif
				</tr>
				<tr>
					<td>Tipo</td>
					<td class="td-tipo">{{ $usuario->clase_id}}</td>
                    @if(Auth::user()->clase_id == 1)
					   <td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar_usuario">@svg('iconos/editar')</a></td>
                    @endif
				</tr>

			</tbody>
		</table>
		<input type="hidden" value="{{ $id_tipo }}" id="id_tipo">
		<input type="hidden" value="{{ $id_usuario }}" id="id_usuario">
		@else
		    <div class="alert alert-warning alert-dismissible fade show" role="alert">
		        <strong>No existen registros que mostrar.</strong>
		    </div>
		@endif
        @if(Auth::user()->clase_id == 1)
		  <button type="button" id="btn-desvincular" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_eliminar_usuario">Eliminar Usuario</button>
        @endif
	</div>
	@include('modals.modal_editar_usuario')
</div>
@endsection