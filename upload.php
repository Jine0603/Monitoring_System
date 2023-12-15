<?php
include 'seasionindex.php';
include 'timezone.php';
global $date_now;
// File upload folder 
$uploadDir = 'uploadimg/';

// Allowed file types 
$allowTypes = array('png', 'jpg', 'jpeg');
// $files_array = array();
$employeeid = $_SESSION['id'];
// $idss       = $_POST('idss');
$idss = $_POST['idss'];

$date = new DateTime('now', new DateTimeZone('Asia/Manila'));
$currentDate = $date->format("Y-m-d");
$time = $date->format("g:i:a");


$count = count($_FILES['filess']['name']);
for ($a = 0; $a < $count; $a++) {
    if (isset($_FILES['filess']['name'][$a]) && $_FILES['filess']['name'][$a] != '') {
        $filename = $_FILES['filess']['name'][$a];
        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        $valid_ext = array("pdf");
        //  if (in_array($ext, $valid_ext)) {
        $path = $uploadDir . $filename;
        $e = 1;
        $filename_without_ext = pathinfo($filename, PATHINFO_FILENAME);

        while (file_exists($path)) {
            $filename = $filename_without_ext  . "_" . rand(1, 9999) . "_" . time() . "_" . $e . "." . $ext;
            $path = $uploadDir . $filename;

            $e++;
        }
        if (move_uploaded_file($_FILES['filess']['tmp_name'][$a], $path)) {
            $files_array[] = $path;

            // $fie = json_encode($storagefile, JSON_FORCE_OBJECT);
            $sql1 = "INSERT INTO `multfile_tbl`(`userid1`, `itemid`, `file`,`datecreated`) 
            VALUES ('$employeeid','$idss','$filename','$date_now')";
            $query = mysqli_query($conn, $sql1);
            // array_push($storagefile, $filename);
            if ($query == true) {
                $last_inserted_id = mysqli_insert_id($conn);

                // Fetch the details of the last inserted record
                $sqlQ = "SELECT multfile_tbl.id,item_tbl.id, item_tbl.assetid, item_tbl.categoriesid AS categoriesid, multfile_tbl.userid1, multfile_tbl.itemid, multfile_tbl.file, multfile_tbl.status, multfile_tbl.datecreated 
                FROM multfile_tbl 
                LEFT JOIN item_tbl ON item_tbl.id = multfile_tbl.itemid
                WHERE multfile_tbl.id = $idss"; // Use the ID of the last inserted row

                $query1 = mysqli_query($conn, $sqlQ);

                if ($query1) {
                    $rows = mysqli_fetch_array($query1);

                    $cateid = $rows['categoriesid'];
                    $item = $rows['assetid'];
                    $filname = $rows['file'];

                    $detail = "Asset No " . $cateid . ' - ' . $item . " Added File " .$filname;

                                    // Insert into the activity log
                $sql1 = "INSERT INTO activity_log (id_user, details, date, time, datecreated) VALUES ('$accid', '$detail', '$currentDate', '$time', '$currentDate')";
                $query2 = mysqli_query($conn, $sql1);
                }
            }
        }
        // }
    }
}

echo json_encode($response);
