<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer_send/src/Exception.php';
require 'phpmailer_send/src/PHPMailer.php';
require 'phpmailer_send/src/SMTP.php';
require 'seasionindex.php';

function send_email($email, $assetid, $assetname, $cateid){
    include 'Include/config.php';

    $accid = $_SESSION["id"];

    $sql = "SELECT * FROM employee_tbl WHERE id = $accid";
    $query = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_array($query);

    $lastname = $rows['lastname'];
    $firstname = $rows['firstname'];

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'onlinefixedmonitoringsystem@gmail.com'; //your gmail
    $mail->Password = 'aenj elts gvtr mgme'; //your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // Recipients
    $mail->setFrom('onlinefixedmonitoringsystem@gmail.com'); //your gmail
    $mail->addAddress($email);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Asset Assigned';
    $mail->Body = '
   Good Day  Mr./Ms. '. $lastname.'  has Assigned you an Asset for FIXED ASSET MONITORING SYSTEM WITH BARCODING. 
    
    <br><br>
    
    <b>Asset No: ' . $cateid . ' - ' . $assetid . '<br>
    Asset Name : <b>'.$assetname.'</b>


    <br><br>
   
    ';

    $mail->send();
}
