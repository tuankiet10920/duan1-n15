<?php
class PayController {
    public $action;
    public $idUser;
    public function __construct($action, $idUser){
        $this->action = $action;
        $this->idUser = $idUser;
    }
    public function index(){
        include_once 'models/payModel.php';
        $payModel = new PayModel();
        switch ($this->action) {
            case 'value':
                # code...
                break;
            
            default:
                // not do anything
                break;
        }
        // get information user
        $test = $payModel->getInformationUser($this->idUser);
        // get idbill with idUser
        $test = $payModel->getBillFromUser();
        // get all bill detail with idBill
        $test = $payModel->getBillDetailFromUser();

        include_once 'views/pay.php';
    }
}