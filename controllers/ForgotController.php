<?php
class ForgotController
{
    public $action;
    public $email;
    public function __construct($action, $email)
    {
        $this->action = $action;
        $this->email = $email;
    }
    public function index()
    {
        include_once 'models/forgotModel.php';
        $forgotModel = new ForgotModel();
        switch ($this->action) {
            case 'checkEmail':
                $checkMail = $forgotModel->checkEmail($this->email);
                if (count($checkMail) > 0) {
                    $_SESSION['otp'] = [
                        'codeOTP' => rand(100000, 999999),
                        'startTime' => time()
                    ];
                    sendMail($this->email, $_SESSION['otp']['codeOTP']);
                    $header = "
                        <script>
                            window.location.href = 'http://localhost:8080/duan1-n15/index.php?page=otp&email=$this->email'
                        </script>
                    ";
                }else{
                    $error = 'Không tìm thấy email nào trùng khớp!';
                }
                break;

            default:
                # code...
                break;
        }
        include_once 'views/forgot.php';
    }
}
