<?php
include 'Include/config.php';

    $id   = $_POST['id'];


    $sql = "UPDATE  employee_tbl
        SET
        status = '0'
        where id = $id";

    $result = $conn->query($sql);

    if ($result) {
        $status1 = 1;


    } else {
        $status1 = 0;
    }


    echo $status1;
?>
