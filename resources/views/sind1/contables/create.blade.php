@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto">
            <form class="formulario" id="formulario_prestamo" method="POST" action="">
                @csrf
                <div class="form-group row">
                    <div class="col-sm-3 separar-responsivo">
                        <label for="fecha">Fecha</label>
                        <input type="date" class="form-control form-control-sm {{ $errors->has('fecha') ? ' is-invalid' : '' }}" id="fecha" value="{{ date('Y-m-d') }}" name="fecha" disabled>

                    	<label class="separar-label" for="tipos" title="Campo obligatorio.">Tipo *</label>
	                        <select id="tipos" class="form-control form-control-sm {{ $errors->has('tipos') ? ' is-invalid' : '' }}" name="tipos" required>
	                        	<option selected="true" value="">Seleccione Tipo</option>
                                @foreach ($tipos as $tipos)
                                     <option value="{{ $tipos->id }}" @if(old('urbe_id') == $tipos->id) {{ 'selected' }} @endif>{{ $tipos->nombre }}</option>
                                @endforeach
	                        </select>

                    	<label class="separar-label" for="numero_registro" title="Campo obligatorio.">Número Registro *</label>
							<input type="text" class="form-control form-control-sm {{ $errors->has('numero_registro') ? ' is-invalid' : '' }}" id="numero_registro" value="{{ old('numero_registro') }}" name="numero_registro">

						<label class="separar-label" for="cuenta" title="Campo obligatorio.">Cuenta Bancaria *</label>
	                        <select id="cuenta" class="form-control form-control-sm {{ $errors->has('cuenta') ? ' is-invalid' : '' }}" name="cuenta" required>
	                        	<option selected="true" value="">Seleccione Cuenta Bancaria</option>
                                @foreach ($bancarios as $bancario)
                                     <option value="{{ $bancario->id }}" @if(old('urbe_id') == $bancario->id) {{ 'selected' }} @endif>{{ $bancario->numero_cuenta }} {{ $bancario->banco_id }}</option>
                                @endforeach
	                        </select>

						<label class="separar-label" for="concepto" title="Campo obligatorio.">Concepto *</label>
	                        <select id="concepto" class="form-control form-control-sm {{ $errors->has('concepto') ? ' is-invalid' : '' }}" name="concepto" required>
	                        	<option selected="true" value="">Seleccione Concepto</option>
                                @foreach ($conceptos as $concepto)
                                     <option value="{{ $concepto->id }}" @if(old('urbe_id') == $concepto->id) {{ 'selected' }} @endif>{{ $concepto->nombre }}</option>
                                @endforeach
	                        </select>

                    	<label class="separar-label" for="socio" title="Campo obligatorio.">Socio</label>
	                        <select id="socio" class="form-control form-control-sm {{ $errors->has('socio') ? ' is-invalid' : '' }}" name="socio" required>
	                        	<option selected="true" value="">Seleccione Socio</option>
                                @foreach ($socios as $socio)
                                     <option value="{{ $socio->id }}" @if(old('urbe_id') == $socio->id) {{ 'selected' }} @endif>{{ $socio->nombres }} {{ $socio->apellidos }} {{ $socio->rut }}</option>
                                @endforeach
	                        </select>

	                    <label class="separar-label" for="cheque" title="Campo obligatorio.">Cheque *</label>
						<input maxlength="10" type="text" class="form-control form-control-sm {{ $errors->has('cheque') ? ' is-invalid' : '' }}" id="cheque" value="{{ old('cheque') }}" name="cheque">

	                    <label class="separar-label" for="monto" title="Campo obligatorio.">Monto *</label>
						<input maxlength="6" type="text" class="form-control form-control-sm {{ $errors->has('monto') ? ' is-invalid' : '' }}" id="monto" value="{{ old('monto') }}" name="monto">

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