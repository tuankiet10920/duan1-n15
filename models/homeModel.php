<?php
class HomeModel {
    public function getAll($table){
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "select * from $table;";
        return $data->selectall($sql);
    }
}