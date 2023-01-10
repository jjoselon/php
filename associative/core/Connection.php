<?php
namespace Core;

class Connection {

    public function connect() {
      $con = mysqli_connect("clase2022.myscriptcase.com", "clasemys_proyecto4_admin", "Colombia2022.", "clasemys_proyecto4");
      mysqli_query($con, "SET NAMES utf8");
      return $con;
    }

}
?>
