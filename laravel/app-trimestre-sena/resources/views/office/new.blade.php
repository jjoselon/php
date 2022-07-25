<html>
    <h2>Nueva oficina</h2>
    <form class=""    method="post" action="{{ url('office/createnew') }}" >
        {{ csrf_field()  }}
        <p>
            Codigo: <input type="text" name="codigo">
        </p>
        <p>
            Pais: <input type="text" name="pais">
        </p>
        <p>
            Postal: <input type="text" name="postal">
        </p>
        <p>
            Territorio: <input type="text" name="territorio">
        </p>
        <p>
            Teléfono: <input type="text" name="telefono">
        </p>
        <p>
            Ciudad: <input type="text" name="ciudad">
        </p>
        <p>
            direccion: <input type="text" name="direccion">
        </p>
        <p>
            <button type="submit" name="button">Guardar</button>
        </p>
    </form>
<html/>
