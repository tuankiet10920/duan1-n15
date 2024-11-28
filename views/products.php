<?php 
    $monitors = isset($_GET['action']) && $_GET['action'] === 'filter' ? $monitorsFilter : $monitors;
?>
<div class="container mt-5">
    <div class="row">
        <!-- Box lọc sản phẩm -->
        <form action="index.php?page=products&action=filter" method="post" class="col-12 col-md-3">
            <div class="filter-box">
                <h5>Lọc sản phẩm</h5>
                <div class="mb-3">
                    <label for="brandFilter" class="form-label">Thương hiệu</label>
                    <select id="brandFilter" class="form-select" name="brand">
                        <option value="">Tất cả</option>
                        <?php 
                            $string = '';
                            foreach ($brandList as $key => $brand) {
                                $string .= '
                                    <option value="'. $brand['id_brand'] .'">'. $brand['name'] .'</option>
                                ';
                            }
                            echo $string;
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="resolutionFilter" class="form-label">Độ phân giải</label>
                    <select id="resolutionFilter" class="form-select" name="solution">
                        <option value="">Tất cả</option>
                        <?php 
                            $string = '';
                            foreach ($screenSolutionList as $key => $screenSolution) {
                                $string .= '
                                    <option value="'. $screenSolution['id_screen_solution'] .'">'. $screenSolution['name'] .'</option>
                                ';
                            }
                            echo $string;
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="sizeFilter" class="form-label">Kích thước màn hình</label>
                    <select id="sizeFilter" class="form-select" name="size">
                        <option value="">Tất cả</option>
                        <?php 
                            $string = '';
                            $count = 15;
                            while ($count <= 32) {
                                $string .= '
                                    <option value="'. $count .'">'. $count .' inch</option>
                                ';
                                $count += 0.5;
                            }
                            echo $string;
                        ?>
                    </select>
                </div>
                <div>
                    <label for="priceFilter" class="form-label">Khoảng giá</label>
                    <div class="d-flex">
                        <input type="number" class="form-control me-2" name="priceFrom" placeholder="Từ" value="0" min="0">
                        <input type="number" class="form-control" name="priceTo" placeholder="Đến" require min="0">
                    </div>
                </div>
                <input type="submit" value="Lọc" name="filter" class="btn btn-success text-white mt-3">

            </div>
        </form>

        <!-- Box sản phẩm -->
        <div class="col-12 col-md-9">
            <div class="row row-cols-1 row-cols-md-3 g-4 product-grid">
                <!-- Card sản phẩm -->
                <?php
                $string = '';
                foreach ($monitors as $key => $monitor) {
                    $string .= '
                            <div class="col">
                                <div class="card text-center rounded-2 text-decoration-none card-body">
                                    <a href="index.php?page=detail&id=' . $monitor['id_monitor'] . '"><img src="public/img/'. $monitor['path'] .'" class="card-img-top" alt="'. $monitor['path_name'] .'" /></a>
                                    <div class="text-start">
                                        <a href="index.php?page=detail&id=' . $monitor['id_monitor'] . '" class="text-decoration-none" style="color: #000">
                                            <h5 class="card-title product-name">'. $monitor['name'] . ' ' . $monitor['screen_solution_name'] . ' ' . $monitor['size'] .' inch</h5>
                                        </a>
                                        <p class="card-text text-danger fw-bold">' . number_format($monitor['price'], 0, ',', '.') . '₫</p>
                                        <p class="badge bg-light text-dark pt-3 pb-3 ps-2 pe-2">Freeship từ 2km đổ lại</p>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="text-warning">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="btn-favorite" style="cursor: pointer; height: 20px;" onclick="addFavorite(this)" onclick="addFavorite(this)">
                                            <span class="material-symbols-outlined ms-2"> favorite </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ';
                }
                echo $string;
                ?>
            </div>
        </div>
    </div>
</div>