<?php
include 'Include/config.php';

$data = array();

if (isset($_GET['totalall'])) {
    $toall = $_GET['totalall'];

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
    WHERE assigned_tbl.status = '1' AND assigned_tbl.departmentid = '$toall'";

    $query = mysqli_query($conn, $sql);
    $no = 0;
    while ($rows = mysqli_fetch_assoc($query)) {
        $id = $rows['id'];
        $no++;
        $employeeassign = $rows['firstname'].' '.$rows['lastname'];
        $assigned = $rows['employee_assigned'];
        $dep = $rows['department'];


        if ($assigned != '1') {
            $assign = $employeeassign;
        } else if($assigned == '1'){
            $assign = $dep;
        }else{

            $assign = "No Employee Assigned";
        }

        $data[] = array(
            "no" => $no,
            "astid" => $rows['assetid'],
            "name" => $rows['assetname'],
            "cat" => $rows['description'],
            "assign" => $assign,
        );
    }
}

// }
echo json_encode($data);
