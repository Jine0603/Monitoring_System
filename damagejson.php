<?php
include 'Include/config.php';

$data = array();

$sql = "SELECT item_tbl.id,location_tbl.location,categ_tbl.categories,com_tbl.company As company,item_tbl.assetid,
 item_tbl.file_name,item_tbl.assetname,item_tbl.companyid,item_tbl.categoriesid,item_tbl.date_purchase,item_tbl.locationid,item_tbl.assigned_status,item_tbl.status,item_tbl.date_created
 FROM item_tbl
 LEFT JOIN location_tbl ON location_tbl.id = item_tbl.locationid
 LEFT JOIN categ_tbl ON categ_tbl.id           = item_tbl.categoriesid
 LEFT JOIN com_tbl ON com_tbl.id               = item_tbl.companyid
 WHERE item_tbl.status = 0 ";

$query = mysqli_query($conn, $sql);
$no    = 0;

while ($rows = mysqli_fetch_assoc($query)) {
    $no++;
    $id = $rows['id'];
    $status = $rows['status'];

    $file = '<div class="round-image-container"><img src="./uploadimg/' . $rows['file_name'] . '" alt="Image">';
    $act1 = '<button  class="btn btn-info copydata" 
    data-id="'.$rows['id'].'"  
    title = "View"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg></button>';
    $act2 = '<button  class="btn btn-success restore" 
    data-id="'.$rows['id'].'"  
    title = "Restore"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3C140.6 6.8 151.7 0 163.8 0zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm192 64c-6.4 0-12.5 2.5-17 7l-80 80c-9.4 9.4-9.4 24.6 0 33.9s24.6 9.4 33.9 0l39-39V408c0 13.3 10.7 24 24 24s24-10.7 24-24V273.9l39 39c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9l-80-80c-4.5-4.5-10.6-7-17-7z"/></svg></button>';

    if ($status == '0') {
        $status = '<badge  class="badge bg-primary" style="width:90px;height="100px;">Damage</badge>';
      } else {
        $status = '<badge  class="badge badge-danger" style="width:70px;height="100px">Not Damage</badge>';
      }
   
    $data[] = array(
        "no"       => $no,
        "itemid"   => $rows['categoriesid'] . ' - ' . $rows['assetid'],
        "flname"   => $file ,
        "itemname" => $rows['assetname'] ,
        "stas"      => $status,
        "datep"    => $rows['date_created'] ,
        "locat"     => $rows['location'] ,
        "act"    => $act1.'  '.$act2,
    );
}

echo json_encode($data);

