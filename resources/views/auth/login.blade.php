<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="{{ asset('css/bootstrap_min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/estilos_login.css') }}" rel="stylesheet">
        <title>Iniciar Sesión - Sind1</title>
    </head>
    <body>
        <form class="form-signin" method="POST" action="{{ route('login') }}" autocomplete="off">
            @csrf
            <div class="text-center mb-4">
                <div class="mb-4">
                    @svg('logo_login')
                </div>
                <h1 class="h3 mb-3 font-weight-normal">Sind1</h1>
                <p>Sistema de administración de socios del Sindicato Interempresas N° 1 de trabajadores PUCV.</p>
            </div>
            <div class="form-label-group">
                <input type="email" id="email" class="form-control" placeholder="Email address" name="email" required autofocus>
                <label for="email">Correo</label>
            </div>
            <div class="form-label-group">
                <input type="password" id="password" class="form-control" placeholder="Password" name="password" required>
                <label for="password">Contraseña</label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
            <p class="mt-5 mb-3 text-muted text-center">&copy; OAOA</p>
        </form>
    </body>
</html>