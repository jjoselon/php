<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log in</title>
  <link rel="stylesheet" href="../css/login.css">
  <link rel="stylesheet" href="../css/modal.css">
</head>

<body>
  <section class="form-login">
    <h5>Log in</h5>
    <form id="formAuthenticationUser" method="post">
      <input required class="controls" type="text" id="nickname" name="nickname" placeholder="Usuario">
      <input required class="controls" type="password" id="password" name="password" placeholder="Contraseña">
      <input class="buttons" type="submit" value="Ingresar">
      <!--<p><a href="#">¿Olvidastes tu Contraseña?</a></p>-->
    </form>
  </section>
  <script src="../js/util.js"></script>
  <script src="../js/modal.js"></script> <!-- es necesario antes de login.js -->
  <script src="../js/login.js"></script>
</body>

</html>