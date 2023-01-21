<?php
header('Content-type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') die("");
// Si queremos mostrar un contenido JSON:
// Vamos a mostrar un JSON
/*
  $_POST es un array vacío
  array(0) {

  }
  var_dump($_POST);
/*

  // Si queremos saber los headers
  foreach (getallheaders() as $nombre => $valor) {
  echo "$nombre: $valor\n";
  }

*/

$json = file_get_contents('php://input'); // Attr data inside ajax function
$json = file_get_contents('https://raw.githubusercontent.com/jjoselon/javascript/master/heroes.json'); // external file
$data = json_decode($json, true); 

// ... aqui hacemos las respectivas validaciones de los datos entrantes

// ... y aqui devolvemos falso o verdadero según la validación
echo json_encode(["OK" => true, "data" => $data]);

?>

