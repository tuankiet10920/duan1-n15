<?php
class LoveController {
    public $idUser;
    public $action;
    public $idMonitor;
    public function __construct($idUser, $action, $idMonitor){
        $this->idUser = $idUser;
        $this->action = $action;
        $this->idMonitor = $idMonitor;
    }
    public function index(){
        include_once 'models/loveModel.php';
        $loveModel = new LoveModel();
        switch ($this->action) {
            case 'deleteLoving':
                $loveModel->deleteLoveMonitor($this->idUser, $this->idMonitor);
                break;
            
            default:
                # code...
                break;
        }
        $loveList = $loveModel->getLoveList($this->idUser);
        include_once 'views/love.php';
    }
}