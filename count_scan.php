<?php
include 'Include/config.php';
include 'seasionindex.php';
$currentDate = date("Y-m-d");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $data1 = array();

  // Retrieve the selected date range from the Ajax request
  $code = $_POST['code'] ?? '';

  $sql = "SELECT assigned_tbl.id,categ_tbl.description,location_assigned.location,item_tbl.file_name,item_tbl.assetid,item_tbl.assetname,employee_tbl.employeeid,employee_tbl.firstname,employee_tbl.lastname,com_tbl.company,
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
  WHERE assigned_tbl.status                            = 1 AND CONCAT(categoriesid,'-',assetid) = '$code'";

  $query = mysqli_query($conn, $sql);
  if (mysqli_num_rows($query) > 0) {
    $rows  = mysqli_fetch_assoc($query);
    // $name = $rows['assetname'];
    $emp = $rows['employee_assigned'];
    $acc_id = $rows['acc_id'];
    $cateid = $rows['cateid'];
    $loc = $rows['locationid'];
    $com = $rows['companyid'];
    $dep = $rows['departmentid'];
    $pos1 = $rows['positionid'];
    $idtem = $rows['item_id'];
    //   $dep = $rows['department'];
    // $location = $rows['location'];
    // $pos = $rows['position'];
    $currentDate = date("Y-m-d");


    $sqlQ = "SELECT scan_tbl.id,categ_tbl.description,location_assigned.location,item_tbl.file_name,item_tbl.assetid,item_tbl.assetname,employee_tbl.employeeid,employee_tbl.firstname,employee_tbl.lastname,com_tbl.company,
    dep_tbl.department,position_tbl.position As position,scan_tbl.acc_id,
    scan_tbl.item_id,scan_tbl.employee_assigned,scan_tbl.companyid,scan_tbl.locationid,scan_tbl.departmentid,scan_tbl.positionid,scan_tbl.status,scan_tbl.cateid,scan_tbl.scan_date
    FROM scan_tbl
    LEFT  JOIN employee_tbl ON employee_tbl.id           = scan_tbl.employee_assigned
    LEFT  JOIN location_assigned ON location_assigned.id = scan_tbl.locationid
    LEFT  JOIN categ_tbl ON categ_tbl.categories         = scan_tbl.cateid
    LEFT  JOIN com_tbl ON com_tbl.id                     = scan_tbl.companyid
    LEFT  JOIN dep_tbl ON dep_tbl.id                     = scan_tbl.departmentid
    LEFT  JOIN position_tbl ON position_tbl.id           = scan_tbl.positionid
    LEFT  JOIN item_tbl ON item_tbl.id                   = scan_tbl.item_id
    WHERE scan_tbl.status                            = 1 AND CONCAT(categoriesid,'-',assetid) = '$code' AND DATE_FORMAT(scan_date, '%Y-%m-%d') = '$currentDate'";
    $scan_query = mysqli_query($conn, $sqlQ);

    if (mysqli_num_rows($scan_query) > 0) {
      $count  = mysqli_fetch_assoc($scan_query);
      $date = $count['scan_date'];
      $currentDate = date("Y-m-d");

      if ($date == $currentDate) {
        $code_error = '500'; // Validation error: date already exists
      }else{
        $code_error = '200';
      }
    } else {
      $sql1 = "INSERT INTO `scan_tbl`(`acc_id`, `item_id`, `cateid`, `employee_assigned`, `companyid`, `locationid`, `departmentid`, `positionid`, `scan_date`) 
      VALUES ('$acc_id','$idtem','$cateid','$emp','$com','$loc','$dep','$pos1','$currentDate')";
      $queryme = mysqli_query($conn, $sql1);
      $code_error = '300';
    }
  }

  $data1 = array(
    "code_error"        => $code_error,
  );
}
// Send the data back to the client
echo json_encode($data1);
