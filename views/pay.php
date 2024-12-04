<?php 
    // if(isset($monitorWithImages)){
    //     test_array($monitorWithImages);
    // }
    $checkUser = false;
    if(isset($informationUser)){
        $checkUser = true;
    }

    function addDisabled($checkUser){
        return $checkUser ? 'disabled' : '';
    }
    if(isset($header)){
        echo $header;
    }
?>
<div class="container ">
    <div class=" my-3 mx-2">
        <a class="text-dark" style="text-decoration: none;" href="#">Tài
            khoản /</a>
        <a class="ms-1 text-dark" style="text-decoration: none;"
            href="#">Tài khoản của tôi /</a>
        <a class="ms-1 text-dark" style="text-decoration: none;"
            href="#">Sản phẩm /</a>
        <a class="ms-1 text-dark" style="text-decoration: none;"
            href="#">Xem giỏ hàng / </a>
        <a class="ms-1 text-dark" style="text-decoration: none;"
            href="#">Thanh toán</a>
    </div>

    <div class="container my-3">
        <form action="index.php?page=pay&action=order&idBill=<?php echo $idBill ?>" method="post" class="row">
            <!-- Cột chi tiết thanh toán -->
            <div class="col-md-6">
                <h4 class="mb-4">Chi tiết thanh toán</h4>
                <div>
                    <div class="mb-3">
                        <label for="fullName" class="form-label"><b>Họ
                                và tên</b></label>
                        <input type="text" class="form-control"
                            id="fullName" name="name" value="<?php 
                                if(isset($informationUser)){
                                     echo $informationUser['name'];
                                }else{
                                    echo 'Vui lòng nhập';
                                }
                            ?>" placeholder="Nhập họ và tên" <?php echo addDisabled($checkUser) ?>>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label"><b>Địa
                                chỉ nơi ở (Bắt buộc)</b></label>
                        <input type="text" class="form-control"
                            id="address" name="address" value="<?php 
                                if(isset($informationUser) && $informationUser['address'] !== ''){
                                    echo $informationUser['address'];
                                }else{
                                    echo 'Vui lòng nhập địa chỉ ở trang tài khoản';
                                }
                            ?>" placeholder="Nhập địa chỉ" <?php 
                                if(isset($informationUser) && $informationUser['address'] !== null){
                                    echo 'disabled';
                                }else{
                                    echo '';
                                }
                            ?>>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label"><b>Số điện
                                thoại (Bắt buộc)</b></label>
                        <input type="text" class="form-control"
                            id="phone" name="phone" value="<?php 
                                if(isset($informationUser)){
                                    echo $informationUser['phone'];
                                }else{
                                    echo 'Vui lòng nhập';
                                }
                            ?>" placeholder="Nhập số điện thoại" <?php echo addDisabled($checkUser) ?>>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label"><b>Địa chỉ
                                Email (Bắt buộc)</b></label>
                        <input type="email" class="form-control"
                            id="email" name="email" value="<?php 
                                if(isset($informationUser)){
                                    echo $informationUser['email'];
                                }else{
                                    echo 'Vui lòng nhập';
                                }
                            ?>" placeholder="Nhập email" <?php echo addDisabled($checkUser) ?>>
                    </div>
                </div>
            </div>

            <!-- Cột đơn hàng đã chọn -->
            <div class="col-md-6">
                <h4 class="mb-4">Đơn hàng đã chọn</h4>
                <ul class="list-group mb-3">
                    <?php 
                        
                        $subtotal = 0;
                        $listMonitorVoucher = [];
                        $string = '';
                        foreach ($informationBillDetailAndVoucher as $key => $monitor) {
                            $subtotal += $monitor['price'] * $monitor['quatity'];
                            if($monitor['id_voucher'] !== null){
                                $listMonitorVoucher = [...$listMonitorVoucher, $monitor];
                            }
                            $string .= '
                                <li
                                    class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <img src="public/img/'. $monitorWithImages[$key]['path_image'] .'" alt="'. $monitorWithImages[$key]['name_image'] .'"
                                            style="width: 80px;" height="80px">
                                        <div
                                            class="pay-item-content d-flex justify-content-around"
                                            style="flex-direction: column;">
                                            <strong
                                                style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 400px;  display: inline-block;">'. $monitorWithImages[$key]['name'] .'</strong>
                                            <p class="mb-0">Số lượng: '. $monitor['quatity'] .'</p>
                                        </div>
                                    </div>
                                    <span>'. number_format($monitor['price'], 0, ',', '.') .'đ</span>
                                </li>
                            ';
                        }
                        echo $string;
                    ?>
                    
                </ul>
                <div class="mb-3">
                    <div class="d-flex justify-content-between fw-bold mb-2">
                        <span>Tạm tính:</span>
                        <span><?= number_format($subtotal, 0, ',', '.') ?>đ</span>
                    </div>
                    <?php 
                        $string = '';
                        foreach ($listMonitorVoucher as $key => $voucher) {
                            $subtotal -= $voucher['voucher_cost'] * $voucher['quatity'];
                            $string .= '
                                <div class="d-flex justify-content-between mb-2">
                                    <span>'. $voucher['name_voucher'] .' - '. $informationBillDetailAndVoucher[$key]['monitor_name'] .'  x  '. $informationBillDetailAndVoucher[$key]['quatity'] .'</span>
                                    <span>- '. number_format($voucher['voucher_cost'], 0, ',', '.') .'đ</span>
                                </div>
                            ';
                        }
                        echo $string;
                    ?>
                    <div class="d-flex justify-content-between fw-bold mb-2">
                        <span>Tổng tiền thanh toán:</span>
                        <span><?= number_format($subtotal, 0, ',', '.') ?>đ</span>
                        <input hidden type="hidden" value="<?php echo $subtotal ?>" name="subtotal">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phương thức thanh
                        toán</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio"
                            name="paymentMethod" id="cashOnDelivery" checked>
                        <label class="form-check-label"
                            for="cashOnDelivery">Thanh toán khi nhận
                            hàng</label>
                    </div>
                </div>
                <input class="btn btn btn-primary w-100"
                    type="submit" name="order" value="Đặt hàng"></input>
            </div>
        </div>
    </div>