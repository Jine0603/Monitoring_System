<?php
include 'Include/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve the selected date range from the Ajax request
    $startDate = $_POST['startDate'] ?? '';
    $endDate = $_POST['endDate'] ?? '';

    if ($startDate != '' && $endDate != ''){
            $sql = "SELECT item_tbl.id,location_tbl.location,categ_tbl.categories,com_tbl.company As companyid,item_tbl.assetid,
    item_tbl.file_name,item_tbl.assetname,item_tbl.companyid,item_tbl.categoriesid,item_tbl.date_purchase,item_tbl.locationid,item_tbl.assigned_status,item_tbl.status,item_tbl.date_created
    FROM item_tbl
    LEFT JOIN location_tbl ON location_tbl.id = item_tbl.locationid
    LEFT JOIN categ_tbl ON categ_tbl.id           = item_tbl.categoriesid
    LEFT JOIN com_tbl ON com_tbl.id               = item_tbl.companyid
    WHERE item_tbl.assigned_status = 0 AND item_tbl.status = 1 AND date_created BETWEEN '$startDate' AND '$endDate'";

    }else{
        
    $sql = "SELECT item_tbl.id,location_tbl.location,categ_tbl.categories,com_tbl.company As companyid,item_tbl.assetid,
    item_tbl.file_name,item_tbl.assetname,item_tbl.companyid,item_tbl.categoriesid,item_tbl.date_purchase,item_tbl.locationid,item_tbl.assigned_status,item_tbl.status,item_tbl.date_created
    FROM item_tbl
    LEFT JOIN location_tbl ON location_tbl.id = item_tbl.locationid
    LEFT JOIN categ_tbl ON categ_tbl.id           = item_tbl.categoriesid
    LEFT JOIN com_tbl ON com_tbl.id               = item_tbl.companyid
    WHERE item_tbl.assigned_status = 0 AND item_tbl.status = 1";
    }
    $query = mysqli_query($conn, $sql);
    $data = array();
    $no = 0;

    while ($rows = mysqli_fetch_assoc($query)) {
        $no++;

        $data[] = array(
            "no"    => $no,
            "asset" => $rows['categoriesid'] . ' - ' . $rows['assetid'],
            "name"  => $rows['assetname'],
            "date"   => $rows['date_created'],
        );
    }

    // Send the data back to the client
    echo json_encode($data);
}
