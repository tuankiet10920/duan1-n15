<?php
session_start();
include_once "views/header.php";
include_once 'public/helper/debug.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$page = isset($_GET['page']) ? $_GET['page'] : '';

switch ($page) {
    case 'detail':
        $id = $qty = $idUser = $price = '';
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        if(isset($_POST['buyNow'])){
            $qty = $_POST['qty'];
            $idUser = $_GET['idUser'];
            $action = $_GET['action'];
            $price = $_GET['price'];
        }
        include_once 'controllers/DetailController.php';
        $detailController = new DetailController($action, $id, $qty, $price, $idUser);
        $detailController->index();
        break;
    case 'cart':
        $id = $id_user = $type = $voucherCode = '';
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        if(isset($_SESSION['user'])){
            test_array($_SESSION['user']);
            $id_user = $_SESSION['user']['id'];
            $action = 'check';
        }
        if(isset($_GET['action']) && $_GET['action'] === 'delete'){
            $id = $_GET['id'];
            $action = $_GET['action'];
            $id_user = $_SESSION['user']['id'];
        }
        if(isset($_GET['action']) && $_GET['action'] === 'updateQty'){
            $id = $_GET['id'];
            $action = $_GET['action'];
            $id_user = $_SESSION['user']['id'];
            $type = $_GET['type'];
        }
        if(isset($_POST['addVoucher'])){
            $id = $_GET['id'];
            $action = $_GET['action'];
            $voucherCode = $_POST['voucherCode'];
        }
        include_once 'controllers/CartController.php';
        $cartController = new CartController($action, $id, $id_user, $type, $voucherCode);
        $cartController->index();
        break;
    case 'products':
        $id = $brand = $solution = $size = $priceFrom = $priceTo = '';
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        if(isset($_POST['filter'])){
            $brand = isset($_POST['brand'])? $_POST['brand'] : '';
            $screen_solution = isset($_POST['solution'])? $_POST['solution'] : '';
            $size = isset($_POST['size'])? $_POST['size'] : '';
            $priceFrom = isset($_POST['priceFrom'])? $_POST['priceFrom'] : '';
            $priceTo = isset($_POST['priceTo'])? $_POST['priceTo'] : '';
            $action = isset($_GET['action']) ? $_GET['action'] : '';
        }
        include_once 'controllers/ProductsController.php';
        $productController = new ProductsController($action, $id, $brand, $solution, $size, $priceFrom, $priceTo);
        $productController->index();
        break;
    case 'signup':
        $name = $email = $phone = $password = $passwordConfirm = '';
        if(isset($_POST['signup'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['email'];
            $password = $_POST['password'];
            $passwordConfirm = $_POST['passwordConfirm'];
            if($name !== '' && $email !== '' && $phone !== '' && $password !== '' && $passwordConfirm !== ''){
                if($password === $passwordConfirm){
                    $action = $_GET['action'];
                }else{
                    $action = '';
                }
            }else{
                $action = '';
            }
        }
        include_once 'controllers/SignupController.php';
        $signupController = new SignupController($action, $name, $email, $phone, $password);
        $signupController->index();
        break;
    case "login":
        $email = $password = '';
        if(isset($_POST['login'])){
            if($_POST['email'] !== '' && $_POST['password'] !== ''){
                $email = $_POST['email'];
                $password = $_POST['password'];
                $action = $_GET['action'];
            }else{
                $action = '';
            }
        }
        include_once 'controllers/LoginController.php';
        $loginController = new LoginController($action, $email, $password);
        $loginController->index();
        break;
    default: // home // HomeController
        include_once 'controllers/HomeController.php';
        $homeController = new HomeController($action);
        $homeController->index();
        break;
}

include_once "views/footer.php";