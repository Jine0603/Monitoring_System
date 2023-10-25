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
WHERE employee_tbl.companyid = 1 AND employee_tbl.status = 1";

$query = mysqli_query($conn, $sql);
$no = 0;

while($rows = mysqli_fetch_assoc($query)){
  $no++;
  $status = $rows['status'];
  $id     = $rows['id'];

  $action = '<button  class="btn btn-info btn-xs light px-2 edit_modal"          
        data-id         = "'.$rows['id'].'"
        data-empid      = "'.$rows['employeeid'].'"
        data-firstname  = "'.$rows['firstname'].'"
        data-lastname   = "'.$rows['lastname'].'"
        data-username   = "'.$rows['username'].'"
        data-password   = "'.$rows['password'].'"
        data-company    = "'.$rows['companyid'].'"
        data-depart = "'.$rows['departmentid'].'"
        data-position   = "'.$rows['positionid'].'"
        data-department    = "'.$rows['department'].'"
        title           = "Edit"
  ><svg width="20" height="20" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
</svg></button>';

  $act1 = '<button  class="btn btn-danger removedata" data-id="'.$rows['id'].'"  title = "Remove"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license 
  (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM471 143c9.4-9.4 24.6-9.4 33.9 0l47 47 
  47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg></button>';
  $act2 = '<button  class="btn btn-info viewdata" 
  data-id         = "'.$rows['id'].'"
  data-empid      = "'.$rows['employeeid'].'"
  data-firstname  = "'.$rows['firstname'].'"
  data-lastname   = "'.$rows['lastname'].'"
  data-username   = "'.$rows['username'].'"
  data-password   = "'.$rows['password'].'"
  data-company    = "'.$rows['companyid'].'"
  data-department = "'.$rows['departmentid'].'"
  data-position   = "'.$rows['positionid'].'"
  title = "View"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license 
  (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM625 177L497 305c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L591 143c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg></button>';

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
