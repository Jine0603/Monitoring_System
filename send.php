<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer_send/src/Exception.php';
require 'phpmailer_send/src/PHPMailer.php';
require 'phpmailer_send/src/SMTP.php';

function send_email($email, $username, $password) {
    $mail = new PHPMailer(true);

    $mail -> isSMTP();
    $mail ->Host = 'smtp.gmail.com';
    $mail ->SMTPAuth = true;
    $mail ->Username = 'onlinefixedmonitoringsystem@gmail.com'; //your gmail
    $mail ->Password = 'aenj elts gvtr mgme'; //your gmail app password
    $mail ->SMTPSecure = 'ssl';
    $mail ->Port = 465;
    
    // Recipients
    $mail ->setFrom('onlinefixedmonitoringsystem@gmail.com'); //your gmail
    $mail ->addAddress($email);

    // Content
    $mail ->isHTML(true);
    $mail ->Subject = 'Account Created';
    $mail ->Body = '
    Good day, Your Account has been Created for FIXED ASSET MONITORING SYSTEM WITH BARCODING.
    
    <br><br>
    
    <b>Username:'.$username.'<br>
    Password:<b>'.$password.'</b>

    <br><br>
    ';

    $mail ->send();

}
?>