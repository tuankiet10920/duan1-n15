<?php
class AccountModel {
    public function getInformationUser($idUser){
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "select * from user where id_user = :id";
        return $data->selectWithId($sql, $idUser);
    }
}