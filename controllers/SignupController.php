<?php
class SignupController {
    public $action;
    public $name;
    public $email;
    public $phone;
    public $password;


    public function __construct($action, $name, $email, $phone, $password){
        $this->action = $action;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->password = $password;
    }


    public function index(){
        include_once 'models/signupModel.php';
        $signupModel = new SignupModel();
        switch ($this->action) {
            case 'add':
                $signupModel->createUser($this->name, $this->email, $this->phone, $this->password);
                header('location: index.php?page=login&email=' . $this->email);
                break;
            
            default:
                # code...
                break;
        }
        include_once 'views/signup.php';
    }
}