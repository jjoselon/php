<?php

//Function that sends a 500 Internal Server Error status code to
//the client before killing the script.
function internal_error(){
    header($_SERVER["SERVER_PROTOCOL"] . ' 500 Internal Server Error', true, 500);
    echo '<h1>Something went wrong!</h1>';
    exit;
}