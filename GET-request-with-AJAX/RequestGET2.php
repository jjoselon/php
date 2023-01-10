<?php
header('Content-type: application/json');
// Si queremos mostrar un contenido JSON:
// Vamos a mostrar un JSON
/*
  $_POST es un array vacío
  array(0) {

  }
  var_dump($_POST);
*/

/*

  // Si queremos saber los headers
  foreach (getallheaders() as $nombre => $valor) {
  echo "$nombre: $valor\n";
  }

*/

$json = file_get_contents('php://input');
$data = json_decode($json, true);

// ... aqui hacemos las respestivas validaciones de los datos entrantes

// ... y aqui devolvemos falso o verdadero según la validación
echo json_encode([
  ["name" => "Capitan America"],
  ["name" => "Iron Man"]
]);

?>
