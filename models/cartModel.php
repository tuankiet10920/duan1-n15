<?php
class CartModel
{
    private $idBill;
    public function getIdBill($idUser)
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "select id_bill from bill where id_user = :id and status = 0;";
        $id_bill = $data->selectWithId($sql, $idUser);
        // $id_bill will return an array
        if (count($id_bill) !== 0) {
            // return true and idBill will have a new value
            $this->idBill = $id_bill[0]['id_bill'];
            return true;
        } else {
            // if idbill is empty, return boolean false
            return false;
        }
    }

    public function getCart($idUser)
    {
        // get id bill by user, id bill is a private parameter
        if ($this->getIdBill($idUser)) {
            // check boolean of getIdBill function, if true will return an array bill_detail
            include_once 'models/connectModel.php';
            $data = new ConnectModel();
            $sql = "select bill_detail.*, monitor.name, monitor.price as monitor_price from bill_detail
            inner join monitor on bill_detail.id_monitor = monitor.id_monitor where id_bill = :id;";
            $listMonitor = $data->selectWithId($sql, $this->idBill);
            $listMonitorWithImages = [];
            foreach ($listMonitor as $key => $monitor) {
                $sql = "select * from images where id_monitor = :id limit 1;";
                $image = $data->selectWithId($sql, $monitor['id_monitor']);
                $newMonitor = [...$monitor, 'pathImage' => $image[0]['path'], 'nameImage' => $image[0]['name']];
                $listMonitorWithImages = [...$listMonitorWithImages, $newMonitor];
            }
            $sql = "select monitor.name as monitor_name, bill_detail.price as monitor_price, voucher.*, quatity from bill_detail 
            inner join voucher on bill_detail.id_voucher = voucher.id_voucher
            inner join monitor on bill_detail.id_monitor = monitor.id_monitor;";
            $listMonitorVoucher = $data->selectall($sql);
            return [
                'listMonitorWithImages' => $listMonitorWithImages,
                'listMonitorVoucher' => $listMonitorVoucher
            ];
        }
        // if boolean of getIdBill is false will return an empty array
        return [];
    }

    public function deleteMonitorInBill($idMonitor, $idUser)
    {
        $this->getIdBill($idUser);
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $sql = "delete from bill_detail where id_monitor = :id_monitor and id_bill = :id_bill;";
        $stmt = $data->conn->prepare($sql);
        // bindParam
        $stmt->bindParam(":id_monitor", $idMonitor);
        $stmt->bindParam(":id_bill", $this->idBill);
        $stmt->execute();
        $data->conn = null; // đóng kết nối database
    }

    public function getQuatity($idUser, $idMonitor)
    {
        $this->getIdBill($idUser);
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $sql = "select quatity from bill_detail where id_bill = :id_bill and id_monitor = :id_monitor;";
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":id_bill", $this->idBill);
        $stmt->bindParam(":id_monitor", $idMonitor);
        $stmt->execute();
        $kq = $stmt->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC : chuyển dl mãng lk
        $data->conn = null; // đóng kết nối database
        return $kq[0]['quatity']; // biến này chứa mãng các dòng dữ liệu trả về.
    }

    public function updateQty($idUser, $idMonitor, $type)
    {
        $qty = $this->getQuatity($idUser, $idMonitor);
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        if ($type === 'decrease') {
            if ($qty === 1) {
                return 0;
            } else {
                $qty--;
            }
        } else if ($type === 'increase') {
            $qty++;
        }
        $data->ketnoi();
        $sql = "update bill_detail set quatity = $qty where id_bill = :id_bill and id_monitor = :id_monitor;";
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":id_bill", $this->idBill);
        $stmt->bindParam(":id_monitor", $idMonitor);
        $stmt->execute();
        $data->conn = null; // đóng kết nối database
    }

    public function checkVoucherCode($idMonitor, $voucherCode)
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "select * from voucher where name = '$voucherCode';";
        $voucher = $data->selectall($sql);
        // check if array voucher is not empty
        if (count($voucher) > 0) {
            // if voucher for one monitor
            if ($voucher[0]['id_monitor'] !== null) {
                if ($voucher[0]['id_monitor'] != $idMonitor) {
                    return;
                }
            }
            // if voucher for all monitors
            $data->ketnoi();
            $sql = "update bill_detail set id_voucher = :id_voucher where id_monitor = :id_monitor;";
            $stmt = $data->conn->prepare($sql);
            $stmt->bindParam(":id_voucher", $voucher[0]['id_voucher']);
            $stmt->bindParam(":id_monitor", $idMonitor);
            $stmt->execute();
            $data->conn = null; // đóng kết nối database
        }
    }
}
