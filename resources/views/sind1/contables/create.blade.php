@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mx-auto">
            <form class="formulario" id="formulario_prestamo" method="POST" action="">
                @csrf

                {{--fin form --}}
             </form>
        </div>
    </div>
@endsection