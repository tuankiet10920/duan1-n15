<?php
class DetailController {
    public $action;
    public $id;
    public $qty;
    public $price;
    public $idUser;
    public function __construct($action, $id, $qty, $price, $idUser){
        $this->action = $action;
        $this->id = $id;
        $this->qty = $qty;
        $this->price = $price;
        $this->idUser = $idUser;
    }

    public function index(){
        include_once 'models/detailModel.php';
        $detail = new DetailModel();
        switch ($this->action) {
            case 'addToCart':
                $detail->addBill($this->idUser, $this->qty, $this->price, $this->id);
                $header = "
                    <script>
                        window.location.href='http://localhost:8080/duan1-n15/index.php?page=detail&id=$this->id'
                    </script>
                ";
                break;
            
            default: // return array
                # code...
                break;
        }
        $monitor = $detail->getMonitorWithId($this->id);
        $images = $detail->getImageMonitor($this->id);
        $monitorsWithBrand = $detail->getMonitorsWithBrand($this->id);
        $imageMonitorsBrand = $detail->getImagesWithBrand($this->id);
        // $getSomething = $detail->addBill($this->idUser, $this->qty, $this->price, $this->id);
        include_once 'views/detail.php';
    }
}