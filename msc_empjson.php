<?php
 include 'Include/config.php';

 $data = array();

 $sql = "SELECT employee_tbl.id,com_tbl.company,dep_tbl.department,position_tbl.position,position_tbl.id As positionid,employee_tbl.employeeid,employee_tbl.firstname,
 employee_tbl.lastname,employee_tbl.username,employee_tbl.password,employee_tbl.companyid,employee_tbl.departmentid,employee_tbl.positionid,employee_tbl.status,employee_tbl.datecreated
 FROM employee_tbl
 LEFT JOIN com_tbl ON com_tbl.id           = employee_tbl.companyid
 LEFT JOIN dep_tbl ON dep_tbl.id           = employee_tbl.departmentid
 LEFT JOIN position_tbl ON position_tbl.id = employee_tbl.positionid
--  LEFT JOIN access_tbl ON access_tbl.id     = employee_tbl.usertype
WHERE employee_tbl.companyid = 2";

$query = mysqli_query($conn, $sql);
$no = 0;

while($rows = mysqli_fetch_assoc($query)){
  $no++;
  $status = $rows['status'];
  $id     = $rows['id'];

  $action = '<button  class="btn btn-blue edit_modal"          
  data-id         = "'.$rows['id'].'"
  data-empid      = "'.$rows['employeeid'].'"
  data-firstname  = "'.$rows['firstname'].'"
  data-lastname   = "'.$rows['lastname'].'"
  data-username   = "'.$rows['username'].'"
  data-password   = "'.$rows['password'].'"
  data-company    = "'.$rows['companyid'].'"
  data-department = "'.$rows['departmentid'].'"
  data-position   = "'.$rows['positionid'].'"
  title           = "Edit"
  ><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H322.8c-3.1-8.8-3.7-18.4-1.4-27.8l15-60.1c2.8-11.3 8.6-21.5 16.8-29.7l40.3-40.3c-32.1-31-75.7-50.1-123.9-50.1H178.3zm435.5-68.3c-15.6-15.6-40.9-15.6-56.6 0l-29.4 29.4 71 71 29.4-29.4c15.6-15.6 15.6-40.9 0-56.6l-14.4-14.4zM375.9 417c-4.1 4.1-7 9.2-8.4 14.9l-15 60.1c-1.4 5.5 .2 11.2 4.2 15.2s9.7 5.6 15.2 4.2l60.1-15c5.6-1.4 10.8-4.3 14.9-8.4L576.1 358.7l-71-71L375.9 417z"/></svg></button>';

  $act1 = '<button  class="btn btn-danger removedata" data-id="'.$rows['id'].'"  title = "Remove"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM471 143c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg></button>';
  $act2 = '<button  class="btn btn-info retrivedata" data-id="'.$rows['id'].'"  title = "Restore"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM625 177L497 305c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L591 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg></button>';

  if($status == '1'){
    $status = '<badge  class="badge bg-success" style="width:70px;height="100px">Active</badge>';
    
    }else{
    $status = '<badge  class="badge badge-danger" style="width:70px;height="100px">Inactive</badge>';
    
    }

        $data[] = array(
        "no" => $no,
        "empid"     => $rows['employeeid'],
        "fname"     => $rows['firstname'].' '.$rows['lastname'],
        "dep"       => $rows['department'],
        "pos"       => $rows['position'],
        "user"      => $rows['username'],
        "pass"      => $rows['password'],
        "sta"       => $status,
        "act"       => $action.' '.$act2.' '.$act1
        );
      }
    echo json_encode($data);
