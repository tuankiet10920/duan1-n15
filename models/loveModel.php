<?php
class LoveModel
{
    public function getLoveList($idUser)
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "select monitor.* from love inner join monitor on love.id_monitor = monitor.id_monitor where id_user = :id;";
        return $data->selectWithId($sql, $idUser);
    }

    public function deleteLoveMonitor($idUser, $idMonitor)
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $sql = "delete from love where id_monitor = :id_monitor and id_user = :id_user;";
        $stmt = $data->conn->prepare($sql);
        // bindParam
        $stmt->bindParam(":id_monitor", $idMonitor);
        $stmt->bindParam(":id_user", $idUser);
        $stmt->execute();
        $data->conn = null; // đóng kết nối database
    }
}
