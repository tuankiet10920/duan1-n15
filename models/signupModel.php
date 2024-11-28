<?php
class SignupModel {
    public function createUser($name, $email, $phone, $password){
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "insert into user values
        (null, '$name', '$phone', null, null, '$email', '$password', null, null, 0);";
        $data->add($sql);
    }
}