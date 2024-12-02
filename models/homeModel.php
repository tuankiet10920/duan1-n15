<?php
class HomeModel
{
    private $listMonitor;
    public function getAll($table)
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "select * from $table;";
        return $data->selectall($sql);
    }

    public function getAllMonitors()
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "select id_monitor, monitor.name, price, type_screen, response_time, in_stock, gurantee, size, describe_monitor, status, brand.name as brand_name, color_space.name as color_space_name, base_plate.name as base_plate_name, screen_solution.name as screen_solution_name ,number_number, scan_frequency.number from monitor 
        inner join brand on monitor.brand = brand.id_brand
        inner join color_space on monitor.color_space = color_space.id_color_space
        inner join base_plate on monitor.base_plate = base_plate.id_base_plate
        inner join screen_solution on monitor.screen_solution = screen_solution.id_screen_solution
        inner join scan_frequency on monitor.scan_frequency = scan_frequency.id_scan_frequency limit 4;";
        $listAllMonitors = $data->selectall($sql);
        $newArray = [];
        foreach ($listAllMonitors as $key => $monitor) {
            $newArray = [...$newArray, $monitor['id_monitor']];
        }
        $this->listMonitor = $newArray;
        return $listAllMonitors;
    }

    public function getAllFavorite($idUser)
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "select * from love where id_user = :id;";
        return $data->selectWithId($sql, $idUser);
    }

    public function getAllImageMonitors()
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $images = [];
        foreach ($this->listMonitor as $key => $idMonitor) {
            $sql = "select * from images where id_monitor = :id;";
            $image = $data->selectWithId($sql, $idMonitor);
            $images = [...$images, $image[0]];
        }
        return $images;
    }

    public function deleteFavoriteMonitor($idUser, $idMonitor)
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $sql = "delete from love where id_user = :id_user and id_monitor = :id_monitor;";
        $stmt = $data->conn->prepare($sql);
        // bindParam
        $stmt->bindParam(":id_user", $idUser);
        $stmt->bindParam(":id_monitor", $idMonitor);
        $stmt->execute();
        $data->conn = null; // đóng kết nối database
    }

    public function addFavoriteMonitor($idUser, $idMonitor){
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "insert into love values (null, $idUser, $idMonitor)";
        $data->add($sql);
    }
}
