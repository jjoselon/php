<?php
session_start();
if (empty($_SESSION)) {
    header("Location: login.php");
}
echo "facturas";
?>

