<?php
include 'Include/config.php';
include 'timezone.php';
include 'seasionindex.php';
global $date_now;

$iditem            = $_POST['itemid'];
$catego            = $_POST['categories'];
$employee_assigned = $_POST['employee_assigned'];
$companyid         = $_POST['companyid'];
$department_id     = $_POST['department_id'];
$position          = $_POST['position'];
$newloc            = $_POST['newloc'];

$sql = "INSERT INTO assigned_tbl (acc_id, item_id, cateid, employee_assigned, companyid, departmentid, positionid,locationid)
VALUES ('$accid','$iditem','$catego','$employee_assigned','$companyid','$department_id','$position','$newloc')";

$query = mysqli_query($conn, $sql);

if ($query == true) {

    $sql1 = "UPDATE item_tbl
    SET
    assigned_status = '1'
    WHERE id ='$iditem'";
    $execute = mysqli_query($conn, $sql1);
}