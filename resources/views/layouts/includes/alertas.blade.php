@if(session()->has('incorporar_socio'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Socio incorporado con exito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('desvincular_socio'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Socio desvinculado con exito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif