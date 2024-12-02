<?php
class ForgotModel {
    public function checkEmail($email){
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "select email from user where email = '$email';";
        return $data->selectall($sql);
    }
}