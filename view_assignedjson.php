<?php
include 'Include/config.php';
include 'seasionindex.php';

$data = array();

$sql1 = "SELECT * FROM dep_tbl WHERE companyid = '1' AND status = '1'";

$query1 = mysqli_query($conn, $sql1);

while($row = mysqli_fetch_assoc($query1)) {

    $dep = $row['id'];

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
WHERE assigned_tbl.employee_assigned = '$accid' AND employee_tbl.departmentid = '$dep' AND assigned_tbl.status = 1";


$query = mysqli_query($conn, $sql);
$no    = 0;
while ($rows = mysqli_fetch_assoc($query)) {
    $no++;
    $id = $rows['id'];
    $idtem = $rows['item_id'];
    $status = $rows['status'];

    if ($status == '1') {
      $status = '<badge  class="badge bg-success" style="width:90px;height="100px;">Active</badge>';
    } else {
      $status = "";
    }

    $data[] = array(
        "no"   => $no,
        "id"   => $rows['cateid'].' - '.$rows['assetid'],
        "name" => $rows['assetname'],
        "sta"  => $status,
        "date" => $rows['assigned_date'],
    );
}
}
echo json_encode($data);

