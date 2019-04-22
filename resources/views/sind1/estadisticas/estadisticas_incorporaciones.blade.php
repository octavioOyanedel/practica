@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12 mx-auto">
		<form class="formulario" method="POST" action="{{route('ver_incorporaciones')}}">
		@csrf
            <div class="form-group row">

                <div class="col-sm-3 separar-responsivo">
                    <label for="fecha_ini">Fecha Inicial</label>
                    <input type="date" class="form-control form-control-sm {{ $errors->has('fecha_ini') ? ' is-invalid' : '' }}" id="fecha_ini" value="{{ old('fecha_ini') }}" name="fecha_ini">
                </div>

                <div class="col-sm-9"></div>

            </div>

            <div class="form-group row">

                <div class="col-sm-3 separar-responsivo">
                    <label for="fecha_fin">Fecha Final</label>
                    <input type="date" class="form-control form-control-sm {{ $errors->has('fecha_fin') ? ' is-invalid' : '' }}" id="fecha_fin" value="{{ old('fecha_fin') }}" name="fecha_fin">
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