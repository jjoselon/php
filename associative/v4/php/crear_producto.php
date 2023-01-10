<?php
session_start();
header('Content-type: application/json');
include_once("./conexion.php");

$json = file_get_contents('php://input');

$data = json_decode($json, true);

$query_new_product = "SELECT crear_producto('{$data['nombre']}', '{$data['detalle']}', {$data['cantidad']}, '{$data['precio']}') AS crear_producto";
$query_new_product = mysqli_query($con, $query_new_product);
$resultSet = mysqli_fetch_assoc($query_new_product);

if ($resultSet["crear_producto"] === "1") {
    echo json_encode(["Message" => "El producto fue registrado exitosamente.", "OK" => true]);
} else {
    echo json_encode(["Message" => "Error al registrar el producto. Verifique la información del producto", "OK" => false]);
}