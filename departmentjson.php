<?php
include 'Include/config.php';

$data = array();

$sql = "SELECT dep_tbl.id,com_tbl.company As company,dep_tbl.companyid,dep_tbl.department,dep_tbl.status,dep_tbl.datecreated
 FROM dep_tbl
 LEFT JOIN com_tbl ON com_tbl.id               = dep_tbl.companyid
 WHERE dep_tbl.status = 1";

$query = mysqli_query($conn, $sql);
$no    = 0;

while ($rows = mysqli_fetch_assoc($query)){
    $status = $rows['status'];
    $no++;


    $act1 = '<button  class="btn btn-success add" data-id="'.$rows['id'].'"  title = "Add"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg></button>';
    
    $act2 = '<button  class="btn btn-primary edit" 
    data-id="'.$rows['id'].'"
    data-com="'.$rows['companyid'].'"  
    data-dep="'.$rows['department'].'"  
    title = "edit"><svg width="15" height="15" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
  </svg></button>';

  $act3 = '<button  class="btn btn-danger removedata" data-id="'.$rows['id'].'"  title = "Remove"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>';

    if($status == '1'){
        $status = '<badge  class="badge bg-success" style="width:70px;height="100px">Active</badge>';
        }else{
        $status = '<badge  class="badge badge-danger" style="width:70px;height="100px">Inactive</badge>';
        
        }

    $data[] = array(
        "no"  => $no,
        "com" => $rows['company'],
        "dep" => $rows['department'],
        "sta" => $status,
        "date" => $rows['datecreated'],
        "action" => $act1.' '.$act2.' '.$act3,
    );
}

echo json_encode($data);

