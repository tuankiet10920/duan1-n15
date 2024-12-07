<?php
class DetailModel
{
    private $idBill;
    public function getMonitorWithId($id)
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "select id_monitor, monitor.name, price, type_screen, response_time, in_stock, gurantee, size, describe_monitor, status, brand.name as brand_name, color_space.name as color_space_name, base_plate.name as base_plate_name, screen_solution.name as screen_solution_name ,number_number, scan_frequency.number from monitor 
inner join brand on monitor.brand = brand.id_brand
inner join color_space on monitor.color_space = color_space.id_color_space
inner join base_plate on monitor.base_plate = base_plate.id_base_plate
inner join screen_solution on monitor.screen_solution = screen_solution.id_screen_solution
inner join scan_frequency on monitor.scan_frequency = scan_frequency.id_scan_frequency
where id_monitor = :id;";
        return $data->selectWithId($sql, $id);
    }

    public function getImageMonitor($id)
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "select * from images where id_monitor = :id;";
        return $data->selectWithId($sql, $id);
    }
    public function getMonitorsWithBrand($id)
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "select id_monitor, name, price from monitor where brand = (select brand from monitor where id_monitor = :id);";
        return $data->selectWithId($sql, $id);
    }

    public function getImagesWithBrand($id)
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $getArrayIdSql = "select id_monitor from monitor where brand = (select brand from monitor where id_monitor = :id);";
        $getArrayId = $data->selectWithId($getArrayIdSql, $id);
        $arrayImages = [];
        foreach ($getArrayId as $key => $item) {
            $image = $data->selectWithId("select * from images where id_monitor = :id limit 1;", $item['id_monitor']);
            $arrayImages = [...$arrayImages, $image[0]];
        }
        return $arrayImages;
    }
    public function getSomething()
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        // status -> 0: buying; 1: paid;
        $sql = "select * from bill where id_user = 2 and status = 0;";
        return $data->selectall($sql);
    }

    public function checkBillUser($idUser)
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        // status -> 0: buying; 1: paid;
        $sql = "select * from bill where id_user = :id and status = 0;";
        return $data->selectWithId($sql, $idUser);
    }

    public function getIdBill($idUser)
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "select id_bill from bill where id_user = :id and status = 0;";
        $id_bill = $data->selectWithId($sql, $idUser);
        $this->idBill = $id_bill[0]['id_bill'];
        return $this->idBill;
    }

    public function checkBillDetail($id_user, $id_monitor)
    {
        // set up idBill to a new value
        $this->getIdBill($id_user);
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $sql = "select * from bill_detail where id_bill = :id_bill and id_monitor = :id_monitor;";
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":id_bill", $this->idBill);
        $stmt->bindParam(":id_monitor", $id_monitor);
        $stmt->execute();
        $kq = $stmt->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC : chuyển dl mãng lk
        $data->conn = null; // đóng kết nối database
        return $kq; // biến này chứa mãng các dòng dữ liệu trả về
    }

    public function getQuatity($idUser, $idMonitor)
    {
        $idBill = $this->getIdBill($idUser);
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $sql = "select quatity from bill_detail where id_bill = :id_bill and id_monitor = :id_monitor;";
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":id_bill", $idBill);
        $stmt->bindParam(":id_monitor", $idMonitor);
        $stmt->execute();
        $kq = $stmt->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC : chuyển dl mãng lk
        $data->conn = null; // đóng kết nối database
        return $kq[0]['quatity']; // biến này chứa mãng các dòng dữ liệu trả về.
    }

    public function addBill($idUser, $qty, $price, $idMonitor)
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        // check bill with id user if null then add new bill and new monitor into bill_detail
        if (count($this->checkBillUser($idUser)) === 0) {
            $data->ketnoi();
            $sql = "SET FOREIGN_KEY_CHECKS=1;insert into bill values (null, current_timestamp(), null, 0, :idUser);";
            $stmt = $data->conn->prepare($sql);
            $stmt->bindParam(":idUser", $idUser);
            $stmt->execute();
            $data->conn = null; // đóng kết nối database
            $this->getIdBill($idUser);
            $sql = "insert into bill_detail values (null, $qty, $price, $idMonitor, $this->idBill, null);";
            $data->add($sql);
        } else {
            // if bill not null, bill detail if null with id bill and id monitor
            $this->getIdBill($idUser); // get id bill
            if (count($this->checkBillDetail($idUser, $idMonitor)) === 0) {
                $sql = "insert into bill_detail values (null, $qty, $price, $idMonitor, $this->idBill, null);";
                $data->add($sql);
            } else {
                $quatity = $this->getQuatity($idUser, $idMonitor) + $qty;
                $data->ketnoi();
                $sql = "update bill_detail set quatity = $quatity  where id_bill = :id_bill and id_monitor = :id_monitor;";
                $stmt = $data->conn->prepare($sql);
                $stmt->bindParam(":id_bill", $this->idBill);
                $stmt->bindParam(":id_monitor", $idMonitor);
                $stmt->execute();
                $data->conn = null; // đóng kết nối database
            }
        }
    }

    public function addComment($commentContent, $idUser, $idMonitor){
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "insert into comment values (null, '$commentContent', current_timestamp(), null, $idUser, $idMonitor);";
        $data->add($sql);
    }

    public function getComment($idMonitor){
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "select comment.*, user.name from comment inner join user on comment.id_user = user.id_user where id_monitor = :id order by date_time asc;";
        return $data->selectWithId($sql, $idMonitor);
    }
    
    public function addCommentChild($commentContent, $idUser, $idMonitor, $idCommentParent){
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "insert into comment values (null, '$commentContent', current_timestamp(), $idCommentParent, $idUser, $idMonitor);";
        $data->add($sql);
    }
}
