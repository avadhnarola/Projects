<?php

ob_start();
session_start();
$email = $_SESSION['user_email'];
date_default_timezone_set('Etc/UTC');

require 'PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "smtp.gmail.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "avadhnarola2515@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "fsjq esby opzv hadk";
//Set who the message is to be sent from
$mail->setFrom('avadhnarola2515@gmail.com', 'Avadh Narola');
//Set an alternative reply-to address
$mail->addReplyTo('avadhnarola2515@gmail.com', 'Avadh Narola');
//Set who the message is to be sent to
$mail->addAddress($email, 'John Doe');
//Set the subject line
$mail->Subject = 'PHPMailer SMTP test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body

$otp = rand(100000,999999);
$_SESSION['OTP']=$otp;
$msg = "<h3>Your OTP is : </h3><h1>$otp</h1>";
$mail->msgHTML($msg);
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
$mail->addAttachment('images/phpmailer_mini.png');
// $mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    header('location:../checkOtp.php');
}
