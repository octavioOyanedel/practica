@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12 mx-auto">
	@if($socio != null)
		<table id="tabla_datos_personales" class="table table-striped table-bordered">
			<thead>
				<tr><th class="cabecera">Datos Personales</th><th></th><th class="actualizar"></th></tr>
			</thead>
			<tbody>
				<tr>
					<td>Nombres</td>
					<td>{{ $socio->nombres}}</td>
					<td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
				</tr>
				<tr>
					<td>Apellidos</td>
					<td>{{ $socio->apellidos}}</td>
					<td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
				</tr>
				<tr>
					<td>Rut</td>
					<td>{{ $socio->rut}}</td>
					<td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
				</tr>
				<tr>
					<td>Género</td>
					<td>{{ $socio->genero}}</td>
					<td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
				</tr>
				<tr>
					<td>Fecha Nacimiento</td>
					<td>{{ $socio->fecha_nacimiento}}</td>
					<td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
				</tr>
				<tr>
					<td>Celular</td>
					<td>{{ $socio->celular}}</td>
					<td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
				</tr>
				<tr>
					<td>Teléfono Fijo</td>
					<td>{{ $socio->fijo}}</td>
					<td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
				</tr>
				<tr>
					<td>Correo</td>
					<td>{{ $socio->correo}}</td>
					<td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
				</tr>
				<tr>
					<td>Ciudad</td>
					<td class="td-ciudad">{{ $socio->urbe_id}}</td>
					<td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
				</tr>
				<tr>
					<td>Comuna</td>
					<td class="td-comuna">{{ $socio->comuna_id}}</td>
					<td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
				</tr>
				<tr>
					<td>Dirección</td>
					<td class="td-direccion">{{ $socio->direccion}}</td>
					<td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
				</tr>
			</tbody>
		</table>
		<table id="tabla_datos_laborales" class="table table-striped table-bordered">
			<thead>
				<tr><th class="cabecera">Datos Laborales</th><th></th><th class="actualizar"></th></tr>
			</thead>
			<tbody>
				<tr>
					<td>Fecha Ingreso PUCV</td>
					<td>{{ $socio->fecha_pucv}}</td>
					<td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
				</tr>
				<tr>
					<td>Anexo</td>
					<td>{{ $socio->anexo}}</td>
					<td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
				</tr>
				<tr>
					<td>Sede</td>
					<td class="td-sede">{{ $socio->sede_id}}</td>
					<td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
				</tr>
				<tr>
					<td>Área</td>
					<td class="td-area">{{ $socio->area_id}}</td>
					<td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
				</tr>
				<tr>
					<td>Cargo</td>
					<td>{{ $socio->cargo_id}}</td>
					<td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
				</tr>
			</tbody>
		</table>
		<table id="tabla_datos_sindicales" class="table table-striped table-bordered">
			<thead>
				<tr><th class="cabecera">Datos Sindicales</th><th></th><th class="actualizar"></th></tr>
			</thead>
			<tbody>
				<tr>
					<td>Fecha Ingreso Sindicato</td>
					<td>{{ $socio->fecha_sind1}}</td>
					<td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
				</tr>
				<tr>
					<td>Número Socio</td>
					<td>{{ $socio->numero_socio}}</td>
					<td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
				</tr>
			</tbody>
		</table>
	@else
	    <div class="alert alert-warning alert-dismissible fade show" role="alert">
	        <strong>No existen registros que mostrar.</strong>
	    </div>
	@endif
	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_eliminar">Desvincular Socio</button>
	</div>
	@include('modals.modal_editar')
	@include('modals.modal_eliminar')
</div>
@endsection