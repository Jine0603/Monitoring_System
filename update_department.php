<?php
include 'Include/config.php';

  // Get data from POST request
$id           = mysqli_real_escape_string($conn, $_POST['id']);
$companyid    = mysqli_real_escape_string($conn, $_POST['companyid']);
$department= mysqli_real_escape_string($conn, $_POST['departmentid']);

  // Prepare and execute the SQL update query
$sql = "UPDATE dep_tbl 
        SET 
        companyid    = '$companyid',
        department = '$department'
        WHERE 
            id = '$id'";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array("statusCode" => 200));
} else {
    echo json_encode(array("statusCode" => 201, "error" => mysqli_error($conn)));
}

mysqli_close($conn);
