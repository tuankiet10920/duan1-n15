<?php
class OtpController
{
    public $action;
    public $stringOTP;
    public $email;
    public function __construct($action, $stringOTP, $email)
    {
        $this->action = $action;
        $this->stringOTP = $stringOTP;
        $this->email = $email;
    }
    public function index()
    {
        switch ($this->action) {
            case 'checkOtp':
                $timeLife = 120;
                if (isset($_SESSION['otp'])) {
                    $timeCurrentOtp = $_SESSION['otp']['startTime'] + $timeLife;
                    if (time() <= $timeCurrentOtp) {
                        if ($this->stringOTP == $_SESSION['otp']['codeOTP']) {
                            $result = 'OTP is correct';
                            unset($_SESSION['otp']);
                            $header = "
                                <script>
                                    window.location.href = 'http://localhost:8080/duan1-n15/index.php?page=resetPassword&email=$this->email';
                                </script>
                            ";
                        } else {
                            $result = 'OTP is incorrect';
                        }
                    } else {
                        $result = 'OTP has expired';
                    }
                } else {
                    $result = 'OTP has expired';
                }
                break;

            default:
                # code...
                break;
        }
        include_once 'views/otp.php';
    }
}
