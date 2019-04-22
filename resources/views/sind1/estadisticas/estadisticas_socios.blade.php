@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12 mx-auto">
        @if($existencias != 0)
	    <script src="{{ asset('js/loader.js') }}"></script>
		<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Género', 'Cantidad'],
				['Damas', {{$damas}}],
				['Varones', {{$varones}}]
			]);
			var options = {
				title: 'Proporción Damas Varones.',
				backgroundColor: '#f8fafc',
				is3D: true,
				colors: ['#e83e8c', '#6574cd']
			};
			var chart = new google.visualization.PieChart(document.getElementById('grafico-socios'));
			chart.draw(data, options);
		}
		</script>
	<div id="grafico-socios" style="width: 700px; height: 350px; margin:0 auto;"></div>

        	<div class="">
				<table id="tabla_socios" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Nombre</th>
							<th class="centrar-td">Género</th>
							<th class="centrar-td">Sede</th>
							<th class="centrar-td">Área</th>
							<th class="centrar-td">Cargo</th>
						</tr>
					</thead>
					<tbody>
						@foreach($socios as $soc)
							<tr>
								<td class="valores-td"><a href="{{ route('socios.show',['id'=>$soc->id]) }}">{{ $soc->nombres}} {{ $soc->apellidos}}</a></td>
								<td class="valores-td centrar-td">{{ $soc->genero }}</td>
								<td class="valores-td centrar-td">{{ $soc->sede_id }}</td>
								<td class="valores-td centrar-td">{{ $soc->area_id }}</td>
								<td class="valores-td centrar-td">{{ $soc->cargo_id }}</td>
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