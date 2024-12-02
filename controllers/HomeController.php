<?php
class HomeController{
    public $action;
    public $idUser;
    public $idMonitor;
    public function __construct($action, $idUser, $idMonitor){
        $this->action = $action;
        $this->idUser = $idUser;
        $this->idMonitor = $idMonitor;
    }
    public function index(){
        include_once 'models/homeModel.php';
        $homeModel = new HomeModel();
        switch ($this->action) {
            case 'deleteLoving':
                $homeModel->deleteFavoriteMonitor($this->idUser, $this->idMonitor);
                break;
            case 'addLoving':
                $homeModel->addFavoriteMonitor($this->idUser, $this->idMonitor);
                break;
            default: // return array
                # code...
                break;
        }
        $monitorList = $homeModel->getAllMonitors();
        $brandList = $homeModel->getAll('brand');
        // favorite list monitors
        $loveList = $homeModel->getAllFavorite($this->idUser);
        // list images monitors
        $listImages = $homeModel->getAllImageMonitors();
        include_once 'views/home.php';
    }
}