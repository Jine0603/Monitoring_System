<?php
include 'Include/config.php';
include 'seasionindex.php';

$id   = $_POST['id'];
$idss   = $_POST['assid'];

$date = new DateTime('now', new DateTimeZone('Asia/Manila'));
$currentDate = $date->format("Y-m-d");
$time = $date->format("g:i:a");

$sql1 = "UPDATE assigned_tbl 
    SET 
    status = '0'
    WHERE id='$id'";
    $execute = mysqli_query($conn, $sql1);


    $sql1 = "UPDATE item_tbl 
    SET 
    assigned_status = '0'
    WHERE id='$idss'";
    $execute1 = mysqli_query($conn, $sql1);

    if ($execute1) {
        $status2 = 1;

        $sqlQ = "SELECT item_tbl.id,location_tbl.location,categ_tbl.categories,com_tbl.company As companyid,item_tbl.assetid,
        item_tbl.file_name,item_tbl.assetname,item_tbl.companyid,item_tbl.categoriesid,item_tbl.date_purchase,item_tbl.locationid,item_tbl.assigned_status,item_tbl.status,item_tbl.date_created
        FROM item_tbl
        LEFT JOIN location_tbl ON location_tbl.id = item_tbl.locationid
        LEFT JOIN categ_tbl ON categ_tbl.id           = item_tbl.categoriesid
        LEFT JOIN com_tbl ON com_tbl.id               = item_tbl.companyid
        WHERE item_tbl.id = $idss";

        $query1 = mysqli_query($conn, $sqlQ);

        if ($query1 && mysqli_num_rows($query1) > 0) {
            $rows = mysqli_fetch_array($query1);
            $cateid = $rows['categoriesid'];
            $item = $rows['assetid'];

            $detail = " Unassigned Asset No " . $cateid . ' - ' . $item;

            // Insert into the activity log
            $sql1 = "INSERT INTO activity_log (id_user, details, date, time, datecreated) VALUES ('$accid', '$detail', '$currentDate', '$time', '$currentDate')";
            $query2 = mysqli_query($conn, $sql1);
        }

    } else {
        $status2 = 0;
    }


    echo $status2;

mysqli_close($conn);
?>