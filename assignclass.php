<?php
include 'Include/config.php';

$data = array();

if(isset($_GET['use'])){
    $assign = $_GET['use'];

    $sql = "SELECT assetid,assetname,assignemployee FROM item_tbl WHERE categoriesid = '$assign' AND assetstatus = '2'";

$query = mysqli_query($conn, $sql);
$no = 0;
while($rows = mysqli_fetch_assoc($query)) {

    $no++;

    $data[] = array(
             "no" => $no,
            "astid" => $rows['assetid'],
            "name" => $rows['assetname'],
            "assign" => $rows['assignemployee'],
        );   
    }
}

// }
echo json_encode($data);
