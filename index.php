<?php
include_once "views/header.php";

$action = isset($_GET['action']) ? $_GET['action'] : '';
$page = isset($_GET['page']) ? $_GET['page'] : '';

switch ($page) {
    case 'value':
        # code...
        break;
    
    default: // home // HomeController
        include_once 'controllers/HomeController.php';
        $homeController = new HomeController($action);
        $homeController->index();
        break;
}

include_once "views/footer.php";