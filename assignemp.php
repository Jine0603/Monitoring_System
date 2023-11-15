<?php
include 'Include/config.php';

$id = $_POST['id'];
$id1 = $_POST['assid'];

$status = 0; // Default status

// First update
$sql1 = "UPDATE assigned_tbl
        SET
        status = '0'
        WHERE id = $id";

$result1 = $conn->query($sql1);

if ($result1) {
    // First update successful, proceed with the second update

    $sql2 = "UPDATE item_tbl
        SET
        assigned_status = '0'
        WHERE id = $id1";

    $result2 = $conn->query($sql2);

    if ($result2) {
        $status = 1; // Both updates successful
    }
} else {
    $status = 0; // First update failed
}

echo $status; // Return the appropriate status code

?>