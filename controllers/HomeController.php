<?php
class HomeController{
    public $action;
    public function __construct($action){
        $this->action = $action;
    }
    public function index(){
        include_once 'models/homeModel.php';
        $homeModel = new HomeModel();
        switch ($this->action) {
            case 'value':
                # code...
                break;
            
            default: // return array
                # code...
                break;
        }
        $monitorList = $homeModel->getAllMonitors();
        $brandList = $homeModel->getAll('brand');
        include_once 'views/home.php';
    }
}