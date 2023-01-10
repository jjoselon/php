<?php
namespace Controllers;

require_once "core/ControllerBase.php";

use Core as Core;
use Models\Good;

class DashboardController extends Core\ControllerBase {

    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $this->view("DashboardIndex", []);
    }
}
?>
