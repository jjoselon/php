<?php

//Function that sends a 403 Forbidden status code to
//the client before killing the script.
function forbidden_error(){
    header("HTTP/1.0 403 Forbidden");
    echo '<h1>Permissions Denied!</h1>';
    exit;
}