<?php
include 'Include/config.php';
include 'timezone.php';
include 'seasionindex.php';
include 'send3.php';
global $date_now;


$idassign = $_POST['idassign'];
$asset = $_POST['asset'];
$categ = $_POST['categ'];
$emplo = $_POST['emplo'];
$company = $_POST['company'];
$depart = $_POST['depart'];
$posi = $_POST['posi'];
$newloc = $_POST['newloc'];

$date = new DateTime('now', new DateTimeZone('Asia/Manila'));
$currentDate = $date->format("Y-m-d");
$time = $date->format("g:i:a");

$sql1 = "UPDATE assigned_tbl
    SET 
    status = '0'
    WHERE id='$idassign'";
    $execute = mysqli_query($conn, $sql1);

if ($execute == true) {

    $sql2 = "INSERT INTO assigned_tbl (acc_id, item_id, cateid, employee_assigned, companyid, departmentid, positionid,locationid, assigned_date) 
    VALUES ('$accid','$asset','$categ','$emplo','$company','$depart','$posi','$newloc','$date_now')";

    $query = mysqli_query($conn, $sql2);

    $last_inserted_id = mysqli_insert_id($conn);

    $sqlQ = "SELECT assigned_tbl.id,categ_tbl.description,location_assigned.location,item_tbl.file_name,item_tbl.assetid,item_tbl.assetname,employee_tbl.employeeid,employee_tbl.firstname,employee_tbl.lastname,com_tbl.company,
        dep_tbl.department,position_tbl.position As position,assigned_tbl.acc_id,
        assigned_tbl.item_id,assigned_tbl.employee_assigned,assigned_tbl.companyid,assigned_tbl.locationid,assigned_tbl.departmentid,assigned_tbl.positionid,assigned_tbl.status,assigned_tbl.cateid,assigned_tbl.assigned_date
    FROM assigned_tbl
    LEFT  JOIN employee_tbl ON employee_tbl.id           = assigned_tbl.employee_assigned
    LEFT  JOIN location_assigned ON location_assigned.id = assigned_tbl.locationid
    LEFT  JOIN categ_tbl ON categ_tbl.categories         = assigned_tbl.cateid
    LEFT  JOIN com_tbl ON com_tbl.id                     = assigned_tbl.companyid
    LEFT  JOIN dep_tbl ON dep_tbl.id                     = assigned_tbl.departmentid
    LEFT  JOIN position_tbl ON position_tbl.id           = assigned_tbl.positionid
    LEFT  JOIN item_tbl ON item_tbl.id                   = assigned_tbl.item_id
    WHERE assigned_tbl.id = '$last_inserted_id'"; // Use the ID of the last inserted row

    $query1 = mysqli_query($conn, $sqlQ);

    if ($query1) {
        $rows = mysqli_fetch_array($query1);

        $employee_assigned_last = $rows['employee_assigned'];
        $loc = $rows['locationid'];
        $employee_last = $rows['employeeid'];
        $department_last = $rows['department'];
        $locat_last = $rows['location'];
        $cateid = $rows['cateid'];
        $item = $rows['assetid'];

        $detail = "";

        if ($loc != 'default') {
            // Display when $employee_assigned is default or null
            $detail .= "Asset Code ". $cateid.' - '.$item ." Re - Assigned Location " . $locat_last;
        }elseif ($employee_assigned_last != 1) {
            // Display when $employee_assigned is not equal to 1
            $detail .= "Asset Code ". $cateid.' - '.$item ."  Re - Assigned by " . " Employee ID ". $employee_last;
        } elseif ($employee_assigned_last == 1 && $department_last) {
            // Display when $employee_assigned is equal to 1 and $department_id is not null
            $detail .= "Asset Code ". $cateid.' - '.$item ." Re - Assigned by " . $department_last . " Department";
        }
    } else {
        // Handle the case when the query fails
        echo "Error in query1: " . mysqli_error($conn);
    }

    $sql23 = "SELECT assigned_tbl.id,categ_tbl.description,location_assigned.location,item_tbl.file_name,item_tbl.assetid,item_tbl.assetname,employee_tbl.employeeid,employee_tbl.firstname,employee_tbl.lastname,employee_tbl.email,com_tbl.company,
    dep_tbl.department,position_tbl.position As position,assigned_tbl.acc_id,
    assigned_tbl.item_id,assigned_tbl.employee_assigned,assigned_tbl.companyid,assigned_tbl.locationid,assigned_tbl.departmentid,assigned_tbl.positionid,assigned_tbl.status,assigned_tbl.cateid,assigned_tbl.assigned_date
    FROM assigned_tbl
    LEFT  JOIN employee_tbl ON employee_tbl.id           = assigned_tbl.employee_assigned
    LEFT  JOIN location_assigned ON location_assigned.id = assigned_tbl.locationid
    LEFT  JOIN categ_tbl ON categ_tbl.categories         = assigned_tbl.cateid
    LEFT  JOIN com_tbl ON com_tbl.id                     = assigned_tbl.companyid
    LEFT  JOIN dep_tbl ON dep_tbl.id                     = assigned_tbl.departmentid
    LEFT  JOIN position_tbl ON position_tbl.id           = assigned_tbl.positionid
    LEFT  JOIN item_tbl ON item_tbl.id                   = assigned_tbl.item_id WHERE assigned_tbl.id = '$last_inserted_id'";
        $query31 = mysqli_query($conn, $sql23);
        $row = mysqli_fetch_array($query31);
        $email = $row['email'];
        $assetid = $row['assetid'];
        $assetname = $row['assetname'];
        $cateid = $row['cateid'];

        send_email($email, $assetid, $assetname, $cateid);

    $sql2 = "INSERT INTO activity_log (id_user,details,date,time,datecreated) VALUES ('$accid','$detail','$currentDate','$time','$currentDate')";
    $query2 = mysqli_query($conn, $sql2);
}

mysqli_close($conn);
?>