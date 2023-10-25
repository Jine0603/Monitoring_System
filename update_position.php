<?php
include 'Include/config.php';

  // Get data from POST request
$id           = mysqli_real_escape_string($conn, $_POST['id']);
$companyid    = mysqli_real_escape_string($conn, $_POST['company']);
$departmentid= mysqli_real_escape_string($conn, $_POST['departmentid']);
$position= mysqli_real_escape_string($conn, $_POST['position']);

  // Prepare and execute the SQL update query
$sql = "UPDATE position_tbl 
        SET 
        companyid    = '$companyid',
        departmentid = '$departmentid',
        position = '$position'
        WHERE 
            id = '$id'";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array("statusCode" => 200));
} else {
    echo json_encode(array("statusCode" => 201, "error" => mysqli_error($conn)));
}

mysqli_close($conn);
