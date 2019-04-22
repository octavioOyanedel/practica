@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="">
				<label for="rut" title="Campo obligatorio.">Rut *
					<small class="errores" id="" class="form-text text-muted">
						@if($errors->has('rut')) {{ $errors->first('rut') }}@endif
						@if($errors->has('numero_prestamo')) {{ $errors->first('numero_prestamo') }}@endif
						@if($errors->has('monto')) {{ $errors->first('monto') }}@endif
						@if($errors->has('cheque')) {{ $errors->first('cheque') }}@endif
						@if($errors->has('cuotas')) {{ $errors->first('cuotas') }}@endif
					</small>
				</label>
				<div class="form-inline">
					<input maxlength="9" type="text" class="form-control form-control-sm {{ $errors->has('rut') ? ' is-invalid' : '' }}" id="rut" value="{{ old('rut') }}" name="rut" required>
					<button id="solicitar_prestamo" type="button" class="btn btn-primary btn-sm">Solicitar</button>
				</div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12 mt-1" id="mensaje_prestamo"></div>
            </div>

            <div class="form-group row">
                <div class="col-sm-4 mt-1">
					<form class="formulario" method="POST" action="{{ route('prestamos.store') }}">
						@csrf
						<div id="formulario_prestamo">

						</div>
					</form>
                </div>
            </div>
        </div>
    </div>

@endsection