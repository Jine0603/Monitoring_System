<?php
include 'Include/config.php';

$data = array();

    $sql = "SELECT * FROM dep_tbl WHERE companyid = 1";

$query = mysqli_query($conn, $sql);

while($rows = mysqli_fetch_assoc($query)) {

   
    $data[] = array(
            "dep" => $rows['department'],
        );   
}
    
echo json_encode($data);
