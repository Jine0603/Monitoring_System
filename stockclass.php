<?php
include 'Include/config.php';

$data = array();

if(isset($_GET['stock'])){
    $stock = $_GET['stock'];

    $sql = "SELECT assetid,assetname,assignemployee FROM item_tbl WHERE categoriesid = '$stock' AND assetstatus = '1'";

$query = mysqli_query($conn, $sql);
$no = 0;
while($rows = mysqli_fetch_assoc($query)) {
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
