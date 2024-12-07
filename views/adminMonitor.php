<?php 
    if(isset($images)){
        test_array($images);
    }

    if(isset($header)){
        echo $header;
    }
    // echo $monitorPoint['status'];
    // test_array($listAllSelects);
?>
<div class="content-right mt-4">
    <div class="content-right-container">
        <div class="content-right-container-box">
            <h4 class="mb-4">Monitor</h4>
            <form 
            <?php 
                if(isset($monitorPoint)){
                    echo '
                        action="index.php?page=admin&content=monitor&action=edit&id='. $monitorPoint['id_monitor'] .'"
                    ';
                }else{
                    echo '
                        action="index.php?page=admin&content=monitor&action=add"
                    ';
                }
            ?>
             method="post" enctype="multipart/form-data"
                class="form-dashboard mb-5"
                style="
                  width: 100%;
                  border: 1px solid #aaaaaa;
                  border-radius: 10px;
                ">
                <div
                    class="title px-2 py-3"
                    style="width: 100%; border-bottom: 1px solid #aaaaaa">
                    Form Dashboard
                </div>
                <div class="form-content px-2 py-3">
                    <div class="container px-0 mx-0 form-dashboard-container">
                        <div class="row me-0 ms-0 mb-1">
                            <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                                <label for="name">Name</label><br />
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="<?php 
                                        if(isset($monitorPoint)){
                                            echo $monitorPoint['name'];
                                        }else{
                                            echo '';
                                        }
                                    ?>"
                                    placeholder="Input monitor's name" />
                            </div>
                            <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                                <label for="price">Price</label><br />
                                <input
                                    type="number"
                                    id="price"
                                    name="price"
                                    value="<?php 
                                        if(isset($monitorPoint)){
                                            echo $monitorPoint['price'];
                                        }else{
                                            echo '';
                                        }
                                    ?>"
                                    placeholder="Input price" />
                            </div>
                            <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                                <label for="typeScreen">Type screen</label><br />
                                <select name="typeScreen" id="typeScreen">
                                    <option value="">
                                        --- Type screen ---
                                    </option>
                                    <?php 
                                        if(isset($monitorPoint)){
                                            if($monitorPoint['type_screen'] === 0){
                                                echo '
                                                    <option value="0" selected>Màn hình phẳng</option>
                                                    <option value="1">Màn hình cong</option>
                                                ';
                                            }else{
                                                 echo '
                                                    <option value="0">Màn hình phẳng</option>
                                                    <option value="1" selected>Màn hình cong</option>
                                                ';
                                            }
                                        }else{
                                            echo '
                                                <option value="0">Màn hình phẳng</option>
                                                <option value="1">Màn hình cong</option>
                                            ';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                                <label for="responseTime">Response time</label><br />
                                <select name="responseTime" id="responseTime">
                                    <option value="">
                                        --- Response time ---
                                    </option>
                                    <?php 
                                        $string = '';
                                        $responseTime = 0.5;
                                        while ($responseTime <= 5) {
                                            if(isset($monitorPoint)){
                                                if($monitorPoint['response_time'] == $responseTime){
                                                    $string .= '
                                                        <option selected value="'. $responseTime .'">'. $responseTime .' ms</option>
                                                    ';
                                                }else{
                                                    $string .= '
                                                        <option value="'. $responseTime .'">'. $responseTime .' ms</option>
                                                    ';
                                                }
                                            }else{
                                                $string .= '
                                                    <option value="'. $responseTime .'">'. $responseTime .' ms</option>
                                                ';
                                            }
                                            
                                            $responseTime += 0.5;
                                        }
                                        echo $string;
                                    ?>
                                </select>
                            </div>
                            <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                                <label for="instock">In Stock</label><br />
                                <input
                                    type="number"
                                    id="instock"
                                    name="instock"
                                    value="<?php 
                                        if(isset($monitorPoint)){
                                            echo $monitorPoint['in_stock'];
                                        }else{
                                            echo '';
                                        }
                                    ?>"
                                    placeholder="Input instock" />
                            </div>
                            <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                                <label for="gurantee">Gurantee</label><br />
                                <input
                                    type="number"
                                    id="gurantee"
                                    value="<?php 
                                        if(isset($monitorPoint)){
                                            echo $monitorPoint['gurantee'];
                                        }else{
                                            echo '';
                                        }
                                    ?>"
                                    name="gurantee"
                                    placeholder="Input gurantee" />
                            </div>
                            <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                                <label for="size">Size</label><br />
                                <select name="size" id="size">
                                    <option value="">
                                        --- Size ---
                                    </option>
                                    <?php 
                                        $string = '';
                                        $size = 14;
                                        while ($size <= 32) {
                                            if(isset($monitorPoint)){
                                                if($monitorPoint['size'] == $size){
                                                    $string .= '
                                                        <option selected value="'. $size .'">'. $size .' inch</option>
                                                    ';
                                                }else{
                                                    $string .= '
                                                        <option value="'. $size .'">'. $size .' inch</option>
                                                    ';
                                                }
                                            }else{
                                                $string .= '
                                                    <option value="'. $size .'">'. $size .' inch</option>
                                                ';
                                            }
                                            $size += 0.5;
                                        }
                                        echo $string;
                                    ?>
                                </select>
                            </div>
                            <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                                <label for="status">Status</label><br />
                                <select name="status" id="status">
                                    <option value="">
                                        --- Choose status ---
                                    </option>
                                    <?php 
                                        if(isset($monitorPoint)){
                                            if($monitorPoint['status'] == 0){
                                                echo '
                                                    <option value="0" selected>Hidden</option>
                                                    <option value="1">Active</option>
                                                ';
                                            }else{
                                                 echo '
                                                    <option value="0">Hidden</option>
                                                    <option value="1" selected>Active</option>
                                                ';
                                            }
                                        }else{
                                            echo '
                                                <option value="0">Hidden</option>
                                                <option value="1">Active</option>
                                            ';
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                                <label for="brands">Brands</label><br />
                                <select name="brands" id="brands">
                                    <option value="">
                                        --- Choose monitor's brand ---
                                    </option>
                                    <?php 
                                        $string = '';
                                        foreach ($listAllSelects['brands'] as $key => $brand) {
                                            if(isset($monitorPoint)){
                                                if($brand['name'] == $monitorPoint['brand_name']){
                                                    $string .= '
                                                        <option selected value="'. $brand['id_brand'] .'">'. $brand['name'] .'</option>
                                                    ';
                                                }else{
                                                    $string .= '
                                                        <option value="'. $brand['id_brand'] .'">'. $brand['name'] .'</option>
                                                    ';
                                                }
                                            }else{
                                                $string .= '
                                                    <option value="'. $brand['id_brand'] .'">'. $brand['name'] .'</option>
                                                ';
                                            }
                                        }
                                        echo $string;
                                    ?>
                                    
                                </select>
                            </div>
                            <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                                <label for="colorSpace">Color Space</label><br />
                                <select name="colorSpace" id="colorSpace">
                                    <option value="">
                                        --- Choose monitor's color space ---
                                    </option>
                                    <?php 
                                        $string = '';
                                        foreach ($listAllSelects['colorSpace'] as $key => $colorSpace) {
                                            if(isset($monitorPoint)){
                                                if($colorSpace['name'] == $monitorPoint['color_space_name']){
                                                    $string .= '
                                                        <option selected value="'. $colorSpace['id_color_space'] .'">'. $colorSpace['name'] .'</option>
                                                    ';
                                                }else{
                                                    $string .= '
                                                        <option value="'. $colorSpace['id_color_space'] .'">'. $colorSpace['name'] .'</option>
                                                    ';
                                                }
                                            }else{
                                                $string .= '
                                                    <option value="'. $colorSpace['id_color_space'] .'">'. $colorSpace['name'] .'</option>
                                                ';
                                            }
                                        }
                                        echo $string;
                                    ?>
                                </select>
                            </div>
                            <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                                <label for="basePlate">Base Plate</label><br />
                                <select name="basePlate" id="basePlate">
                                    <option value="">
                                        --- Choose monitor's base plate ---
                                    </option>
                                    <?php 
                                        $string = '';
                                        foreach ($listAllSelects['basePlate'] as $key => $basePlate) {
                                            if(isset($monitorPoint)){
                                                if($basePlate['name'] == $monitorPoint['base_plate_name']){
                                                    $string .= '
                                                        <option selected value="'. $basePlate['id_base_plate'] .'">'. $basePlate['name'] .'</option>
                                                    ';
                                                }else{
                                                    $string .= '
                                                        <option value="'. $basePlate['id_base_plate'] .'">'. $basePlate['name'] .'</option>
                                                    ';
                                                }
                                            }else{
                                                $string .= '
                                                    <option value="'. $basePlate['id_base_plate'] .'">'. $basePlate['name'] .'</option>
                                                ';
                                            }
                                        }
                                        echo $string;
                                    ?>
                                </select>
                            </div>
                            <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                                <label for="screenSolution">Screen Solution</label><br />
                                <select name="screenSolution" id="screenSolution">
                                    <option value="">
                                        --- Screen Solution ---
                                    </option>
                                    <?php 
                                        $string = '';
                                        foreach ($listAllSelects['screenSolution'] as $key => $screenSolution) {
                                            if(isset($monitorPoint)){
                                                if($screenSolution['name'] == $monitorPoint['screen_solution_name']){
                                                    $string .= '
                                                        <option selected value="'. $screenSolution['id_screen_solution'] .'">'. $screenSolution['name'] .'</option>
                                                    ';
                                                }else{
                                                    $string .= '
                                                        <option value="'. $screenSolution['id_screen_solution'] .'">'. $screenSolution['name'] .'</option>
                                                    ';
                                                }
                                            }else{
                                                $string .= '
                                                    <option value="'. $screenSolution['id_screen_solution'] .'">'. $screenSolution['name'] .'</option>
                                                ';
                                            }
                                        }
                                        echo $string;
                                    ?>
                                </select>
                            </div>
                            <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                                <label for="scanFrequency">Scan Frequency</label><br />
                                <select name="scanFrequency" id="scanFrequency">
                                    <option value="">
                                        --- Choose monitor's scan frequency ---
                                    </option>
                                    <?php 
                                        $string = '';
                                        foreach ($listAllSelects['scanFrequency'] as $key => $scanFrequency) {
                                            if(isset($monitorPoint)){
                                                if($scanFrequency['number'] == $monitorPoint['scan_frequency_number']){
                                                    $string .= '
                                                        <option selected value="'. $scanFrequency['id_scan_frequency'] .'">'. $scanFrequency['number'] .' Hz</option>
                                                    ';
                                                }else{
                                                    $string .= '
                                                        <option value="'. $scanFrequency['id_scan_frequency'] .'">'. $scanFrequency['number'] .' Hz</option>
                                                    ';
                                                }
                                            }else{
                                                $string .= '
                                                    <option value="'. $scanFrequency['id_scan_frequency'] .'">'. $scanFrequency['number'] .' Hz</option>
                                                ';
                                            }
                                        }
                                        echo $string;
                                    ?>
                                </select>
                            </div>
                            <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                                <label for="images1">Thêm ảnh 1</label><br />
                                <input
                                    type="file"
                                    id="images1"
                                    name="images1"
                                    placeholder="Input monitor's images1" />
                            </div>
                            <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                                <label for="images2">Thêm ảnh 2</label><br />
                                <input
                                    type="file"
                                    id="images2"
                                    name="images2"
                                    placeholder="Input monitor's images2" />
                            </div>
                            <div class="col col-12 col-sm-6 col-md-4 col-lg-2">
                                <label for="images3">Thêm ảnh 3</label><br />
                                <input
                                    type="file"
                                    id="images3"
                                    name="images3"
                                    placeholder="Input monitor's images3" />
                            </div>
                        </div>
                        <div class="row">
                            <label for="descibe">Desciption</label>
                            <?php 
                                if(isset($monitorPoint)){
                                    echo '
                                        <textarea
                                            name="descibe"
                                            id="descibe"
                                            placeholder="Write desciption for new monitor">'. $monitorPoint['describe_monitor'] .'
                                        </textarea>
                                    ';
                                }else{
                                    echo '
                                        <textarea
                                            name="descibe"
                                            id="descibe"
                                            placeholder="Write desciption for new monitor">
                                        </textarea>
                                    ';
                                }
                            ?>
                        </div>
                        <div class="form-dashboard-icons mt-2">
                            <?php 
                                if(isset($monitorPoint)){
                                    echo '
                                        <input
                                            type="submit"
                                            class="btn btn-main-color text-white" value="Cập nhật">
                                        </input>
                                    ';
                                }else{
                                    echo '
                                        <input
                                            type="submit"
                                            name="addMonitor"
                                            class="btn btn-main-color text-white" value="Thêm">
                                        </input>
                                    ';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </form>
            <div class="content-right-table">
                <div
                    class="content-right-table-head d-flex justify-content-between px-2 py-3 align-items-center"
                    style="width: 100%; border-bottom: 1px solid #aaaaaa">
                    <p class="mb-0"><?= count($listMonitors) ?> results</p>
                    <form action="" style="width: 200px">
                        <input
                            type="text"
                            placeholder="search ..."
                            name="search"
                            class="input-search-table-right" />
                    </form>
                </div>
                <div class="table-scroll-admin">
                    <table class="content-right-table-info">
                        <thead>
                            <tr>
                                <th>Stt</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Images</th>
                                <th>Istock</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $string = '';
                            foreach ($listMonitors as $key => $monitor) {
                                $typeScreen = $monitor['type_screen'] ? 'Thẳng' : 'Cong';
                                $status = $monitor['status'] === 1 ? 'Sẵn hàng' : 'Hết hàng';
                                $imagesString = '';
                                foreach ($listAllImages[$key] as $keyImage => $image) {
                                    $imagesString .= '
                                            <img
                                                    src="public/img/'. $image['path'] .'"
                                                    alt=""
                                                    width="40px"
                                                    height="40px"
                                                    style="object-fit: cover" />
                                        ';
                                }
                                $string .= '
                                        <tr>
                                            <td>' . $key + 1 . '</td>
                                            <td>
                                                <div class="right-content-table-name">
                                                    ' . $monitor['name'] . '
                                                </div>
                                            </td>
                                            <td>' . number_format($monitor['price'], 0, ',', '.') . '</td>
                                            <td>
                                                '. $imagesString .'
                                            </td>
                                            <td>' . $monitor['in_stock'] . '</td>
                                            <td>' . $status . '</td>
                                            <td
                                                class="d-flex"
                                                style="height: 50px; width: fit-content">
                                                <div
                                                    href="#"
                                                    class="text-decoration-none me-1 d-flex align-items-center justify-content-center"
                                                    style="cursor: pointer"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop">
                                                    <span
                                                        class="material-symbols-outlined text-warning icon-href-dashboard"
                                                        style="font-size: 18px">
                                                        visibility
                                                    </span>
                                                    <!-- Modal -->
                                                    <div
                                                        class="modal fade"
                                                        id="staticBackdrop"
                                                        data-bs-backdrop="static"
                                                        data-bs-keyboard="false"
                                                        tabindex="-1"
                                                        aria-labelledby="staticBackdropLabel"
                                                        aria-hidden="true">
                                                        <div
                                                            class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1
                                                                        class="modal-title fs-5"
                                                                        id="staticBackdropLabel">
                                                                        Information Detail
                                                                    </h1>
                                                                    <button
                                                                        type="button"
                                                                        class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table>
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Name</th>
                                                                                <th>Kiểu màn hình</th>
                                                                                <th>Tốc độ phản hồi</th>
                                                                                <th>Bảo hành</th>
                                                                                <th>Kích thước</th>
                                                                                <th>Thương hiệu</th>
                                                                                <th>Tấm nền</th>
                                                                                <th>Không gian màu</th>
                                                                                <th>Độ phân giải</th>
                                                                                <th>Tần số quét</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>'. $monitor['name'] .'</td>
                                                                                <td>'. $typeScreen .'</td>
                                                                                <td>'. $monitor['response_time'] .'</td>
                                                                                <td>'. $monitor['gurantee'] .'</td>
                                                                                <td>'. $monitor['size'] .'</td>
                                                                                <td>'. $monitor['brand_name'] .'</td>
                                                                                <td>'. $monitor['base_plate_name'] .'</td>
                                                                                <td>'. $monitor['color_space_name'] .'</td>
                                                                                <td>'. $monitor['screen_solution_name'] .'</td>
                                                                                <td>'. $monitor['scan_frequency_number'] .'</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button
                                                                        type="button"
                                                                        class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">
                                                                        Đóng
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a
                                                    href="index.php?page=admin&content=monitor&action=getMonitor&id='. $monitor['id_monitor'] .'"
                                                    class="text-decoration-none me-1 d-flex align-items-center justify-content-center"
                                                    style="margin-right: 3px; display: block">
                                                    <span
                                                        class="material-symbols-outlined text-primary icon-href-dashboard"
                                                        style="font-size: 18px">
                                                        edit
                                                    </span>
                                                </a>
                                                <a
                                                    href="index.php?page=admin&content=monitor&action=delete&id='. $monitor['id_monitor'] .'"
                                                    class="text-decoration-none me-1 d-flex align-items-center justify-content-center"
                                                    style="margin-right: 3px; display: block">
                                                    <span
                                                        class="material-symbols-outlined text-danger icon-href-dashboard"
                                                        style="font-size: 18px">
                                                        delete
                                                    </span>
                                                </a>
                                                <!-- <button type="button" class="btn btn-danger text-white">Delete</button> -->
                                            </td>
                                        </tr>
                                    ';
                            }
                            echo $string;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>