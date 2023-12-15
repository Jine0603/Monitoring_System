<?php
include 'Include/config.php';
include 'seasionindex.php';
$id = $_POST['id'];

$date = new DateTime('now', new DateTimeZone('Asia/Manila'));
$currentDate = $date->format("Y-m-d");
$time = $date->format("g:i:a");


$sql = "UPDATE multfile_tbl
        SET
        status = '0'
        WHERE id = $id";

$result = mysqli_query($conn, $sql);

if ($result) {
    // The update was successful
    $status1 = 1;

        // $sqlQ = "SELECT item_tbl.id, location_tbl.location, categ_tbl.categories, com_tbl.company AS companyid, item_tbl.assetid,
        //         item_tbl.file_name, item_tbl.assetname, item_tbl.companyid, item_tbl.categoriesid, item_tbl.date_purchase, item_tbl.locationid, item_tbl.assigned_status, item_tbl.status, item_tbl.date_created
        //         FROM item_tbl
        //         LEFT JOIN location_tbl ON location_tbl.id = item_tbl.locationid
        //         LEFT JOIN categ_tbl ON categ_tbl.id = item_tbl.categoriesid
        //         LEFT JOIN com_tbl ON com_tbl.id = item_tbl.companyid
        //         WHERE item_tbl.id = $id";

        // $query1 = mysqli_query($conn, $sqlQ);

        // if ($query1 && mysqli_num_rows($query1) > 0) {
        //     $rows = mysqli_fetch_array($query1);
        //     $cateid = $rows['categoriesid'];
        //     $item = $rows['assetid'];

        //     $detail = "Asset No " . $cateid . ' - ' . $item . " Delete Files";

        //     // Insert into the activity log
        //     $sql1 = "INSERT INTO activity_log (id_user, details, date, time, datecreated) VALUES ('$accid', '$detail', '$currentDate', '$time', '$currentDate')";
        //     $query2 = mysqli_query($conn, $sql1);
        // }

        $sqlQ = "SELECT multfile_tbl.id,item_tbl.id, item_tbl.assetid, item_tbl.categoriesid AS categoriesid, multfile_tbl.userid1, multfile_tbl.itemid, multfile_tbl.file, multfile_tbl.status, multfile_tbl.datecreated 
        FROM multfile_tbl 
        LEFT JOIN item_tbl ON item_tbl.id = multfile_tbl.itemid
        WHERE multfile_tbl.id = $id";

        $query1 = mysqli_query($conn, $sqlQ);

        if ($query1 && mysqli_num_rows($query1) > 0) {
            $rows = mysqli_fetch_array($query1);
            $cateid = $rows['categoriesid'];
            $item = $rows['assetid'];
            $filname = $rows['file'];

            $detail = "Asset No " . $cateid . ' - ' . $item . " Delete Files ".$filname;

            // Insert into the activity log
            $sql1 = "INSERT INTO activity_log (id_user, details, date, time, datecreated) VALUES ('$accid', '$detail', '$currentDate', '$time', '$currentDate')";
            $query2 = mysqli_query($conn, $sql1);
        }
} else {
    // The update failed
    $status1 = 0;
}

echo $status1;
?>