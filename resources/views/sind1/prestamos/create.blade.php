@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto">
            <form class="formulario" id="formulario_prestamo" method="POST" action="{{ route('prestamos.store')}}">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-3 separar-responsivo">
                        <label for="fecha">Fecha</label>
                        <input type="date" class="form-control form-control-sm {{ $errors->has('fecha') ? ' is-invalid' : '' }}" id="fecha" value="{{ date('Y-m-d') }}" name="fecha" disabled>
                    	<label class="separar-label" for="socio" title="Campo obligatorio.">Socio *</label>
	                        <select id="socio" class="form-control form-control-sm {{ $errors->has('socio') ? ' is-invalid' : '' }}" name="socio" required>
	                        	<option selected="true" value="">Seleccione Socio</option>
	                        </select>
                    	<label class="separar-label" for="interes" title="Campo obligatorio.">Interés *</label>
	                        <select id="interes" class="form-control form-control-sm {{ $errors->has('interes') ? ' is-invalid' : '' }}" name="interes" required>
	                        	<option selected="true" value="">Seleccione Interés</option>
	                        </select>
                    	<label class="separar-label" for="numero_socio" title="Campo obligatorio.">Número de Cheque *</label>
						<input maxlength="10" type="text" class="form-control form-control-sm {{ $errors->has('numero_socio') ? ' is-invalid' : '' }}" id="numero_socio" value="{{ old('numero_socio') }}" name="numero_socio">
                		<label class="separar-label" for="monto" title="Campo obligatorio.">Monto *</label>
						<input maxlength="6" type="text" class="form-control form-control-sm {{ $errors->has('monto') ? ' is-invalid' : '' }}" id="monto" value="{{ old('monto') }}" name="monto">
                    	<label class="separar-label" for="cuotas" title="Campo obligatorio.">Cuotas *</label>
	                        <select id="cuotas" class="form-control form-control-sm {{ $errors->has('cuotas') ? ' is-invalid' : '' }}" name="cuotas" required>
	                        	<option selected="true" value="">Seleccione Cuotas</option>
								@for ($i = 1; $i <= 24; $i++)
								    <option value="{{ $i }}">{{ $i }}</option>
								@endfor
	                        </select>
                        <div class="separar-boton">
                    		<button id="guardar_socio" type="submit" class="btn btn-primary btn-sm">Guardar</button>
                		</div>
                    </div>
                    <div id="detalle_prestamo" class="col-sm-9">




                    </div>
                </div>
                {{--fin form --}}
             </form>
        </div>
    </div>
@endsection