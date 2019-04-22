@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="alert alert-info" role="alert">
                Contraseña sólo permite letras y números entre 6 y 10 caracteres.
            </div>
            <form class="formulario" method="POST" action="{{ route('usuarios.store') }}" id="form_nuevo_usuario" autocomplete="off">
                @csrf
                {{--inicio form --}}
                <div class="form-group row">
                    <div class="col-sm-3 separar-responsivo">
                        <label for="nombre_usuario" title="Campo obligatorio.">Nombre *
                            <small class="errores" class="form-text text-muted">
                                @if($errors->has('nombre_usuario')) {{ $errors->first('nombre_usuario') }}@endif
                            </small>
                        </label>
                        <input type="text" class="form-control form-control-sm form-control-sm {{ $errors->has('nombre_usuario') ? ' is-invalid' : '' }}" id="nombre_usuario" value="{{ old('nombre_usuario') }}" name="nombre_usuario" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 separar-responsivo">
                        <label for="correo">Correo *
                            <small class="errores" id="" class="form-text text-muted">
                                @if($errors->has('correo')) {{ $errors->first('correo') }}@endif
                            </small>
                        </label>
                        <input type="email" class="form-control form-control-sm {{ $errors->has('correo') ? ' is-invalid' : '' }}" id="correo" value="{{ old('correo') }}" name="correo" autocomplete="new-password" required="" >
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 separar-responsivo">
                        <label for="contrasena" title="Campo obligatorio.">Contraseña *
                            <small class="errores" class="form-text text-muted">
                                @if($errors->has('contrasena')) {{ $errors->first('contrasena') }}@endif
                            </small>
                        </label>
                        <input type="password" class="form-control form-control-sm form-control-sm {{ $errors->has('contrasena') ? ' is-invalid' : '' }}" id="contrasena" value="{{ old('contrasena') }}" name="contrasena" required autocomplete="new-password" maxlength="10">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 separar-responsivo">
                        <label for="contrasena2" title="Campo obligatorio.">Confirmar Contraseña *
                            <small class="errores" class="form-text text-muted">
                                @if($errors->has('contrasena2')) {{ $errors->first('contrasena2') }}@endif
                            </small>
                        </label>
                        <input type="password" class="form-control form-control-sm form-control-sm {{ $errors->has('contrasena2') ? ' is-invalid' : '' }}" id="contrasena2" value="{{ old('contrasena2') }}" name="contrasena2" required autocomplete="new-password" maxlength="10">
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col-sm-3 separar-responsivo">
                        <label for="clase" title="Campo obligatorio.">Tipo Usuario *</label>
                        <select id="clase" class="form-control form-control-sm {{ $errors->has('clase') ? ' is-invalid' : '' }}" name="clase">
                            <option selected="true" value="">Seleccione Tipo</option>
                            @foreach ($clases as $clase)
                                 <option value="{{ $clase->id }}" @if(old('clase') == $clase->id) {{ 'selected' }} @endif>{{ $clase->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="form-group row">

                    <div class="col-sm-3 mt-3">
                        <button id="guardar_usuario" type="submit" class="btn btn-primary btn-sm">Guardar</button>
                    </div>

                    <div class="col-sm-9"></div>

                </div>
                {{-- fin form --}}
             </form>
        </div>
    </div>
@endsection