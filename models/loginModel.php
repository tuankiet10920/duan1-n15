<?php
class LoginModel {
    // email va password access successful
    public function checkAccount($email, $password){
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "select * from user where email = '$email' and password = '$password';";
        return $data->selectall($sql);
    }
}