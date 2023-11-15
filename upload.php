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
            $filename = $filename_without_ext  . "_" . rand(1, 9999) . "_" . time() . "_" . $i . "." . $ext;
            $path = $uploadDir . $filename;

            $e++;
        }
        if (move_uploaded_file($_FILES['filess']['tmp_name'][$a], $path)) {
            $files_array[] = $path;

            // $fie = json_encode($storagefile, JSON_FORCE_OBJECT);
            $sql1 = "INSERT INTO `multfile_tbl`(`employeeid`, `itemid`, `file`,`datecreated`) 
            VALUES ('$employeeid','$idss','$filename','$date_now')";
            $query = mysqli_query($conn, $sql1);

            // array_push($storagefile, $filename);
        }
        // }
    }
}

echo json_encode($response);
