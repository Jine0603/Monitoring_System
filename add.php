<?php
include 'seasionindex.php';
include 'timezone.php';
global $date_now;
// File upload folder 
$uploadDir = 'uploadimg/';

// Allowed file types 
$allowTypes = array('png', 'jpg', 'jpeg');
// $files_array = array();

// Default response 
$response = array(
    'status' => 0,
    'message' => 'Form submission failed, please try again.'
);
// If form is submitted 
if (isset($_FILES['file1']) || isset($_POST['assetname']) || isset($_POST['company']) || isset($_POST['category'])|| isset($_POST['date_purchase']) || isset($_POST['locationid']) || isset($_POST['qty'])) {
    // Get the submitted form data 

    $employeeid = $_SESSION['id'];
    $assetname = $_POST['assetname'];
    $company = $_POST['company'];
    $category = $_POST['category'];
    $date_purchase = $_POST['date_purchase'];
    $locationid = $_POST['locationid'];
    $qty = $_POST['qty'];
    $date = new DateTime('now', new DateTimeZone('Asia/Manila'));
    $currentDate = $date->format("Y-m-d");
    $time = $date->format("g:i:a");


    // Check whether submitted data is not empty 
    if (!empty($assetname) && !empty($company) && !empty($category) && !empty($date_purchase) && !empty($locationid)) { 
        {
            $uploadStatus = 1;

            // Upload file 
            $uploadedFile = '';
            if (!empty($_FILES["file1"]["name"])) {
                // File path config 
                $fileName = rand(1, 9999) . '_' . $_FILES["file1"]["name"];
                $targetFilePath = $uploadDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                // Allow certain file formats to upload 
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to the server 
                    if (move_uploaded_file($_FILES["file1"]["tmp_name"], $targetFilePath)) {
                        $uploadedFile = $fileName;
                    } else {
                        $uploadStatus = 0;
                        $response['message'] = 'Sorry, there was an error uploading your file.';
                    }
                } else {
                    $uploadStatus = 0;
                    $response['message'] = 'Sorry, only ' . implode('/', $allowTypes) . ' files are allowed to upload.';
                }
            }

            if ($uploadStatus == 1) {
                // Include the database config file 
                include_once 'Include/config.php';

                $storageid = array();
                // $storagefile = array();

                $sql2 = "SELECT assetid,categoriesid FROM item_tbl WHERE categoriesid = '$category' ORDER BY assetid DESC";
                $query1 = mysqli_query($conn, $sql2);
                $rows = mysqli_fetch_assoc($query1);
                $lastid = $rows['assetid'];
                $cat = $rows['categoriesid'];
                $int = (int)$lastid + 1;


                for ($i = 0; $i < $qty; $i++) {
                    
                    // $zero1 = 000;
                    // $asid = $zero1.$last + $i;
                    $asid = str_pad($int + $i, 4, '0', STR_PAD_LEFT);

                    // Insert form data in the database 
                    $sqlQ = "INSERT INTO item_tbl (assetid,file_name,assetname,companyid,categoriesid,date_purchase,locationid,date_created) 
                    VALUES (?,?,?,?,?,?,?,?)";
                    $stmt = $conn->prepare($sqlQ);
                    $stmt->bind_param("ssssssss", $asid, $uploadedFile, $assetname, $company, $category, $date_purchase, $locationid, $date_now);
                    $insert = $stmt->execute();
                    
                    $last_id = mysqli_insert_id($conn);
                    array_push($storageid, $last_id);
                    
                    $detail = "ADD ASSET NO."." ".$category. " - " .$asid;

                    $sql1 = "INSERT INTO activity_log (id_user,details,date,time,datecreated) VALUES ('$accid','$detail','$currentDate','$time','$currentDate')";
                    $query2 = mysqli_query($conn, $sql1);
                    // var_dump($asid);
                }
                if ($insert) {

                    $response['status'] = 1;
                    $response['message'] = 'Form data submitted successfully!';

                    $count = count($_FILES['files']['name']);
                    for ($a = 0; $a < $count; $a++) {
                        if (isset($_FILES['files']['name'][$a]) && $_FILES['files']['name'][$a] != '') {
                            $filename = $_FILES['files']['name'][$a];
                            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                            $valid_ext = array("pdf");
                            //  if (in_array($ext, $valid_ext)) {
                            $path = $uploadDir . $filename;
                            $i = 1;
                            $filename_without_ext = pathinfo($filename, PATHINFO_FILENAME);

                            while (file_exists($path)) {
                                $filename = $filename_without_ext  . "_" . rand(1, 9999) . "_" . time() . "_" . $i . "." . $ext;
                                $path = $uploadDir . $filename;

                                $e++;
                            }
                            if (move_uploaded_file($_FILES['files']['tmp_name'][$a], $path)) {
                                $files_array[] = $path;

                                foreach ($storageid as $value) {

                                    // $fie = json_encode($storagefile, JSON_FORCE_OBJECT);
                                    $sql1 = "INSERT INTO `multfile_tbl`(`userid1`, `itemid`, `file`,`datecreated`) VALUES
                                    ('$employeeid','$value','$filename','$date_now')";
                                    $query = mysqli_query($conn, $sql1);
                                    
                                }

                                // array_push($storagefile, $filename);
                            }
                            // }
                        }
                    }

                }
            }
        }
    } else {
        $response['message'] = 'Please fill all the mandatory fields (name and email).';
    }
}

echo json_encode($response);