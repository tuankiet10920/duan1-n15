<?php 
    if(isset($test)){
        test_array($test);
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
        <div class="row">
            <!-- Cột chi tiết thanh toán -->
            <div class="col-md-6">
                <h4 class="mb-4">Chi tiết thanh toán</h4>
                <form>
                    <div class="mb-3">
                        <label for="fullName" class="form-label"><b>Họ
                                và tên</b></label>
                        <input type="text" class="form-control"
                            id="fullName" placeholder="Nhập họ và tên">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label"><b>Địa
                                chỉ nơi ở (bắt buộc)</b></label>
                        <input type="text" class="form-control"
                            id="address" placeholder="Nhập địa chỉ">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label"><b>Số điện
                                thoại (bắt buộc)</b></label>
                        <input type="text" class="form-control"
                            id="phone" placeholder="Nhập số điện thoại">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label"><b>Địa chỉ
                                Email (nếu có)</b></label>
                        <input type="email" class="form-control"
                            id="email" placeholder="Nhập email">
                    </div>
                </form>
            </div>

            <!-- Cột đơn hàng đã chọn -->
            <div class="col-md-6">
                <h4 class="mb-4">Đơn hàng đã chọn</h4>
                <ul class="list-group mb-3">
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="./img/dell1.jpg" alt
                                style="width: 80px;" height="80px">
                            <div
                                class="pay-item-content d-flex justify-content-around"
                                style="flex-direction: column;">
                                <strong
                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 400px;  display: inline-block;">Smart
                                    Tivi Samsung Crystal UHD 4K 55
                                    inch</strong>
                                <p class="mb-0">Số lượng: 2</p>
                            </div>
                        </div>
                        <span>8.890.000đ</span>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="./img/dell1.jpg" alt
                                style="width: 80px;" height="80px">
                            <div
                                class="pay-item-content d-flex justify-content-around"
                                style="flex-direction: column;">
                                <strong
                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 400px;  display: inline-block;">Smart
                                    Tivi Samsung Crystal UHD 4K 55
                                    inch</strong>
                                <p class="mb-0">Số lượng: 2</p>
                            </div>
                        </div>
                        <span>8.890.000đ</span>
                    </li>
                    <li
                        class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="./img/dell1.jpg" alt
                                style="width: 80px;" height="80px">
                            <div
                                class="pay-item-content d-flex justify-content-around"
                                style="flex-direction: column;">
                                <strong
                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 400px;  display: inline-block;">Smart
                                    Tivi Samsung Crystal UHD 4K 55
                                    inch</strong>
                                <p class="mb-0">Số lượng: 2</p>
                            </div>
                        </div>
                        <span>8.890.000đ</span>
                    </li>
                </ul>
                <div class="mb-3">
                    <div class="d-flex justify-content-between">
                        <span>MUADONG1:</span>
                        <span>-5.000đ</span>
                    </div>
                    <div class="d-flex justify-content-between fw-bold">
                        <span>Tổng cộng:</span>
                        <span>11.889.000đ</span>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Phương thức thanh
                        toán</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio"
                            name="paymentMethod" id="cashOnDelivery">
                        <label class="form-check-label"
                            for="cashOnDelivery">Thanh toán khi nhận
                            hàng</label>
                    </div>
                </div>
                <button class="btn btn btn-primary w-100"
                    type="button">Đặt hàng</button>
            </div>
        </div>
    </div>