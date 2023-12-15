<?php
include 'Include/config.php';

$data = array();

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
WHERE assigned_tbl.status                            = 1";


$query = mysqli_query($conn, $sql);
$no    = 0;
while ($rows = mysqli_fetch_assoc($query)) {
    $no++;
    $id     = $rows['id'];
    $idtem  = $rows['item_id'];
    $status = $rows['status'];

    $sql1 = "SELECT * FROM assigned_tbl WHERE item_id  = '$idtem'";

    $file = '<div class="round-image-container"><img src="./uploadimg/' . $rows['file_name'] . '" alt="Image">';
   
    $btn = '<button  class="btn btn-info view" 
            data-id         = "'.$rows['id'].'"
            data-idsss      = "'.$rows['item_id'].'"
            data-asset      = "'.$rows['cateid'].' - '.$rows['assetid'].'"
            data-name       = "'.$rows['assetname'].'"
            data-emp        = "'.$rows['lastname'].' '.$rows['firstname'].'"
            data-com        = "'.$rows['companyid'].'"
            data-dept       = "'.$rows['department'].'"
            data-position   = "'.$rows['positionid'].'"
            data-pos        = "'.$rows['position'].'"
            data-da         = "'.$rows['assigned_date'].'"
            data-loca       = "'.$rows['location'].'"
            title           = "View"><svg xmlns = "http://www.w3.org/2000/svg" width = "15" height        = "15" viewBox            = "0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg></button>';

    if ($status == '1') {
      $status = '<badge  class="badge bg-primary" style="width:90px;height="100px;">Assigned</badge>';
    } else {
      $status = '<badge  class="badge badge-danger" style="width:70px;height="100px">Not Assigned</badge>';
    }

    $data[] = array(
        "no"       => $no,
        "flname"   => $file,
        "itemid"   => $rows['cateid'].' - '.$rows['assetid'],
        "itemname" => $rows['assetname'],
        "name"     => $rows['lastname'].' '.$rows['firstname'],
        "dep"      => $rows['department'],
        "loc"      => $rows['location'],
        "pos"      => $rows['position'],
        "sta"      => $status,
        "act"      => $btn,
    );
}

echo json_encode($data);

