<div class="menu">
    <ul class="menu-lateral">
        <li class="boton-menu">
            <a class="titulo-responsivo" href="">
                Sind1 <span class="derecha">@svg('iconos/bars-solid')</span>
            </a>
        </li>
        <li class="item-menu item-responsivo info-usuario">
             <span class="derecha caca">@svg('iconos/logueado')</span> {{ Auth::user()->name }}
        </li>
        <li class="item-menu item-general titulo-ul">
            <a class="mostrar-sub-categoria
            {{request()->is('socios/create')?'activo':''}}
            {{request()->is('socios')?'activo':''}}
            " href="">Socios<span class="derecha">@svg('iconos/mas')</span></a>
             <ul>
                @if(Auth::user()->clase_id == 1)
                    <li><a id="incorporar_nuevo_socio" class="enlace-menu" href="{{ route('socios.create') }}">Incorporar</a></li>
                @endif
                <li><a class="enlace-menu" href="{{ route('socios.index') }}">Buscar</a></li>
            </ul>
        </li>
        <li class="item-menu item-general titulo-ul">
            <a class="mostrar-sub-categoria
            {{request()->is('prestamos')?'activo':''}}
            {{request()->is('prestamos/create')?'activo':''}}
            " href="">Prestamos<span class="derecha">@svg('iconos/mas')</span></a>
            <ul>
                @if(Auth::user()->clase_id == 1)
                    <li><a class="enlace-menu" href="{{ route('prestamos.create') }}">Solicitar</a></li>
                @endif
                <li><a class="enlace-menu" href="{{ route('prestamos.index') }}">Buscar</a></li>
            </ul>
        </li>
        <li class="item-menu item-general titulo-ul">
            <a class="mostrar-sub-categoria
            {{request()->is('estadisticaCantidadPrestamos')?'activo':''}}
            {{request()->is('estadisticaMontoPrestamos')?'activo':''}}
            {{request()->is('estadisticaIncorporacionSocios')?'activo':''}}
            " href="">Estadisticas<span class="derecha">@svg('iconos/mas')</span></a>
             <ul>
                <li><a class="enlace-menu" href="{{ route('cantidad') }}">Cantidad de Prestamos</a></li>
                <li><a class="enlace-menu" href="{{ route('incorporaciones') }}">Incorporaciones Sind1</a></li>
            </ul>
        </li>
        @if(Auth::user()->clase_id == 1)
            <li class="item-menu item-general titulo-ul">
                <a class="mostrar-sub-categoria
                {{request()->is('usuarios')?'activo':''}}
                {{request()->is('usuarios/create')?'activo':''}}
                " href="">Administrar<span class="derecha">@svg('iconos/mas')</span></a>
                 <ul>
                        <li><a class="enlace-menu" id="enlace_nuevo_usuario" href="{{ route('usuarios.create') }}">Registrar Usuario</a></li>
                        <li><a class="enlace-menu" href="{{ route('usuarios.index') }}">Buscar Usuarios</a></li>
                        <li><a class="enlace-menu enlace-nuevo" href="" data-toggle="modal" data-target="#modal_nueva_sede">Nueva Sede</a></li>
                        <li><a class="enlace-menu enlace-nuevo" href="" data-toggle="modal" data-target="#modal_nueva_area">Nueva Área</a></li>
                        <li><a class="enlace-menu enlace-nuevo" href="" data-toggle="modal" data-target="#modal_nuevo_cargo">Nuevo Cargo</a></li>

                </ul>
            </li>
        @endif
        <li class="item-menu item-responsivo titulo-ul">
            <a class="mostrar-sub-categoria" href="">Sindicalizados
                <span class="derecha">@svg('iconos/mas')</span>
            </a>
             <ul>
                <li><a href="{{ route('todos') }}">Hombres:<span class="derecha">{{ $varones }}</span></a></li>
                <li><a href="{{ route('todos') }}">Mujeres:<span class="derecha">{{ $damas }}</span></a></li>
                <li><a href="{{ route('todos') }}">Total:<span class="derecha">{{ $varones + $damas }}</span></a></li>
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