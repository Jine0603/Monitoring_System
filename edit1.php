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
if (isset($_POST['id']) || isset($_POST['orgfilename']) || isset($_FILES['file2']) || isset($_POST['assetname_edit']) || isset($_POST['company_edit']) || isset($_POST['category_edit'])|| isset($_POST['date_purchase_edit']) || isset($_POST['locationid_edit'])) {
    // Get the submitted form data 

    $employeeid         = $_SESSION['id'];
    $id                 = $_POST['id'];
    $orgfilename        = $_POST['orgfilename'];
    $assetname_edit     = $_POST['assetname_edit'];
    $company_edit       = $_POST['company_edit'];
    $category_edit      = $_POST['category_edit'];
    $date_purchase_edit = $_POST['date_purchase_edit'];
    $locationid_edit    = $_POST['locationid_edit'];

    // Check whether submitted data is not empty 
    if (!empty($assetname_edit)) { 
        {
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
            file_name    = '$orgfilename'
            WHERE 
            id = '$id'";

$query = mysqli_query($conn, $sql);


                }
                if ($query) {
                    $response['status'] = 1;
                    $response['message'] = 'Form data submitted successfully!';
                }
            }
        }
    } else {
        $response['message'] = 'Please fill all the mandatory fields (name and email).';
}

echo json_encode($response);