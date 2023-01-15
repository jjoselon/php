<?php
header('Content-type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') die("");

// php://input solo soporta el método POST
//var_dump($_GET);
// ... aqui hacemos las respectivas validaciones de los datos entrantes

// ... y aqui devolvemos falso o verdadero según la validación
echo json_encode(["name" => "Iron Kind"]);

?>
