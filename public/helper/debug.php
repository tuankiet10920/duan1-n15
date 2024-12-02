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
        $mail->Body    = "Mã otp của bạn: $otp";

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

function seperateDayInData($stringDayInData){
    $arrayDayFormat = explode("-", $stringDayInData);
    return [
        'day' => $arrayDayFormat[2],
        'month' => $arrayDayFormat[1],
        'year' => $arrayDayFormat[0]
    ];
}