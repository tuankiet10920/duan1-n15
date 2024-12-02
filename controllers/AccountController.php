<?php
class AccountController {
    public $action;
    public $idUser;
    public function __construct($action, $idUser){
        $this->action = $action;
        $this->idUser = $idUser;
    }
    public function index(){
        include_once 'models/accountModel.php';
        $accountModel = new AccountModel();
        switch ($this->action) {
            case 'value':
                # code...
                break;
            
            default: // get all information of user
                $informationOfUser = $accountModel->getInformationUser($this->idUser);
                break;
        }
        include_once 'views/account.php';
    }
}