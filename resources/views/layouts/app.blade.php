<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap_min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/estilos_plantilla.css') }}" rel="stylesheet">
        <link href="{{ asset('css/estilos_generales.css') }}" rel="stylesheet">
        <title>Sind1</title>
    </head>
    <body>
        {{-- Plantilla --}}
        <div class="plantilla">
            @include('layouts.includes.nav')
            <div class="menu">
                <ul class="menu-lateral">
                    <li class="boton-menu">
                        <a class="titulo-responsivo" href="">Sind1 <span class="derecha">@svg('iconos/bars-solid')</span>
                        </a>
                    </li>
                    <li class="item-menu item-responsivo">
                         <span class="derecha">@svg('iconos/logueado')</span> {{ Auth::user()->name }}
                    </li>
                    <li class="item-menu item-general titulo-ul">
                        <a class="mostrar-sub-categoria" href="">Socios<span class="derecha">@svg('iconos/mas')</span></a>
                         <ul>
                            <li><a class="enlace-menu" href="">Incorporar</a></li>
                            <li><a class="enlace-menu" href="">Buscar</a></li>
                            <li><a class="enlace-menu" href="">Nueva área</a></li>
                            <li><a class="enlace-menu" href="">Nuevo cargo</a></li>
                        </ul>
                    </li>
                    <li class="item-menu item-general titulo-ul">
                        <a class="mostrar-sub-categoria" href="">Prestamos<span class="derecha">@svg('iconos/mas')</span></a>
                        <ul>
                            <li>
                                Solicitar
                            </li>
                        </ul>
                    </li>
                    <li class="item-menu item-general titulo-ul">
                        <a class="mostrar-sub-categoria" href="">Contabilidad<span class="derecha">@svg('iconos/mas')</span></a>
                         <ul>
                            <li>Opción</li>
                        </ul>
                    </li>
                    <li class="item-menu item-general titulo-ul">
                        <a class="mostrar-sub-categoria" href="">Estadisticas<span class="derecha">@svg('iconos/mas')</span></a>
                         <ul>
                            <li>Opción</li>
                        </ul>
                    </li>
                    <li class="item-menu item-general titulo-ul">
                        <a class="mostrar-sub-categoria" href="">Correo<span class="derecha">@svg('iconos/mas')</span></a>
                         <ul>
                            <li>Opción</li>
                        </ul>
                    </li>
                    <li class="item-menu item-responsivo titulo-ul">
                        <a class="mostrar-sub-categoria" href="">Sindicalizados
                            <span class="derecha">@svg('iconos/mas')</span>
                        </a>
                         <ul>
                            <li><a href="">Hombres:<span class="derecha">150</span></a></li>
                            <li><a href="">Mujeres:<span class="derecha">150</span></a></li>
                            <li><a href="">Total:<span class="derecha">300</span></a></li>
                        </ul>
                    </li>
                    <li class="item-menu item-responsivo titulo-ul">
                        <a href="">Salir</a>
                    </li>
                </ul>
            </div>
            <div class="principal">
                <div class="cabecera-principal">
                    <div class="titulo">Buscar Socio</div>
                    <div class="botonera">
                        <a href="">
                            <span>@svg('iconos/pdf')</span>
                        </a>
                    </div>
                </div>
                <div class="contenido">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eget lorem vitae augue commodo eleifend nec vel velit. Phasellus est nibh, aliquam a nunc sed, rutrum egestas sem. Aenean sagittis, nunc ut aliquam feugiat, quam libero finibus urna, iaculis cursus leo sem a lacus. Vestibulum vestibulum semper purus eu ultrices. Sed ac nunc id lacus aliquet sodales ut nec neque. Sed quam nibh, hendrerit quis odio a, sagittis scelerisque odio. In commodo erat turpis, vel pulvinar arcu vestibulum id. Nunc vitae ornare nisi. Nullam ullamcorper dictum tortor, ut congue mauris. Aenean eget venenatis nisl. Pellentesque laoreet ipsum id sollicitudin viverra. Donec ac pulvinar tellus. Mauris ornare aliquet odio ac ornare.

                    Sed porta magna sed volutpat sollicitudin. Sed consectetur finibus venenatis. In hac habitasse platea dictumst. Aliquam euismod aliquam auctor. Aliquam feugiat purus sed porta maximus. Pellentesque vel sapien ut sem mollis euismod id at elit. Integer pulvinar est ultricies, accumsan elit pulvinar, sodales urna. Maecenas mattis velit vel elit vestibulum ornare. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent blandit eu sem et semper. Etiam dictum vitae risus eu finibus. Cras nulla enim, vestibulum quis arcu in, lacinia fringilla odio. Phasellus maximus egestas justo, vel vestibulum nulla euismod eu. Phasellus pretium tellus risus, fermentum interdum sapien vulputate at. Donec gravida nisi id libero iaculis sodales.

                    Donec nec massa non neque placerat cursus. In tempus mollis aliquam. Nulla mauris eros, congue eu felis quis, fringilla molestie arcu. In vel magna id sem tempor placerat nec quis justo. Etiam commodo maximus tempor. Donec ac tristique mi. Nulla lobortis purus a turpis viverra tincidunt.

                    Nunc lacinia bibendum neque, non iaculis ligula volutpat at. Etiam venenatis ipsum mi, sed efficitur velit consequat ac. Curabitur sed ex at metus interdum ultrices. Curabitur vitae elementum erat. Integer fermentum laoreet augue vel pellentesque. Etiam non libero purus. Nunc vel ipsum congue, suscipit arcu et, gravida tortor. Nulla vestibulum auctor ullamcorper. Etiam feugiat bibendum metus commodo ornare. Mauris scelerisque hendrerit turpis, rhoncus blandit metus varius a. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.

                    Quisque quam orci, porta nec maximus vel, varius sed elit. Quisque id condimentum magna. Sed eu metus aliquet, accumsan ex ac, rutrum erat. Pellentesque in mauris ipsum. Proin interdum eu ex ut interdum. Vestibulum augue nulla, lobortis at bibendum sit amet, posuere nec ipsum. Integer sit amet metus sit amet mi varius varius eget in diam. Donec nulla massa, interdum nec nisl eget, ornare accumsan est. Curabitur malesuada ante id faucibus blandit. Integer at diam faucibus, fringilla lectus et, facilisis sapien. Praesent aliquet a tortor at aliquam. Nullam maximus pharetra neque, facilisis dignissim massa faucibus eu.
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eget lorem vitae augue commodo eleifend nec vel velit. Phasellus est nibh, aliquam a nunc sed, rutrum egestas sem. Aenean sagittis, nunc ut aliquam feugiat, quam libero finibus urna, iaculis cursus leo sem a lacus. Vestibulum vestibulum semper purus eu ultrices. Sed ac nunc id lacus aliquet sodales ut nec neque. Sed quam nibh, hendrerit quis odio a, sagittis scelerisque odio. In commodo erat turpis, vel pulvinar arcu vestibulum id. Nunc vitae ornare nisi. Nullam ullamcorper dictum tortor, ut congue mauris. Aenean eget venenatis nisl. Pellentesque laoreet ipsum id sollicitudin viverra. Donec ac pulvinar tellus. Mauris ornare aliquet odio ac ornare.

                    Sed porta magna sed volutpat sollicitudin. Sed consectetur finibus venenatis. In hac habitasse platea dictumst. Aliquam euismod aliquam auctor. Aliquam feugiat purus sed porta maximus. Pellentesque vel sapien ut sem mollis euismod id at elit. Integer pulvinar est ultricies, accumsan elit pulvinar, sodales urna. Maecenas mattis velit vel elit vestibulum ornare. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent blandit eu sem et semper. Etiam dictum vitae risus eu finibus. Cras nulla enim, vestibulum quis arcu in, lacinia fringilla odio. Phasellus maximus egestas justo, vel vestibulum nulla euismod eu. Phasellus pretium tellus risus, fermentum interdum sapien vulputate at. Donec gravida nisi id libero iaculis sodales.

                    Donec nec massa non neque placerat cursus. In tempus mollis aliquam. Nulla mauris eros, congue eu felis quis, fringilla molestie arcu. In vel magna id sem tempor placerat nec quis justo. Etiam commodo maximus tempor. Donec ac tristique mi. Nulla lobortis purus a turpis viverra tincidunt.

                    Nunc lacinia bibendum neque, non iaculis ligula volutpat at. Etiam venenatis ipsum mi, sed efficitur velit consequat ac. Curabitur sed ex at metus interdum ultrices. Curabitur vitae elementum erat. Integer fermentum laoreet augue vel pellentesque. Etiam non libero purus. Nunc vel ipsum congue, suscipit arcu et, gravida tortor. Nulla vestibulum auctor ullamcorper. Etiam feugiat bibendum metus commodo ornare. Mauris scelerisque hendrerit turpis, rhoncus blandit metus varius a. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.

                    Quisque quam orci, porta nec maximus vel, varius sed elit. Quisque id condimentum magna. Sed eu metus aliquet, accumsan ex ac, rutrum erat. Pellentesque in mauris ipsum. Proin interdum eu ex ut interdum. Vestibulum augue nulla, lobortis at bibendum sit amet, posuere nec ipsum. Integer sit amet metus sit amet mi varius varius eget in diam. Donec nulla massa, interdum nec nisl eget, ornare accumsan est. Curabitur malesuada ante id faucibus blandit. Integer at diam faucibus, fringilla lectus et, facilisis sapien. Praesent aliquet a tortor at aliquam. Nullam maximus pharetra neque, facilisis dignissim massa faucibus eu.
                </div>
            </div>
        </div>
        {{-- Fin plantilla --}}
        @include('layouts.includes.scripts')
    </body>
</html>