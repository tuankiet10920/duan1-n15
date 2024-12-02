<?php
class AccountModel
{
    public function getInformationUser($idUser)
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "select * from user where id_user = :id";
        return $data->selectWithId($sql, $idUser);
    }

    public function updateInformationUser($idUser, $name, $nickName, $gender, $image, $phone, $email, $address, $birthday)
    {
        $infoUser = $this->getInformationUser($idUser);
        $password = $infoUser[0]['password'];
        if($infoUser[0]['image'] !== 'acc-clone.jpg' && $infoUser[0]['image'] !== null){
            if($image === 'acc-clone.jpg'){
                $image = $infoUser[0]['image'];
            }
        }
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $sql = "update user set name = '$name', phone = '$phone', image = '$image', gender = $gender, email = '$email', password = '$password', birthday = '$birthday', address = '$address', nick_name = '$nickName', status = 0 where id_user = :id_user;";
        $stmt = $data->conn->prepare($sql);
        // bindParam
        $stmt->bindParam(":id_user", $idUser);
        $stmt->execute();
        $data->conn = null; // đóng kết nối database
    }
}
