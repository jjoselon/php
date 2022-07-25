<!DOCTYPE html>
<html lang="en-CO" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Sign in</title>
        <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    </head>
    <body>
        <div class='container'>
            <h1>Registro de usuario</h1>
            <div class='row'>
                <form action="{{ url('register') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class='col-12'>
                        <label for="">Nombre</label>
                        <input type="text" name="name" class="form-control" value="">
                        <p class="text-warning">{{ $errors->first('name') }}</p>
                    </div>
                    <div class='col-12'>
                        <label for="">Apellido</label>
                        <input type="text" name="lastname" class="form-control" value="">
                    </div>
                    <div class='col-12'>
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" value="">
                    </div>
                    <div class='col-12'>
                        <label for="">Nombre de usuario</label>
                        <input type="text" name="username" class="form-control" value="">
                        <p class="text-warning">{{ $errors->first('username') }}</p>
                    </div>
                    <div class='col-12'>
                        <label for="">Contraseña</label>
                        <input type="text" name="password" class="form-control" value="">
                    </div>
                    <div class='col-12'>
                        <label for="">Foto</label>
                        <input type="file" name="photo" class="form-control" value="">
                        <small class="text-warning">{{ $errors->first('photo')}}</small>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
