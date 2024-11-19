<?php
include_once "views/header.php";
include_once 'public/helper/debug.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$page = isset($_GET['page']) ? $_GET['page'] : '';

switch ($page) {
    case 'detail':
        $id = '';
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        include_once 'controllers/DetailController.php';
        $detailController = new DetailController($action, $id);
        $detailController->index();
        break;
    
    default: // home // HomeController
        include_once 'controllers/HomeController.php';
        $homeController = new HomeController($action);
        $homeController->index();
        break;
}

include_once "views/footer.php";