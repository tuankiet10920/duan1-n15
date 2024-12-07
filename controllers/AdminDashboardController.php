<?php
class AdminDashboardController {
    public $action;
    public function __construct($action) {
        $this->action = $action;
    }
    public function index() {
        include_once 'models/adminDashboardModel.php';
        $adminDashboardModel = new AdminDashboardModel();
        switch ($this->action) {
            case 'value':
                # code...
                break;
            
            default: // review
                # code...
                break;
        }
        $countAll = $adminDashboardModel->getCountAll();
        $billsAndUsers = $adminDashboardModel->getLastestBillsAndUsers();
        include_once 'views/adminDashboard.php';
    }
}