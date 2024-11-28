  <?php

    ?>
  <!-- Banner Slider -->
  <div id="bannerSlider" class="carousel slide mt-3 container mt-3 d-flex justify-content-center"
      data-bs-ride="carousel">
      <div class="carousel-inner">
          <div class="carousel-item active">
              <img style="width: 100%;" src="./public/img/banner1.png" alt="Banner 1" />
          </div>
          <div class="carousel-item">
              <img style="width: 100%;" src="./public/img/slider1-1.webp" alt="Banner 2" />
          </div>
          <div class="carousel-item">
              <img style="width: 100%" src="./public/img/slider2-2.jpg" alt="Banner 3" />
          </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#bannerSlider" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#bannerSlider" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
      </button>
  </div>

  <div class="container my-4">
      <h2 class="text-center mb-4">Danh Mục</h2>
      <div class="row row-cols-6 g-3">
          <?php
            $string = "";
            foreach ($brandList as $key => $value) {
                $string .= '
                    <div class="col col-6 col-sm-4 col-md-3 col-lg-2" style="transition: all .3s ease-in-out;">
                        <div class="card text-center p-2 card-hover">
                            <div class="card-body">
                                <span class="material-symbols-outlined fs-2">jamboard_kiosk</span>
                                <p class="fs-6 mt-2 mb-0" style="font-weight: 600;">' . $value['name'] . '</p>
                            </div>
                        </div>
                    </div>
                ';
            }
            echo $string;
            ?>
      </div>
  </div>

  <div class="container mt-5">
      <h3 class="mb-4">Sản Phẩm Hot</h3>
      <div class="row row-cols-1 row-cols-md-4 g-4">
          <?php
            $string = '';
            foreach ($monitorList as $key => $monitor) {
                $string .= '
                    <div class="col h-100 col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                        <div class="card text-center rounded-2 text-decoration-none card-body">
                            <a href="index.php?page=detail&id=' . $monitor['id_monitor'] . '"><img src="./imgduan1/dell1.jpg" class="card-img-top" style="height: 200px; object-fit: cover"
                                    alt="Product Image" /></a>
                            <div class="text-start">
                                <a href="index.php?page=detail&id=' . $monitor['id_monitor'] . '" class="text-decoration-none" style="color: #000">
                                    <h5 class="card-title product-name">
                                    ' . $monitor['name'] . ' ' . $monitor['screen_solution_name'] . ' ' . $monitor['number'] . ' inch
                                    </h5>
                                </a>
                                <p class="card-text text-danger fw-bold">' . number_format($monitor['price'], 0, ',', '.') . '₫</p>
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
                                    <span class="material-symbols-outlined ms-2"> favorite </span>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
            }
            echo $string;
            ?>

          <!-- Lặp lại thẻ div .col để thêm các sản phẩm khác -->
      </div>
  </div>

  <div class="container pt-3 mt-3 d-flex justify-content-center">
      <img style="width: 100%" src="/imgduan1/banner1.png" alt="" />
  </div>

  <div class="container mt-5">
      <h3 class="mb-4">Màn Hình Để Bàn</h3>
      <div class="row row-cols-1 row-cols-md-4 g-4">
          <?php
            $string = '';
            foreach ($monitorList as $key => $monitor) {
                $string .= '
                    <div class="col h-100 col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                        <div class="card text-center rounded-2 text-decoration-none card-body">
                            <a href="index.php?page=detail&id=' . $monitor['id_monitor'] . '"><img src="./imgduan1/dell1.jpg" class="card-img-top" style="height: 200px; object-fit: cover"
                                    alt="Product Image" /></a>
                            <div class="text-start">
                                <a href="index.php?page=detail&id=' . $monitor['id_monitor'] . '" class="text-decoration-none" style="color: #000">
                                    <h5 class="card-title product-name">
                                    ' . $monitor['name'] . ' ' . $monitor['screen_solution_name'] . ' ' . $monitor['number'] . ' inch
                                    </h5>
                                </a>
                                <p class="card-text text-danger fw-bold">' . number_format($monitor['price'], 0, ',', '.') . '₫</p>
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
                                <div class="btn-favorite" style="cursor: pointer; height: 20px;" onclick="addFavorite(this)">
                                    <span class="material-symbols-outlined ms-2"> favorite </span>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
            }
            echo $string;
            ?>
          <div class="d-flex justify-content-center w-100 mt-3">
              <button class="btn btn-primary " type="submit" style="--bs-btn-padding-y: 0.5rem; --bs-btn-padding-x: 2.5rem; 
            --bs-btn-font-size: 1rem;">Button</button>
          </div>
      </div>
  </div>


  <div class="container">
      <!-- Phần sản phẩm mới -->
      <div class="section-5-container">
          <div class="">
              <h3 class="pt-4">Sản Phẩm Mới</h3>
          </div>
          <div class="section-5-container-box d-flex justify-content-between">
              <div class="section-5-container-box-image-1 col-md-4" style="width: 642px">
                  <img style="width: 100%; height: 715px; object-fit: cover;" src="./imgduan1/banner3.jpg" alt="" />
              </div>
              <div class="section-5-container-box-image-2 col-md-4" style="width: 642px; height: 715px">
                  <img style="width: 100%; height: 350px; object-fit: cover;" src="./imgduan1/banner4.jpg" alt="" />
                  <img style="width: 100%; height: 350px; object-fit: cover;" src="./imgduan1/banner5.jpg" alt="" />
              </div>
          </div>

          <!-- Phần icon -->
          <div class="d-flex justify-content-center mt-3 pt-4 gap-3">
              <div class="text-center mx-5">
                  <span class="material-symbols-outlined" style="font-size: 45px">local_shipping</span>
                  <p style="font-weight: 600">Giao hàng tốc độ</p>
                  <p style="font-size: 13px">Miễn phí giao hàng từ 2km</p>
              </div>
              <div class="text-center mx-3">
                  <span class="material-symbols-outlined" style="font-size: 45px">support_agent</span>
                  <p style="font-weight: 600">Liên hệ với chúng tôi</p>
                  <p style="font-size: 13px">Hoạt động 24/7</p>
              </div>
              <div class="text-center mx-5">
                  <span class="material-symbols-outlined" style="font-size: 45px">verified_user</span>
                  <p style="font-weight: 600">Bảo hành chính hãng</p>
                  <p>Bảo hành đến 30 ngày</p>
              </div>
          </div>
      </div>
  </div>