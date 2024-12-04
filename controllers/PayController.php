<?php
class PayController
{
    public $action;
    public $idUser;
    public $subtotal;
    public $idBill;
    public function __construct($action, $idUser, $subtotal, $idBill)
    {
        $this->action = $action;
        $this->idUser = $idUser;
        $this->subtotal = $subtotal;
        $this->idBill = $idBill;
    }
    public function index()
    {
        include_once 'models/payModel.php';
        $payModel = new PayModel();
        switch ($this->action) {
            case 'order':
                $payModel->order($this->subtotal, $this->idBill);
                $header = "
                    <script>
                        window.location.href = 'http://localhost:8080/duan1-n15/index.php';
                    </script>
                ";
                break;

            default:
                // not do anything
                break;
        }
        if ($this->idUser !== '') {
            // get information user
            $informationUser = $payModel->getInformationUser($this->idUser);
            // get idbill with idUser
            $idBill = $payModel->getBillFromUser();
            // get all bill detail with idBill
            $informationBillDetailAndVoucher = $payModel->getBillDetailFromUser();
            // get all monitor with images through id_monitor
            $monitorWithImages = $payModel->getListMonitorWithImages();
        }
        include_once 'views/pay.php';
    }
}
