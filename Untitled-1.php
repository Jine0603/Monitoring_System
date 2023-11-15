<?php
include 'Include/config.php';
$uploadDir = 'uploadimg/';

// Allowed file types 
$allowTypes = array('png', 'jpg', 'jpeg');

$id                 = $_POST['id'];
$assetname_edit     = $_POST['assetname_edit'];
$filesname_edit     = $_FILES['filesname_edit'];
$company_edit       = $_POST['company_edit'];
$category_edit      = $_POST['category_edit'];
$date_purchase_edit = $_POST['date_purchase_edit'];
$locationid_edit    = $_POST['locationid_edit'];
$update_date        = date("Y-m-d h:i A");

$uploadedFile = '';

if (!empty($_FILES["file"]["name"])) {
    // File path config 
    $fileName = rand(1, 9999) . '_' . $_FILES["file"]["name"];
    $targetFilePath = $uploadDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats to upload 
    if (in_array($fileExtension, $allowTypes)) {
        // Upload file to the server 
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            $uploadedFile = $fileName;
        } else {
            // Handle the case where file upload fails
            echo "Error uploading file.";
        }
    } else {
        // Handle the case where the file type is not allowed
        echo "Sorry, only " . implode(', ', $allowTypes) . " files are allowed to upload.";
    }
}

// Check if $filesname_edit is not empty
if (!isset($filesname_edit)) {
    // If $filesname_edit is not empty, use the uploaded file name
    $sql = "UPDATE item_tbl 
            SET 
            assetname     = '$assetname_edit',
            categoriesid  = '$category_edit',
            companyid     = '$company_edit',
            date_purchase = '$date_purchase_edit',
            locationid    = '$locationid_edit',
            file_name     = '$uploadedFile'
            WHERE 
            id = '$id'";
} else {
    // If $filesname_edit is empty, use the original file name
    $sql = "UPDATE item_tbl 
            SET 
            assetname     = '$assetname_edit',
            categoriesid  = '$category_edit',
            companyid     = '$company_edit',
            date_purchase = '$date_purchase_edit',
            locationid    = '$locationid_edit',
            WHERE 
            id = '$id'";
}

$query = mysqli_query($conn, $sql);

?>