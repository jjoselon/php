<?php



?>

<!DOCTYPE html>

<html>

<head>

	<meta charset="utf-8">

	<title>registro</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/login1.css">
	<link rel="stylesheet" href="../css/estilosregistro2.css">
    <script src="../js/util3.js" defer></script>
	<script src="../js/registro2.js" defer></script>
	

	<title></title>

</head>

<body>



	<div class="contenedor-form">

		<div class="toggle">

			<span><a href="./login.php">Ya tengo cuenta</a></span>

		</div>

		<div class="formulario">

			<h2>Registro</h2>

			<form method="post" id="form-new-cuenta">

				<input type="text" placeholder="usuario" id="nickname" name="nickname" required>

				<input type="password" placeholder="Contraseña" id="password" name="password" required>

				<input type="email" placeholder="correo electronico" id="email" name="email" required>

				<input type="text" placeholder="telefono" id="telefono" name="usuario">

				<input type="submit" value="registrase">



			</form>



		</div>



	</div>

</body>

</html>