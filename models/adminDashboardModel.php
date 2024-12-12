<?php
class AdminDashboardModel {
    public function getCountAll(){
        include_once'models/connectModel.php';
        $data = new ConnectModel();
        $count = [];
        $monitors = $data->selectall("select count(id_monitor) as number_of_monitors from monitor;");
        $count = [...$count, 'monitor' => $monitors[0]['number_of_monitors']];
        $users = $data->selectall("select count(id_user) as number_of_users from user;");
        $count = [...$count, 'user' => $users[0]['number_of_users']];
        $bills = $data->selectall("select count(id_bill) as count_bill, sum(price) as total from bill where status = 1;");
        $count = [...$count, 'bill' => $bills[0]['count_bill'], 'revenue' => $bills[0]['total']];
        return $count;
    }

    public function getLastestBillsAndUsers(){
        include_once'models/connectModel.php';
        $data = new ConnectModel();
        $billAndUser = [];
        $bills = $data->selectall("select date_time, price, user.name from bill inner join user on bill.id_user = user.id_user where bill.status = 1 order by date_time desc limit 5;");
        $billAndUser = [...$billAndUser, 'lastedBills' => $bills];
        $users = $data->selectall("select name, phone, gender from user where status = 0 limit 5;");
        $billAndUser = [...$billAndUser, 'lastedUsers' => $users];
        return $billAndUser;
    }
}