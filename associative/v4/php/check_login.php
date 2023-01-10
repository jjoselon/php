<?php
session_start();
header('Content-type: application/json');
include_once("./conexion.php");

$json = file_get_contents('php://input');

$data = json_decode($json, true);
$data = json_decode($data, true);
//echo json_last_error();die;
// CALL FUNCTION SQL
$query_check_user = "SELECT verificar_usuario('{$data['nickname']}', '{$data['password']}') AS verificar_usuario";

$query_check_user = mysqli_query($con, $query_check_user);
$resultSet = mysqli_fetch_assoc($query_check_user);

/*$resultSet = array();
$query = "SELECT
`u`.`nickname` AS `nickname`,
`u`.`id` AS `id`,
`u`.`Rol_id` AS `rol_id`
FROM usuario AS `u`
WHERE `u`.`nickname` = '{$data['nickname']}' AND `u`.`password` = '{$data['password']}'";
$result = mysqli_query($con, $query);
$resultSet = mysqli_fetch_assoc($result);*/

// ... aqui hacemos las respectivas validaciones de los datos entrantes

if ($resultSet["verificar_usuario"] === "n") {
    // ... y aqui devolvemos falso o verdadero según la validación
    echo json_encode(["Message" => "Credenciales incorrectas", "OK" => false]);
} else {
    $_SESSION["logged"] = true;
    $_SESSION["nickname"] = $data['nickname'];
    echo json_encode(["Message" => "Credenciales validas", "OK" => true, 'RedirectURI' => './home.php']);
}