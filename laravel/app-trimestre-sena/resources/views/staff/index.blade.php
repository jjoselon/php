<!DOCTYPE html>
<html lang="es-CO" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Staff</title>
        <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    </head>
    <body>
        <img class="rounded-circle" width="50px" height="50px" src="{{ url('../storage/app/images/staff/' . Auth::user()->picture ) }}"/>
        <form action='{{ url('logout') }}' method='post'>
            @csrf
            <button type='submit' class='btn btn-dark'>{{ Auth::user()->email }} | Salir para siempre :)</button>
        </form>
        <table>
            <tr>
                <th>Primer nombre</th>
                <th>Segundo nombre</th>
                <th>E-mail</th>
                <th></th>
            </tr>
            @foreach ($staffs as $staff)
            <tr>
                <td>{{ $staff->first_name }}</td>
                <td>{{ $staff->last_name }}</td>
                <td>{{ $staff->email }}</td>
                <td> <img class="rounded-circle" width="50px" height="50px" src="{{ url('../storage/app/images/staff/' . $staff->picture ) }}"/> </td>
            </tr>
            @endforeach
        </table>
    </body>
</html>
