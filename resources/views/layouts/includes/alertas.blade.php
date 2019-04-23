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

@if(session()->has('prestamo_saldado'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Prestamo saldado con exito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('registrar_usuario'))
    <div class="alertas alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Usuario registrado con exito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('desvincular_usuario'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong class="icono-alerta">Usuario eliminado con exito.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif