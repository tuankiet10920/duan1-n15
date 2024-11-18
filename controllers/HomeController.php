<?php
class HomeController{
    public $action;
    public function __construct($action){
        $this->action = $action;
    }
    public function index(){
        // include_once 'models/homeModel.php';
        // $homeModel = new HomeModel();
        switch ($this->action) {
            case 'value':
                # code...
                break;
            
            default: // return array
                # code...
                break;
        }
        // $productList = $homeModel->getAll('monitor');
        include_once 'views/home.php';
    }
}