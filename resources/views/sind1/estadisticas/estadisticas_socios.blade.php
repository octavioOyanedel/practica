@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12 mx-auto">
	    <script src="{{ asset('js/loader.js') }}"></script>
		<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Task', 'Hours per Day'],
				['Damas', {{$damas}}],
				['Varones', {{$varones}}]
			]);
			var options = {
				title: 'Relación entre damas y varones.',
				backgroundColor: '#f8fafc',
				colors: ['#e83e8c', '#6574cd']
			};
			var chart = new google.visualization.PieChart(document.getElementById('grafico-socios'));
			chart.draw(data, options);
		}
		</script>
	<div id="grafico-socios" style="width: 600px; height: 300px; margin:0 auto;"></div>
	<table id="tabla_prestamos" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th class="centrar-td"># Prestamo</th>
				<th>Socio</th>
				<th class="centrar-td">Fecha Solicitud</th>
				<th class="centrar-td">Número de Cheque</th>
				<th class="centrar-td">Monto</th>
				<th class="centrar-td">Cuotas</th>
				<th class="centrar-td">Estado Prestamo</th>
			</tr>
		</thead>
		<tbody>
			
		</tbody>
	</table>	
    </div>
</div>

@endsection