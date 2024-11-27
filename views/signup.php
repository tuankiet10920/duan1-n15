<div class="container d-flex flex-column align-items-center" style="max-width: 600px;">
    <img src="./imgduan1/logo.jpg" alt="Logo" style="width: 250px;">
    <h3 class="text-center mb-3">Đăng ký với</h3>

    <!-- Social login -->
    <div class="d-flex justify-content-center mb-3">
        <img style="width: 8%; height: 8%;" src="./imgduan1/logoface.webp" alt="Facebook Logo">
        <h6 class="d-flex align-items-center ms-2 me-4 pt-2">Facebook</h6>
        <img style="width: 8%; height: 8%;" src="./imgduan1/logogg.webp" alt="Google Logo">
        <h6 class="d-flex align-items-center ms-2 pt-2">Google</h6>
    </div>

    <div class="w-100" style="max-width: 600px;">
        <!-- Separator -->
        <div class="d-flex align-items-center mb-3">
            <hr class="flex-grow-1">
            <span class="px-2">Hoặc</span>
            <hr class="flex-grow-1">
        </div>

        <!-- Login form -->
        <form action="index.php?page=signup&action=add" method="post">
            <input type="text" name="name" class="custom-input" placeholder="Nhập họ và tên" id="name">
            <input type="text" name="phone" class="custom-input" placeholder="Nhập số điện thoại" id="number">
            <input type="email" name="email" class="custom-input" placeholder="Nhập email" id="email">
            <input type="password" name="password" class="custom-input" placeholder="Nhập mật khẩu" id="password">
            <input type="password" name="passwordConfirm" class="custom-input" placeholder="Nhập lại mật khẩu" id="passwordConfirmation">

            <input type="submit" name="signup" class="custom-button" value="Đăng Ký"></input>
        </form>

        <!-- Sign up link -->
        <div class="text-center mt-3">
            <p>Bạn chưa có tài khoản? <a href="#" class="text-decoration-none">Đăng nhập ngay</a></p>
        </div>
    </div>
</div>