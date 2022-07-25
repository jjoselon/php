<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://raw.githubusercontent.com/jjoselon/cURL/master/JavaScript/heroes.json');
# Si CURLOPT_RETURNTRANSFER se establece a false o no se pone, `curl_exec()` imprimira el resultado de la petición sin más
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_REFERER, 'http://php.net/manual/es/function.curl-setopt.php');
$data_response = curl_exec($ch);
curl_close($ch); // Cerramos la conexión!!
//echo $data_response;

// var_dump($data_response); // string JSON

// convert JSON string to object php 
$someObject = json_decode($data_response);
//var_dump($someObject);
$someArray = json_decode($data_response, true);
//var_dump($someArray);

echo "Squad Name" . $someObject->squadName . "<br>";

echo "Members of the squad <br>";

echo "<table border=1>";
echo "<tr>";
echo "<th>Name</th><th>Age</th><th>Secret identity</th><th>powers</th>";
echo "</tr>";
foreach ($someObject->members as $member_detail) {
    echo "<tr>";
    echo "<td>$member_detail->name</td><td>$member_detail->age</td><td>$member_detail->secretIdentity</td>";
    echo "<td><ul>";
    foreach ($member_detail->powers as $power_detail) {
        echo "<li>$power_detail</li>";
    }
    echo "</ul></td>";
    echo "</tr>";
}
echo "</table>";
