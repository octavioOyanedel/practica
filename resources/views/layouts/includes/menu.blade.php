<div class="menu">
    <ul class="menu-lateral">
        <li class="boton-menu">
            <a class="titulo-responsivo" href="">
                Sind1 <span class="derecha">@svg('iconos/bars-solid')</span>
            </a>
        </li>
        <li class="item-menu item-responsivo">
             <span class="derecha">@svg('iconos/logueado')</span> {{ Auth::user()->name }}
        </li>
        <li class="item-menu item-general titulo-ul">
            <a class="mostrar-sub-categoria
            {{request()->is('socios/create')?'activo':''}}
            {{request()->is('socios')?'activo':''}}
                " href="">Socios<span class="derecha">@svg('iconos/mas')</span></a>
             <ul>
                <li><a class="enlace-menu" href="{{ route('socios.create') }}">Incorporar</a></li>
                <li><a class="enlace-menu" href="{{ route('socios.index') }}">Buscar</a></li>
                <li><a class="enlace-menu" href="">Nueva sede</a></li>
                <li><a class="enlace-menu" href="">Nueva área</a></li>
                <li><a class="enlace-menu" href="">Nuevo cargo</a></li>
            </ul>
        </li>
        <li class="item-menu item-general titulo-ul">
            <a class="mostrar-sub-categoria" href="">Prestamos<span class="derecha">@svg('iconos/mas')</span></a>
            <ul>
                <li><a class="enlace-menu" href="">Solicitar</a></li>
            </ul>
        </li>
        <li class="item-menu item-general titulo-ul">
            <a class="mostrar-sub-categoria" href="">Contabilidad<span class="derecha">@svg('iconos/mas')</span></a>
             <ul>
                <li><a class="enlace-menu" href="">Opción</a></li>
            </ul>
        </li>
        <li class="item-menu item-general titulo-ul">
            <a class="mostrar-sub-categoria" href="">Estadisticas<span class="derecha">@svg('iconos/mas')</span></a>
             <ul>
                <li><a class="enlace-menu" href="">Opción</a></li>
            </ul>
        </li>
        <li class="item-menu item-general titulo-ul">
            <a class="mostrar-sub-categoria" href="">Correo<span class="derecha">@svg('iconos/mas')</span></a>
             <ul>
                <li><a class="enlace-menu" href="">Opción</a></li>
            </ul>
        </li>
        <li class="item-menu item-responsivo titulo-ul">
            <a class="mostrar-sub-categoria" href="">Sindicalizados
                <span class="derecha">@svg('iconos/mas')</span>
            </a>
             <ul>
                <li><a href="">Hombres:<span class="derecha">{{ $varones }}</span></a></li>
                <li><a href="">Mujeres:<span class="derecha">{{ $damas }}</span></a></li>
                <li><a href="">Total:<span class="derecha">{{ $varones + $damas }}</span></a></li>
            </ul>
        </li>
        <li class="item-menu item-responsivo titulo-ul">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Salir</a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </ul>
</div>