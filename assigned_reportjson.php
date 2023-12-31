<?php
include 'Include/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve the selected date range from the Ajax request
    $startDate = mysqli_real_escape_string($conn, $_POST['startDate']);
    $endDate   = mysqli_real_escape_string($conn, $_POST['endDate']);
    $cat       = mysqli_real_escape_string($conn, $_POST['cat']);
    $currentDate = date("Y-m-d");


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
            LEFT  JOIN item_tbl ON item_tbl.id                   = assigned_tbl.item_id";

$conditions = [];

if ($startDate != '' && $endDate != '') {
    $conditions[] = "assigned_tbl.assigned_date BETWEEN '$startDate' AND '$endDate' AND assigned_tbl.status = '1'";
}

if ($cat != 'default') {
    $conditions[] = "assigned_tbl.cateid = '$cat' AND assigned_tbl.status = '1'";
}else{
    $conditions[] = "assigned_tbl.status = '1'";
}

// Combine conditions into the WHERE clause
if (!empty($conditions)) {
    $sql .= " WHERE " . implode(" AND ", $conditions);
}

    $query = mysqli_query($conn, $sql);

    $data  = array();
    $no    = 0;

    while ($rows = mysqli_fetch_assoc($query)) {
        $no++;

        $data[] = array(
            "no"       => $no,
            "asset"    => $rows['cateid'] . ' - ' . $rows['assetid'],
            "name"     => $rows['assetname'],
            "employee" => $rows['lastname'] . ' ' . $rows['firstname'],
            "dep"      => $rows['department'],
            "loc"      => $rows['location'],
            "date"     => $rows['assigned_date'],
        );
    }

      // Send the data back to the client
    echo json_encode($data);
}
