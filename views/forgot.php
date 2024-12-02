<?php 
    if(isset($error)){
        echo "
            <script>
                alert('$error');
            </script>
        ";
    }
    // change href if email is correct
    if(isset($header)){
        echo $header;
    }
?>
<div class="container d-flex flex-column align-items-center justify-content-center vh-100 text-center px-3">
    <img src="./imgduan1/logo.jpg" alt="Logo" class="img-fluid mb-4" style="max-width: 200px;">
    <h3 class="mb-4">Quên mật khẩu</h3>
    <!-- Login form -->
    <form action="index.php?page=forgot&action=checkEmail" method="post" class="w-100" style="max-width: 400px;">
        <input type="email" name="email" class="custom-input mb-3" placeholder="Nhập email" id="email">
        <input type="submit" value="Quên mật khẩu" name="forgot" class="custom-button"></input>
    </form>
</div>