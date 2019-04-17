@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12 mx-auto">
		<form class="formulario" method="POST" action="{{route('ver_monto')}}">
		@csrf
            <div class="form-group row">

                <div class="col-sm-3 separar-responsivo">
                    <label for="fecha_inicio">Fecha Inicio</label>
                    <input type="date" class="form-control form-control-sm {{ $errors->has('fecha_inicio') ? ' is-invalid' : '' }}" id="fecha_inicio" value="{{ old('fecha_inicio') }}" name="fecha_inicio">
                </div>

                <div class="col-sm-9"></div>

            </div>

            <div class="form-group row">

                <div class="col-sm-3 separar-responsivo">
                    <label for="fecha_final">Fecha Final</label>
                    <input type="date" class="form-control form-control-sm {{ $errors->has('fecha_final') ? ' is-invalid' : '' }}" id="fecha_final" value="{{ old('fecha_final') }}" name="fecha_final">
                </div>

                <div class="col-sm-9"></div>

            </div>
                <div class="form-group row">

                    <div class="col-sm-3 mt-3">
                        <button id="guardar_socio" type="submit" class="btn btn-primary btn-sm">Consultar</button>
                    </div>

                    <div class="col-sm-9"></div>

                </div>
		</form>
    </div>
</div>

@endsection