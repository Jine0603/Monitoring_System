<?php
include 'Include/config.php';

$data = array();

if (isset($_GET['totalall'])) {
    $toall = $_GET['totalall'];

    $sql = "SELECT id,assetid,assetname,assignemployee,assetstatus FROM item_tbl WHERE categoriesid = '$toall'";

    $query = mysqli_query($conn, $sql);
    $no = 0;
    while ($rows = mysqli_fetch_assoc($query)) {
        $id = $rows['id'];
        $no++;
        $employeeassign = $rows['assignemployee'];

        if (!empty($employeeassign)) {

            $assign = $employeeassign;
        } else {

            $assign = "No Employee Assigned";
        }

        $data[] = array(
            "no" => $no,
            "astid" => $rows['assetid'],
            "name" => $rows['assetname'],
            "assign" => $assign,
        );
    }
}

// }
echo json_encode($data);
