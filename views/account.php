<?php 
if(isset($informationOfUser)){
    if($informationOfUser[0]['address'] !== null){
        $date = seperateDayInData($informationOfUser[0]['birthday']);
    }
    // test_array($informationOfUser);
}
if(isset($header)){
    echo $header;
}

?>
<div class="main-content">
    <h2>Thông tin tài khoản</h2>
    <form action="index.php?page=account&action=saveChange" method="post" class="account-info" enctype="multipart/form-data">
        <label>Họ và tên:</label>
        <input type="text" readonly class="username-account" name="name" value="<?php echo $informationOfUser[0]['name'] ?>">

        <label>Biệt danh</label>
        <input type="text" class="username-account" name="nickName" value="<?php 
            if($informationOfUser[0]['nick_name'] !== null && $informationOfUser[0]['nick_name'] !== ''){
                echo $informationOfUser[0]['nick_name'];
            }else{
                echo 'Vui lòng nhập';
            }
        ?>">

        Đổi ảnh đại diện:
        <input type="file" class="username-account" name="image" id="fileToUpload">

        <label>Giới tính</label>
        <div class="gender">
            <?php 
                if($informationOfUser[0]['gender'] == 0){
                    echo '
                        <input type="radio" id="male" name="gender" value="0" checked>
                        <label class="male" for="male">Nam</label>
                        <input type="radio" id="female" name="gender" value="1">
                        <label class="female" for="female">Nữ</label>
                    ';
                } else if($informationOfUser[0]['gender'] == 1){
                    echo '
                        <input type="radio" id="male" name="gender" value="0">
                        <label class="male" for="male">Nam</label>
                        <input type="radio" id="female" name="gender" value="1" checked>
                        <label class="female" for="female">Nữ</label>
                    ';
                } else {
                    echo '
                        <input type="radio" id="male" name="gender" value="0">
                        <label class="male" for="male">Nam</label>
                        <input type="radio" id="female" name="gender" value="1">
                        <label class="female" for="female">Nữ</label>
                    ';
                }
            ?>
        </div>

        <label>Số điện thoại</label>
        <div class="input-with-action">
            <input type="text" readonly placeholder="Vui lòng nhập" value="<?php echo $informationOfUser[0]['phone'] ?>" name="phone" style="border: none; outline: none">
            <a href="#">Thay đổi</a>
        </div>

        <label>Email</label>
        <div class="input-with-action">
            <input type="email" readonly value="<?php echo $informationOfUser[0]['email'] ?>" placeholder="Vui lòng nhập" name="email" style="border: none; outline: none">
            <a href="#">Thay đổi</a>
        </div>

        <label>Địa chỉ</label>
        <?php 
            if($informationOfUser[0]['address'] !== null && $informationOfUser[0]['address'] !== ''){
                echo '
                    <input type="text" name="address" value="'. $informationOfUser[0]['address'] .'" class="username-account" value="Vui lòng nhập">
                ';
            }else{
                echo '
                    <input type="text" name="address" class="username-account" value="Vui lòng nhập">
                ';
            }
        ?>

        <label>Ngày sinh</label>
        <div class="date-select">
            <select name="day">
                <option value="">Ngày</option>
                <?php 
                    $string = '';
                    $countDay = 1;
                    while ($countDay <= 31) {
                        if(isset($date)){
                            if($countDay == $date['day']){
                                $string .= '
                                    <option value="'. $countDay .'" selected>'. $countDay .'</option>
                                ';
                            }else{
                                $string .= '
                                    <option value="'. $countDay .'">'. $countDay .'</option>
                                ';
                            }
                        }else{
                            $string .= '
                                <option value="'. $countDay .'">'. $countDay .'</option>
                            ';
                        }
                        
                        $countDay++;
                    }
                    echo $string;
                ?>
            </select>
            <select name="month">
                <option value="">Tháng</option>
                <?php 
                    $string = '';
                    $countMonth = 1;
                    while ($countMonth <= 12) {
                        if(isset($date)){
                            if($countMonth == $date['month']){
                                $string .= '
                                    <option value="'. $countMonth .'" selected>'. $countMonth .'</option>
                                ';
                            }else{
                                $string .= '
                                    <option value="'. $countMonth .'">'. $countMonth .'</option>
                                ';
                            }
                        }else{
                            $string .= '
                                <option value="'. $countMonth .'">'. $countMonth .'</option>
                            ';
                        }
                        $countMonth++;
                    }
                    echo $string;
                ?>
            </select>
            <select name="year">
                <option value="">Năm</option>
                <?php 
                    $string = '';
                    $countYear = 1900;
                    while ($countYear <= 2024) {
                        if(isset($date)){
                            if($countYear == $date['year']){
                                $string.= '
                                    <option value="'. $countYear .'" selected>'. $countYear .'</option>
                                ';
                            }else{
                                $string.= '
                                    <option value="'. $countYear .'">'. $countYear .'</option>
                                ';
                            }
                        }else{
                            $string.= '
                                <option value="'. $countYear .'">'. $countYear .'</option>
                            ';
                        }
                        $countYear++;
                    }
                    echo $string;
                ?>
            </select>
        </div>

        <input type="submit" name="saveChangeAccount" value="Lưu thay đổi" style="background: #7cb1e6; border: none; color: #fff;" class="py-2"></input>
    </form>
</div>
</div>
</div>