<?php

session_start();

header('Content-type: application/json');

include_once("./conexion.php");



$json = file_get_contents('php://input');



$data = json_decode($json, true);



$query_new_cuenta = "SELECT crear_cuenta('{$data['nickname']}', '{$data['password']}', '{$data['email']}', '{$data['telefono']}') AS crear_cuenta";

$query_new_cuenta = mysqli_query($con, $query_new_cuenta);

$resultSet = mysqli_fetch_assoc($query_new_cuenta);



if ($resultSet["crear_cuenta"] === "1") {

    echo json_encode(["Message" => "la cuenta fue creada exitosamente.", "OK" => true, "RedirectURI" => "./login.php"]);

} else {

    echo json_encode(["Message" => "Error al registrar cuenta.validar que todos los campos", "OK" => false]);

}