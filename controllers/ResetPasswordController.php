<?php
class ResetPasswordController
{
    public $action;
    public $password;
    public $email;
    public function __construct($action, $password, $email)
    {
        $this->action = $action;
        $this->password = $password;
        $this->email = $email;
    }

    public function index()
    {
        include_once 'models/resetPasswordModel.php';
        $resetPasswordModel = new ResetPasswordModel();
        switch ($this->action) {
            case 'changePassword':
                $resetPasswordModel->resetPassword($this->email, $this->password);
                $header = "
                    <script>
                        window.location.href = 'http://localhost:8080/duan1-n15/index.php?page=login&email=$this->email';
                    </script>
                ";
                break;

            default:
                # code...
                break;
        }
        include_once 'views/resetPassword.php';
    }
}
