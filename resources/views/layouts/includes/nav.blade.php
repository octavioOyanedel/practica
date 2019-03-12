<div class="nav">
    <div class="nav-interno">
        <div class="titulo-nav">Sind1</div>
        <div class="info-1">
            <a href="#" class="badge">V: 150</a>
        </div>
        <div class="info-2">
            <a href="#" class="badge">D: 150</a>
        </div>
        <div class="info-3">
            <a href="#" class="badge">T: 300</a>
        </div>
        <div class="icono-usuario">
            <span class="icon icono-usuario">@svg('iconos/logueado')</span>
        </div>
        <div class="nombre-usuario">
            <a href="#">
                 {{ Auth::user()->name }}
            </a>
        </div>
        <div class="cerrar-sesion"><a href="">Salir</a></div>
    </div>
</div>