<?php
class AdminBillController {
    public $action;
    public $username;
    public $price;
    public $priceFrom;
    public $priceTo;
    public $dayFrom;
    public $monthFrom;
    public $yearFrom;
    public $dayEnd;
    public $monthEnd;
    public $yearEnd;
    public $hourFrom;
    public $minuteFrom;
    public $hourTo;
    public $minuteTo;
    public $phone;
    public $status;
    public function __construct($action, $username, $price, $priceFrom, $priceTo, $dayFrom, $monthFrom, $yearFrom, $dayEnd, $monthEnd, $yearEnd, $hourFrom, $minuteFrom, $hourTo, $minuteTo, $phone, $status) {
        $this->action = $action;
        $this->username = $username;
        $this->price = $price;
        $this->priceFrom = $priceFrom;
        $this->priceTo = $priceTo;
        $this->dayFrom = $dayFrom;
        $this->monthFrom = $monthFrom;
        $this->yearFrom = $yearFrom;
        $this->dayEnd = $dayEnd;
        $this->monthEnd = $monthEnd;
        $this->yearEnd = $yearEnd;
        $this->hourFrom = $hourFrom;
        $this->minuteFrom = $minuteFrom;
        $this->hourTo = $hourTo;
        $this->minuteTo = $minuteTo;
        $this->phone = $phone;
        $this->status = $status;
    }
    public function index() {
        include_once'models/adminBillModel.php';
        $adminBillModel = new AdminBillModel();
        switch ($this->action) {
            case 'filter':
                $listNeed = [];
                $priceFrom = 0;
                $priceTo = 0;
                $isChooseZero = false;
                if($this->username != '') {
                    $listNeed = [...$listNeed, 'name' => $this->username];
                }
                if($this->phone != '') {
                    $listNeed = [...$listNeed, 'phone' => $this->phone];
                }
                if($this->status != '') {
                    $listNeed = [...$listNeed, 'status' => $this->status];
                }
                // check price option: 1: 0 - 10tr, 2: 10tr - 50tr, 3: 50tr - 100tr
                switch ($this->price) {
                    case '1':
                        $priceFrom = 0;
                        $priceTo = 10000000;
                        $isChooseZero = true;
                        break;
                    case '2':
                        $priceFrom = 10000000;
                        $priceTo = 50000000;
                        break;
                    case '3':
                        $priceFrom = 50000000;
                        $priceTo = 100000000;
                        break;
                    default:
                        $priceFrom = 0;
                        $priceTo = 0;
                        break;
                }
                if($this->priceFrom != 0 && $this->priceFrom != ''){
                    if($priceFrom > 0){
                        if($priceFrom > $this->priceFrom){
                            $priceFrom = $this->priceFrom;
                        }
                    }else{
                        if($isChooseZero){
                            $priceFrom = 0;
                        }else{
                            $priceFrom = $this->priceFrom;
                        }
                    }
                }
                if($this->priceTo != 0 && $this->priceTo != ''){
                    if($this->priceTo > $priceTo){
                        $priceTo = $this->priceTo;
                    }
                }
                if($priceFrom != 0){
                    $listNeed = [...$listNeed, 'priceFrom' => $priceFrom];
                }
                if($priceTo != 0){
                    $listNeed = [...$listNeed, 'priceTo' => $priceTo];
                }

                // date from
                if($this->dayFrom != ''){
                    $listNeed = [...$listNeed, 'dayFrom' => $this->dayFrom];
                }
                if($this->monthFrom != ''){
                    $listNeed = [...$listNeed, 'monthFrom' => $this->monthFrom];
                }
                if($this->yearFrom != ''){
                    $listNeed = [...$listNeed, 'yearFrom' => $this->yearFrom];
                }

                // date to
                if($this->dayEnd != ''){
                    $listNeed = [...$listNeed, 'dayEnd' => $this->dayEnd];
                }
                if($this->monthEnd != ''){
                    $listNeed = [...$listNeed, 'monthEnd' => $this->monthEnd];
                }
                if($this->yearEnd != ''){
                    $listNeed = [...$listNeed, 'yearEnd' => $this->yearEnd];
                }

                // time from
                if($this->hourFrom != ''){
                    $listNeed = [...$listNeed, 'hourFrom' => $this->hourFrom];
                }
                if($this->minuteFrom != ''){
                    $listNeed = [...$listNeed, 'minuteFrom' => $this->minuteFrom];
                }

                // time to
                if($this->hourTo != ''){
                    $listNeed = [...$listNeed, 'hourTo' => $this->hourTo];
                }
                if($this->minuteTo != ''){
                    $listNeed = [...$listNeed, 'minuteTo' => $this->minuteTo];
                }


                $listBill = $adminBillModel->filterBill($listNeed);
                // $listBill = $adminBillModel->getBillWithUser();
                break;
            
            default: // report
                $listBill = $adminBillModel->getBillWithUser();
                break;
        }
        include_once 'views/adminBill.php';
    }
}