<?php 

?>
<div class="main-content">
  <div class="container mt-5">
    <h3 class="mb-4">Danh sách sản phẩm yêu thích</h3>
    <div class="row row-cols-1 row-cols-md-4 g-4">
      <?php 
        if(isset($_SESSION['user'])){
          $string = '';
          foreach ($loveList as $key => $lovingMonitor) {
            $string .= '
              <div class="col h-100 col-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
                <div class="card text-center rounded-2 text-decoration-none card-body">
                  <a href="index.php?page=detail&id='. $lovingMonitor['id_monitor'] .'"><img src="./imgduan1/dell1.jpg" class="card-img-top" style="height: 200px; object-fit: cover"
                      alt="Product Image" /></a>
                  <div class="text-start">
                    <a href="index.php?page=detail&id='. $lovingMonitor['id_monitor'] .'" class="text-decoration-none" style="color: #000">
                      <h5 class="card-title product-name product-name">
                        '. $lovingMonitor['name'] .'
                      </h5>
                    </a>
                    <p class="card-text text-danger fw-bold">'. number_format($lovingMonitor['price'], 0, ',', '.') .'₫</p>
                    <p class="badge bg-light text-dark pt-3 pb-3 ps-2 pe-2">
                      Freeship từ 2km đổ lại
                    </p>
                  </div>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="text-warning">
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                      <i class="fa fa-star"></i>
                    </div>
                    <div class="btn-favorite" style="cursor: pointer; height: 20px;">
                      <a href="index.php?page=account&content=love&action=deleteLoving&id=' . $lovingMonitor['id_monitor'] . '" class="text-decoration-none" style="color: red;">
                        <i class="fa fa-heart ms-2" style="font-size: 21px; color: red"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            ';
          }
          echo $string;
        }
      ?>
      
      <!-- Lặp lại thẻ div .col để thêm các sản phẩm khác -->





    </div>
  </div>
</div>
</div>
</div>