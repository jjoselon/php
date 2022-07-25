<?php

class Member {
  public $username = "";
  private $loggedIn = false;

  public function login() {
    $this->loggedIn = true;
  }

  public function logout() {
    $this->loggedIn = false;
  }

  public function isLoggedIn() {
    return $this->loggedIn;
  }
}

$aArray = array("name" => "jose", "lastname" => "ramirez");
$sName = "jose ramirez";
$oMember = new Member();
$oMember->username = "jose ramirez";
$oMember->login();

$sSerialize = serialize($oMember);
print_r($sSerialize);

echo "<br/>";
$sUNSerialize = unserialize($sSerialize);
print_r($sUNSerialize);

# Forzar un array a un objeto
// $aArray = (object) array("name" => "jose", "lastname" => "ramirez");
// echo $aArray->name;

/**
 * @see https://www.elated.com/articles/object-oriented-php-autoloading-serializing-and-querying-objects/
 */
// Another useful cross-platform way to serialize object data for passing around is to convert it to a JSON string. See our JSON Basics tutorial for details.
// echo json_encode($oMember);

 ?>
