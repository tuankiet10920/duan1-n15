<?php
if(isset($getSomething)){
    test_array($getSomething);
    echo gettype($getSomething);
}
$id = $monitor[0]['id_monitor'];
$name = $monitor[0]['name'];
$price = $monitor[0]['price'];
$type_screen = $monitor[0]['type_screen'];
$response_time = $monitor[0]['response_time'];
$in_stock = $monitor[0]['in_stock'];
$gurantee = $monitor[0]['gurantee'];
$size = $monitor[0]['size'];
$describe_monitor = $monitor[0]['describe_monitor'];
$status = $monitor[0]['status'];
$brand_name = $monitor[0]['brand_name'];
$color_space_name = $monitor[0]['color_space_name'];
$base_plate_name = $monitor[0]['base_plate_name'];
$screen_solution_name = $monitor[0]['screen_solution_name'];
$number_number = $monitor[0]['number_number'];
$number = $monitor[0]['number'];

$bigImage = $images[0];

if(isset($_SESSION['user'])){
   $idUser = $_SESSION['user']['id'];
}
?>
<?php 
    if(isset($header)){
        echo $header;
    }
?>
<div class="container mt-4">

    <!--lịch sử người dùng -->
    <div class="direction mb-5">
        <a class="header-link" href="#">Trang chủ</a> / <a href="#" class="header-link">Màn hình</a> / <span>
            <?php echo "$name" ?></span>
    </div>
    <!--hình ảnh-->
    <div class="product-container d-flex justify-content-between">
        <div class="images">
            <img id="imgBig" src="public/img/<?php echo $bigImage['path'] ?>" alt="<?php echo $bigImage['name'] ?>" width="675px" height="450px"
                alt="Main Product">
            <div class="smallimg">
                <?php
                $string = '';
                foreach ($images as $key => $image) {
                    $string .= '
                        <img class="imgSmall" src="public/img/' . $image['path'] . '" width="150px" height="146px" alt="' . $image['name'] . '"
              >
                    ';
                }
                echo $string;
                ?>
            </div>
        </div>
        <!--info sản phẩm-->
        <div style="width: 42%;">
            <div class="product-info">
                <h3><?php echo "$name | $size inch, $screen_solution_name, $base_plate_name, $number Hz, $response_time ms, " . transBoolToStringTS($type_screen) ?></h3>
                <p class="rating">★ 123 (Đã bán 150)</p>
                <p class="price"><?php echo number_format($price, 0, '.', ',') ?>₫</p>
            </div>
            <hr>
            <!--buton-->
            <form action="<?php 
                if(isset($_SESSION['user'])){
                    echo "index.php?page=detail&action=addToCart&id=$id&idUser=$idUser&price=$price";
                }else{
                    echo "index.php?page=login";
                }
            ?>" method="post" class="buttons">
                <div id="buy-amount">
                    <button type="button" id="decreaseQty">-</button>
                    <input type="number" name="qty" id="qty" value="1" readonly>
                    <button type="button" id="increaseQty">+</button>
                </div>
                <input class="buy-now" type="submit" name="buyNow" value="Mua ngay"></input>
                <div class="btn-favorite" style="cursor: pointer; height: 20px;">
                    <span class="material-symbols-outlined ms-2"> favorite </span>
                </div>
            </form>
        </div>
    </div>

    <div class="product-describe">
        <!-- Mô tả sản phẩm -->
        <section class="product-description">
            <h1><?php echo $name ?></h1>
            <h2><?php echo "$size inch, $screen_solution_name, $base_plate_name" ?></h2>
            <p><?php echo "Trải nghiệm đỉnh cao với $name, chiếc màn hình lý
            tưởng cho nhu cầu làm việc,
            giải trí và chơi game. Với kích thước $size inch và độ phân giải UHD 4K
            sắc nét, sản phẩm này mang
            lại chất lượng hình ảnh vượt trội và sống động như thật." ?></p>
            <h3>Đặc điểm nổi bật:</h3>
            <ul>
                <li><strong>Độ phân giải <?php echo $screen_solution_name ?>:</strong> Hình ảnh rõ nét, chi tiết
                    gấp 4 lần so với Full HD.
                </li>

                <li><strong>Tấm nền <?php echo $base_plate_name ?>:</strong> Cung cấp góc nhìn rộng, hình ảnh rõ
                    nét ngay cả ở những góc
                    nghiêng.</li>

                <li><strong>Thiết kế hiện đại:</strong>Phù hợp
                    với mọi không gian.</li>
            </ul>
        </section>
    </div>

    <div class="comment">

        <h2>Bình luận</h2>
        <!-- Form nhập bình luận -->
        <form id="comment-form">
            <textarea id="comment-input"
                placeholder="Viết bình luận của bạn ở đây..." required></textarea>
            <div class="button-send text-end" style="width: 100%;">
                <input type="submit" name="send" value="Gửi" class="btn px-4 py-2 text-white" style="width: fit-content; background: #7cb1e6;"></input>

            </div>

        </form>

        <!-- Danh sách bình luận -->
        <div id="comment-list">
            <!-- Phần bình luận -->

            <div class="comments">
                <p><strong>Sam:</strong></p>
                <p>"Sản phẩm cực kỳ tuyệt vời! Mình mua về để làm việc và xem phim,
                    chất lượng hình ảnh thực sự
                    đỉnh cao. Tính năng Adaptive Sync giúp chơi game mượt mà hơn
                    hẳn."</p>
            </div>
            <div class="comments-admin">
                <div class="comment-admin comments">
                    <p><strong>Admin:</strong></p>
                    <p>"Cảm ơn bạn Sam đã tin tưởng và ủng hộ sản phẩm của chúng tôi.
                        Hy vọng bạn sẽ tiếp tục có
                        những trải nghiệm tuyệt vời với màn hình Samsung S30C!"</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h3 class="mb-4">Sản Phẩm Liên Quan</h3>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <?php
            $string = '';
            foreach ($monitorsWithBrand as $key => $monitor) {
                $string .= '
                        <div class="col h-100 col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                            <div
                            class="card text-center rounded-2 text-decoration-none card-body">
                            <a href="index.php?page=detail&id='. $monitor['id_monitor'] .'"><img src="public/img/'. $imageMonitorsBrand[$key]['path'] .'" class="card-img-top"
                                style="height: 200px; object-fit: cover"
                                alt="'. $imageMonitorsBrand[$key]['name'] .'" /></a>
                            <div class="text-start">
                                <a href="index.php?page=detail&id='. $monitor['id_monitor'] .'" class="text-decoration-none" style="color: #000">
                                <h5 class="card-title">
                                    '. $monitor['name'] .'
                                </h5>
                                </a>
                                <p class="card-text text-danger fw-bold">'. number_format($monitor['price'], 0, ',', '.') .'₫</p>
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

</div>