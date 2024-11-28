<?php 
class LoginController {
    public $action;
    public $email;
    public $password;
    public function __construct($action, $email, $password){
        $this->action = $action;
        $this->email = $email;
        $this->password = $password;
    }
    public function index(){
        include_once 'models/loginModel.php';
        $loginModel = new LoginModel();
        switch ($this->action) {
            case 'check':
                $userExist = $loginModel->checkAccount($this->email, $this->password);
                if(count($userExist) === 0){
                    $error = 'Login failed, please check your email address or password and try again!';
                }else{
                    $_SESSION['user'] = [
                        'id' => $userExist[0]['id_user'],
                        'name' => $userExist[0]['name']
                    ];
                    header('location: index.php');
                }
                break;
            case 'logout':
                $reload = '
                    <script>
                        window.location.href="http://localhost:8080/duan1-n15/index.php?page=login";
                    </script>
                ';
                unset($_SESSION['user']);
                break;
            default:
                # code...
                break;
        }
        include_once 'views/login.php';
    }
}