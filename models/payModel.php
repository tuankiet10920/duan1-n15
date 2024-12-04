<?php
class PayModel
{
    private $informationUser;
    private $idBill;
    private $listIdMonitor;
    public function getInformationUser($idUser)
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "select * from user where id_user = :id";
        $dataInformationUser = '';
        $dataInformationUser = $data->selectWithId($sql, $idUser);
        $this->informationUser = $dataInformationUser[0];
        return $dataInformationUser[0];
    }

    public function getBillFromUser()
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "select * from bill where id_user = :id and status = 0";
        $dataInformationBill = $data->selectWithId($sql, $this->informationUser['id_user']);
        if(count($dataInformationBill) > 0){
            $this->idBill = $dataInformationBill[0]['id_bill'];
        }else{
            $this->idBill = null;
        }
        return $this->idBill;
    }

    public function getBillDetailFromUser()
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $sql = "select bill_detail.*, voucher.name as name_voucher, 
        voucher.value as voucher_cost, voucher.unit as voucher_unit, monitor.name as monitor_name  
        from bill_detail left join voucher on bill_detail.id_voucher = voucher.id_voucher 
        inner join monitor on bill_detail.id_monitor = monitor.id_monitor
        where id_bill = :id_bill;";
        $stmt = $data->conn->prepare($sql);
        // bindParam
        $stmt->bindParam(":id_bill", $this->idBill);
        $stmt->execute();
        $kq = $stmt->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC : chuyển dl mãng lk
        $data->conn = null; // đóng kết nối database
        $arrayId = [];
        foreach ($kq as $key => $monitor) {
            $arrayId = [...$arrayId, $monitor['id_monitor']];
        }
        $this->listIdMonitor = $arrayId;
        return $kq; // biến này chứa mãng các dòng dữ liệu trả về.
    }

    public function getListMonitorWithImages(){
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $listMonitorWithImages = [];
        foreach ($this->listIdMonitor as $key => $idMonitor) {
            $sql = "select images.path as path_image, images.name as name_image, monitor.id_monitor, monitor.name, monitor.price from images inner join monitor on images.id_monitor = monitor.id_monitor where monitor.id_monitor = :id limit 1;";
            $monitorImage = $data->selectWithId($sql, $idMonitor);
            $listMonitorWithImages = [...$listMonitorWithImages, $monitorImage[0]];
        }
        return $listMonitorWithImages;
    }

    public function order($price, $idBill){
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $sql = "update bill set price = $price, status = 1 where id_bill = :id_bill;";
        $stmt = $data->conn->prepare($sql);
        // bindParam
        $stmt->bindParam(":id_bill", $idBill);
        $stmt->execute();
        $data->conn = null; // đóng kết nối database
    }
}
