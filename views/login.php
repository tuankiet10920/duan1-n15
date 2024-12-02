
<div class="container d-flex flex-column align-items-center py-5">
    <img
        src="./imgduan1/logo.jpg"
        alt="Logo"
        class="img-fluid mb-3"
        style="max-width: 250px" />
    <h3 class="text-center mb-3">Đăng nhập với</h3>

    <div class="d-flex justify-content-center mb-3 align-items-center">
        <img
            src="./imgduan1/logoface.webp"
            alt="Facebook Logo"
            class="img-fluid"
            style="width: 40px; height: 40px" />
        <h6 class="ms-2 me-4 pt-2">Facebook</h6>
        <img
            src="./imgduan1/logogg.webp"
            alt="Google Logo"
            class="img-fluid"
            style="width: 40px; height: 40px" />
        <h6 class="ms-2 pt-2">Google</h6>
    </div>

    <div class="w-100" style="max-width: 400px">
        <div class="d-flex align-items-center mb-3">
            <hr class="flex-grow-1" />
            <span class="px-2">Hoặc</span>
            <hr class="flex-grow-1" />
        </div>

        <!-- Login form -->
        <form action="index.php?page=login&action=check" method="post" id="loginForm" novalidate>
            <p class="error-login" style="font-size: 12px; color: red;"><?php 
                if(isset($error)){
                    echo $error;
                }else{
                    echo '';
                }
            ?></p>
            <div class="form-group mb-3">
                <input
                    type="email"
                    class="form-control custom-input"
                    id="email"
                    placeholder="Nhập email của bạn"
                    value="<?php 
                        if(isset($_GET['email'])){
                            echo $_GET['email'];
                        }else{
                            echo '';
                        }
                    ?>"
                    name="email"
                    required />
                <!-- <div class="invalid-feedback">Vui lòng nhập một email hợp lệ.</div> -->
            </div>

            <div class="form-group mb-3">
                <input
                    type="password"
                    class="form-control custom-input"
                    id="password"
                    placeholder="Mật khẩu"
                    name="password"
                    required />
                <!-- <div class="invalid-feedback">Vui lòng nhập mật khẩu.</div> -->
            </div>

            <div class="d-flex justify-content-end mb-3">
                <a href="index.php?page=forgot" class="text-decoration-none">Quên mật khẩu?</a>
            </div>

            <input type="submit" name="login" value="Đăng nhập" class="btn btn-primary w-100 custom-button">
            </input>
        </form>

        <!-- Sign up link -->
        <div class="text-center mt-3">
            <p>
                Bạn chưa có tài khoản?
                <a href="index.php?page=signup" class="text-decoration-none">Đăng ký ngay</a>
            </p>
        </div>
    </div>
</div>
<?php 
    if(isset($reload)){
      echo $reload;
    }
?>