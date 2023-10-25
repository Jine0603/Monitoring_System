<?php
include 'Include/config.php';

    $id   = $_POST['id'];


    $sql = "UPDATE  position_tbl
        SET
        status = '0'
        where id = $id";

    $result = $conn->query($sql);

    if ($result) {
        $status2 = 1;


    } else {
        $status2 = 0;
    }


    echo $status2;
?>
