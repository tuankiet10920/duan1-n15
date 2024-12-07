<?php
class AdminMonitorController
{
    public $action;
    public $id;
    public $name;
    public $price;
    public $typeScreen;
    public $responseTime;
    public $inStock;
    public $gurantee;
    public $size;
    public $status;
    public $brand;
    public $colorSpace;
    public $basePlate;
    public $screenSolution;
    public $scanFrequency;
    public $descibe;
    public $images;
    public function __construct($action, $id, $name, $price, $typeScreen, $responseTime, $inStock, $gurantee, $size, $status, $brand, $colorSpace, $basePlate, $screenSolution, $scanFrequency, $descibe, $images)
    {
        $this->action = $action;
        $this->id = intval($id);
        $this->name = $name;
        $this->price = intval($price);
        $this->typeScreen = intval($typeScreen);
        $this->responseTime = floatval($responseTime);
        $this->inStock = intval($inStock);
        $this->gurantee = intval($gurantee);
        $this->size = intval($size);
        $this->status = intval($status);
        $this->brand = intval($brand);
        $this->colorSpace = intval($colorSpace);
        $this->basePlate = intval($basePlate);
        $this->screenSolution = intval($screenSolution);
        $this->scanFrequency = intval($scanFrequency);
        $this->descibe = $descibe;
        $this->images = $images;
    }
    public function index()
    {
        include_once 'models/adminMonitorModel.php';
        $adminMonitorModel = new AdminMonitorModel();
        switch ($this->action) {
            case 'delete':
                $adminMonitorModel->deleteMonitor($this->id);
                $header = '
                    <script>
                        window.location.href = "http://localhost:8080/duan1-n15/index.php?page=admin&content=monitor"
                    </script>
                ';
            case 'add':
                // check images array
                if (count($this->images) > 0) {
                    $adminMonitorModel->createMonitor($this->name, $this->price, $this->typeScreen, $this->responseTime, $this->inStock, $this->gurantee, $this->size, $this->status, $this->brand, $this->colorSpace, $this->basePlate, $this->screenSolution, $this->scanFrequency, $this->descibe, $this->images);
                    // move to Upload file
                    foreach ($this->images as $key => $image) {
                        move_uploaded_file($image['tmp_name'], 'public/img/' . $image['name']);
                    }
                    $header = '
                        <script>
                            window.location.href = "http://localhost:8080/duan1-n15/index.php?page=admin&content=monitor"
                        </script>
                    ';
                } else {
                    $error = 'Vui lòng thêm hình ảnh cho màn hình!';
                }
                break;
            case 'getMonitor':
                foreach ($_SESSION['listMonitors'] as $key => $monitor) {
                    if ($monitor['id_monitor'] == $this->id) {
                        $monitorPoint = $monitor;
                        break;
                    }
                }
                break;
            case 'edit':
                if (count($this->images) > 0) {
                    foreach ($_SESSION['listImages'] as $key => $image) {
                        foreach ($image as $key => $img) {
                            foreach ($this->images as $key => $imgFile) {
                                if ($imgFile['name'] == $img['path'] && $img['id_monitor'] == $this->id) {
                                    unlink('public/img/' . $imgFile['name']);
                                }
                            }
                        }
                    }
                    foreach ($this->images as $key => $image) {
                        move_uploaded_file($image['tmp_name'], 'public/img/' . $image['name']);
                    }
                }
                // $id, $name, $price, $typeScreen, $responseTime, $inStock, 
                // $gurantee, $size, $status, $brand, $colorSpace, $basePlate, 
                // $screenSolution, $scanFrequency, $descibe, $images
                $adminMonitorModel->editMonitor($this->id, $this->name, $this->price, $this->typeScreen, $this->responseTime, $this->inStock, $this->gurantee, $this->size, $this->status, $this->brand, $this->colorSpace, $this->basePlate, $this->screenSolution, $this->scanFrequency, $this->descibe, $this->images);

                $header = '
                    <script>
                        window.location.href = "http://localhost:8080/duan1-n15/index.php?page=admin&content=monitor"
                    </script>
                ';
                break;
            default:
                # code...
                break;
        }

        $listMonitors = $adminMonitorModel->getAllMonitors();

        $_SESSION['listMonitors'] = $listMonitors;

        $listAllImages = $adminMonitorModel->getAllImages();

        $_SESSION['listImages'] = $listAllImages;

        $listAllSelects = $adminMonitorModel->getAllSelects();
        include_once 'views/adminMonitor.php';
    }
}
