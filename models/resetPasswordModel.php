<?php 
class ResetPasswordModel {
    public function resetPassword($email, $password) {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $sql = "update user set password = '$password' where email = :email;";
        $stmt = $data->conn->prepare($sql); 
        // bindParam
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $data->conn = null; // đóng kết nối database
    }
}