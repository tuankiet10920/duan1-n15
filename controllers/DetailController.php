<?php
class DetailController {
    public $action;
    public $id;
    public function __construct($action, $id){
        $this->action = $action;
        $this->id = $id;
    }

    public function index(){
        include_once 'models/detailModel.php';
        $homeModel = new HomeModel();
        switch ($this->action) {
            case 'value':
                # code...
                break;
            
            default: // return array
                # code...
                break;
        }
        $monitor = $homeModel->getMonitorWithId($this->id);
        include_once 'views/detail.php';
    }
}