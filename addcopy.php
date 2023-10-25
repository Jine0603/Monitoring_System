<?php
include 'timezone.php';
global $date_now;
// File upload folder 
$uploadDir = 'upload/';

// Allowed file types 
$allowTypes = array('png', 'jpg', 'jpeg');

// Default response 
$response = array(
    'status' => 0,
    'message' => 'Form submission failed, please try again.'
);

// If form is submitted 
if (isset($_POST['assetid']) || isset($_POST['assetmodel']) || isset($_POST['file']) || isset($_POST['file2']) || isset($_POST['assetname']) || isset($_POST['companyid']) || isset($_POST['category']) 
|| isset($_POST['departmentid']) || isset($_POST['date_purchase']) || isset($_POST['assetstatus'])|| isset($_POST['qty'])) {
    // Get the submitted form data 
    $assetid = $_POST['assetid'];
    $assetmodel = $_POST['assetmodel'];
    $assetname = $_POST['assetname'];
    $companyid = $_POST['companyid'];
    $category = $_POST['category'];
    $departmentid = $_POST['departmentid'];
    $date_purchase = $_POST['date_purchase'];
    $assetstatus = $_POST['assetstatus'];
    $qty = $_POST['qty'];

    // Check whether submitted data is not empty 
    if (
        !empty($assetid) && !empty($assetname) && !empty($companyid) && !empty($category)
        && !empty($departmentid) && !empty($date_purchase) && !empty($assetstatus)
    ) { {
            $uploadStatus = 1;

            // Upload file 
            $uploadedFile = '';
            if (!empty($_FILES["file"]["name"])) {
                // File path config 
                $fileName = rand(1, 9999) . '_' . $_FILES["file"]["name"];
                $targetFilePath = $uploadDir . $fileName;
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

                // Allow certain file formats to upload 
                if (in_array($fileType, $allowTypes)) {
                    // Upload file to the server 
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
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

            if (!empty($_FILES["file"]["name"])) {
                // File path config 
                $fileName = rand(1, 9999) . '_' . $_FILES["file"]["name"];
                

                
            }



            if ($uploadStatus == 1) {
                // Include the database config file 
                include_once 'Include/config.php';

                for ($i=0; $i<$qty;$i++){

                $asid = $assetid.$i;
                    
                // Insert form data in the database 
                $sqlQ = "INSERT INTO item_tbl (assetid,assetmodel,file_name,assetname,companyid,categoriesid,departmentid,date_purchase,assetstatus,date_created) 
                VALUES (?,?,?,?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($sqlQ);
                $stmt->bind_param("ssssssssss", $asid, $assetmodel, $uploadedFile, $assetname, $companyid, $category, $departmentid, $date_purchase, $assetstatus, $date_now);
                $insert = $stmt->execute();
                }

                if ($insert) {
                    $response['status'] = 1;
                    $response['message'] = 'Form data submitted successfully!';
                }
            }
        }
    } else {
        $response['message'] = 'Please fill all the mandatory fields (name and email).';
    }
}
// Return response 
echo json_encode($response);
