<div class="nav">
    <div class="nav-interno">
        <div class="titulo-nav">Sind1</div>
        <div class="info-1">
            <a href="{{ route('todos') }}" class="badge">V: {{ $varones }}</a>
        </div>
        <div class="info-2">
            <a href="{{ route('todos') }}" class="badge">D: {{ $damas }}</a>
        </div>
        <div class="info-3">
            <a href="{{ route('todos') }}" class="badge">T: {{ $varones + $damas }}</a>
        </div>
        <div class="icono-usuario">
            <span class="icon icono-usuario">@svg('iconos/logueado')</span>
        </div>
        <div class="nombre-usuario">
            <a href="#">
                 {{ Auth::user()->name }}
            </a>
        </div>
        <div class="cerrar-sesion">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>