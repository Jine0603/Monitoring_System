<?php
include 'Include/config.php';

$data = array();

$sql = "SELECT position_tbl.id,com_tbl.company,dep_tbl.department As department,position_tbl.companyid,position_tbl.departmentid,
 position_tbl.position,position_tbl.status,position_tbl.datecreated
 FROM position_tbl
 LEFT JOIN com_tbl ON com_tbl.id               = position_tbl.companyid
 LEFT JOIN dep_tbl ON dep_tbl.id               = position_tbl.departmentid
 WHERE position_tbl.status = '1'";

$query = mysqli_query($conn, $sql);
$no    = 0;
while ($rows = mysqli_fetch_assoc($query)){
    $status = $rows['status'];
    $no++;

    if($status == '1'){
        $status = '<badge  class="badge bg-success" style="width:70px;height="100px">Active</badge>';
        }else{
        $status = '<badge  class="badge badge-danger" style="width:70px;height="100px">Inactive</badge>';
        
        }
        $act1 = '<button  class="btn btn-success add" data-id="'.$rows['id'].'"  title = "Add"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license 
        (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM471 143c9.4-9.4 24.6-9.4 33.9 0l47 47 
        47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg></button>';

$act2 = '<button  class="btn btn-primary edit" 
    data-id="'.$rows['id'].'"  
    data-com="'.$rows['companyid'].'"  
    data-dep="'.$rows['departmentid'].'"  
    data-position="'.$rows['position'].'"
    data-department="'.$rows['department'].'"
    title = "edit"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license 
  (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM471 143c9.4-9.4 24.6-9.4 33.9 0l47 47 
  47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg></button>';
  $act3 = '<button  class="btn btn-danger removedata" data-id="'.$rows['id'].'"  title = "Remove"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license 
  (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM471 143c9.4-9.4 24.6-9.4 33.9 0l47 47 
  47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg></button>';

    $data[] = array(
        "no"  => $no,
        "com" => $rows['company'],
        "dep" => $rows['department'],
        "pos" => $rows['position'],
        "sta" => $status,
        "action" => $act1.'  '.$act2.' '.$act3,

    );
}

echo json_encode($data);

