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
    $id = $rows['id'];
    $idtem = $rows['item_id'];

    $sql1 = "SELECT * FROM assigned_tbl WHERE item_id  = '$idtem'";

    $file = '<div class="round-image-container"><img src="./uploadimg/' . $rows['file_name'] . '" alt="Image">';
   
    $btn = '<button  class="btn btn-info view" 
    data-id="'.$rows['id'].'"
    data-idsss="'.$rows['item_id'].'"
    data-asset="'.$rows['cateid'].' - '.$rows['assetid'].'"
    data-name="'.$rows['assetname'].'"
    data-emp="'.$rows['lastname'].' '.$rows['firstname'].'"
    data-com="'.$rows['companyid'].'"
    data-dept="'.$rows['department'].'"
    data-position="'.$rows['positionid'].'"
    data-pos="'.$rows['position'].'"
    data-da="'.$rows['assigned_date'].'"
    title = "View"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg></button>
    <button  class="btn btn-primary assignededit" 
    data-id="'.$rows['id'].'"  
    data-ca="'.$rows['cateid'].'"  
    data-ids="'.$rows['item_id'].'"  
    data-ass="'.$rows['cateid'].' - '.$rows['assetid'].'"
    data-name="'.$rows['assetname'].'"
    data-emp="'.$rows['employee_assigned'].'"
    data-com="'.$rows['companyid'].'"
    data-department="'.$rows['departmentid'].'"
    data-dept="'.$rows['department'].'"
    data-position="'.$rows['positionid'].'"
    data-pos="'.$rows['position'].'"
    title = "Edit"><svg width="15" height="15" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
  </svg></button>
  <button  class="btn btn-danger retrieve" 
    data-id="'.$rows['id'].'"  
    data-idit="'.$rows['item_id'].'"
    title = "Delete"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>';

    $data[] = array(
        "no"       => $no,
        "flname"   => $file ,
        "itemid"   => $rows['cateid'].' - '.$rows['assetid'],
        "itemname" => $rows['assetname'] ,
        "name"     => $rows['lastname'].' '.$rows['firstname'],
        "dep"      => $rows['department'],
        "loc"      => $rows['location'],
        "pos"      => $rows['position'],
        "date"     => $rows['assigned_date'],
        "act"    => $btn,
    );
}

echo json_encode($data);

