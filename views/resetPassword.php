<?php 
    if(isset($header)){
        echo $header;
    }
?>
<div class="container d-flex flex-column align-items-center justify-content-center vh-100 text-center px-3">
    <img src="./imgduan1/logo.jpg" alt="Logo" class="img-fluid mb-4" style="max-width: 200px;">
    <h3 class="mb-4">Đặt mật khẩu mới</h3>
    <?php 
        if(isset($error)){
            echo '<p style="color: red">'. $error .'</p>';
        }
    ?>
    <!-- Login form -->
    <form action="index.php?page=resetPassword&action=changePassword&email=<?php echo $_GET['email'] ?>" method="post" class="w-100" style="max-width: 400px;">
        <input type="text" name="newPassword" class="custom-input mb-3" placeholder="Nhập mật khẩu mới">
        <input type="text" name="newPasswordConfirm" class="custom-input mb-3" placeholder="Nhập lại mật khẩu">
        <input type="submit" value="Cập nhật mật khẩu" name="resetPassword" class="custom-button"></input>
    </form>
</div>