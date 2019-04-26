<div class="nav">
    <div class="nav-interno bg-dark navbar-dark">
        <div class="titulo-nav">Sind1</div>
        <div class="info-1">
            <a href="{{ route('todos') }}" class="badge" title="Cantidad de varones"><span class="icono-nav">@svg('iconos/varon')</span> {{ $varones }}</a>
        </div>
        <div class="info-2">
            <a href="{{ route('todos') }}" class="badge" title="Cantidad de damas"><span class="icono-nav">@svg('iconos/dama')</span> {{ $damas }}</a>
        </div>
        <div class="info-3">
            <a href="{{ route('todos') }}" class="badge" title="Cantidad total de socios">
                <span class="icono-nav">@svg('iconos/varon')</span><span class="icono-nav">@svg('iconos/dama')</span> {{ $varones + $damas }}</a>
        </div>
        <div class="icono-usuario">
            <span class="icon icono-usuario">@svg('iconos/logueado')</span>
        </div>
        <div class="nombre-usuario">
            <a href="{{ route('usuarios.show',['id'=>Auth::user()->id]) }}">
                 {{ Auth::user()->name }}
            </a>
        </div>
        <div class="cerrar-sesion">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>
            <form id="" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>