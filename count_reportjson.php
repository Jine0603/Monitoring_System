<?php
include 'Include/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $currentDate = date("Y-m-d");


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
        LEFT  JOIN item_tbl ON item_tbl.id                   = scan_tbl.item_id";

    $query = mysqli_query($conn, $sql);
    $data  = array();
    $no    = 0;

    while ($rows = mysqli_fetch_assoc($query)) {
        $no++;

        $emp = $rows['employee_assigned'];
        $loc = $rows['locationid'];

        if ($emp == 1 && $loc == 'default') {
            $data[] = array(
                "no"       => $no,
                "date1"    => $rows['scan_date'],
                "id"       => $rows['cateid'] . ' - ' . $rows['assetid'],
                "itemname" => $rows['assetname'] . ' - ' . $rows['department'] . ' Department',
                "loc"      => $rows['department'] . ' DEPARTMENT',
            );
        } else if ($emp != 1 && $loc == 'default') {
            $data[] = array(
                "no"       => $no,
                "date1"    => $rows['scan_date'],
                "id"       => $rows['cateid'] . ' - ' . $rows['assetid'],
                "itemname" => $rows['assetname'] . ' - ' . $rows['lastname'] . ' ' . $rows['firstname'],
                "loc"      => $rows['department'] . ' DEPARTMENT',
            );
        } else if ($emp == '' && $loc != 'default') {
            $data[] = array(
                "no"       => $no,
                "date1"    => $rows['scan_date'],
                "id"       => $rows['cateid'] . ' - ' . $rows['assetid'],
                "itemname" => $rows['assetname'],
                "loc"      => $rows['location'],
            );
        }
    }

    // Send the data back to the client
    echo json_encode($data);
}
