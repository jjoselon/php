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
    <title>Home</title>
</head>
<body>
    <a href="./logout.php"><button>Cerrar sesión</button></a>
    <h1>Bienvenido <?= $_SESSION['nickname']?><h1> 
    <h3>Tiene el rol: <?= $_SESSION["rol"] ?> </h3>

    <ul>
        <li><a href="./formulario_crear_producto.php">CREAR PRODUCTO</a></li>
    </ul>
</body>
</html>