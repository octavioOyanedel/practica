@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 mx-auto">
	    <script src="{{ asset('js/loader.js') }}"></script>
		<script type="text/javascript">
      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Fechas');
      data.addColumn('number', 'Monto');

      data.addRows([
        ['01-01-2019',  100],
        ['02-01-2019',  37],
        ['03-01-2019',  39],
        ['04-01-2019',  45],
        ['05-01-2019',  23],
        ['06-01-2019',  5],
        ['07-01-2019',  37],
        ['08-01-2019',  37],
        ['09-01-2019',  39],
        ['10-01-2019',  8],
        ['11-01-2019',  23],
        ['12-01-2019',  5],
        ['13-01-2019',  23],
        ['14-01-2019',  5],
        ['15-01-2019',  37],
        ['16-01-2019',  9],
        ['17-01-2019',  39],
        ['18-01-2019',  66],
        ['19-01-2019',  2],
        ['20-01-2019',  55]
      ]);

      var options = {
      	vAxis: {minValue: 0},
      	hAxis: {minValue: 0},
      	backgroundColor: '#f8fafc',
        chart: {
          title: 'Prestamos realizados entre {{$fecha_ini}} y el {{$fecha_fin}}',
          subtitle: 'Gráfico fecha v/s monto'
        },
      };

      var chart = new google.charts.Line(document.getElementById('linechart_material'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
		</script>
	<div id="linechart_material" style="width: 1200px; height: 350px; margin:0 auto;"></div>

    </div>
</div>

@endsection