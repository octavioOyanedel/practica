@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-12 mx-auto">
	@if($socio != null)
		<table id="tabla_datos_personales" class="table table-striped table-bordered">
			<thead>
				<tr>
                    <th class="cabecera">Datos Personales</th>
                    <th></th>
                    @if(Auth::user()->clase_id == 1)
                        <th class="actualizar">Editar</th>
                    @endif
                </tr>
			</thead>
			<tbody>
				<tr>
					<td>Nombres</td>
					<td class="td-nombres">{{ $socio->nombres}}</td>
                    @if(Auth::user()->clase_id == 1)
					   <td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
                    @endif
				</tr>
				<tr>
					<td>Apellidos</td>
					<td class="td-apellidos">{{ $socio->apellidos}}</td>
                    @if(Auth::user()->clase_id == 1)
					   <td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
                    @endif
				</tr>
				<tr>
					<td>Rut</td>
					<td class="td-rut">{{ $socio->rut}}</td>
                    @if(Auth::user()->clase_id == 1)
					   <td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
                    @endif
				</tr>
				<tr>
					<td>Género</td>
					<td class="td-genero">{{ $socio->genero}}</td>
                    @if(Auth::user()->clase_id == 1)
					   <td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
                    @endif
				</tr>
				<tr>
					<td>Fecha Nacimiento</td>
					<td class="td-fecha-nacimiento">{{ $socio->fecha_nacimiento}}</td>
                    @if(Auth::user()->clase_id == 1)
					   <td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
                    @endif
				</tr>
				<tr>
					<td>Celular</td>
					<td class="td-celular">{{ $socio->celular}}</td>
                    @if(Auth::user()->clase_id == 1)
					   <td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
                    @endif
				</tr>
				<tr>
					<td>Teléfono Fijo</td>
					<td class="td-fijo">{{ $socio->fijo}}</td>
                    @if(Auth::user()->clase_id == 1)
					   <td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
                    @endif
				</tr>
				<tr>
					<td>Correo</td>
					<td class="td-correo">{{ $socio->correo}}</td>
                    @if(Auth::user()->clase_id == 1)
					   <td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
                    @endif
				</tr>
				<tr>
					<td>Ciudad</td>
					<td class="td-ciudad">{{ $socio->urbe_id}}</td>
                    @if(Auth::user()->clase_id == 1)
					   <td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
                    @endif
				</tr>
				<tr>
					<td>Comuna</td>
					<td class="td-comuna">{{ $socio->comuna_id}}</td>
                    @if(Auth::user()->clase_id == 1)
					   <td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
                    @endif
				</tr>
				<tr>
					<td>Dirección</td>
					<td class="td-direccion">{{ $socio->direccion}}</td>
                    @if(Auth::user()->clase_id == 1)
					   <td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
                    @endif
				</tr>
			</tbody>
		</table>
		<table id="tabla_datos_laborales" class="table table-striped table-bordered">
			<thead>
				<tr>
                    <th class="cabecera">Datos Laborales</th>
                    <th></th>
                    @if(Auth::user()->clase_id == 1)
                        <th class="actualizar">Editar</th>
                    @endif
                </tr>
			</thead>
			<tbody>
				<tr>
					<td>Fecha Ingreso PUCV</td>
					<td class="td-fecha-ingreso-pucv">{{ $socio->fecha_pucv}}</td>
                    @if(Auth::user()->clase_id == 1)
					   <td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
                    @endif
				</tr>
				<tr>
					<td>Anexo</td>
					<td class="td-anexo">{{ $socio->anexo}}</td>
                    @if(Auth::user()->clase_id == 1)
					   <td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
                    @endif
				</tr>
				<tr>
					<td>Sede</td>
					<td class="td-sede">{{ $socio->sede_id}}</td>
                    @if(Auth::user()->clase_id == 1)
					   <td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
                    @endif
				</tr>
				<tr>
					<td>Área</td>
					<td class="td-area">{{ $socio->area_id}}</td>
                    @if(Auth::user()->clase_id == 1)
					   <td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
                    @endif
				</tr>
				<tr>
					<td>Cargo</td>
					<td class="td-cargo">{{ $socio->cargo_id}}</td>
                    @if(Auth::user()->clase_id == 1)
					   <td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
                    @endif
				</tr>
			</tbody>
		</table>
		<table id="tabla_datos_sindicales" class="table table-striped table-bordered">
			<thead>
				<tr>
                    <th class="cabecera">Datos Sindicales</th>
                    <th></th>
                    @if(Auth::user()->clase_id == 1)
                        <th class="actualizar">Editar</th>
                    @endif
                </tr>
			</thead>
			<tbody>
				<tr>
					<td>Fecha Ingreso Sindicato</td>
					<td class="td-fecha-ingreso-sind1">{{ $socio->fecha_sind1}}</td>
                    @if(Auth::user()->clase_id == 1)
					   <td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
                    @endif
				</tr>
				<tr>
					<td>Número Socio</td>
					<td class="td-numero-socio">{{ $socio->numero_socio}}</td>
                    @if(Auth::user()->clase_id == 1)
					   <td class="boton-editar"><a class="editar" href="" data-toggle="modal" data-target="#modal_editar">@svg('iconos/editar')</a></td>
                    @endif
				</tr>
			</tbody>
		</table>
		<input type="hidden" value="{{ $id }}" id="id_modelo">
		<input type="hidden" value="{{ $rut }}" id="rut_modelo">
		<input type="hidden" value="{{ $fechaNacimento }}" id="fechaNacimento_modelo">
		<input type="hidden" value="{{ $fechaPucv }}" id="fechaPucv_modelo">
		<input type="hidden" value="{{ $fechaSind1 }}" id="fechaSind1_modelo">
		<input type="hidden" value="{{ $ciudad }}" id="ciudad_modelo">
		<input type="hidden" value="{{ $comuna }}" id="comuna_modelo">
		<input type="hidden" value="{{ $sede }}" id="sede_modelo">
		<input type="hidden" value="{{ $area }}" id="area_modelo">
		<input type="hidden" value="{{ $cargo }}" id="cargo_modelo">
		@else
		    <div class="alert alert-warning alert-dismissible fade show" role="alert">
		        <strong>No existen registros que mostrar.</strong>
		    </div>
		@endif
        @if(Auth::user()->clase_id == 1)
		  <button type="button" id="btn-desvincular" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_eliminar">Desvincular Socio</button>
        @endif
	</div>
	@include('modals.modal_editar')
	@include('modals.modal_eliminar')
</div>
@endsection