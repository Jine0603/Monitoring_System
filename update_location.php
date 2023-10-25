<?php
include 'Include/config.php';

  // Get data from POST request
$id           = mysqli_real_escape_string($conn, $_POST['id']);
$location    = mysqli_real_escape_string($conn, $_POST['location']);

  // Prepare and execute the SQL update query
$sql = "UPDATE location_tbl 
        SET 
        location    = '$location'
        WHERE 
            id = '$id'";

if (mysqli_query($conn, $sql)) {
    echo json_encode(array("statusCode" => 200));
} else {
    echo json_encode(array("statusCode" => 201, "error" => mysqli_error($conn)));
}

mysqli_close($conn);
