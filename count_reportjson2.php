<?php
include 'Include/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      // Retrieve the selected date range from the Ajax request
    $startDate = $_POST['startDate'] ?? '';
    $endDate   = $_POST['endDate'] ?? '';
    $cat       = $_POST['cat'] ?? '';

    if ($startDate != '' && $endDate != '' && $cat != 'default') {
        $sql = "SELECT scan_tbl.id,categ_tbl.description,location_assigned.location,item_tbl.file_name,item_tbl.assetid,item_tbl.assetname,employee_tbl.employeeid,employee_tbl.firstname,employee_tbl.lastname,com_tbl.company,
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
        WHERE scan_date BETWEEN '$startDate' AND '$endDate' AND cateid = '$cat'";
        
    } else if ($cat != 'default') {

    $sql = "SELECT scan_tbl.id,categ_tbl.description,location_assigned.location,item_tbl.file_name,item_tbl.assetid,item_tbl.assetname,employee_tbl.employeeid,employee_tbl.firstname,employee_tbl.lastname,com_tbl.company,
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
    WHERE cateid = '$cat'";
    }
    $query = mysqli_query($conn, $sql);
    $data  = array();
    $no    = 0;

    while ($rows = mysqli_fetch_assoc($query)) {
        $no++;

        $data[] = array(
            "no"       => $no,
            "id"       => $rows['cateid'] . ' - ' . $rows['assetid'],
            "itemname" => $rows['assetname'],
            "name"     => $rows['lastname'] . ' ' . $rows['firstname'],
            "dep"      => $rows['department'],
            "pos"      => $rows['position'],
            "loc"      => $rows['location'],
            "date1"    => $rows['scan_date'],
        );
    }

      // Send the data back to the client
    echo json_encode($data);
}
