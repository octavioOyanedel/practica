@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-md-12 mx-auto">
		<form class="formulario" method="POST" action="">
		@csrf
        <div class="col-sm-3 separar-responsivo">
            <label for="area" title="Campo obligatorio.">Opción</label>
            <select id="area" class="form-control form-control-sm {{ $errors->has('area') ? ' is-invalid' : '' }}" name="area" required>
                <option selected="true" value="">Seleccione Opción</option>
                <option value="Socios" {{ old('area')=='Socios' ? 'selected' : ''  }}>Socios</option>
                <option value="Prestamos"  {{ old('area')=='Prestamos' ? 'selected' : ''  }}>Prestamos</option>
            </select>
        </div>
		</form>
    </div>
</div>

@endsection