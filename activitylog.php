<?php
include 'Include/config.php';
include 'seasionindex.php';

$date = new DateTime('now', new DateTimeZone('Asia/Manila'));
$currentDate = $date->format("Y-m-d");
$time = $date->format("g:i:a");
$detail = "View ASSET NO."." ".$rows['file'];
    
    $sql = "SELECT * FROM multfile_tbl";

    $sql1 = "INSERT INTO activity_log (id_user,details,date,time,datecreated) VALUES ('$accid','$detail','$currentDate','$time','$currentDate')";
    $query2 = mysqli_query($conn, $sql1);
?>