<?php
session_start();
header('Content-type: application/json');
include_once("./conexion.php");

$json = file_get_contents('php://input');

$data = json_decode($json, true);

echo json_encode($data);
