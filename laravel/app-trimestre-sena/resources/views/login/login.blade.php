<!DOCTYPE html>
<html lang="es-CO" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Acceso</title>
        <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <a href='{{ url('singin') }}'><button type='button' class='btn btn-primary'>Registrese ahora!</button></a>
            <h1>Laravel: Inicio de sesión</h1>
            <form class="" action="{{ url('login') }}" method="post">
                @csrf
                <label for="username">Usuario</label>
                <input type="text" name="email" value="" class="form-control" id="email">
                <p class="text-warning">{{ $errors->first('email') }}</p>
                <label for="password">Contraseña</label>
                <input type="password" name="password" class="form-control" value="" id="password">
                <p class="text-warning">{{ $errors->first('password') }}</p>
                <button type="submit">Acceder</button>
                @if (session('error'))
                {{ session('error') }}
                @endif
            </form>
                @if (session('saved'))
                <div class="alert alert-success">
                    {{ session('saved') }}
                </div>
                @endif
        </div>
    </body>
</html>
