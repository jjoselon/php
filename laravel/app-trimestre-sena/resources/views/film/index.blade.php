<!DOCTYPE html>
<html lang="es-CO" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Films</title>
        <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    </head>
    <body>
        <img class="rounded-circle" width="50px" height="50px" src="{{ url('../storage/app/images/staff/' . Auth::user()->picture ) }}"/>
        <form action='{{ url('logout') }}' method='post'>
            @csrf
            <button type='submit' class='btn btn-dark'>{{ Auth::user()->email }} | Salir para siempre :)</button>
        </form>
        <a href="{{ url('staff/show-all') }}">Empleados</a>
        <hr>
        <table>
            <tr>
                <th>Title</th>
                <th>Release year</th>
                <th>Duration (min)</th>
                <th></th>
            </tr>
            @foreach ($films as $film)
            <tr>
                <td>{{ $film->title }}</td>
                <td>{{ $film->release_year }}</td>
                <td>{{ $film->length }}</td>
            </tr>
            @endforeach
        </table>
        {{ $films->links() }}
    </body>
</html>
