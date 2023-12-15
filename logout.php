<?php
include 'Include/config.php';
include 'seasionindex.php';

session_start();


if(session_destroy()){

    $date = new DateTime('now', new DateTimeZone('Asia/Manila'));
          $currentDate = $date->format("Y-m-d");
          $time = $date->format("g:i:a");

          $detail = "Log Out Successfully";

        $sql1 = "INSERT INTO activity_log (id_user,details,date,time,datecreated) VALUES ('$accid','$detail','$currentDate','$time','$currentDate')";
          $query1 = mysqli_query($conn, $sql1);

    header("Location: index.php");

}

?>