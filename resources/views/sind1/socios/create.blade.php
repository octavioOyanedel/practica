@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto">
            <form class="formulario" method="POST" action="{{ route('socios.store') }}">
                @csrf
                {{--inicio form --}}
                {{-- fila 1 con 4 columnas --}}
                <div class="form-group row">

                    <div class="col-sm-3 separar-responsivo">
                        <label for="nombres" title="Campo obligatorio.">Nombres *
                            <small class="errores" class="form-text text-muted">
                                @if($errors->has('nombres')) {{ $errors->first('nombres') }}@endif
                            </small>
                        </label>
                        <input type="text" class="form-control form-control-sm form-control-sm {{ $errors->has('nombres') ? ' is-invalid' : '' }}" id="nombres" value="{{ old('nombres') }}" name="nombres" required>
                    </div>

                    <div class="col-sm-3 separar-responsivo">
                        <label for="apellidos" title="Campo obligatorio.">Apellidos *
                            <small class="errores" id="" class="form-text text-muted">
                                @if($errors->has('apellidos')) {{ $errors->first('apellidos') }}@endif
                            </small>
                        </label>
                        <input type="text" class="form-control form-control-sm {{ $errors->has('apellidos') ? ' is-invalid' : '' }}" id="apellidos" value="{{ old('apellidos') }}" name="apellidos" required>
                    </div>

                    <div class="col-sm-3 separar-responsivo">
                        <label for="rut" title="Campo obligatorio.">Rut *
                            <small class="errores" id="" class="form-text text-muted">
                                @if($errors->has('rut')) {{ $errors->first('rut') }}@endif
                            </small>
                        </label>
                        <input maxlength="9" type="text" class="form-control form-control-sm {{ $errors->has('rut') ? ' is-invalid' : '' }}" id="rut" value="{{ old('rut') }}" name="rut" required>
                    </div>

                    <div class="col-sm-3 separar-responsivo">
                        <label for="genero" title="Campo obligatorio.">Género *</label>
                        <select id="genero" class="form-control form-control-sm {{ $errors->has('genero') ? ' is-invalid' : '' }}" name="genero" required>
                            <option selected="true" value="">Seleccione Genero</option>
                            <option value="Varón" {{ old('genero')=='Varón' ? 'selected' : ''  }}>Varón</option>
                            <option value="Dama"  {{ old('genero')=='Dama' ? 'selected' : ''  }}>Dama</option>
                        </select>
                    </div>

                </div>
                {{-- fila 2 con 4 columnas --}}
                <div class="form-group row">

                    <div class="col-sm-3 separar-responsivo">
                        <label for="fecha_nacimiento">Fecha Nacimiento</label>
                        <input type="date" class="form-control form-control-sm {{ $errors->has('fecha_nacimiento') ? ' is-invalid' : '' }}" id="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" name="fecha_nacimiento">
                    </div>

                    <div class="col-sm-3 separar-responsivo">
                        <label for="celular">Celular
                            <small class="errores" id="" class="form-text text-muted">
                                @if($errors->has('celular')) {{ $errors->first('celular') }}@endif
                            </small>
                        </label>
                        <input maxlength="9" type="text" class="form-control form-control-sm {{ $errors->has('celular') ? ' is-invalid' : '' }}" id="celular" value="{{ old('celular') }}" name="celular">
                    </div>

                    <div class="col-sm-3 separar-responsivo">
                        <label for="fijo">Teléfono Fijo
                            <small class="errores" id="" class="form-text text-muted">
                                @if($errors->has('fijo')) {{ $errors->first('fijo') }}@endif
                            </small>
                        </label>
                        <input maxlength="7" type="text" class="form-control form-control-sm {{ $errors->has('fijo') ? ' is-invalid' : '' }}" id="fijo" value="{{ old('fijo') }}" name="fijo">
                    </div>

                    <div class="col-sm-3 separar-responsivo">
                        <label for="correo">Correo
                            <small class="errores" id="" class="form-text text-muted">
                                @if($errors->has('correo')) {{ $errors->first('correo') }}@endif
                            </small>
                        </label>
                        <input type="email" class="form-control form-control-sm {{ $errors->has('correo') ? ' is-invalid' : '' }}" id="correo" value="{{ old('correo') }}" name="correo">
                    </div>

                </div>
                {{-- fila 3 con 3 columnas --}}
                <div class="form-group row">

                    <div class="col-sm-3 separar-responsivo">
                        <label for="ciudad">Ciudad</label>
                        <select id="ciudad" class="select-ajax form-control form-control-sm {{ $errors->has('ciudad') ? ' is-invalid' : '' }}" name="urbe_id">
                            <option selected="true" value="">Seleccione Ciudad</option>
                            @foreach ($urbes as $urbe)
                                 <option value="{{ $urbe->id }}" @if(old('urbe_id') == $urbe->id) {{ 'selected' }} @endif>{{ $urbe->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-3 separar-responsivo">
                        <label for="comuna">Comuna</label>
                        <select id="comuna" class="form-control form-control-sm {{ $errors->has('comuna') ? ' is-invalid' : '' }}" name="comuna_id">
                            <option selected="true" value="">Seleccione Comuna</option>
                            @if(old('comuna_id') != null)
                                @foreach ($comunas as $comuna)
                                    @if(old('comuna_id') == $comuna->id)
                                        <option value="{{ $comuna->id }}" @if(old('comuna_id') == $comuna->id) {{ 'selected' }} @endif>{{ $comuna->nombre }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="col-sm-6 separar-responsivo">
                        <label for="direccion">Dirección
                            <small class="errores" id="" class="form-text text-muted">
                                @if($errors->has('direccion')) {{ $errors->first('direccion') }}@endif
                            </small>
                        </label>
                        <input type="text" class="form-control form-control-sm {{ $errors->has('direccion') ? ' is-invalid' : '' }}" id="direccion" value="{{ old('direccion') }}" name="direccion">
                    </div>

                </div>
                {{-- fila 4 con 4 columnas --}}
                <div class="form-group row">

                    <div class="col-sm-3 separar-responsivo">
                        <label for="fecha_ingreso">Fecha Ingreso PUCV</label>
                        <input type="date" class="form-control form-control-sm {{ $errors->has('fecha_ingreso') ? ' is-invalid' : '' }}" id="fecha_ingreso" value="{{ old('fecha_pucv') }}" name="fecha_pucv">
                    </div>

                    <div class="col-sm-3 separar-responsivo">
                        <label for="anexo">Anexo
                            <small class="errores" id="" class="form-text text-muted">
                                @if($errors->has('anexo')) {{ $errors->first('anexo') }}@endif
                            </small>
                        </label>
                        <input maxlength="4" type="text" class="form-control form-control-sm {{ $errors->has('anexo') ? ' is-invalid' : '' }}" id="anexo" value="{{ old('anexo') }}" name="anexo">
                    </div>

                    <div class="col-sm-3 separar-responsivo">
                        <label for="sede">Sede</label>
                        <select id="sede" class="select-ajax form-control form-control-sm {{ $errors->has('sede') ? ' is-invalid' : '' }}" name="sede_id">
                            <option selected="true" value="">Seleccione Sede</option>
                            @foreach ($sedes as $sede)
                                <option value="{{ $sede->id }}" @if(old('sede_id') == $sede->id) {{ 'selected' }} @endif>{{ $sede->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-3 separar-responsivo"></div>

                </div>
                {{-- fila 5 con 5 columnas --}}
                <div class="form-group row">

                    <div class="col-sm-6 separar-responsivo">
                        <label for="area">Área</label>
                        <select id="area" class="form-control form-control-sm {{ $errors->has('area') ? ' is-invalid' : '' }}" name="area_id">
                            <option selected="true" value="">Seleccione Área</option>
                            @if(old('area_id') != null)
                                @foreach ($areas as $area)
                                    @if(old('area_id') == $area->id)
                                        <option value="{{ $area->id }}" @if(old('area_id') == $area->id) {{ 'selected' }} @endif>{{ $area->nombre }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="col-sm-3 separar-responsivo">
                        <label for="cargo">Cargo</label>
                        <select id="cargo" class="form-control form-control-sm {{ $errors->has('cargo') ? ' is-invalid' : '' }}" name="cargo_id">
                            <option selected="true" value="">Seleccione Cargo</option>
                            @foreach ($cargos as $cargo)
                                <option value="{{ $cargo->id }}" @if(old('cargo_id') == $cargo->id) {{ 'selected' }} @endif>{{ $cargo->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-sm-3 separar-responsivo">
                        <label for="numero" title="Campo obligatorio.">N° Socio *
                            <small class="errores" id="" class="form-text text-muted">
                                @if($errors->has('numero_socio')) {{ $errors->first('numero_socio') }}@endif
                            </small>
                        </label>
                        <input maxlength="3" type="text" class="form-control form-control-sm {{ $errors->has('numero_socio') ? ' is-invalid' : '' }}" id="numero" value="{{ old('numero_socio') }}" name="numero_socio" required>
                    </div>

                </div>
                {{-- fila 6 con 2 columnas --}}
                <div class="form-group row">

                    <div class="col-sm-3 separar-responsivo">
                        <label for="fecha_sind1">Fecha Ingreso Sind1</label>
                        <input type="date" class="form-control form-control-sm {{ $errors->has('fecha_sind1') ? ' is-invalid' : '' }}" id="fecha_sind1" value="{{ old('fecha_sind1') }}" name="fecha_sind1">
                    </div>

                    <div class="col-sm-9"></div>

                </div>
                {{-- fila 1 con 2 columnas --}}
                <div class="form-group row">

                    <div class="col-sm-3 mt-3">
                        <button id="guardar_socio" type="submit" class="btn btn-primary btn-sm">Guardar</button>
                    </div>

                    <div class="col-sm-9"></div>

                </div>
                {{--fin form --}}
             </form>
             @include('modals.modal_nuevo')
        </div>
    </div>
@endsection