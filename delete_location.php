<?php
include 'Include/config.php';

    $id   = $_POST['id'];


    $sql = "UPDATE  location_tbl
        SET
        status = '0'
        where id = $id";

    $result = $conn->query($sql);

    if ($result) {
        $status3 = 1;


    } else {
        $status3 = 0;
    }


    echo $status3;
?>
