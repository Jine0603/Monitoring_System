<?php
include 'Include/config.php';

$data = array();

$sql = "SELECT employee_tbl.id,com_tbl.company,dep_tbl.department,position_tbl.position As position, employee_tbl.employeeid,employee_tbl.firstname,
 employee_tbl.lastname,employee_tbl.username,employee_tbl.password,employee_tbl.companyid,employee_tbl.departmentid,employee_tbl.positionid,employee_tbl.status,employee_tbl.datecreated
 FROM employee_tbl
 LEFT JOIN com_tbl ON com_tbl.id           = employee_tbl.companyid
 LEFT JOIN dep_tbl ON dep_tbl.id           = employee_tbl.departmentid
 LEFT JOIN position_tbl ON position_tbl.id = employee_tbl.positionid
WHERE employee_tbl.companyid = 2 AND employee_tbl.status = 1 AND employee_tbl.employeeid";

$query = mysqli_query($conn, $sql);
$no = 0;

while ($rows = mysqli_fetch_assoc($query)) {
  $no++;
  $status = $rows['status'];
  $id     = $rows['id'];

 $sql1 = "SELECT * FROM accrole_tbl WHERE employeeid = '$id' AND status = '1'";

  $query1 = mysqli_query($conn, $sql1);

  $user = array();

  while ($row = mysqli_fetch_assoc($query1)){
  array_push($user, $row['usertype']);
  $type = implode(',', $user);
  }


      $action = '<button  class="btn btn-info edit_modal"          
      data-id         = "' . $rows['id'] . '"
      data-empid      = "' . $rows['employeeid'] . '"
      data-firstname  = "' . $rows['firstname'] . '"
      data-lastname   = "' . $rows['lastname'] . '"
      data-username   = "' . $rows['username'] . '"
      data-password   = "' . $rows['password'] . '"
      data-company    = "' . $rows['companyid'] . '"
      data-dep        = "' . $rows['departmentid'] . '"
      data-position   = "' . $rows['positionid'] . '"
      data-pos        = "' . $rows['position'] . '"
      data-department = "' . $rows['department'] . '"
      data-user    = "' . $type . '"
            title           = "Edit"
      ><svg width="15" height="15" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M17 3C17.2626 2.73735 17.5744 2.52901 17.9176 2.38687C18.2608 2.24473 18.6286 2.17157 19 2.17157C19.3714 2.17157 19.7392 2.24473 20.0824 2.38687C20.4256 2.52901 20.7374 2.73735 21 3C21.2626 3.26264 21.471 3.57444 21.6131 3.9176C21.7553 4.26077 21.8284 4.62856 21.8284 5C21.8284 5.37143 21.7553 5.73923 21.6131 6.08239C21.471 6.42555 21.2626 6.73735 21 7L7.5 20.5L2 22L3.5 16.5L17 3Z" stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
    </svg></button>';
  
      $act1 = '<button  class="btn btn-danger removedata" data-id="' . $rows['id'] . '"  title = "Remove"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>';
      $act2 = '<button  class="btn btn-primary viewdata" 
      data-id         = "' . $rows['id'] . '"
      data-empid      = "' . $rows['employeeid'] . '"
      data-firstname  = "' . $rows['firstname'] . '"
      data-lastname   = "' . $rows['lastname'] . '"
      data-username   = "' . $rows['username'] . '"
      data-password   = "' . $rows['password'] . '"
      data-company    = "' . $rows['company'] . '"
      data-dep        = "' . $rows['departmentid'] . '"
      data-pos        = "' . $rows['position'] . '"
      data-department = "' . $rows['department'] . '"
      title = "View"><svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg></button>';
  
    if ($status == '1') {
      $status = '<badge  class="badge bg-success" style="width:70px;height="100px">Active</badge>';
    } else {
      $status = '<badge  class="badge badge-danger" style="width:70px;height="100px">Inactive</badge>';
    }

    $data[] = array(
      "no" => $no,
      "empid"     => $rows['employeeid'],
      "fname"     => $rows['firstname'] . ' ' . $rows['lastname'],
      "dep"       => $rows['department'],
      "pos"       => $rows['position'],
      "user"      => $rows['username'],
      "pass"      => $rows['password'],
      "sta"       => $status,
      "act"       => $action . ' ' . $act1
    );
  }

echo json_encode($data);
