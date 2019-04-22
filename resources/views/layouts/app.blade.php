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
            @include('layouts.includes.menu')
            <div class="principal">
                @include('layouts.includes.titulo_botonera')
                <div class="contenido shadow p-4 mb-4 bg-lite">
                    @include('layouts.includes.alertas')
                    @yield('content')
                </div>
            </div>
        </div>
        {{-- Fin plantilla --}}
        @include('layouts.includes.scripts')
    </body>
    @include('modals.modal_nueva_sede')
    @include('modals.modal_nuevo_cargo')
    @include('modals.modal_nueva_area')
</html>