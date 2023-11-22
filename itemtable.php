<?php
include 'Include/config.php';

$data = array();

$sql = "SELECT item_tbl.id,location_tbl.location,categ_tbl.categories,com_tbl.company As companyid,item_tbl.assetid,
 item_tbl.file_name,item_tbl.assetname,item_tbl.companyid,item_tbl.categoriesid,item_tbl.date_purchase,item_tbl.locationid,item_tbl.assigned_status,item_tbl.status,item_tbl.date_created
 FROM item_tbl
 LEFT JOIN location_tbl ON location_tbl.id = item_tbl.locationid
 LEFT JOIN categ_tbl ON categ_tbl.id           = item_tbl.categoriesid
 LEFT JOIN com_tbl ON com_tbl.id               = item_tbl.companyid
 WHERE item_tbl.assigned_status = 0 AND item_tbl.status = 1";

$query = mysqli_query($conn, $sql);
$no    = 0;

while ($rows = mysqli_fetch_assoc($query)) {
    $no++;
    $id = $rows['id'];
    $status = $rows['assigned_status'];

    $br = '<a href="brcodesam.php?id='.$rows['categoriesid'].' - '.$rows['assetid'].'"  class="btn btn-info
    title = "Edit" target="blank_"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M24 32C10.7 32 0 42.7 0 56V456c0 13.3 10.7 24 24 24H40c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24H24zm88 0c-8.8 0-16 7.2-16 16V464c0 8.8 7.2 16 16 16s16-7.2 16-16V48c0-8.8-7.2-16-16-16zm72 0c-13.3 0-24 10.7-24 24V456c0 13.3 10.7 24 24 24h16c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24H184zm96 0c-13.3 0-24 10.7-24 24V456c0 13.3 10.7 24 24 24h16c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24H280zM448 56V456c0 13.3 10.7 24 24 24h16c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24H472c-13.3 0-24 10.7-24 24zm-64-8V464c0 8.8 7.2 16 16 16s16-7.2 16-16V48c0-8.8-7.2-16-16-16s-16 7.2-16 16z"/></svg></a>';
    $file = '<div class="round-image-container"><img src="./uploadimg/' . $rows['file_name'] . '" alt="Image">';
    $act1 = '<button  class="btn btn-info assign" 
    data-id="'.$rows['id'].'"  
    data-asset="'.$rows['categoriesid'].' - '.$rows['assetid'].'"
    data-name="'.$rows['assetname'].'"  
    data-categ="'.$rows['categoriesid'].'" 
    title = "Assign"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M96 80c0-26.5 21.5-48 48-48H432c26.5 0 48 21.5 48 48V384H96V80zm313 47c-9.4-9.4-24.6-9.4-33.9 0l-111 111-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L409 161c9.4-9.4 9.4-24.6 0-33.9zM0 336c0-26.5 21.5-48 48-48H64V416H512V288h16c26.5 0 48 21.5 48 48v96c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V336z"/></svg></button>';
    $act2 = '<button  class="btn btn-primary viewdata" 
    data-id="'.$rows['id'].'"
    data-ass="'.$rows['categoriesid'].' - '.$rows['assetid'].'"
    data-na="'.$rows['assetname'].'"
    data-dat="'.$rows['date_purchase'].'"
    data-loca="'.$rows['location'].'"
    data-date="'.$rows['date_created'].'"
    title = "View"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg></button>';
    $act3 = '<button  class="btn btn-primary editmodal"
    data-id="'.$rows['id'].'"
    data-idasset="'.$rows['assetid'].'"
    data-file="'.$rows['file_name'].'"
    data-setname="'.$rows['assetname'].'"
    data-cate="'.$rows['categoriesid'].'"
    data-datt="'.$rows['date_purchase'].'"
    data-loct="'.$rows['locationid'].'"
    title = "Edit"><svg width="15" height="15" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
  </svg></button>';
  $act4 = '<button  class="btn btn-danger delete"
    data-id="'.$rows['id'].'"
    title = "Delete"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>';

    if ($status == '0') {
      $status = '<badge  class="badge bg-primary" style="width:90px;height="100px;">Not Assigned</badge>';
    } else {
      $status = '<badge  class="badge badge-danger" style="width:70px;height="100px">Assigned</badge>';
    }




    $data[] = array(
        "no"       => $no,
        "itemid"   => $rows['categoriesid'] . ' - ' . $rows['assetid'],
        "flname"   => $file,
        "itemname" => $rows['assetname'],
        "sta"      => $status,
        "locat"     => $rows['location'],
        "da"     => $rows['date_created'],
        "act"    => $act1.'  '.$act2 .'  '.$act3.' '.$act4,
    );
}
echo json_encode($data);

