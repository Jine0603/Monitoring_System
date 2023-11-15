<?php
include 'Include/config.php';

    $id   = $_POST['id'];


    $sql = "UPDATE  item_tbl
        SET
        status = '0'
        where id = $id";

    $result = $conn->query($sql);

    if ($result) {
        $status4 = 1;


    } else {
        $status4 = 0;
    }


    echo $status4;
?>
