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
if (isset($_POST['id']) || isset($_POST['orgfilename']) || isset($_FILES['file2']) || isset($_POST['assetname_edit']) || isset($_POST['company_edit']) || isset($_POST['category_edit']) || isset($_POST['date_purchase_edit']) || isset($_POST['locationid_edit'])) {
    // Get the submitted form data 

    $employeeid         = $_SESSION['id'];
    $id                 = $_POST['id'];
    $orgfilename        = $_POST['orgfilename'];
    $assetname_edit     = $_POST['assetname_edit'];
    $company_edit       = $_POST['company_edit'];
    $category_edit      = $_POST['category_edit'];
    $date_purchase_edit = $_POST['date_purchase_edit'];
    $locationid_edit    = $_POST['locationid_edit'];
    $date = new DateTime('now', new DateTimeZone('Asia/Manila'));
    $currentDate = $date->format("Y-m-d");
    $time = $date->format("g:i:a");


    // Check whether submitted data is not empty 
    if (!empty($assetname_edit)) { {
            $uploadStatus = 1;

            // Upload file 
            $uploadedFile = '';
            if ($uploadStatus == 1) {
                // Include the database config file 
                include_once 'Include/config.php';

                // If $filesname_edit is not empty, use the uploaded file name

                // If $filesname_edit is empty, use the original file name
                $sql = "UPDATE item_tbl 
            SET 
            assetname     = '$assetname_edit',
            categoriesid  = '$category_edit',
            companyid     = '$company_edit',
            date_purchase = '$date_purchase_edit',
            locationid    = '$locationid_edit',
            file_name    = '$orgfilename',
            update_date = '$date_now'
            WHERE 
            id = '$id'";

                $query = mysqli_query($conn, $sql);
            }
            if ($query) {
                
                $sqlQ = "SELECT item_tbl.id, location_tbl.location, categ_tbl.categories, com_tbl.company AS companyid, item_tbl.assetid,
                item_tbl.file_name, item_tbl.assetname, item_tbl.companyid, item_tbl.categoriesid, item_tbl.date_purchase, item_tbl.locationid, item_tbl.assigned_status, item_tbl.status, item_tbl.date_created
                FROM item_tbl
                LEFT JOIN location_tbl ON location_tbl.id = item_tbl.locationid
                LEFT JOIN categ_tbl ON categ_tbl.id = item_tbl.categoriesid
                LEFT JOIN com_tbl ON com_tbl.id = item_tbl.companyid
                WHERE item_tbl.id = $id";
    
        $query3 = mysqli_query($conn, $sqlQ);
    
        if ($query3) {
            $updatedRows = mysqli_fetch_array($query3);
    
            $cateid = $updatedRows['categoriesid'];
            $item = $updatedRows['assetid'];
    
            $detail = "Asset No " . $cateid .' - ' . $item . " has been Updated";
    
            // Insert into the activity log
            $sql1 = "INSERT INTO activity_log (id_user, details, date, time, datecreated) VALUES ('$accid', '$detail', '$currentDate', '$time', '$currentDate')";
            $query2 = mysqli_query($conn, $sql1);
        }
            }
        }
    }
} else {
    $response['message'] = 'Please fill all the mandatory fields (name and email).';
}

echo json_encode($response);
