<div class="cabecera-principal">
    <div class="titulo">@include('layouts.includes.titulos')</div>
    <div class="botonera">
        {{-- <a href=""><span>@svg('iconos/pdf')</span></a>--}}
        @php
            $idSocio = 0;
            $idPrestamo = 0;
        @endphp
        @if(isset($socio))
            @php
            $idSocio = $socio->id;
            @endphp
        @endif
        @if(isset($prestamo))
            @php
                $idPrestamo = $prestamo->id;
            @endphp
        @endif
        @switch(request()->path())
        @case('socios')
            <a href="" class="descargar-excel"><span class="icono-excel">@svg('iconos/excel')</span></a>
        @break
        @case('prestamos')
            <a href="" class="descargar-excel"><span class="icono-excel">@svg('iconos/excel')</span></a>
        @break
        @case('verEstadisticaCantidadPrestamos')
            <a href="" class="descargar-excel"><span class="icono-excel">@svg('iconos/excel')</span></a>
        @break
        @case('verEstadisticaIncorporacionSocios')
            <a href="" class="descargar-excel"><span class="icono-excel">@svg('iconos/excel')</span></a>
        @break
        @default

        @endswitch

		<a id="descarga"></a>
    </div>
</div>