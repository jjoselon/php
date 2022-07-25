<?php

$link = mysqli_connect("localhost", "root", "12345");

# UPDATE : Actualizar solo una para de la celda con REPLACE()
if(!mysqli_query($link, "UPDATE `[DB]`.`TABLE` SET `field_name` = REPLACE(`field_name`, 'from', 'to') WHERE `field_name` LIKE '%{$pattern}%'")) {
  echo mysqli_error($oSQLLink01);
}
