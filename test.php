<?php
include 'asset/Include/config.php';
$data = array();

$sql = "SELECT categ_tbl.id AS categoriesid, sample_db.categoriesid SUM(quantity) 'total' 
FROM sample_db
LEFT JOIN categ_tbl ON categ_tbl.id = sample_db.categoriesid
GROUP BY categ_tbl.id";

$query = mysqli_query($conn,$sql);

while ($rows = mysqli_fetch_assoc($query)){ 

    $cat = $rows['categoriesid'];
             
    $sql1 = "SELECT SUM(assetstatus = 1) 'store', SUM(assetstatus = 2) 'use' FROM categories = '$cat'";
    $query1 = mysqli_query($conn,$sql);

    while ($row = mysqli_fetch_assoc($query1)){

    }
}
?>