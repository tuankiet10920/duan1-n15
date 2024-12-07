<?php
class AdminMonitorModel
{
    private $listIdMonitors;
    public function getAllMonitors()
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "select monitor.id_monitor, monitor.name, monitor.price, monitor.type_screen, monitor.response_time, monitor.in_stock, monitor.gurantee, monitor.in_stock, monitor.size, 
monitor.describe_monitor, monitor.status, brand.name as brand_name, color_space.name as color_space_name, base_plate.name as base_plate_name, screen_solution.name as screen_solution_name, scan_frequency.number as scan_frequency_number from monitor
inner join brand on monitor.brand = brand.id_brand
inner join color_space on monitor.color_space = color_space.id_color_space
inner join base_plate on monitor.base_plate = base_plate.id_base_plate
inner join screen_solution on monitor.screen_solution = screen_solution.id_screen_solution
inner join scan_frequency on monitor.scan_frequency = scan_frequency.id_scan_frequency;";
        $listMonitors = $data->selectall($sql);
        foreach ($listMonitors as $key => $monitor) {
            $this->listIdMonitors[] = $monitor['id_monitor'];
        }
        return $listMonitors;
    }

    public function getAllImages()
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $images = [];
        foreach ($this->listIdMonitors as $key => $idMonitor) {
            $sql = "select * from images where id_monitor = :id;";
            $image = $data->selectWithId($sql, $idMonitor);
            $images[] = $image;
        }
        return $images;
    }

    public function deleteMonitor($idMonitor)
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $data->ketnoi();
        $sql = "update monitor set status = 0 where id_monitor = :idMonitor;";
        $stmt = $data->conn->prepare($sql);
        // bindParam
        $stmt->bindParam(":idMonitor", $idMonitor);
        $stmt->execute();
        $data->conn = null; // đóng kết nối database
    }
    public function getAllSelects()
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $selects = [];
        $listBrands = $data->selectall("select * from brand;");
        $selects = [...$selects, 'brands' => $listBrands];
        $listColorSpace = $data->selectall("select * from color_space;");
        $selects = [...$selects, 'colorSpace' => $listColorSpace];
        $listBasePlate = $data->selectall("select * from base_plate;");
        $selects = [...$selects, 'basePlate' => $listBasePlate];
        $listScreenSoloution = $data->selectall("select * from screen_solution;");
        $selects = [...$selects, 'screenSolution' => $listScreenSoloution];
        $listScanFrequency = $data->selectall("select * from scan_frequency;");
        $selects = [...$selects, 'scanFrequency' => $listScanFrequency];
        return $selects;
    }

    public function createMonitor($name, $price, $typeScreen, $responseTime, $inStock, $gurantee, $size, $status, $brand, $colorSpace, $basePlate, $screenSolution, $scanFrequency, $descibe, $images)
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        $sql = "insert into monitor values (null, '$name', $price, $typeScreen, $responseTime, $inStock, $gurantee, $size, '$descibe', $status, $brand, $colorSpace, $basePlate, $screenSolution, $scanFrequency);";
        $data->add($sql);
        // it return an array of lasted Id Monitor
        $lastedId = $data->selectall("select id_monitor from monitor order by id_monitor desc limit 1;");
        $lastedId = $lastedId[0]['id_monitor'];
        foreach ($images as $key => $image) {
            $path = $image['full_path'];
            $getNameImage = explode(".", $path);
            $getNameImage = $getNameImage[0];
            $sql = "SET FOREIGN_KEY_CHECKS=1;insert into images values (null, '$path', '$getNameImage', $lastedId);";
            $data->add($sql);
        }
    }

    public function editMonitor($id, $name, $price, $typeScreen, $responseTime, $inStock, $gurantee, $size, $status, $brand, $colorSpace, $basePlate, $screenSolution, $scanFrequency, $descibe, $images)
    {
        include_once 'models/connectModel.php';
        $data = new ConnectModel();
        // check if images length > 0
        if (count($images) > 0) {
            // get all images
            $imageMonitor = $data->selectWithId("select * from images where id_monitor = :id;", $id);
            // check images outside input with image key
            foreach ($images as $key => $image) {
                // key: 0 1 2 
                // $imageMonitor | key : 0 1 2
                $path = $image['full_path'];
                $getNameImage = explode(".", $path);
                $getNameImage = $getNameImage[0];
                // check if image data at this index exists
                if (isset($imageMonitor[$key])) {
                    // if exists, update image
                    $idImage = intval($imageMonitor[$key]['id_image']);
                    $data->ketnoi();
                    $sql = "update images set path = '$path', name = '$getNameImage' where id_image = :id;";
                    $stmt = $data->conn->prepare($sql);
                    // bindParam
                    $stmt->bindParam(":id", $idImage);
                    $stmt->execute();
                    $data->conn = null; // đóng kết nối database
                } else {
                    // if not exists, insert new image
                    $data->add("insert into images values (null, $path, $getNameImage, $id);");
                }
            }
        }

        // update monitor
        $data->ketnoi();
        $sql = "update monitor set name = '$name', price = $price, type_screen = $typeScreen, 
        response_time = $responseTime, in_stock = $inStock, gurantee = $gurantee, size = $size,
        describe_monitor = '$descibe', status = $status, brand = $brand, color_space = $colorSpace,
        base_plate = $basePlate, screen_solution = $screenSolution, scan_frequency = $scanFrequency where id_monitor = :id;";
        $stmt = $data->conn->prepare($sql);
        // bindParam
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $data->conn = null; // đóng kết nối database
    }
}
