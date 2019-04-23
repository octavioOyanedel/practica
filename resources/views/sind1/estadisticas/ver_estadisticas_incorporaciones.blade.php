@extends('layouts.app')

@section('content')

@if($existencias_socios != 0)
    <div class="row">
        <div class="col-md-12 mx-auto">
    	    <script src="{{ asset('js/loader.js') }}"></script>
    		<script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Género', 'Cantidad'],
                    ['{{$cantidad_mujeres}} Dama/s', {{$cantidad_mujeres}}],
                    ['{{$cantidad_hombres}} Varón/es', {{$cantidad_hombres}}]
                ]);
                var options = {
                    title: 'Existe/n {{ $existencias_socios }} incorporacion/es entre el {{ $fecha_ini_grafico }} y  el {{ $fecha_fin_grafico }}.',
                    backgroundColor: '#f8fafc',
                    is3D: true,
                    colors: ['#e83e8c', '#6574cd']
                };
                    var chart = new google.visualization.PieChart(document.getElementById('grafico-incorporaciones'));
                    chart.draw(data, options);
                }
  </script>
    		</script>
    	<div id="grafico-incorporaciones" style="width: 700px; height: 350px; margin:0 auto;"></div>
            	<div class="">
    				<table id="tabla_incorporacion" class="table table-striped table-bordered">
    					<thead>
    						<tr>
                                <th>Nombre</th>
                                <th class="centrar-td">Rut</th>
                                <th class="centrar-td">Género</th>
                                <th class="centrar-td">Comuna</th>
                                <th class="centrar-td">Celular</th>
                                <th class="centrar-td">Correo</th>
                                <th class="centrar-td">Sede</th>
                                <th class="centrar-td">Área</th>
                                <th class="centrar-td">Cargo</th>
                                <th class="centrar-td">Anexo</th>
    						</tr>
    					</thead>
    					<tbody>
    						@foreach($incorporaciones as $incorporacion)
    							<tr>
                                    <td class="valores-td"><a href="{{ route('socios.show',['id'=>$incorporacion->id]) }}">{{ $incorporacion->nombres}} {{ $incorporacion->apellidos}}</a></td>
                                    <td class="valores-td centrar-td">{{ $incorporacion->rut }}</td>
                                    <td class="valores-td centrar-td">{{ $incorporacion->genero }}</td>
                                    <td class="valores-td centrar-td">{{ $incorporacion->comuna_id }}</td>
                                    <td class="valores-td centrar-td">{{ $incorporacion->celular }}</td>
                                    <td class="valores-td centrar-td">{{ $incorporacion->correo }}</td>
                                    <td class="valores-td centrar-td">{{ $incorporacion->sede_id }}</td>
                                    <td class="valores-td centrar-td">{{ $incorporacion->area_id }}</td>
                                    <td class="valores-td centrar-td">{{ $incorporacion->cargo_id }}</td>
                                    <td class="valores-td centrar-td">{{ $incorporacion->anexo }}</td>
    							</tr>
    						@endforeach
    					</tbody>
    				</table>
    			</div>
        </div>
    </div>
@else
    <div class="tamano-texto alert alert-warning alert-dismissible fade show" role="alert">
        <strong>No existen registros que mostrar.</strong>
    </div>
@endif

@endsection