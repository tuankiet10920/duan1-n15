<?php
class DetailController {
    public $action;
    public $id;
    public $qty;
    public $price;
    public $idUser;
    public $comment;
    public $idCommentParent;
    public function __construct($action, $id, $qty, $price, $idUser, $comment, $idCommentParent){
        $this->action = $action;
        $this->id = $id;
        $this->qty = $qty;
        $this->price = $price;
        $this->idUser = $idUser;
        $this->comment = $comment;
        $this->idCommentParent = $idCommentParent;
    }

    public function index(){
        include_once 'models/detailModel.php';
        $detail = new DetailModel();
        switch ($this->action) {
            case 'addToCart':
                $detail->addBill($this->idUser, $this->qty, $this->price, $this->id);
                $header = "
                    <script>
                        window.location.href='http://localhost:8080/duan1-n15/index.php?page=detail&id=$this->id'
                    </script>
                ";
                break;
            case 'comment';
            // $getSomething = $this->idUser;
                $detail->addComment($this->comment, $this->idUser, $this->id);
                break;
            case 'commentChild':
                $detail->addCommentChild($this->comment, $this->idUser, $this->id, $this->idCommentParent);
                break;
            case 'noUser':
                $header = '
                    <script>
                        window.location.href = "http://localhost:8080/duan1-n15/index.php?page=login";
                    </script>
                ';
                break;
            default: // return array
                # code...
                break;
        }
        $monitor = $detail->getMonitorWithId($this->id);
        $images = $detail->getImageMonitor($this->id);
        $monitorsWithBrand = $detail->getMonitorsWithBrand($this->id);
        $imageMonitorsBrand = $detail->getImagesWithBrand($this->id);
        $listComments = $detail->getComment($this->id);
        include_once 'views/detail.php';
    }
}