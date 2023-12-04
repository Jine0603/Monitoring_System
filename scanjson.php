<?php
include 'Include/config.php';
include 'seasionindex.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $data = array();

  // Retrieve the selected date range from the Ajax request
  $code = $_POST['code'] ?? '';

  $sql = "SELECT assigned_tbl.id,categ_tbl.description,location_assigned.location,item_tbl.file_name,item_tbl.assetid,item_tbl.assetname,employee_tbl.employeeid,employee_tbl.firstname,employee_tbl.lastname,com_tbl.company,
    dep_tbl.department,position_tbl.position As position,assigned_tbl.acc_id,
    assigned_tbl.item_id,assigned_tbl.employee_assigned,assigned_tbl.companyid,assigned_tbl.locationid,assigned_tbl.departmentid,assigned_tbl.positionid,assigned_tbl.status,assigned_tbl.cateid,assigned_tbl.assigned_date,assigned_tbl.scan_date
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
    $id = $rows['id'];
    // $name = $rows['assetname'];
    $date = $rows['scan_date'];

    $emp = $rows['employee_assigned'];
    $loc = $rows['locationid'];
    // $com = $rows['companyid'];
    // $dep = $rows['departmentid'];
    // $pos1 = $rows['positionid'];
    // $idtem = $rows['item_id'];
    // $dep = $rows['department'];
    // $location = $rows['location'];
    // $pos = $rows['position'];
    $currentDate = date("Y-m-d");

    if ($emp == '1') {
      $asset = $rows['cateid'] . ' - ' . $rows['assetid'];
      $name  = $rows['assetname'];
      $depp  = $rows['department'];
      $empname = '';
      $pos = '';
      $locat = '';
      $status_code = '200';
    } else if ($emp != '1') {
      $asset   = $rows['cateid'] . ' - ' . $rows['assetid'];
      $name    = $rows['assetname'];
      $empname = $rows['firstname'] . ' ' . $rows['lastname'];
      $depp    = $rows['department'];
      $pos     = $rows['position'];
      $locat = $rows['location'];
      $status_code = '200';
    } else if ($loc != 'default') {
      $asset    = $rows['cateid'] . ' - ' . $rows['assetid'];
      $name     = $rows['assetname'];
      $locat = $rows['location'];
      $empname = '';
      $depp = '';
      $pos = '';
      $status_code = '200';
    }

    // $is_scanned = 0;
    if ($date == '') {

      $currentDate = date("Y-m-d");

      $insert = "UPDATE assigned_tbl SET scan_date = '$currentDate' WHERE id = '$id'";
      $result = mysqli_query($conn, $insert);
      if ($result) {
      } else {
        echo "Error updating date: " . mysqli_error($conn);
      }
    } else if ($date == $currentDate) {
      $data[] = array(
        "emp"         => "",
        "asset"       => "",
        "name"        => "",
        "depp"        => "",
        "empname"     => "",
        "pos"         => "",
        "locat"    => "",
        "status_code"    => "",
        "date"        => "",
        "currentDate" => "",


      );
    } else if ($date != $currentDate) {
      $currentDate = date("Y-m-d");
      // Assuming 'assigned_tbl' is the table name and 'scan_date' is the date column name
      $up = "UPDATE assigned_tbl SET scan_date = '$currentDate' WHERE id = '$id'";
      $result1 = mysqli_query($conn, $up);
      if ($result1) {
      } else {
        echo "Error updating date: " . mysqli_error($conn);
      }
    }

    // // $result = mysqli_query($conn, $insert);
    //     if ($result) {
    //       echo "Date successfully!";
    //   } else {
    //       echo "Error updating date: " . mysqli_error($conn);
    //   }
    // query to update last 

  } else {
    $asset = '';
    $name  = '';
    $depp = '';
    $empname = '';
    $pos = '';
    $emp = 'Invalid';
    $locat = '';
    $date = '';
    $currentDate = '';
    $status_code = '404';
  }

  $data[] = array(
    "emp"         => $emp,
    "asset"       => $asset,
    "name"        => $name,
    "depp"        => $depp,
    "empname"     => $empname,
    "pos"         => $pos,
    "locat"       => $locat,
    "loc"         => $loc,
    "status_code" => $status_code,
    "date"        => $date,
    "currentDate" => $currentDate,



  );
}
// Send the data back to the client
echo json_encode($data);
