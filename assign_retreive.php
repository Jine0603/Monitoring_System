<?php
include 'Include/config.php';

$id   = $_POST['id'];
$idss   = $_POST['assid'];

$sql1 = "UPDATE assigned_tbl 
    SET 
    status = '0'
    WHERE id='$id'";
    $execute = mysqli_query($conn, $sql1);


    $sql1 = "UPDATE item_tbl 
    SET 
    assigned_status = '0'
    WHERE id='$idss'";
    $execute1 = mysqli_query($conn, $sql1);

    if ($execute1) {
        $status2 = 1;


    } else {
        $status2 = 0;
    }


    echo $status2;

mysqli_close($conn);
?>