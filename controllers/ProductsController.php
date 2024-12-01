<?php
class ProductsController {
    public $action;
    public $id;
    public $brand;
    public $solution;
    public $size;
    public $priceFrom;
    public $priceTo;
    public $idUser;
    public function __construct($action, $id, $brand, $solution, $size, $priceFrom, $priceTo, $idUser){
        $this->action = $action;
        $this->id = $id;
        $this->brand = $brand;
        $this->solution = $solution;
        $this->size = $size;
        $this->priceFrom = $priceFrom;
        $this->priceTo = $priceTo;
        $this->idUser = $idUser;
    }

    public function index(){
        include_once 'models/productsModel.php';
        $productsModel = new ProductsModel();
        $loveList = $productsModel->getLoveList($this->idUser);
        switch ($this->action) {
            case 'filter':
                $array = [];
                if($this->brand !== ""){
                    $array = [...$array, 'brand' => $this->brand];
                }
                if($this->size !== ""){
                    $array = [...$array, 'size' => $this->size];
                }
                if($this->solution !== ""){
                    $array = [...$array, 'solution' => $this->solution];
                }
                if($this->priceTo !== ""){
                    $array = [...$array, 'priceFrom' => $this->priceFrom, 'priceTo' => $this->priceTo];
                }
                $monitorsFilter = $productsModel->getMonitorsFilter($array);
                break;
            case 'addLoving':
                $checkLoveMonitor = false;
                foreach ($loveList as $key => $love) {
                    if(array_search($this->id, $love)){
                        $checkLoveMonitor = true;
                        break;
                    }
                }
                if(!$checkLoveMonitor){
                    $productsModel->addLove($this->id, $this->idUser);
                }
                $loveList = $productsModel->getLoveList($this->idUser);
                $monitors = $productsModel->getMonitorList();
                break;
            case 'deleteLoving':
                $productsModel->deleteLove($this->id, $this->idUser);
                $loveList = $productsModel->getLoveList($this->idUser);
                $monitors = $productsModel->getMonitorList();
                break;
            default:
                $monitors = $productsModel->getMonitorList();
                break;
        }
        $brandList = $productsModel->getBrandList();
        $screenSolutionList = $productsModel->getScreenSolutionList();
        include_once 'views/products.php';
    }
}