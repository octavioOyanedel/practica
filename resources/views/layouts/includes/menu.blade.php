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
                <li><a id="incorporar_nuevo_socio" class="enlace-menu" href="{{ route('socios.create') }}">Incorporar</a></li>
                <li><a class="enlace-menu" href="{{ route('socios.index') }}">Buscar</a></li>
                <li><a class="enlace-menu enlace-nuevo" href="" data-toggle="modal" data-target="#modal_nuevo">Nueva Sede</a></li>
                <li><a class="enlace-menu enlace-nuevo" href="" data-toggle="modal" data-target="#modal_nuevo">Nueva Área</a></li>
                <li><a class="enlace-menu enlace-nuevo" href="" data-toggle="modal" data-target="#modal_nuevo">Nuevo Cargo</a></li>
            </ul>
        </li>
        <li class="item-menu item-general titulo-ul">
            <a class="mostrar-sub-categoria
            {{request()->is('prestamos')?'activo':''}}
            {{request()->is('prestamos/create')?'activo':''}}
            " href="">Prestamos<span class="derecha">@svg('iconos/mas')</span></a>
            <ul>
                <li><a class="enlace-menu" href="{{ route('prestamos.create') }}">Solicitar</a></li>
                <li><a class="enlace-menu" href="{{ route('prestamos.index') }}">Buscar</a></li>
            </ul>
        </li>
        <!--
        <li class="item-menu item-general titulo-ul">
            <a class="mostrar-sub-categoria
            {{request()->is('contables')?'activo':''}}
            {{request()->is('contables/create')?'activo':''}}
            " href="">Contabilidad<span class="derecha">@svg('iconos/mas')</span></a>
             <ul>
                <li><a class="enlace-menu" href="{{ route('contables.create') }}">Registrar (Ing/Egr)</a></li>
                <li><a class="enlace-menu" href="">Nuevo Concepto</a></li>
            </ul>
        </li>
        -->
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