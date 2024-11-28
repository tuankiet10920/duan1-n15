<?php
class ProductsController {
    public $action;
    public $id;
    public $brand;
    public $solution;
    public $size;
    public $priceFrom;
    public $priceTo;
    public function __construct($action, $id, $brand, $solution, $size, $priceFrom, $priceTo){
        $this->action = $action;
        $this->id = $id;
        $this->brand = $brand;
        $this->solution = $solution;
        $this->size = $size;
        $this->priceFrom = $priceFrom;
        $this->priceTo = $priceTo;
    }

    public function index(){
        include_once 'models/productsModel.php';
        $productsModel = new ProductsModel();
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
            
            default:
                $monitors = $productsModel->getMonitorList();
                break;
        }
        $brandList = $productsModel->getBrandList();
        $screenSolutionList = $productsModel->getScreenSolutionList();
        include_once 'views/products.php';
    }
}