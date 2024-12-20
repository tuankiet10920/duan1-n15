<?php
session_start();
require_once('mailer/Exception.php');
require_once('mailer/PHPMailer.php');
require_once('mailer/SMTP.php');
include_once 'public/helper/debug.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$page = isset($_GET['page']) ? $_GET['page'] : '';

// middleware
if(!isset($_SESSION['admin'])){
    if(isset($_SESSION['user'])){
        if($page === 'admin'){
            $page = 'login';
        }
    }else{
        if(!isset($_SESSION['admin'])){
            if($page === 'admin'){
                $page = 'login';
            }
        }
    }
}



if($page !== 'admin' && $page !== 'getMonitor'){
    include_once "views/header.php";
}



if(isset($_SESSION['otp'])){
    $timeLife = 120;
    $timeCurrentOtp = $_SESSION['otp']['startTime'] + $timeLife;
    if(time() > $timeCurrentOtp){
        unset($_SESSION['otp']);
    }
}

switch ($page) {
    case 'detail':
        $id = $qty = $idUser = $price = $comment = $idCommentParent = '';
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        if(isset($_POST['buyNow'])){
            $qty = $_POST['qty'];
            $idUser = $_GET['idUser'];
            $action = $_GET['action'];
            $price = $_GET['price'];
        }
        if(isset($_POST['sendComment'])){
            if(isset($_SESSION['user']['id'])){
                $action = $_GET['action'];
                $id = $_GET['id'];
                $comment = $_POST['commentContent'];
                $idUser = $_SESSION['user']['id'];
            }else{
                $action = 'noUser';
            }
            
        }
        if(isset($_POST['sendCommentChild'])){
            if(isset($_SESSION['user']['id'])){
                // $action = $_GET['action'];
                $id = $_GET['id'];
                $comment = $_POST['contentCommentChild'];
                $idCommentParent = $_GET['idUser'];
                $idUser = $_SESSION['user']['id'];
            }else{
                $action = 'noUser';
            }
        }
        include_once 'controllers/DetailController.php';
        $detailController = new DetailController($action, $id, $qty, $price, $idUser, $comment, $idCommentParent);
        $detailController->index();
        break;
    case 'cart':
        $id = $id_user = $type = $voucherCode = '';
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        if(isset($_SESSION['user'])){
            // test_array($_SESSION['user']);
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
        $id = $brand = $solution = $size = $priceFrom = $priceTo = $idUser = '';
        if(isset($_SESSION['user'])){
            $idUser = $_SESSION['user']['id'];
        }
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
        if(isset($_GET['action']) && $_GET['action'] === 'addLoving'){
            if(!isset($_SESSION['user']['id'])){
                $action = '';
            }else{
                $action = $_GET['action'];
                $id = $_GET['id'];
            }
        }
        if(isset($_GET['action']) && $_GET['action'] === 'deleteLoving'){
            $action = $_GET['action'];
            $id = $_GET['id'];
        }
        if(isset($_GET['action']) && $_GET['action'] === 'deleteLoving'){
            $action = $_GET['action'];
            $id = $_GET['id'];
        }
        include_once 'controllers/ProductsController.php';
        $productController = new ProductsController($action, $id, $brand, $solution, $size, $priceFrom, $priceTo, $idUser);
        $productController->index();
        break;
    case 'signup':
        $name = $email = $phone = $password = $passwordConfirm = '';
        if(isset($_POST['signup'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
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
        if(isset($_GET['action']) && $_GET['action'] === 'logoutAdmin'){
            $action = $_GET['action'];
        }
        include_once 'controllers/LoginController.php';
        $loginController = new LoginController($action, $email, $password);
        $loginController->index();
        break;
    case 'pay':
        $idUser = $subtotal = $idBill = '';
        if(isset($_SESSION['user'])){
            $idUser = $_SESSION['user']['id'];
        }
        if(isset($_POST['order'])){
            $action = $_GET['action'];
            $idUser = $_SESSION['user']['id'];
            $subtotal = $_POST['subtotal'];
            $idBill = $_GET['idBill'];
        }
        include_once 'controllers/PayController.php';
        $payController = new PayController($action, $idUser, $subtotal, $idBill);
        $payController->index();
        break;
    case 'forgot':
        $email = '';
        if(isset($_POST['forgot'])){
            $email = $_POST['email'];
            $action = $_GET['action'];
        }
        include_once 'controllers/ForgotController.php';
        $forgotController = new ForgotController($action, $email);
        $forgotController->index();
        break;
    case 'otp':
        $otp = $email = '';
        if(isset($_POST['checkOtp'])){
            $otp = $_POST['otp1'] . $_POST['otp2'] . $_POST['otp3'] . $_POST['otp4'] . $_POST['otp5'] . $_POST['otp6'];
            $action = $_GET['action'];
            $email = $_GET['email'];
        }
        include_once 'controllers/OtpController.php';
        $otpController = new OtpController($action, $otp, $email);
        $otpController->index();
        break;
    case 'resetPassword':
        $password = $email = '';
        if(isset($_POST['resetPassword'])){
            if($_POST['newPassword'] === $_POST['newPasswordConfirm']){
                $password = $_POST['newPassword'];
                $action = $_GET['action'];
                $email = $_GET['email'];
            }else{
                $action = '';
                $error = 'Mật khẩu nhập lại không trùng khớp! Vui lòng kiểm tra lại!';
            }
        }
        include_once 'controllers/ResetPasswordController.php';
        $resetPasswordController = new ResetPasswordController($action, $password, $email);
        $resetPasswordController->index();
        break;
    case 'account':
        $content = isset($_GET['content']) ? $_GET['content'] : '';
        if(isset($_SESSION['user'])){
            include_once 'models/connectModel.php';
            $data = new ConnectModel();
            $data->ketnoi();
            $sql = "select * from user where id_user = :id;";
            $stmt = $data->conn->prepare($sql);
            // bindParam
            $stmt->bindParam(":id", $_SESSION['user']['id']);
            $stmt->execute();
            $kq = $stmt->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC : chuyển dl mãng lk
            $data->conn = null; // đóng kết nối database
            $image = $kq[0]['image'];
            $nameUser = $kq[0]['name']; // biến này chứa mãng các dòng dữ liệu trả về.
        }
        $imageFront = 'acc-clone.jpg';
        if($image !== null){
            $imageFront = $image;
        }
        $leftSide = '
            <div class="container">
                <div class="user_side">
                    <div class="sidebar">
                        <div class="profile">
                            <div class="avatar">
                                <img class="image-acc-clone" src="public/img/'. $imageFront .'" alt="">
                            </div>
                            <p class="name">'. $nameUser .'</p>
                        </div>
                        <ul class="menu">
                            <li><a href="index.php?page=account"><span class="fa-solid fa-user"></span> Thông tin tài khoản</a></li>
                            <li><a href="#"><span class="fa-solid fa-address-book"></i></span> Địa chỉ</a></li>
                            <li><a href="#"><span class="fa-brands fa-product-hunt"></span> Quản lý hóa đơn</a></li>
                            <li><a href="index.php?page=account&content=love"><span class="fa-solid fa-heart"></span> Sản phẩm yêu thích</a></li>
                            <li><a href="#"><span class="fa-solid fa-right-from-bracket"></span> Đăng xuất</a></li>
                        </ul>
                    </div>
        ';
        // left
        echo $leftSide;

        // main
        switch ($content) {
            // this page includes all of favorite products of user
            case 'love':
                $idUser = $action = $idMonitor = '';
                if(isset($_SESSION['user'])){
                    $idUser = $_SESSION['user']['id'];
                }
                if(isset($_GET['action']) && $_GET['action'] === 'deleteLoving'){
                    $action = $_GET['action'];
                    $idUser = $_SESSION['user']['id'];
                    $idMonitor = $_GET['id'];
                }
                include_once 'controllers/LoveController.php';
                $loveController = new LoveController($idUser, $action, $idMonitor);
                $loveController->index();
                break;
            
            default: // dashboard information user account
                $idUser = $name = $nickName = $gender = $image = $phone = $email = $address = $birthday = '';
                if(isset($_SESSION['user'])){
                    $idUser = $_SESSION['user']['id'];
                }
                if(isset($_POST['saveChangeAccount'])){
                    $idUser = $_SESSION['user']['id'];
                    $name = $_POST['name'];
                    if($_POST['nickName'] === 'Vui lòng nhập' || $_POST['nickName'] === ''){
                        $nickName = null;
                    }else{
                        $nickName = $_POST['nickName'];
                    }
                    if($_POST['address'] === 'Vui lòng nhập' || $_POST['address'] === ''){
                        $address = null;
                    }else{
                        $address = $_POST['address'];
                    }
                    if(isset($_POST['gender'])){
                        $gender = $_POST['gender'];
                    }else{
                        $gender = null;
                    }
                    $phone = $_POST['phone'];
                    $email = $_POST['email'];
                    if($_POST['year'] === '' || $_POST['day'] === '' || $_POST['month'] === ''){
                        $birthday = null;
                    }else{
                        $arrDay = array($_POST['year'], $_POST['month'], $_POST['day']);
                        $birthday = implode("-", $arrDay);
                    }
                    if(isset($_FILES['image']) && $_FILES['image']['name'] !== ''){
                        $image = $_FILES['image'];
                    }else{
                        $image = 'acc-clone.jpg';
                    }
                }
                include_once 'controllers/accountController.php';
                $accountController = new AccountController($action, $idUser, $name, $nickName, $gender, $image, $phone, $email, $address, $birthday);
                $accountController->index();
                break;
        }
        break;
    case 'admin':
        include_once 'views/headerAdmin.php';

        $content = isset($_GET['content']) ? $_GET['content'] : '';

        switch ($content) {
            case 'monitor':
                $id = $name = $price =  $typeScreen = $responseTime = $inStock = $gurantee = $size = $status = $brand = $colorSpace = $basePlate = $screenSolution = $scanFrequency = $descibe = $images = '';
                if(isset($_GET['action']) && $_GET['action'] == 'delete'){
                    $action = $_GET['action'];
                    $id = $_GET['id'];
                }
                if(isset($_POST['addMonitor'])){
                    $action = $_GET['action'];
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $typeScreen = $_POST['typeScreen'];
                    $responseTime = $_POST['responseTime'];
                    $inStock = $_POST['instock'];
                    $gurantee = $_POST['gurantee'];
                    // , $name, $price, $typeScreen, $responseTime, $inStock, $gurantee, $size, $status, $brand, $colorSpace, $basePlate, $screenSolution, $scanFrequency, $descibe, $images
                    $size = $_POST['size'];
                    $status = $_POST['status'];
                    $brand = $_POST['brands'];
                    $colorSpace = $_POST['colorSpace'];
                    $basePlate = $_POST['basePlate'];
                    $screenSolution = $_POST['screenSolution'];
                    $scanFrequency = $_POST['scanFrequency'];
                    $descibe = $_POST['descibe'];
                    $images = [];
                    if(isset($_FILES['images1']) && $_FILES['images1']['error'] === 0){
                        $images = [...$images, 0 => $_FILES['images1']];
                    }
                    if(isset($_FILES['images2']) && $_FILES['images2']['error'] === 0){
                        $images = [...$images, 1 => $_FILES['images2']];
                    }
                    if(isset($_FILES['images3']) && $_FILES['images3']['error'] === 0){
                        $images = [...$images, 2 => $_FILES['images3']];
                    }
                }
                if(isset($_GET['action']) && $_GET['action'] === 'getMonitor'){
                    $action = $_GET['action'];
                    $id = $_GET['id'];
                }
                if(isset($_GET['action']) && $_GET['action'] === 'edit'){
                    $action = $_GET['action'];
                    $id = $_GET['id'];
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $typeScreen = $_POST['typeScreen'];
                    $responseTime = $_POST['responseTime'];
                    $inStock = $_POST['instock'];
                    $gurantee = $_POST['gurantee'];
                    $size = $_POST['size'];
                    $status = $_POST['status'];
                    $brand = $_POST['brands'];
                    $colorSpace = $_POST['colorSpace'];
                    $basePlate = $_POST['basePlate'];
                    $screenSolution = $_POST['screenSolution'];
                    $scanFrequency = $_POST['scanFrequency'];
                    $descibe = $_POST['descibe'];
                    $images = [];
                    if(isset($_FILES['images1']) && $_FILES['images1']['error'] === 0){
                        $images = [...$images, 0 => $_FILES['images1']];
                    }
                    if(isset($_FILES['images2']) && $_FILES['images2']['error'] === 0){
                        $images = [...$images, 1 => $_FILES['images2']];
                    }
                    if(isset($_FILES['images3']) && $_FILES['images3']['error'] === 0){
                        $images = [...$images, 2 => $_FILES['images3']];
                    }
                }
                include_once 'controllers/AdminMonitorController.php';
                $adminMonitorController = new AdminMonitorController($action, $id, $name, $price, $typeScreen, $responseTime, $inStock, $gurantee, $size, $status, $brand, $colorSpace, $basePlate, $screenSolution, $scanFrequency, $descibe, $images);
                $adminMonitorController->index();
                break;
            case 'bill':
                $username = $price = $priceFrom = $priceTo = $dayFrom = $monthFrom = $yearFrom = $dayEnd = $monthEnd = $yearEnd = $hourFrom = $minuteFrom = $hourTo = $minuteTo = $phone = $status = '';
                if(isset($_POST['filter'])){
                    $action = $_GET['action'];
                    $username = $_POST['username'];
                    $price = $_POST['price'];
                    $priceFrom = $_POST['priceFrom'];
                    $priceTo = $_POST['priceTo'];
                    $dayFrom = $_POST['dayFrom'];
                    $monthFrom = $_POST['monthFrom'];
                    $yearFrom = $_POST['yearFrom'];
                    $dayEnd = $_POST['dayEnd'];
                    $monthEnd = $_POST['monthEnd'];
                    $yearEnd = $_POST['yearEnd'];
                    $hourFrom = $_POST['hourFrom'];
                    $minuteFrom = $_POST['minuteFrom'];
                    $hourTo = $_POST['hourTo'];
                    $minuteTo = $_POST['minuteTo'];
                    $phone = $_POST['phone'];
                    $status = $_POST['status'];
                }
                include_once 'controllers/AdminBillController.php';
                $adminBillController = new AdminBillController($action, $username, $price, $priceFrom, $priceTo, $dayFrom, $monthFrom, $yearFrom, $dayEnd, $monthEnd, $yearEnd, $hourFrom, $minuteFrom, $hourTo, $minuteTo, $phone, $status);
                $adminBillController->index();
                break;
            default: // dashboard admin
                include_once 'controllers/AdminDashboardController.php';
                $adminDashboardController = new AdminDashboardController($action);
                $adminDashboardController->index();
                break;
        }

        include_once 'views/footerAdmin.php';
        break;
    case 'getMonitor':
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $findKey = $_GET['findKey'];
        $data->ketnoi();
        $sql = "select distinct images.path as path_image, images.name as name_image, monitor.name as name_monitor, monitor.id_monitor from images inner join monitor
        on images.id_monitor = monitor.id_monitor
        group by images.id_monitor having monitor.name like :findKey;";
        $stmt = $data->conn->prepare($sql); 
        // bindParam
        $stmt->bindValue(":findKey", "%$findKey%");
        $stmt->execute();
        $listMonitorFind = $stmt->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC : chuyển dl mãng lk
        $data->conn = null; // đóng kết nối database
        include_once 'views/getMonitor.php';
        break;
    default: // home // HomeController
        $idUser = $idMonitor = '';
        if(isset($_SESSION['user'])){
            $idUser = $_SESSION['user']['id'];
        }
        if(isset($_GET['action']) && $_GET['action'] === 'addLoving'){
            $action = $_GET['action'];
            $idUser = $_SESSION['user']['id'];
            $idMonitor = $_GET['id'];
        }
        if(isset($_GET['action']) && $_GET['action'] === 'deleteLoving'){
            $action = $_GET['action'];
            $idUser = $_SESSION['user']['id'];
            $idMonitor = $_GET['id'];
        }
        include_once 'controllers/HomeController.php';
        $homeController = new HomeController($action, $idUser, $idMonitor);
        $homeController->index();
        break;
}

if($page !== 'admin' && $page !== 'getMonitor'){
    include_once "views/footer.php";
}