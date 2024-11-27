<?php
class CartController {
    public $action;
    public $id;
    public $idUser;
    public $type;
    public $voucherCode;

    public function __construct($action, $id, $idUser, $type, $voucherCode){
        $this->action = $action;
        $this->id = $id;
        $this->idUser = $idUser;
        $this->type = $type;
        $this->voucherCode = $voucherCode;
    }

    public function index(){
        include_once 'models/cartModel.php';
        $cartModel = new CartModel();
        switch ($this->action) {
            case 'check':
                $cartList = $cartModel->getCart($this->idUser);
                break;
            case 'delete':
                $cartModel->deleteMonitorInBill($this->id, $this->idUser);
                $cartList = $cartModel->getCart($this->idUser);
                break;
            case 'updateQty':
                $cartModel->updateQty($this->idUser, $this->id, $this->type);
                $cartList = $cartModel->getCart($this->idUser);
                break;
            case 'addVoucher':
                $code = $this->voucherCode;
                $checkVoucherCode = $cartModel->checkVoucherCode($this->id, $this->voucherCode);
                $cartList = $cartModel->getCart($this->idUser);
                break;
            default:
                break;
        }
        include_once 'views/cart.php';
    }
}