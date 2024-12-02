<?php
class AccountController {
    public $action;
    public $idUser;
    public $name;
    public $nickName;
    public $gender;
    public $image;
    public $phone;
    public $email;
    public $address;
    public $birthday;

    public function __construct($action, $idUser, $name, $nickName, $gender, $image, $phone, $email, $address, $birthday){
        $this->action = $action;
        $this->idUser = $idUser;
        $this->name = $name;
        $this->nickName = $nickName;
        $this->gender = $gender;
        $this->image = $image;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
        $this->birthday = $birthday;
    }

    public function index(){
        include_once 'models/accountModel.php';
        $accountModel = new AccountModel();
        switch ($this->action) {
            case 'saveChange':
                if(is_array($this->image)){
                    move_uploaded_file($_FILES['image']['tmp_name'], 'public/img/'. $this->image['name']);
                    $accountModel->updateInformationUser($this->idUser, $this->name, $this->nickName, $this->gender, $this->image['name'], $this->phone, $this->email, $this->address, $this->birthday);
                }else{
                    $accountModel->updateInformationUser($this->idUser, $this->name, $this->nickName, $this->gender, $this->image, $this->phone, $this->email, $this->address, $this->birthday);
                }
                $header = "
                    <script>
                        window.location.href = 'http://localhost:8080/duan1-n15/index.php?page=account';
                    </script>
                ";
                break;
            
            default: 
                // not do anything
                break;
        }
        // get all information of user
        $informationOfUser = $accountModel->getInformationUser($this->idUser);
        include_once 'views/account.php';
    }
}