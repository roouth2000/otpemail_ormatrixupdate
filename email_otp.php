<?php

// Import the PHPMailer library
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // SMTP settings for Gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;	
    $mail->Username = 'raviwarman2000@gmail.com';
    $mail->Password = 'spuglwuzybswrnpp';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Sender and recipient
    $mail->setFrom('raviwarman2000@gmail.com', 'Raviwarman');
    $mail->addAddress('raviwarman2000@gmail.com', 'roopan');

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'OTP verify';
    $mail->Body = 'By default,  ';

    $mail->send();
    echo 'Email sent successfully';
} catch (Exception $e) {
    echo "Email could not be sent. Error: {$mail->ErrorInfo}";
}
?>	