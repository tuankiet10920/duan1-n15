<?php
class ProductsModel
{
    public function getBrandList()
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "select * from brand;";
        return $data->selectall($sql);
    }

    public function getScreenSolutionList()
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "select * from screen_solution;";
        return $data->selectall($sql);
    }

    public function getMonitorList()
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $images = $data->selectall("select path, name, id_monitor from images;");
        $monitors = $data->selectall("select id_monitor, monitor.name, price, screen_solution.name as screen_solution_name, size from monitor
        inner join screen_solution on monitor.screen_solution = screen_solution.id_screen_solution;");
        $data = [];
        foreach ($monitors as $key => $monitor) {
            foreach ($images as $key => $image) {
                if ($monitor['id_monitor'] === $image['id_monitor']) {
                    $monitor = [...$monitor, 'path' => $image['path'], 'path_name' => $image['name']];
                    $data = [...$data, $monitor];
                    break;
                }
            }
        }
        return $data;
    }

    public function getMonitorsFilter($array)
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "select id_monitor, monitor.name, price, screen_solution.name as screen_solution_name, size from monitor
            inner join screen_solution on monitor.screen_solution = screen_solution.id_screen_solution";
        if (count($array) > 0) {
            $sql .= " where ";
            $count = 0;
            foreach ($array as $key => $value) {
                $count++;
                if ($count === count($array)) {
                    $sql .= "$key = $value";
                } else if ($key === 'priceFrom') {
                    $priceTo = $array['priceTo'];
                    $sql .= "price between $value and $priceTo";
                    break;
                } else {
                    $sql .= "$key = $value and ";
                }
            }
        }

        $monitors = $data->selectall($sql);
        $arrayIdMonitors = [];
        foreach ($monitors as $key => $monitor) {
            $arrayIdMonitors = [...$arrayIdMonitors, $monitor['id_monitor']];
        }
        if (count($monitors) > 0) {
            foreach ($arrayIdMonitors as $key => $idMonitor) {
                $image = $data->selectall("select path, name from images where id_monitor = $idMonitor");
                $monitors[$key] = [...$monitors[$key], 'path' => $image[0]['path'], 'path_name' => $image[0]['name']];
            }
        }
        return $monitors;
    }

    public function addLove($idMonitor, $idUser)
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "insert into love values (null, $idUser, $idMonitor);";
        $data->add($sql);
    }

    public function getLoveList($idUser)
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "select id_monitor from love where id_user = :id;";
        return $data->selectWithId($sql, $idUser);
    }

    public function deleteLove($idMonitor, $idUser)
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
