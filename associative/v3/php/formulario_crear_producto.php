<?php
session_start();
if (empty($_SESSION)) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo producto</title>
    <script src="../js/util3.js" defer></script>
    <script src="../js/producto3.js" defer></script>
</head>
<body>
    <a href="./logout.php"><button>Cerrar sesión</button></a>
    <h1>Bienvenido <?= $_SESSION['nickname']?><h1>

    <hr>

    <div>
        <h1> Crear producto </h1>
        <form method="post" id="form-new-producto">
            Nombre:<input type="text" name="nombre" id="nombre"><br>
            Detalle:<textarea name="detalle" id="detalle" cols="30" rows="10"></textarea><br>
            cantidad:<input type="number" name="cantidad" id="cantidad"><br>
            Precio:<input type="number" name="precio" id="precio"><br>
            <input type="submit" value="Crear">
        </form>
    </div>
</body>
</html>