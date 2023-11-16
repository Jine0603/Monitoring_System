<?php
include 'Include/config.php';
include 'timezone.php';
include 'seasionindex.php';
global $date_now;


$idassign = $_POST['idassign'];
$asset = $_POST['asset'];
$categ = $_POST['categ'];
$emplo = $_POST['emplo'];
$company = $_POST['company'];
$depart = $_POST['depart'];
$posi = $_POST['posi'];
$newloc = $_POST['newloc'];

$sql1 = "UPDATE assigned_tbl
    SET 
    status = '0'
    WHERE id='$idassign'";
    $execute = mysqli_query($conn, $sql1);

if ($execute == true) {

    $sql2 = "INSERT INTO assigned_tbl (acc_id, item_id, cateid, employee_assigned, companyid, departmentid, positionid,locationid) 
    VALUES ('$accid','$asset','$categ','$emplo','$company','$depart','$posi','$newloc')";

    $query = mysqli_query($conn, $sql2);
}

mysqli_close($conn);
?>