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
                    if($userExist[0]['status'] === 0){
                        $_SESSION['user'] = [
                            'id' => $userExist[0]['id_user'],
                            'name' => $userExist[0]['name']
                        ];
                        $reload = '
                            <script>
                                window.location.href="http://localhost:8080/duan1-n15/index.php";
                            </script>
                        ';
                    }else{
                        $_SESSION['admin'] = [
                            'id' => $userExist[0]['id_user'],
                            'name' => $userExist[0]['name']
                        ];
                        $reload = '
                            <script>
                                window.location.href="http://localhost:8080/duan1-n15/index.php?page=admin";
                            </script>
                        ';
                    }
                    
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
            case 'logoutAdmin':
                $reload = '
                    <script>
                        window.location.href="http://localhost:8080/duan1-n15/index.php?page=login";
                    </script>
                ';
                unset($_SESSION['admin']);
                break;
            default:
                # code...
                break;
        }
        include_once 'views/login.php';
    }
}