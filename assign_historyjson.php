<?php
include 'Include/config.php';
$itemid = $_GET['id'];

$data = array();

$sql = "SELECT assigned_tbl.id,location_assigned.location,employee_tbl.employeeid,employee_tbl.firstname,employee_tbl.lastname,com_tbl.company,dep_tbl.department,position_tbl.position As position,assigned_tbl.acc_id,
    assigned_tbl.item_id,assigned_tbl.employee_assigned,assigned_tbl.companyid,assigned_tbl.locationid,assigned_tbl.departmentid,assigned_tbl.positionid,assigned_tbl.status,assigned_tbl.cateid,assigned_tbl.assigned_date
    FROM assigned_tbl
    LEFT JOIN employee_tbl ON employee_tbl.id           = assigned_tbl.employee_assigned
    LEFT JOIN categ_tbl ON categ_tbl.categories         = assigned_tbl.cateid
    LEFT JOIN com_tbl ON com_tbl.id                     = assigned_tbl.companyid
    LEFT JOIN dep_tbl ON dep_tbl.id                     = assigned_tbl.departmentid
    LEFT JOIN position_tbl ON position_tbl.id           = assigned_tbl.positionid
    LEFT JOIN location_assigned ON location_assigned.id = assigned_tbl.locationid
    WHERE assigned_tbl.status = '0' AND assigned_tbl.item_id = '$itemid'";

$query = mysqli_query($conn, $sql);
$no    = 0;

while ($rows = mysqli_fetch_assoc($query)) {
    $no++;
    $id = $rows['id'];
    $idtem = $rows['item_id'];

    $data[] = array(
        "no"       => $no,
        "loc"      => $rows['location'],
        "emp"      => $rows['employeeid'],
        "name"     => $rows['lastname'].' '.$rows['firstname'],
        "dep"      => $rows['department'],
        "pos"      => $rows['position'],
        "date"     => $rows['assigned_date'],
    );
}
echo json_encode($data);

