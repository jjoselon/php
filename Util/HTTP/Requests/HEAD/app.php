<?php

require 'vendor/autoload.php';

$client = new \GuzzleHttp\Client();

/*
  @see https://condor.depaul.edu/dmumaugh/readings/handouts/SE435/HTTP/node14.html
*/
// send request
$response = $client->head($_SERVER["HTTP_REFERER"] . "file.json");

// extract response headers
$headers = $response->getHeaders();


/* Last-Modified, Date are in GMT format (5 Horas por delante de la hora Colombia)*/
echo "<pre>";
var_dump($headers);
echo "</pre>";
