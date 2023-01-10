<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log in</title>
  <link rel="stylesheet" href="../css/login1.css">
  <link rel="stylesheet" href="../css/liwindow1.css">
  <link rel="stylesheet" href="../css/estilosregistro2.css">
</head>

<body>
  <section class="form-login">
    <h5>Log in</h5>
    <form id="formAuthenticationUser" method="post">
      <input required class="controls" type="text" id="nickname" name="nickname" placeholder="Usuario">
      <input required class="controls" type="password" id="password" name="password" placeholder="Contraseña">
      <input class="buttons" type="submit" value="Ingresar">
      <div class="contenedor-form">
		<div class="toggle">
			<span><a href="./registro.php">crear cuenta</a></span>
		</div>	
      <!--<p><a href="#">¿Olvidastes tu Contraseña?</a></p>-->
    </form>
    
	</div>
    <img src="../media/logo.png"/>
  </section>
  <script type="text/javascript" src="../js/util3.js"></script>
  <script type="text/javascript" src="../js/modal3.js"></script> <!-- es necesario antes de login.js -->
  <script type="text/javascript" src="../js/login8.js"></script>
</body>

</html>