<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function test_array($array)
{
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function transBoolToStringTS($bool)
{
    return $bool === 0 ? 'cong' : 'phẳng';
}

function sendMail($to, $otp)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'kietnguyen02112002@gmail.com';
        // aahf mmcn sfsb cbjt                    //SMTP username
        $mail->Password   = 'aahfmmcnsfsbcbjt';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('kietnguyen02112002@gmail.com', 'Monitor World');
        $mail->addAddress($to);     //Add a recipient


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Change Password Account Monitor World';
        $mail->Body    = '
                          <div style="max-width: 400px;
                            padding: 30px;
                            border: 1px solid #ddd;
                            border-radius: 10px;
                            background-color: #f9f9f9;">
                                <div style="text-align: center;">
                                <h2 style="font-size: 24px;
                                font-weight: bold;
                                color: #007bff;"><strong>Email OTP</strong></h2>
                                <hr>
                                <p>Gửi khách hàng của tôi</p>
                                <p>Mã OTP của bạn:</p>
                                <p style="font-size: 30px;
                                font-weight: bold;
                                color: #28a745;">'. $otp .'</p>
                                <p>Hãy sử dụng mã OTP này để hoàn thành tiến trình đổi mật khẩu của bạn. Đừng chia sẽ mã OTP này cho bất kỳ ai!</p>
                                </div>
                                <div style="font-size: 12px;
                                text-align: center;
                                margin-top: 20px;
                                color: #6c757d;">
                                <p>Cảm ơn vì đã tin tưởng cửa hàng chúng tôi</p>
                                <p><span style="color: #007bff; ">© https://monitorworld.com.</span> All rights reserved.</p>
                                </div>
                        </div>
        ';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function seperateDayInData($stringDayInData)
{
    $arrayDayFormat = explode("-", $stringDayInData);
    return [
        'day' => $arrayDayFormat[2],
        'month' => $arrayDayFormat[1],
        'year' => $arrayDayFormat[0]
    ];
}

