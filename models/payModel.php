<?php
class PayModel
{
    private $informationUser;
    private $idBill;
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
        $this->idBill = $dataInformationBill[0]['id_bill'];
        return $dataInformationBill[0]['id_bill'];
    }

    public function getBillDetailFromUser()
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $sql = "select bill_detail.*, voucher.name as name_voucher, 
        voucher.value as voucher_cost, voucher.unit as voucher_unit 
        from bill_detail left join voucher on bill_detail.id_voucher = voucher.id_voucher 
        where id_bill = :id_bill;";
        $stmt = $data->conn->prepare($sql);
        // bindParam
        $stmt->bindParam(":id_bill", $this->idBill);
        $stmt->execute();
        $kq = $stmt->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC : chuyển dl mãng lk
        $data->conn = null; // đóng kết nối database
        return $kq; // biến này chứa mãng các dòng dữ liệu trả về.
    }
}
