<?php 
if(isset($cartList['listMonitorWithImages'])){
    test_array($cartList['listMonitorWithImages']);
}
if(isset($checkVoucherCode)){
    test_array($checkVoucherCode);
}
if(isset($meo)){
    echo $meo;
}
if(isset($code)){
    echo $code;
}
$subtitle = 0;
?>
<div class="container my-4">
    <div class="cart">
        <h2>Trang chủ / Giỏ hàng</h2>
        <table>
            <tr>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng phụ</th>
                <th>Hành động</th>
            </tr>
            <?php 
                if(isset($_SESSION['user'])){
                    if(isset($cartList['listMonitorWithImages']) && count($cartList['listMonitorWithImages']) === 0){
                        echo '
                            <tr>
                                <td colspan="5" class="text-center">Bạn chưa có đơn hàng nào, hãy tiếp tục mua hàng!</td>
                            </tr>
                        ';
                    }else{


                        $string = '';
                        foreach ($cartList['listMonitorWithImages'] as $key => $monitor) {
                            $subtitle += ($monitor['price'] * $monitor['quatity']);
                            $string .= '
                                <tr>
                                    <td>
                                        <img
                                            src="public/img/'. $monitor['pathImage'] .'"
                                            alt="'. $monitor['nameImage'] .'"
                                            class="product-image" />
                                        <p>'. $monitor['name'] .'</p>
                                        <form action="index.php?page=cart&action=addVoucher&id='. $monitor['id_monitor'] .'" method="post">
                                            <input type="text" name="voucherCode" class="input-cart px-3 py-1 rounded-pill" style="border: 1px solid grey; outline: none;" placeholder="Mã Phiếu giảm giá" />
                                            <input type="submit" value="Áp dụng" name="addVoucher" class="btn btn-success text-white">
                                        </form>
                                    </td>
                                    <td>'. number_format($monitor['price'], 0, '.', ',') .'đ</td>
                                    <td>
                                        <div id="buy-amount" style="width: fit-content">
                                            <a href="index.php?page=cart&action=updateQty&type=decrease&id='. $monitor['id_monitor'] .'" class="text-decoration-none">
                                                <button type="button" id="decreaseQty">-</button>
                                            </a>
                                            <p class="qty-cart">'. $monitor['quatity'] .'</p>
                                            <a href="index.php?page=cart&action=updateQty&type=increase&id='. $monitor['id_monitor'] .'" class="text-decoration-none">
                                                <button type="button" id="increaseQty">+</button>
                                            </a>
                                        </div>
                                    </td>
                                    <td>'. number_format($monitor['price'] * $monitor['quatity'], 0, '.', ',') .'đ</td>
                                    <td>
                                        <a href="index.php?page=cart&action=delete&id='. $monitor['id_monitor'] .'">
                                            <button type="button" class="btn btn-warning text-white">
                                                Xóa
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            ';
                        }
                        echo $string;
                    }
                }else{
                    echo '
                        <tr>
                            <td colspan="5" class="text-center">Đăng nhập để hiển thị đơn hàng</td>
                        </tr>
                    ';
                }
            ?>
            
        </table>
        <div><button class="back-button">Trở về trang cửa hàng</button></div>
        <?php 
            if(isset($_SESSION['user'])){
                $string = '';
                $string .= '
                    <div class="cart-summary">
                        <p><strong>Thông tin giỏ hàng:</strong></p>
                        <p><strong>Tạm tính:</strong> '. number_format($subtitle, 0, '.', ',') .'đ</p>
                        <p><strong>Phí vận chuyển:</strong> Miễn Phí</p>
                ';
                if(count($cartList['listMonitorVoucher']) !== 0){
                    foreach ($cartList['listMonitorVoucher'] as $key => $voucherMonitor) {
                        $price = 0;
                        if($voucherMonitor['unit'] === 1){
                            $price = $voucherMonitor['monitor_price'] * ($voucherMonitor['value'] / 100);
                        }else{
                            $price = $voucherMonitor['value'];
                        }
                        $subtitle -= $price;
                        $string .= '
                            <p><strong>Voucher - '. $voucherMonitor['name'] .':</strong> -'. number_format($price, 0, '.', ',') .'đ - '. $voucherMonitor['monitor_name'] .'</p>
                        ';
                    }
                }
                $string .= '
                        <p><strong>Tổng cộng:</strong> '. number_format($subtitle, 0, '.', ',') .'đ</p>
                        <a href="index.php?page=pay">
                            <button class="checkout-button">Tiến hành thanh toán</button>
                        </a>
                    </div>
                ';
                echo $string;
                test_array($cartList['listMonitorVoucher']);
            }
        ?>
        
    </div>
</div>