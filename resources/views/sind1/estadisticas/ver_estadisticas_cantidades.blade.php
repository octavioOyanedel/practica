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
        @php
          $suma_montos = 0;
        @endphp
        @foreach($prestamos as $prestamo)
          @php
            $suma_montos = $suma_montos + $prestamo->monto;
          @endphp
          ['{{$prestamo->fecha}}', {{$prestamo->monto}}],
        @endforeach
      ]);

      var options = {
      	vAxis: {minValue: 0},
      	hAxis: {minValue: 0},
      	backgroundColor: '#f8fafc',
        chart: {
          title: 'Prestamos realizados entre {{ $fecha_ini_grafico }} y el {{ $fecha_fin_grafico }}',
          subtitle: 'Se han solicitado {{ $existencias_prestamos }} prestamos con un monto total de {{ $suma_montos }}'
        },
      };

      var chart = new google.charts.Line(document.getElementById('linechart_material'));

      chart.draw(data, google.charts.Line.convertOptions(options));
    }
		</script>
	<div class="tabla-grafico" id="linechart_material" style="width: 800px; height: 350px; margin:0 auto;"></div>
    @if($existencias_prestamos != 0)
      <div>
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
            @foreach($prestamos as $prestamo)
              <tr>
                <td class="valores-td centrar-td"><a href="{{ route('prestamos.show',['id'=>$prestamo->id]) }}">{{ $prestamo->numero_prestamo}}</a></td>
                <td class="valores-td">{{ $prestamo->socio_id}}</td>
                <td class="valores-td centrar-td">{{ $prestamo->fecha }}</td>
                <td class="valores-td centrar-td">{{ $prestamo->cheque}}</td>
                <td class="valores-td centrar-td">{{ $prestamo->monto}}</td>
                <td class="valores-td centrar-td">{{ $prestamo->cuotas}}</td>
                <td class="valores-td centrar-td estado-prestamo">{{ $prestamo->estado_id}}</td>
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