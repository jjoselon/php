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
    <link rel="stylesheet" href="../css/Estilos_Formulario_Producto2.css">
    <script src="../js/util3.js" defer></script>
    <script src="../js/producto3.js" defer></script>
    
</head>
<body>
    <a href="./logout.php"><button>Cerrar sesión</button></a>
    <h1>Bienvenido <?= $_SESSION['nickname']?><h1>

    <hr>

    <div>
        
        <form method="post" class="form" id="form-new-producto">
        <h1 class="form__title"> Crear producto </h1>
            <div class="form_container">
                <div class="form_group">
            <input type="text" id="nombre" name="nombre"class="form_input">
            <label for="nombre" class="form_label">Nombre</label>
            <textarea name="detalle" id="detalle" cols="30" rows="10" class="form_input"></textarea>
            <label for="detaller" class="form_label">Detalle</label>
            <input type="number" name="cantidad" id="cantidad" class="form_input">
            <label for="cantidad" class="form_label">Cantidad</label>
            <input type="number" name="precio" id="precio" class="form_input">
            <label for="precio" class="form_label">Precio</label>
            <input type="submit" value="Crear" class="form_submit" class="form_submit">
                 </div>
            </div>
        </form>
    </div>
</body>
</html>