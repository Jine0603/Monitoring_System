<?php
include 'Include/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Retrieve the selected date range from the Ajax request
    $startDate = $_POST['startDate'] ?? '';
    $endDate = $_POST['endDate'] ?? '';
    $cat = $_POST['cat'] ?? '';

    if ($startDate != '' && $endDate != '' && $cat != 'default'){
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
        WHERE assigned_tbl.assigned_date BETWEEN '$startDate' AND '$endDate' AND categoriesid  = '$cat' AND assigned_tbl.status = '1'";
    }
    else if ($cat != 'default'){
        $sql = "SELECT * FROM item_tbl WHERE categoriesid  = '$cat' AND status = '1'AND assigned_status = '1'";
    }else{
        
    }
    $query = mysqli_query($conn, $sql);
    $data = array();
    $no = 0;

    while ($rows = mysqli_fetch_assoc($query)) {
        $no++;
        $checkbox = '<input type="checkbox" class="get_value" value="'.$rows['id'].'"  name="checkbox" id="">';
        $emp = $rows['employee_assigned'];
        $location1 = $rows['locationid'];
        

        if($emp == '1') {
        // Your existing code for generating the button
        $br = '<a href="brcode_department.php?id='. $rows['id'] . '"  class="btn btn-info title="Edit" target="blank_"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M24 32C10.7 32 0 42.7 0 56V456c0 13.3 10.7 24 24 24H40c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24H24zm88 0c-8.8 0-16 7.2-16 16V464c0 8.8 7.2 16 16 16s16-7.2 16-16V48c0-8.8-7.2-16-16-16zm72 0c-13.3 0-24 10.7-24 24V456c0 13.3 10.7 24 24 24h16c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24H184zm96 0c-13.3 0-24 10.7-24 24V456c0 13.3 10.7 24 24 24h16c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24H280zM448 56V456c0 13.3 10.7 24 24 24h16c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24H472c-13.3 0-24 10.7-24 24zm-64-8V464c0 8.8 7.2 16 16 16s16-7.2 16-16V48c0-8.8-7.2-16-16-16s-16 7.2-16 16z"/></svg></a>';
        }else if ($location1 != 'default'){
            $br = '<a href="brcode_location.php?id='. $rows['id'] . '"  class="btn btn-info title="Edit" target="blank_"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M24 32C10.7 32 0 42.7 0 56V456c0 13.3 10.7 24 24 24H40c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24H24zm88 0c-8.8 0-16 7.2-16 16V464c0 8.8 7.2 16 16 16s16-7.2 16-16V48c0-8.8-7.2-16-16-16zm72 0c-13.3 0-24 10.7-24 24V456c0 13.3 10.7 24 24 24h16c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24H184zm96 0c-13.3 0-24 10.7-24 24V456c0 13.3 10.7 24 24 24h16c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24H280zM448 56V456c0 13.3 10.7 24 24 24h16c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24H472c-13.3 0-24 10.7-24 24zm-64-8V464c0 8.8 7.2 16 16 16s16-7.2 16-16V48c0-8.8-7.2-16-16-16s-16 7.2-16 16z"/></svg></a>';
        }else{
        $br = '<a href="brcode_assigned.php?id='. $rows['id'] . '"  class="btn btn-info title="Edit" target="blank_"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M24 32C10.7 32 0 42.7 0 56V456c0 13.3 10.7 24 24 24H40c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24H24zm88 0c-8.8 0-16 7.2-16 16V464c0 8.8 7.2 16 16 16s16-7.2 16-16V48c0-8.8-7.2-16-16-16zm72 0c-13.3 0-24 10.7-24 24V456c0 13.3 10.7 24 24 24h16c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24H184zm96 0c-13.3 0-24 10.7-24 24V456c0 13.3 10.7 24 24 24h16c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24H280zM448 56V456c0 13.3 10.7 24 24 24h16c13.3 0 24-10.7 24-24V56c0-13.3-10.7-24-24-24H472c-13.3 0-24 10.7-24 24zm-64-8V464c0 8.8 7.2 16 16 16s16-7.2 16-16V48c0-8.8-7.2-16-16-16s-16 7.2-16 16z"/></svg></a>';
        }

        $data[] = array(
            "checkbox" => $checkbox,
            "no"       => $no,
            "name"     => $rows['assetname'],
            "asset"    => $rows['cateid'] . ' - ' . $rows['assetid'],
            "emp"     => $rows['lastname'].' '.$rows['firstname'],
            "dep"      => $rows['department'],
            "loc"      => $rows['location'],
            "btn"      => $br,
            );
    }

    // Send the data back to the client
    echo json_encode($data);
}
