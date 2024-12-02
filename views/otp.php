<?php
if (isset($result)) {
    echo $result;
}
if (isset($header)) {
    echo $header;
}
?>
<div class="container d-flex flex-column align-items-center justify-content-center vh-100 text-center">
    <img src="./imgduan1/logo.jpg" alt="Logo" class="img-fluid" style="max-width: 200px;">
    <h3 class="text-center mb-3">Nhập OTP</h3>

    <form action="index.php?page=otp&action=checkOtp&email=<?php echo $_GET['email'] ?>" method="post" class="d-flex justify-content-center mt-3 flex-wrap" style="gap: 10px;">
        <input name="otp1" type="text" class="otp-input" maxlength="1">
        <input name="otp2" type="text" class="otp-input" maxlength="1">
        <input name="otp3" type="text" class="otp-input" maxlength="1">
        <input name="otp4" type="text" class="otp-input" maxlength="1">
        <input name="otp5" type="text" class="otp-input" maxlength="1">
        <input name="otp6" type="text" class="otp-input" maxlength="1">
        <input type="submit" name="checkOtp" class="custom-button mt-4" value="Tiếp tục"></input>
    </form>
    <p class="mt-3">Thời gian còn lại: <span id="timeSessionCoutdown">02:00</span></p>
</div>